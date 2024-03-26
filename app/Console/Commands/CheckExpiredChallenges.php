<?php

namespace App\Console\Commands;

use App\Models\Challenge;
use Illuminate\Console\Command;

class CheckExpiredChallenges extends Command
{
    protected $signature = 'challenge:check-expired';

    protected $description = 'Check if challenges are expired';

    public function handle()
    {
        $expiredChallenges = Challenge::where('expiration_date', '<', now())->get();

        foreach ($expiredChallenges as $challenge) {
            $challenge->checked = true;
            $challenge->save();
        }

        $this->info(__('app.info_expired_challenges'));
    }
}
