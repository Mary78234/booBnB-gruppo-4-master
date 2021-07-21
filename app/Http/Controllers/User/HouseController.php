<?php

namespace App\Http\Controllers\User;

use App\House;
use App\Http\Controllers\Controller;
use App\Http\Requests\HouseRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

        return view('user.house.create');
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
        $new_house->save();
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
        $house = House::find($id);
        if(!$house){
            abort(404);
        }
        return view('user.house.show', compact('house'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $house = House::find($id);
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
