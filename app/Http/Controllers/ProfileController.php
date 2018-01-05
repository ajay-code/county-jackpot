<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\County;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfile;

class ProfileController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $counties = County::all();
        // return $user;
        return view('profile.edit', compact('user', 'counties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfile $request, User $user)
    {
        // return $request->all();
        $user->update($request->all());
        return redirect()->route('profile.index');
    }

}
