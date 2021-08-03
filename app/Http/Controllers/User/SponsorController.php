<?php

namespace App\Http\Controllers\User;

use App\House;
use App\Http\Controllers\Controller;
use App\Http\Requests\HouseRequest;
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
        return view('user.house.sponsor', compact('house', 'sponsors'));
    }


    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }


    public function store(HouseRequest $request)
    {
        $data = $request->all();
        $new_house = new House();
        $new_house->fill($data);
        $new_house->save();

        if(array_key_exists('sponsors',$data)){
            $new_house->sponsors()->attach($data['sponsors']);
        }
        
        return redirect()->route('user.house.index', $new_house);
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
