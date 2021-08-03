<?php

namespace App\Http\Controllers\User;

use App\House;
use App\Http\Controllers\Controller;
use App\Http\Requests\HouseRequest;
use App\Payment;
use App\Sponsor;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {   

        $house = House::where('user_id', Auth::id())->findOrFail($id);
        $sponsors = Sponsor::all();
        if(!$house){
            abort(404);
        }
        return view('user.house.sponsor', compact('house','sponsors'));
    }


    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }


    public function store(Request $request )
    {


        $user = User::find(Auth::id());
        $data = $request->all();
      
        $house = House::find($request->house_id);
        $sponsor = Sponsor::find($data['sponsor']);
        
        if (array_key_exists('sponsor', $data)) {
            $house->sponsors()->attach($data['sponsor'], ['start_date' => Carbon::now(), 'end_date' => Carbon::now()->addHours($sponsor['duration'])]);
        }
        
        $user = User::find(Auth::id());
        $data = $request->all();
      
        $house = House::find($request->house_id);
        $sponsor = Sponsor::find($data['sponsor']);

        $payment = new Payment();
        $payment->house_id = $house->id;
        $payment->sponsor_id = $sponsor->id;
        $payment->start_date = Carbon::now();
        $payment->end_date = Carbon::now()->addHours($sponsor['duration']);
        $payment->save();

        view('user.home', compact('user'));
        return redirect()->route('payment', compact('payment'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find(Auth::id());
        $data = $request->all();
        
        $house = House::find($id);
        $sponsor = Sponsor::find($data['sponsors']);
        
        if (array_key_exists('sponsors', $data)) {
            $house->sponsors()->attach($data['sponsors'], ['start_date' => Carbon::now(), 'end_date' => Carbon::now()->addHours($sponsor['duration'])]);
        }

        return view('user.home', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    




}
