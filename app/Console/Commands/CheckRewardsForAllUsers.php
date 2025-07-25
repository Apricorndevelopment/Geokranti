<?php

namespace App\Console\Commands;

use App\Http\Controllers\UserController;
use Illuminate\Console\Command;

class CheckRewardsForAllUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:rewards';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */

    public function handle()
    {
        $users = \App\Models\User::all();

        foreach ($users as $user) {
            app(UserController::class)->checkAndRewardUser($user->ulid);
        }

        $this->info('Reward checking completed for all users.');
    }
}
