<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Package2Purchase;
use App\Models\PackageMonthlyDistribution;

use Carbon\Carbon;

class DistributePackageProfits extends Command
{
    protected $signature = 'profits:distribute-monthly';
    protected $description = 'Distribute monthly package profits to users';

    public function handle()
    {
        $currentMonth = Carbon::now()->format('Y-m');
        
        // Get active package purchases (where time hasn't expired)
        $activePurchases = Package2Purchase::where('purchased_at', '<=', Carbon::now())
            ->where(function($query) {
                $query->whereNull('time')
                      ->orWhere('purchased_at', '>=', Carbon::now()->subYears('time'));
            })
            ->where('rate', '>', 0)
            ->with('user')
            ->get();

        foreach ($activePurchases as $purchase) {
            // Calculate monthly profit
            $monthlyProfit = $purchase->final_price * ($purchase->rate / 100);
            
            // Update user's balance
            $purchase->user->increment('points_balance', $monthlyProfit);
            
            
            // Record distribution
            PackageMonthlyDistribution::create([
                'user_id' => $purchase->user_id,
                'user_ulid' => $purchase->user->ulid,
                'package2_purchase_id' => $purchase->id,
                'purchase_amount' => $purchase->final_price,
                'rate_percentage' => $purchase->rate,
                'distributed_amount' => $monthlyProfit,
                'months_remaining' => $this->calculateRemainingMonths($purchase),
                'distribution_date' => Carbon::now()
            ]);
        }
        
        $this->info('Monthly package profits distributed successfully!');
    }
    
    protected function calculateRemainingMonths($purchase)
    {
        if (empty($purchase->time)) {
            return null; // Lifetime package
        }
        
        $expiryDate = Carbon::parse($purchase->purchased_at)->addYears($purchase->time);
        return Carbon::now()->diffInMonths($expiryDate);
    }
}