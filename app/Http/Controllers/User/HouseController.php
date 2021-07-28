<?php

namespace App\Http\Controllers\User;

use App\House;
use App\Http\Controllers\Controller;
use App\Http\Requests\HouseRequest;
use App\Message;
use App\Service;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
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
        $services = Service::all();
        return view('user.house.create', compact('services'));
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
        };

        if(array_key_exists('image', $data)){
            $data['image_original_name'] = $request->file('image')->getClientOriginalName();
            $image_path = Storage::put('uploads', $data['image']);
            $data['image'] = $image_path;
        }


        $new_house = new House();
        $new_house->fill($data);
        $new_house->user_id = Auth::user()->id;

        $url = $data['country'] . ' ' . $data['region'] . ' ' . $data['city'] . ' ' . $data['postal_code'] . ' ' . $data['address'] . $data['house_number'];
        $urlEncode = rawurlencode($url);
        $response = Http::get('https://api.tomtom.com/search/2/geocode/' . $urlEncode . '.json?key=EHA6jZsKzacvcupfIH5jId15dI3c5wGf')->json();
        
        $lat= $response['results']['0']['position']['lat'];
        $long= $response['results']['0']['position']['lon'];
        $new_house->lat = $lat;
        $new_house->long = $long;
        $new_house->save();
        

        // se esiste la chiave features dentro $data ed esiste solo se ho checkato qualcosa
        if(array_key_exists('services', $data)){
            //se esiste allora popolo la tabella pivot con le chiavi di houses e le chiavi di features
            $new_house->services()->attach($data['services']);
        }

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
        $services = Service::all();
        if(!$house){
            abort(404);
        }
        return view('user.house.edit', compact('house','services'));
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
        $response = Http::get('https://api.tomtom.com/search/2/geocode/' . $urlEncode . '.json?key=EHA6jZsKzacvcupfIH5jId15dI3c5wGf')->json();
        
        $lat= $response['results']['0']['position']['lat'];
        $long= $response['results']['0']['position']['lon'];
        $house->lat = $lat;
        $house->long = $long;

        if(array_key_exists('image', $data)){
            if($house->image){
                Storage::delete($house->image);
            }
            $data['image_original_name'] = $request->file('image')->getClientOriginalName();
            $image_path = Storage::put('uploads', $data['image']);
            $data['image'] = $image_path;
        }

        $house->update($data);

        if(array_key_exists('services', $data)){
      
            $house->services()->sync($data['services']);
        }else{
            $house->services()->detach();
        }

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
        if($house->image){
            Storage::delete($house->image);
        }
        $house->delete();
        return redirect()->route('user.house.index')->with('deleted', $house->title);
    }
}
