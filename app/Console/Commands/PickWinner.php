<?php

namespace App\Console\Commands;

use Notification;
use App\Models\ParentLottery;
use Illuminate\Console\Command;
use App\Notifications\WinnerEmail;

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
            $this->info("CurrentLottery ID: {$currentLottery->id}");
            if (!$currentLottery->hasWinner()) {
                $currentLottery->load(['draws' => function ($q) {
                    $q = $q->with('user')->where('result', 'won');
                }]);

                if ($currentLottery->draws->count() <= 0) {
                    $currentLottery->load('draws');
                    // $this->info("CurrentLottery ID draw count: {$currentLottery->draws->count()}");
                }

                if ($currentLottery->draws->count() <= 0) {
                    continue;
                }

                $draws = $currentLottery->draws;

                $winner = $draws->shuffle()[0];
                $currentLottery->update([
                    'winner_id' => $winner->user->id,
                    'winner_draw_id' => $winner->id
                ]);

                // Send Emails
                $winner->user->notify(new WinnerEmail($currentLottery, $winner->user));
                $participants = $currentLottery->participants->unique();
                $participants = $participants->keyBy('id');
                $participants = $participants->forget($winner->user->id);
                if ($participants->count() > 0) {
                    Notification::send($participents, new ResultDeclared($currentLottery));
                }
            }
        }
    }
}
