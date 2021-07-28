<?php

namespace App\Http\Controllers\Api;

use App\House;
use App\Http\Controllers\Controller;
use App\Service;
use HousesTableSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {   
        
        
        $position = Http::get('https://api.tomtom.com/search/2/geocode/' . $request->input('city') . '.json?radius=5000&key=EHA6jZsKzacvcupfIH5jId15dI3c5wGf')->json();


        $maxlat = $position['results']['0']['viewport']['topLeftPoint']['lat'];
        $minlat = $position['results']['0']['viewport']['btmRightPoint']['lat'];
        $maxlng = $position['results']['0']['viewport']['topLeftPoint']['lon'];
        $minlng = $position['results']['0']['viewport']['btmRightPoint']['lon'];
        
        
        
        $houses = House::with('services')
                ->whereBetween('lat', [$minlat, $maxlat])
                /* ->whereBetween('long', [$minlng, $maxlng])  */
                ->where('visibility', true)->orderBy('id','DESC');

                

        if ($request->has('city')) {
            $houses = $houses->where('city', 'like', '%' . $request->input('city') . '%');
        };
        if ($request->has('address')){
            $houses = $houses->where('address', 'like', '%' . $request->input('address') . '%');
        };
       
        
        $houses = $houses->get();
        
        return response()->json(compact('houses'));
    }


    public function show($slug)
    {
        $house = House::where('slug', $slug)->with('services')->get();

        if($house) {
            if($house->image){
                $house->image = url('storage/' . $house->image);
            } else {
                $house->cover = url('img/default-fallback-image.png');
            }
            return response()->json([
                'success' => true,
                'result' => $house
            ]);
        }
        return response()->json([
            'success' => false,
            'error' => 'Nessun post trovato'
        ]);
    }

}
