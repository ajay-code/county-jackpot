<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\WithDrawalNotification;

class UserPaidController extends Controller
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

    public function index(Request $request)
    {
        $getPaid = auth()->user()->getPaids();
        return view('get_paid.index', compose('getPaid'));
    }

    public function getPaid(Request $request)
    {
        $user = auth()->user();
        $user->getPaids()->create([
            'amount' => $user->balance
        ]);
        $user->update([
            'balance' => 0
        ]);

        $user->notify(new WithDrawalNotification($user));

        $request->session()->flash('Your payment request has been sent. Winnings will be transferred into your bank account within 14 working days.');
        return back();
    }

    public function withdrawalHistory()
    {
        $getPaids = auth()->user()->getPaids()->latest()->get();
        // return $getPaids;
        return view('get_paid.index', compact('getPaids'));
    }
}
