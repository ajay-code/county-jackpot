<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserLottery;
use Illuminate\Http\Request;
use App\Models\ParentLottery;
use App\Http\Resources\LotteryResource;
use App\Notifications\SuccessFullyEnteredDraw;

class MainController extends Controller
{
    public function index()
    {
        $lotteries = ParentLottery::NotExpired()->get();
        $lotteries->load('currentLottery');
        $featured = ParentLottery::featured()->first();

        return view('welcome', compact('lotteries', 'featured'));
    }

    public function game()
    {
        return view('game');
    }

    public function test()
    {
        $user = User::find(1);
        $draw = UserLottery::find(1);
        // return $draw;
        $user->notify(new SuccessFullyEnteredDraw($draw));
        return '';
    }
}
