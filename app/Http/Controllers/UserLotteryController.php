<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserLotteryController extends Controller
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
     * List of all the UserLotteries
     */
    public function index()
    {
        $user = auth()->user();
        $lotteries = $user->lotteries()->latest()->get();
        // return $lotteries;
        return view('user_lotteries.index', compact('lotteries', 'user'));
    }
}
