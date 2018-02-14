<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\ParentLottery;
use Illuminate\Console\Command;

class RescheduleLottery extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reschedule:lotteries';

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
        $parentLotteries = ParentLottery::with(['currentLottery' => function ($q) {
            $q = $q->withCount('draws');
        }])
            ->expired()
            ->alwaysActive()
            ->get();
        // ->dump();
        
        foreach ($parentLotteries as $parentLottery) {
            $currentLottery = $parentLottery->currentLottery;
            // $this->info("Id is {$parentLottery->id}");
            if ($currentLottery->hasWinner() || $currentLottery->draws_count <= 0) {
                $parentLottery->expire_at = Carbon::now()->addDays(6);
                $parentLottery->save();
                $parentLottery->lotteries()->create($parentLottery->toArray());
                // $this->info("Id is {$parentLottery->id}");
            }
        }
    }
}
