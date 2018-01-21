<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show user Profile
     */
    public function profile(User $user)
    {
        return $user;
    }

    /**
     * Show user Profile
     */
    public function draws(User $user)
    {
        $user->load('lotteries.lottery');

        return view('admin.users.draws', compact('user'));
    }
}
