<?php


namespace App\Http\Controllers;

use App\Models\Commission;
use App\Models\LevelIncome;
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
use Carbon\Carbon;
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
            'account_no' => 'nullable|string|min:6|max:100',
            'ifsc_code' => 'nullable|string|min:4|max:100',
            'upi_id' => 'nullable|string|max:100',
            'passbook_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'current_password' => 'nullable|required_with:password|string|min:8',
            'password' => [
                'nullable',
                'string',
                'min:8',
                'confirmed',
                'different:current_password',
                'regex:/[!@#$%^&*(),.?":{}|<>]/',
            ],
        ], [
            'password.regex' => 'Password must contain at least one special character.',
        ]);

        // Update basic fields
        $user->fill([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'state' => $validated['state'],
            'account_no' => $validated['account_no'],
            'ifsc_code' => $validated['ifsc_code'],
            'upi_id' => $validated['upi_id'],
        ]);

        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                Storage::delete('public/' . $user->profile_picture);
            }
            $path = $request->file('profile_picture')->store('profile-pictures', 'public');
            $user->profile_picture = $path;
        }

        // Handle passbook photo upload
        if ($request->hasFile('passbook_photo')) {
            if ($user->passbook_photo) {
                Storage::delete('public/' . $user->passbook_photo);
            }
            $path = $request->file('passbook_photo')->store('passbook-photos', 'public');
            $user->passbook_photo = $path;
        }

        // Handle password change
        if ($request->filled('current_password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'The current password is incorrect']);
            }

            $user->password = Hash::make($validated['password']);
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
    
            // $this->processLevelIncome($user, $finalPrice, $package);

            // For calculating the rank of the user based on the total business volume
            $this->checkAndRewardUser($user->sponsor_id);

            DB::commit();

            return redirect()->back()->with('success', 'Package purchased successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to process your request: ' . $e->getMessage());
        }
    }

    protected function processSponsorCommissions($user, $amount, $package)
    {

        if ($user->parent_id) {
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

                // PointsTransaction::create([
                //     'user_id' => $sponsorL1->id,
                //     'user_ulid' => $sponsorL1->ulid,
                //     'points' => $commissionL1,
                //     'notes' => '3% commission from ' . $user->ulid . ' for package: ' . $package->package_name,
                //     'admin_id' => null
                // ]);

                Commission::create([
                    'user_id' => $sponsorL1->id,
                    'user_ulid' => $sponsorL1->ulid,
                    'from_name' => $user->name,
                    'purchase_amount' => $amount,
                    'commission' => $commissionL1,
                    'level' => 1
                ]);

                // Level 2 - Sponsor's sponsor (1%) if has at least 2 downlines
                if ($sponsorL1->sponsor_id) {
                    $sponsorL2 = User::where('ulid', $sponsorL1->sponsor_id)->first();
                    if ($sponsorL2) {
                        $downlineCount = User::where('sponsor_id', $sponsorL1->ulid)->count();
                        if ($downlineCount >= 2) {
                            $commissionL2 = $amount * 0.01;

                            $sponsorL2->increment('points_balance', $commissionL2);

                            Commission::create([
                                'user_id' => $sponsorL2->id,
                                'user_ulid' => $sponsorL2->ulid,
                                'from_name' => $user->name,
                                'purchase_amount' => $amount,
                                'commission' => $commissionL2,
                                'level' => 2
                            ]);

                            // Level 3 - Sponsor's sponsor's sponsor (1%) if has at least 3 downlines
                            if ($sponsorL2->sponsor_id) {
                                $sponsorL3 = User::where('ulid', $sponsorL2->sponsor_id)->first();
                                if ($sponsorL3) {
                                    $downlineCountL2 = User::where('sponsor_id', $sponsorL2->ulid)->count();

                                    if ($downlineCountL2 >= 3) {
                                        $commissionL3 = $amount * 0.01;

                                        $sponsorL3->increment('points_balance', $commissionL3);

                                        Commission::create([
                                            'user_id' => $sponsorL3->id,
                                            'user_ulid' => $sponsorL3->ulid,
                                            'from_name' => $user->name,
                                            'purchase_amount' => $amount,
                                            'commission' => $commissionL3,
                                            'level' => 3
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

    // protected function processLevelIncome($user, $amount, $package)
    // {
    //     $currentLevel = 1;
    //     $currentUser = $user;

    //     while ($currentUser->sponsor_id && $currentLevel <= 50) {
    //         $sponsor = User::where('ulid', $currentUser->sponsor_id)->first();
    //         if (!$sponsor) break;

    //         // Determine percentage and rank requirement based on level
    //         $percentage = 0;
    //         $eligible = true; // Default to eligible

    //         if ($currentLevel == 1) {
    //             $percentage = 10.00;
    //             // No rank requirement for level 1
    //         }
    //         elseif ($currentLevel >= 2 && $currentLevel <= 10) {
    //             $percentage = 5.00;
    //             $eligible = ($sponsor->current_rank == 'Farmer');
    //         }
    //         elseif ($currentLevel >= 11 && $currentLevel <= 15) {
    //             $percentage = 3.00;
    //             $eligible = ($sponsor->current_rank == 'Silver Farmer');
    //         }
    //         elseif ($currentLevel >= 16 && $currentLevel <= 20) {
    //             $percentage = 1.00;
    //             $eligible = ($sponsor->current_rank == 'Gold Farmer');
    //         }
    //         elseif ($currentLevel >= 21 && $currentLevel <= 25) {
    //             $percentage = 0.50;
    //             $eligible = ($sponsor->current_rank == 'Platinum Farmer');
    //         }
    //         elseif ($currentLevel >= 26 && $currentLevel <= 30) {
    //             $percentage = 0.25;
    //             $eligible = ($sponsor->current_rank == 'Ruby Farmer');
    //         }
    //         elseif ($currentLevel >= 31 && $currentLevel <= 35) {
    //             $percentage = 0.25;
    //             $eligible = ($sponsor->current_rank == 'Sapphire Farmer');
    //         }
    //         elseif ($currentLevel >= 36 && $currentLevel <= 40) {
    //             $percentage = 0.25;
    //             $eligible = ($sponsor->current_rank == 'Diamond Farmer');
    //         }
    //         elseif ($currentLevel >= 41 && $currentLevel <= 45) {
    //             $percentage = 0.25;
    //             $eligible = ($sponsor->current_rank == 'Blue Diamond Farmer');
    //         }
    //         elseif ($currentLevel >= 46 && $currentLevel <= 50) {
    //             $percentage = 0.25;
    //             $eligible = ($sponsor->current_rank == 'Black Diamond Farmer');
    //         }

    //         if ($percentage > 0 && $eligible) {
    //             $incomeAmount = $amount * ($percentage / 100);

    //             // Add to user's balance
    //             $sponsor->increment('points_balance', $incomeAmount);

    //             // Record in level income table
    //             LevelIncome::create([
    //                 'user_id' => $sponsor->id,
    //                 'user_ulid' => $sponsor->ulid,
    //                 'from_user_id' => $user->id,
    //                 'from_user_ulid' => $user->ulid,
    //                 'from_user_name' => $user->name,
    //                 'purchase_amount' => $amount,
    //                 'level' => $currentLevel,
    //                 'percentage' => $percentage,
    //                 'amount' => $incomeAmount,
    //                 'package_id' => $package->id ?? null,
    //                 'package_name' => $package->package_name ?? null,
    //             ]);
    //         }

    //         $currentUser = $sponsor;
    //         $currentLevel++;
    //     }
    // }


    //Calculating the rank of the user based on the total business volume
    public function checkAndRewardUser($userUlid)
    {
        // Get direct sponsored users (legs)
        $directLegs = User::where('sponsor_id', $userUlid)->get();

        $legsBusiness = [];

        foreach ($directLegs as $leg) {
            $legsBusiness[$leg->ulid] = $this->getTotalBusiness($leg->ulid);
        }

        if (empty($legsBusiness)) {
            return; // No legs, nothing to do
        }
        // Find Strong Leg
        $strongLegUlid = array_search(max($legsBusiness), $legsBusiness);
        $strongLegBusiness = $legsBusiness[$strongLegUlid];

        // dd($legsBusiness, $strongLegUlid, $strongLegBusiness);

        // Sum of Weaker Legs
        $weakerLegsBusiness = array_sum($legsBusiness) - $strongLegBusiness;

        // Matching Business (Weaker leg business used for matching)
        $matchingBusiness = $weakerLegsBusiness;

        $leftBusiness = 0;
        $rightBusiness = 0;

        if ($directLegs->count() >= 2) {
            $leftBusiness = $strongLegBusiness;
            $rightBusiness = $weakerLegsBusiness;
        } elseif ($directLegs->count() == 1) {
            // Agar sirf ek leg hai to aap default left ya right maan sakte ho
            $leftBusiness = $legsBusiness[$directLegs[0]->ulid] ?? 0;
        }

        $user = User::where('ulid', $userUlid)->first();

        $user->update([
            'left_business' => $leftBusiness,
            'right_business' => $rightBusiness,
        ]);

        // Define Rewards
        // $rewards = [
        //     250000 => ['rank' => 'Farmer', 'reward' => 5000],
        //     750000 => ['rank' => 'Silver Farmer', 'reward' => 10000],
        //     1750000 => ['rank' => 'Gold Farmer', 'reward' => 20000],
        // ];
        // dd($directLegs->count(), $matchingBusiness, $weakerLegsBusiness, $strongLegBusiness, $userUlid);
        $rewards = DB::table('royalty_level_rewards')
            ->orderBy('sr_no')
            ->get();

        $user = User::where('ulid', $userUlid)->first();

        $givenRewards = PointsTransaction::where('user_id', $user->id)
            ->where('notes', 'like', 'Rank Reward:%')
            ->pluck('notes')
            ->map(function ($note) {
                return trim(str_replace('Rank Reward:', '', $note));
            })
            ->toArray();

        foreach ($rewards as $reward) {
            $requiredBusiness = $this->convertMatchingToNumber($reward->matching);
            // Check if user qualifies and hasn't received this reward yet
            if (
                $matchingBusiness >= $requiredBusiness &&
                $strongLegBusiness >= $requiredBusiness &&
                !in_array($reward->level, $givenRewards)
            ) {

                // Award this rank
                $user->update(['current_rank' => $reward->level]);

                PointsTransaction::create([
                    'user_id' => $user->id,
                    'user_ulid' => $user->ulid,
                    'points' => $this->convertMatchingToNumber($reward->reward),
                    'notes' => 'Rank Reward: ' . $reward->level,
                    'admin_id' => null
                ]);

                $user->increment('points_balance', $this->convertMatchingToNumber($reward->reward));

                // Add to given rewards to prevent duplicate awards
                $givenRewards[] = $reward->level;
            }
        }
    }

    public function convertMatchingToNumber($value)
    {
        $value = strtolower(trim($value));
        if (str_contains($value, 'cr')) {
            return (float)str_replace('cr', '', $value) * 10000000;
        } elseif (str_contains($value, 'l')) {
            return (float)str_replace('l', '', $value) * 100000;
        } elseif (str_contains($value, 'k')) {
            return (float)str_replace('k', '', $value) * 1000;
        } else {
            return (float)$value;
        }
    }

    public function getTotalBusiness($ulid)
    {
        $user = User::where('ulid', $ulid)->first();

        if (!$user) return 0;

        // Sum own purchases
        $ownBusiness = Package2Purchase::where('ulid', $ulid)->sum('final_price');

        // Get direct downline
        $downlines = User::where('sponsor_id', $ulid)->get();

        $totalBusiness = $ownBusiness;

        foreach ($downlines as $downline) {
            $totalBusiness += $this->getTotalBusiness($downline->ulid);
        }

        return $totalBusiness;
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

    public function level1Commissions()
    {
        $commissions = Commission::where('user_id', Auth::id())
            ->where('level', 1)
            ->latest()
            ->take(10)
            ->get();

        return view('user.rewards.directcommission', compact('commissions'));
    }

    public function level2Commissions()
    {
        $commissions = Commission::where('user_id', Auth::id())
            ->whereIn('level', [2, 3])
            ->latest()
            ->take(10)
            ->get();

        return view('user.rewards.networkcommission', compact('commissions'));
    }

    public function levelIncomeReport()
    {
        $incomes = LevelIncome::where('user_id', Auth::id())
            ->with(['fromUser', 'package'])
            ->latest()
            ->paginate(10);

        $totalIncome = LevelIncome::where('user_id', Auth::id())->sum('amount');

        $totalRecords = LevelIncome::where('user_id', Auth::id())->count();

        return view('user.rewards.level-income', compact('incomes', 'totalIncome', 'totalRecords'));
    }
}
