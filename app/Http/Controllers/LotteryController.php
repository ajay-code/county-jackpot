<?php

namespace App\Http\Controllers;

use App\Models\Lottery;
use Illuminate\Http\Request;
use App\Models\ParentLottery;
use App\Models\LotteryTransaction;

class LotteryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Buy ParentLottery
     */
    public function index()
    {
        $user = auth()->user()->load('county');
        // return $user;
        $lotteries = ParentLottery::notExpired()->where(function ($q) use ($user) {
            if ($user->county) {
                $q = $q->where('county_id', $user->county->id);
            }
            $q = $q->orWhereNull('county_id');
        })->get();

        $lotteries->load('currentLottery');
        // return $lotteries;
        return view('lottery.index', compact('lotteries'));
    }

    /**
     * Buy ParentLottery
     *
     * @param \App\Models\ParentLottery
     */
    public function buy(ParentLottery $parentLottery)
    {
        $parentLottery->load('currentLottery', 'county');
        $user = auth()->user();
        
        if ($parentLottery->county) {
            if ($user->county) {
                if (!($parentLottery->county->id == $user->county->id)) {
                    alert()->info("You can only enter draws available for your county")->autoclose('3000');
                    return back();
                }
            } else {
                alert()->info("You can only enter draws available for your county")->autoclose('3000');
                return back();
            }
        }
        
        $user->load(['lotteries' => function ($q) use ($parentLottery) {
            $q = $q->where('lottery_id', $parentLottery->currentLottery->id);
        }]);

        if ($user->lotteries->count() >= 5) {
            alert()->info('You have reached the maximum number of entries for this draw')->autoclose('3000');
            return back();
        }
        return view('lottery.buy', compact('parentLottery'));
    }

    /**
     * Game
     *
     * @param \App\Models\ParentLottery
     */
    public function game(ParentLottery $parentLottery)
    {
        $parentLottery->load('currentLottery', 'county');
        $user = auth()->user();
        
        if ($parentLottery->county) {
            if (!($parentLottery->county->id == $user->county->id)) {
                alert()->info("You can only enter draws available for your county")->autoclose('3000');
                return back();
            }
        }

        $user->load(['lotteries' => function ($q) use ($parentLottery) {
            $q = $q->where('lottery_id', $parentLottery->currentLottery->id);
        }]);

        if ($user->lotteries->count() >= 5) {
            alert()->info('You have reached the maximum number of entries for this draw')->autoclose('3000');
            return back();
        }
        return view('lottery.game.index', compact('parentLottery'));
    }
    
    /**
     * Play Game
     *
     * @param \App\Models\LotteryTransaction
     */
    public function play(ParentLottery $parentLottery)
    {
        return view('lottery.game.play', compact('parentLottery'));
    }
}
