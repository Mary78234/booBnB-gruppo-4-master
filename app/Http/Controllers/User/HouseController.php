<?php

namespace App\Http\Controllers\User;

use App\Feature;
use App\House;
use App\Http\Controllers\Controller;
use App\Http\Requests\HouseRequest;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* phpinfo();
        die(); */
        $user_id = Auth::id();
        $houses = House::where("user_id", $user_id)->get();
        return view("user.house.index", compact("houses"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $features = Feature::all();
        return view('user.house.create', compact('features'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HouseRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['title'], '-');
        $slug_exist = House::where('slug', $data['slug'])->first();
        $counter = 0;
        while($slug_exist){
            $title= $data['title'] . '-' . $counter;
            $data['slug'] = Str::slug($title, '-');
            $slug_exist = House::where('slug', $data['slug'])->first();
            $counter++;
        }
        $new_house = new House();
        $new_house->fill($data);
        $new_house->user_id = Auth::user()->id;
        
       /*  $new_house->country = $data['country'];
        $new_house->region = $data['region'];
        $new_house->city = $data['city'];
        $new_house->address = $data['address'];
        $new_house->postal_code = $data['postal_code'];
        $new_house->house_number = $data['house_number']; */

        $url = $data['country'] . ' ' . $data['region'] . ' ' . $data['city'] . ' ' . $data['postal_code'] . ' ' . $data['address'] . $data['house_number'];
        $urlEncode = rawurlencode($url);
        /* $response = Http::get('https://api.tomtom.com/search/2/geocode/via%20dante%20alighieri%20marostica.json?key=EHA6jZsKzacvcupfIH5jId15dI3c5wGf')->json(); */
        $response = Http::get('https://api.tomtom.com/search/2/geocode/' . $urlEncode . '.json?key=EHA6jZsKzacvcupfIH5jId15dI3c5wGf')->json();
        
        
        $lat= $response['results']['0']['position']['lat'];
        $long= $response['results']['0']['position']['lon'];
        $new_house->lat = $lat;
        $new_house->long = $long;
    
        return redirect()->route('user.house.show', $new_house);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        
        $house = House::where('user_id', Auth::id())->findOrFail($id);
        $messages = Message::where('house_id', $id)->get();
        if(!$house){
            abort(404);
        }
        return view('user.house.show', compact('house', 'messages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $house = House::where('user_id', Auth::id())->findOrFail($id);
        if(!$house){
            abort(404);
        }
        return view('user.house.edit', compact('house'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HouseRequest $request, House $house)
    {
        $data = $request->all();
        if($house->title !== $data['title']){
        $data['slug'] = Str::slug($house->title, '-');
        $slug_exist = House::where('slug', $data['slug'])->first();
        $counter = 0;
        while($slug_exist){
            $title= $data['title'] . '-' . $counter;
            $data['slug'] = Str::slug($title, '-');
            $slug_exist = House::where('slug', $data['slug'])->first();
            $counter++;
        }
        }else{
        $data['slug'] = $house->slug;
        }
        $url = $data['country'] . ' ' . $data['region'] . ' ' . $data['city'] . ' ' . $data['postal_code'] . ' ' . $data['address'] . $data['house_number'];
        $urlEncode = rawurlencode($url);
        /* $response = Http::get('https://api.tomtom.com/search/2/geocode/via%20dante%20alighieri%20marostica.json?key=EHA6jZsKzacvcupfIH5jId15dI3c5wGf')->json(); */
        $response = Http::get('https://api.tomtom.com/search/2/geocode/' . $urlEncode . '.json?key=EHA6jZsKzacvcupfIH5jId15dI3c5wGf')->json();
        
        $lat= $response['results']['0']['position']['lat'];
        $long= $response['results']['0']['position']['lon'];
        $house->lat = $lat;
        $house->long = $long;

        $house->update($data);
        return redirect()->route('user.house.show', $house);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(House $house)
    {
        $house->delete();
        return redirect()->route('user.house.index')->with('deleted', $house->title);
    }
}
