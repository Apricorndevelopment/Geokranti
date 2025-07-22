<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Package1;
use App\Models\Package2;
use App\Models\Package2Details;
use App\Models\Package2Purchase;
use App\Models\PackageTransaction;
use App\Models\PointsTransaction;
use App\Models\RoyaltyTransaction;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function dashboard()
    {
        $packages = Package1::all();
        return view('user.dashboard', compact('packages'));
    }

    // public function profile()
    // {
    //     // Get the currently authenticated user
    //     $user = Auth::user();

    //     // Pass the user data to the view
    //     return view('user.profile', ['user' => $user]);
    // }

    public function profile()
    {
        // $user = Auth::user();
        // return view('user.profile', ['user' => $user]);
        $user = Auth::user();

        $showPasswordReminder = false;

        if ($user->password_updated_at) {
            $daysSincePasswordChange = now()->diffInDays($user->password_updated_at);

            if ($daysSincePasswordChange >= 15) {
                $showPasswordReminder = true;
            }
        }

        return view('user.profile', compact('user', 'showPasswordReminder'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('user.edit-profile', ['user' => $user]);
    }

    // public function update(Request $request)
    // {
    //     $authUser = Auth::user();
    //     $user = User::find($authUser->id);

    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
    //         'phone' => 'nullable|string|max:20',
    //         'address' => 'nullable|string|max:500',
    //         'state' => 'nullable|string|max:100',
    //         'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

    //         // Password validation rules
    //         'current_password' => 'nullable|required_with:password|string|min:8',
    //         'password' => 'nullable|string|min:8|confirmed|different:current_password',
    //     ]);

    //     // Update basic fields
    //     $user->name = $validated['name'];
    //     $user->email = $validated['email'];
    //     $user->phone = $validated['phone'];
    //     $user->address = $validated['address'];
    //     $user->state = $validated['state'];

    //     // Handle profile picture upload
    //     if ($request->hasFile('profile_picture')) {
    //         if ($user->profile_picture) {
    //             Storage::delete('public/' . $user->profile_picture);
    //         }
    //         $path = $request->file('profile_picture')->store('profile-pictures', 'public');
    //         $user->profile_picture = $path;
    //     }

    //     // Handle password change
    //     if ($request->filled('current_password')) {
    //         if (!Hash::check($request->current_password, $user->password)) {
    //             return back()->withErrors(['current_password' => 'The current password is incorrect']);
    //         }

    //         $user->password = Hash::make($validated['password']);
    //     }

    //     $user->save();

    //     return redirect()->route('user.profile')->with('success', 'Profile updated successfully!');
    // }

     public function update(Request $request)
    {
        $authUser = Auth::user();
        $user = User::find($authUser->id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'state' => 'nullable|string|max:100',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            // Password validation rules with special character check
            'current_password' => 'nullable|required_with:password|string|min:8',
            'password' => [
                'nullable',
                'string',
                'min:8',
                'confirmed',
                'different:current_password',
                'regex:/[!@#$%^&*(),.?":{}|<>]/', // ✅ Special character check
            ],
        ], [
            'password.regex' => 'Password must contain at least one special character.',
        ]);

        // Update basic fields
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->phone = $validated['phone'];
        $user->address = $validated['address'];
        $user->state = $validated['state'];

        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                Storage::delete('public/' . $user->profile_picture);
            }
            $path = $request->file('profile_picture')->store('profile-pictures', 'public');
            $user->profile_picture = $path;
        }

        // Handle password change
        if ($request->filled('current_password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'The current password is incorrect']);
            }

            $user->password = Hash::make($validated['password']);
            $user->password_updated_at = now();
        }

        $user->save();

        return redirect()->route('user.profile')->with('success', 'Profile updated successfully!');
    }


    //Package purchasing for the Activation
    public function purchasePackage(Request $request)
    {
        $request->validate([
            'package_id' => 'required|exists:package1,id'
        ]);

        $user = Auth::user();
        $package = Package1::findOrFail($request->package_id);

        $discountAmount = $package->discount_per ? ($package->price * $package->discount_per) / 100 : 0;
        $totalCost = $package->price;

        if ($user->points_balance < $totalCost) {
            return back()->with('error', 'Insufficient balance to purchase this package');
        }
        // dd($user->id);
        PackageTransaction::create([
            'user_id' => $user->id,
            'package1_id' => $package->id,
            'ulid' => $user->ulid,
            'package_name' => $package->package_name,
            'price' => $package->price,
            'discount_percentage' => $package->discount_per,
            'discount_amount' => $discountAmount,
            'final_price' => $totalCost,
            'transaction_date' => now(),
        ]);


        if ($user->status == 'inactive') {
            DB::table('users')
                ->where('id', $user->id)
                ->update(['status' => 'active', 'user_doa' => now()]);
        }

        DB::table('users')
            ->where('id', $user->id)
            ->update([
                'points_balance' => DB::raw('points_balance - ' . $totalCost)
            ]);

        if ($user->status == 'inactive') {
            DB::table('users')
                ->where('id', $user->id)
                ->update(['status' => 'active', 'user_doa' => now()]);
        }

        // Deduct points directly from DB
        DB::table('users')
            ->where('id', $user->id)
            ->decrement('points_balance', $totalCost);

        PointsTransaction::create([
            'user_id' => $user->id,
            'user_ulid' => $user->ulid,
            'points' => -$totalCost,
            'notes' => 'Deducted for purchasing package: ' . $package->package_name,
        ]);

        return redirect()->route('user.dashboard')->with('success', 'Package purchased successfully!');

    }


    //User side package purchasing after Activation

    public function showPurchaseForm()
    {
        $packages = Package2::with('details')->get();
        return view('user.package2-purchase', compact('packages'));
    }
    // public function processPurchase(Request $request)
    // {
    //     $request->validate([
    //         'package2_id' => 'required|exists:package2,id',
    //         'package2_detail_id' => 'required|exists:package2_details,id',
    //         'quantity' => 'required|integer|min:1',
    //     ]);

    //     $user = Auth::user();
    //     $package = Package2::findOrFail($request->package2_id);
    //     $rateDetail = Package2Details::findOrFail($request->package2_detail_id);

    //     // dd($rateDetail->profit_share);

    //     $finalPrice = $package->price * $request->quantity;

    //     // Check user's balance
    //     if ($user->points_balance < $finalPrice) {
    //         return redirect()->back()->with('error', 'Insufficient balance to purchase this package');
    //     }
    //     DB::beginTransaction();
    //     try {
    //         // Create package purchase record
    //         Package2Purchase::create([
    //             'user_id' => $user->id,
    //             'ulid' => $user->ulid,
    //             'package2_id' => $package->id,
    //             'package2_detail_id' => $rateDetail->id,
    //             'package_name' => $package->package_name,
    //             'quantity' => $request->quantity,
    //             'rate' => $rateDetail->rate,
    //             'capital' => $rateDetail->capital,
    //             'time' => $rateDetail->time,
    //             'profit_share' => $rateDetail->profit_share,
    //             'final_price' => $finalPrice,
    //             'purchased_at' => now(),
    //         ]);

    //         // Deduct from user's balance
    //         DB::table('users')
    //             ->where('id', $user->id)
    //             ->decrement('points_balance', $finalPrice);

    //         // Record points transaction
    //         PointsTransaction::create([
    //             'user_id' => $user->id,
    //             'points' => -$finalPrice,
    //             'notes' => 'Purchased package: ' . $package->package_name,
    //             'admin_id' => null
    //         ]);

    //         DB::commit();

    //         return redirect()->back()->with('success', 'Package purchased successfully!');

    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return redirect()->back()->with('error', 'Failed to process your request: ' . $e->getMessage());
    //     }
    // }

    public function processPurchase(Request $request)
{
    $request->validate([
        'package2_id' => 'required|exists:package2,id',
        'package2_detail_id' => 'required|exists:package2_details,id',
        'quantity' => 'required|integer|min:1',
    ]);

    $user = Auth::user();
    $package = Package2::findOrFail($request->package2_id);
    $rateDetail = Package2Details::findOrFail($request->package2_detail_id);

    $finalPrice = $package->price * $request->quantity;

    // Check user's balance
    if ($user->points_balance < $finalPrice) {
        return redirect()->back()->with('error', 'Insufficient balance to purchase this package');
    }

    DB::beginTransaction();
    try {
        // Create package purchase record
        $purchase = Package2Purchase::create([
            'user_id' => $user->id,
            'ulid' => $user->ulid,
            'package2_id' => $package->id,
            'package2_detail_id' => $rateDetail->id,
            'package_name' => $package->package_name,
            'quantity' => $request->quantity,
            'rate' => $rateDetail->rate,
            'capital' => $rateDetail->capital,
            'time' => $rateDetail->time,
            'profit_share' => $rateDetail->profit_share,
            'final_price' => $finalPrice,
            'purchased_at' => now(),
        ]);

        // Deduct from user's balance
         DB::table('users')
                ->where('id', $user->id)
                ->decrement('points_balance', $finalPrice);

        // Record points transaction
        PointsTransaction::create([
            'user_id' => $user->id,
            'user_ulid' => $user->ulid,
            'points' => -$finalPrice,
            'notes' => 'Purchased package: ' . $package->package_name,
            'admin_id' => null
        ]);

        // Process sponsor commissions
        $this->processSponsorCommissions($user, $finalPrice, $package);

        DB::commit();

        return redirect()->back()->with('success', 'Package purchased successfully!');

    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->back()->with('error', 'Failed to process your request: ' . $e->getMessage());
    }
}

