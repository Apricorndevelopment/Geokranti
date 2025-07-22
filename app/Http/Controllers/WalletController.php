<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PointsTransaction;
use App\Models\RoyaltyTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{

    public function index()
{
    // Recent transactions for both tabs
    $pointsTransactions = PointsTransaction::with(['user', 'admin'])
                        ->latest()
                        ->take(10)
                        ->get();

    $royaltyTransactions = RoyaltyTransaction::with(['user', 'admin'])
                        ->latest()
                        ->take(10)
                        ->get();

    return view('admin.viewwallet', compact('pointsTransactions', 'royaltyTransactions'));
}
    public function getUserByUlid(Request $request)
    {
        $user = User::where('ulid', $request->ulid)->first(['name', 'email', 'points_balance', 'royalty_balance']);
        
        if(!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ]);
        }

        return response()->json([
            'success' => true,
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
                'points_balance' => $user->points_balance,
                'royalty_balance' => $user->royalty_balance
            ]
        ]);
    }

   public function addPoints(Request $request)
{
    $request->validate([
        'ulid' => 'required',
        'points' => 'required|numeric',
        'notes' => 'nullable|string'
    ]);

    $user = User::where('ulid', $request->ulid)->firstOrFail();

    $adminId = Auth::guard('admin')->id();

    PointsTransaction::create([
        'user_id' => $user->id,
        'points' => $request->points,
        'notes' => $request->notes,
        'admin_id' => $adminId
    ]);

    $user->increment('points_balance', $request->points);

    return redirect()->back()->with('success', 'Points transaction completed successfully.');
}


    public function addRoyalty(Request $request)
    {
        $request->validate([
            'ulid' => 'required',
            'royalty' => 'required|numeric',
            'notes' => 'nullable|string'
        ]);

        $user = User::where('ulid', $request->ulid)->firstOrFail();

        $adminId = Auth::guard('admin')->id();

        RoyaltyTransaction::create([
            'user_id' => $user->id,
            'royalty' => $request->royalty,
            'notes' => $request->notes,
            'admin_id' => $adminId
        ]);

        $user->increment('royalty_balance', $request->royalty);

        return redirect()->back()->with('success', 'Royalty transaction completed successfully.');
    }
}