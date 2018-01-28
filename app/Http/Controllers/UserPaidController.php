<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $request->session()->flash('paid', 'Your payment request has been received. You will receieve the amount in your linked bank account within 5 days.');
        return back();
    }

    public function withdrawalHistory()
    {
        $getPaids = auth()->user()->getPaids()->latest()->get();
        // return $getPaids;
        return view('get_paid.index', compact('getPaids'));
    }
}
