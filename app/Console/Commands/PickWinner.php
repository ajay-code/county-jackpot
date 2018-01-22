<?php

namespace App\Console\Commands;

use App\Models\ParentLottery;
use Illuminate\Console\Command;

class PickWinner extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lottery:pick-winner';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $parentLotteries = ParentLottery::with('currentLottery')->expired()->get();
        
        foreach ($parentLotteries as $parentLottery) {
            $currentLottery = $parentLottery->currentLottery;
            if (!$currentLottery->hasWinner()) {
                $currentLottery->load(['draws' => function ($q) {
                    $q = $q->with('user')->where('result', 'won');
                }]);

                $users = $currentLottery->draws->pluck('user');
                
                $winner = $users->shuffle()[0];
                
                $currentLottery->update([
                    'winner_id' => $winner->id
                ]);
            }
        }
    }
}
