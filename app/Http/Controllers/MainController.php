<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParentLottery;
use App\Http\Resources\LotteryResource;

class MainController extends Controller
{
    public function index(){
        $lotteries = ParentLottery::NotExpired()->get();
        // return $lotteries;

        return view('welcome', compact('lotteries'));
    }
}
