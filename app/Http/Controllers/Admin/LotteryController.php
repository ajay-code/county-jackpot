<?php

namespace App\Http\Controllers\Admin;

use App\Models\County;
use App\Models\ParentLottery;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class LotteryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lotteries = ParentLottery::all();
        return view('admin.lotteries.index', compact('lotteries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $counties = County::all();
        return view('admin.lotteries.create', compact('counties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|unique:lotteries|max:255',
            'county_id' => 'required|numeric',
            'entry_fee' =>  'required|numeric',
            'prize' =>  'required|numeric',
            'expire_at' =>  'required|date',
        ]);

        // return $validatedData;

        $parentLottery = ParentLottery::create($validatedData);
        
        $parentLottery->lotteries()->create($validatedData);

        return redirect()->route('admin.lotteries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lottery  $lottery
     * @return \Illuminate\Http\Response
     */
    public function show(ParentLottery $parentLottery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lottery  $lottery
     * @return \Illuminate\Http\Response
     */
    public function edit(ParentLottery $parentLottery)
    {
        $counties = County::all();
        return view('admin.lotteries.edit', compact('counties','parentLottery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lottery  $lottery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ParentLottery $parentLottery)
    {
        $validatedData = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('lotteries')->ignore($parentLottery->id),
            ],
            'county_id' => 'required|numeric',
            'entry_fee' =>  'required|numeric',
            'prize' =>  'required|numeric',
            'expire_at' =>  'required|date',
        ]);

        $parentLottery->update($validatedData);


        return redirect()->route('admin.lotteries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lottery  $lottery
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParentLottery $parentLottery)
    {
        $parentLottery->delete();

        return back();
    }
}
