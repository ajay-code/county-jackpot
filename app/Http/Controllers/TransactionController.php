<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LotteryTransaction;

class TransactionController extends Controller
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
     * List of all the Transactions
     */
    public function index()
    {
        $user = auth()->user();
        $transactions = $user->transactions()->latest()->get();
        return view('transactions.index', compact('transactions', 'user'));
    }

    /**
     * Store result for game
     */
    public function storeResult(Request $request)
    {
        $lotteryTransaction = LotteryTransaction::where('charge_id', $request->charge_id)->first();
        $result = '';
        if ($request->result == 'won') {
            $result = 'entered';
        } elseif ($request->result == 'lost') {
            $result = 'failed';
        }
        $lotteryTransaction->userLottery()->create([
            'lottery_id' => $lotteryTransaction->lottery->id,
            'user_id' => $lotteryTransaction->user->id,
            'draw_number' => sprintf('%010d', mt_rand(0, 9999999999))
        ]);
        $lotteryTransaction->update([
            'status' => $result
        ]);
        

    }
}
