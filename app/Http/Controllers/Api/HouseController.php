<?php

namespace App\Http\Controllers\Api;

use App\House;
use App\Http\Controllers\Controller;
use App\Service;
/* use Grimzy\LaravelMysqlSpatial\Eloquent\Builder; */
use HousesTableSeeder;
use Illuminate\Database\Schema\Builder as SchemaBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use PhpParser\Builder as PhpParserBuilder;
use Illuminate\Database\Eloquent\Builder;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        
        
        $position = Http::get('https://api.tomtom.com/search/2/geocode/' . $request->input('city') . '.json?radius=20000&key=EHA6jZsKzacvcupfIH5jId15dI3c5wGf')->json();

        
        $mylat = $position['results']['0']['position']['lat'];
        $mylng = $position['results']['0']['position']['lon'];

        $radius = 20000;
        $km = 0.0065;

        $maxlat = $mylat + $radius * $km;
        $minlat = $mylat - $radius * $km;
        $maxlng = $mylng + $radius * $km;
        $minlng = $mylng - $radius * $km;
        
        $houses = House::with('services')
                ->whereBetween('lat', [$minlat, $maxlat])
                ->whereBetween('long', [$minlng, $maxlng]) 
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

    public function advsearch(Request $request)
    {   
        
        /* posizione generale nella mappa, lo prendo come punto di riferimento per poi tracciare un raggio */
        $position = Http::get('https://api.tomtom.com/search/2/geocode/' . $request->input('city') . '.json?radius=20000&key=EHA6jZsKzacvcupfIH5jId15dI3c5wGf')->json();
      
        
        $mylat = $position['results']['0']['position']['lat'];
        $mylng = $position['results']['0']['position']['lon'];

       
        $radius= $request->input('radius'); 
        $km = 0.0065;
        /* Moltiplicato per 1000 perchè il valore radius si esprime in metri */

        $maxlat = $mylat + $radius * $km;
        $minlat = $mylat - $radius * $km;
        $maxlng = $mylng + $radius * $km;
        $minlng = $mylng - $radius * $km;
        
        
        
        $houses = House::with('services')
                ->whereBetween('lat', [$minlat, $maxlat])
                ->whereBetween('long', [$minlng, $maxlng]) 
                ->where('visibility', true)->orderBy('id','DESC');
        
        /* if($request->has('service_name')){
           $tosearch = $request->input('service_name');
           $houses->whereHas('services',function(Builder $query) use ($tosearch){
            $query->where('name','=',$tosearch);
            });
            };      */   


        /* if ($request->has('city')) {
            $houses = $houses->where('city', 'like', '%' . $request->input('city') . '%');
        }; */
        if ($request->has('rooms_number')) {
            $houses = $houses->where('rooms_number', '>=', $request->input('rooms_number'));
        };
        if ($request->has('beds')) {
            $houses = $houses->where('beds', '>=', $request->input('beds'));
        };
        
        if($request->has('service_name')){
            $tosearch = $request->input('service_name');
            $houses->whereHas('services',function(Builder $query) use ($tosearch){
                $query->where('name','=',$tosearch);
            });
    
        };

   

        
       
        $houses = $houses->get();
        
        return response()->json(compact('houses'));
        

        }
    public function alldata(){

        $houses = House::with('services')
             ->where('visibility', true)
             ->get();


        return response()->json($houses);

    }



    public function show($slug)
    {
       
        $house = House::with('services')->where('slug', $slug)->get();
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
