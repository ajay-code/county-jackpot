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
        $parentLotteries = ParentLottery::with('currentLottery')
                                            ->expired()
                                            ->alwaysActive()
                                            ->get();
        // ->dump();
        
        foreach ($parentLotteries as $parentLottery) {
            $this->info($parentLottery->id);
            // $currentLottery = $parentLottery->currentLottery;
            // if ($currentLottery->hasWinner()) {
            $parentLottery->expire_at = Carbon::now()->addWeek();
            $parentLottery->save();
            $parentLottery->lotteries()->create($parentLottery->toArray());
            $this->info("Id is {$parentLottery->id}");
            // }
        }
    }
}
