<?php

namespace App\Http\Controllers;

use App\Models\Lottery;
use Illuminate\Http\Request;
use App\Http\Resources\LotteryResource;

class MainController extends Controller
{
    public function index(){
        $lotteries = LotteryResource::collection(Lottery::limit(5)->active()->get());
        // return $lotteries;

        return view('welcome', compact('lotteries'));
    }
}