protected function processSponsorCommissions($user, $amount, $package)
{

    if($user->parent_id){
         $parent = User::where('ulid', $user->parent_id)->first();
        if ($parent) {
            $commission = $amount * 0.03;
            
            $parent->increment('points_balance', $commission);
            
            PointsTransaction::create([
                'user_id' => $parent->id,
                'user_ulid' => $parent->ulid,
                'points' => $commission,
                'notes' => '3% commission for being parent from ' . $user->ulid . ' for package: ' . $package->package_name,
                'admin_id' => null
            ]);
        }
    }

    // Level 1 - Direct sponsor (3%)
    if ($user->sponsor_id) {
        $sponsorL1 = User::where('ulid', $user->sponsor_id)->first();
        if ($sponsorL1) {
            $commissionL1 = $amount * 0.03;
            
            $sponsorL1->increment('points_balance', $commissionL1);
            
            PointsTransaction::create([
                'user_id' => $sponsorL1->id,
                'user_ulid' => $sponsorL1->ulid,
                'points' => $commissionL1,
                'notes' => '3% commission from ' . $user->ulid . ' for package: ' . $package->package_name,
                'admin_id' => null
            ]);

            // Level 2 - Sponsor's sponsor (1%) if has at least 2 downlines
            if ($sponsorL1->sponsor_id) {
                $sponsorL2 = User::where('ulid', $sponsorL1->sponsor_id)->first();
                if ($sponsorL2) {
                    $downlineCount = User::where('sponsor_id', $sponsorL1->ulid)->count();
                    if ($downlineCount >= 2) {
                        $commissionL2 = $amount * 0.01;
                        
                        $sponsorL2->increment('points_balance', $commissionL2);
                        
                        PointsTransaction::create([
                            'user_id' => $sponsorL2->id,
                            'user_ulid' => $sponsorL2->ulid,
                            'points' => $commissionL2,
                            'notes' => '1% L2 commission from ' . $user->ulid . ' for package: ' . $package->package_name,
                            'admin_id' => null
                        ]);

                        // Level 3 - Sponsor's sponsor's sponsor (1%) if has at least 3 downlines
                        if ($sponsorL2->sponsor_id) {
                           $sponsorL3 = User::where('ulid', $sponsorL2->sponsor_id)->first();
                            if ($sponsorL3) {
                               $downlineCountL2 = User::where('sponsor_id', $sponsorL2->ulid)->count();
                                
                                if ($downlineCountL2 >= 3) {
                                    $commissionL3 = $amount * 0.01;
                                    
                                    $sponsorL3->increment('points_balance', $commissionL3);
                                    
                                    PointsTransaction::create([
                                        'user_id' => $sponsorL3->id,
                                        'user_ulid' => $sponsorL3->ulid,
                                        'points' => $commissionL3,
                                        'notes' => '1% L3 commission from ' . $user->ulid . ' for package: ' . $package->package_name,
                                        'admin_id' => null
                                    ]);
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}

    public function viewWallet()
    {
        $points = Auth::user()->points_balance;
        $royalty = Auth::user()->royalty_balance;

        $pointsTransactions = PointsTransaction::where('user_id', Auth::user()->id)
            ->latest()
            ->take(10)
            ->get();

        $royaltyTransactions = RoyaltyTransaction::where('user_id', Auth::user()->id)
            ->latest()
            ->take(10)
            ->get();

        return view('user.viewwallet', compact('points', 'royalty', 'pointsTransactions', 'royaltyTransactions'));
    }
}