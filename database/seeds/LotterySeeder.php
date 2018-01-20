<?php

use App\Models\ParentLottery;
use Illuminate\Database\Seeder;

class LotterySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Illuminate\Database\Eloquent\Model::reguard();
        $lotteries = [
            [
                'county_id' => 44,
                'name' => 'Warwickshire',
                'prize' => 1000,
                'entry_fee' => 100,
                'expire_at' => '2018-01-31',
                'always_active' => 'yes',
            ],
            [
                'county_id' => 2,
                'name' => 'Bedfordshire',
                'prize' => 1000,
                'entry_fee' => 100,
                'expire_at' => '2018-01-31',
                'always_active' => 'yes',
            ]
        ];
        foreach ($lotteries as $lottery) {
            $parentLottery = ParentLottery::create($lottery);
            $parentLottery->lotteries()->create($lottery);
        }
    }
}
