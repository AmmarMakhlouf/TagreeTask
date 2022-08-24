<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models;
use App\Models\Clinic;
use App\Models\City;
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Contracts\Filesystem\Cloud;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;


class MainController extends Controller
{
    public function index(Request $request)
    {
        $term = $request->query('term');
        $city_id = 0;
        $city_name = '';
        //Extract city id and name from searched id
        if($request->query('citysearch') !== null)
        {
            $city_id = $request->query('citysearch');
            $city = City::find( $city_id);
            if($city !== null)
                $city_name = $city->name;
        }
        $addrArray = array();
        if(Cache::has('AddressesOfCity'.$city_id))
            $addrArray = Cache::get('AddressesOfCity'.$city_id);
        else
        {
            //Ids of clinics in the city city_id
            $addrArray = Address::where('city_id',$city_id)->pluck('clinic_id')->toArray();
            //save array to cache for 3 days
            Cache::put('AddressesOfCity'.$city_id,$addrArray,now()->addDays(3));
        }


        if(Cache::has('SearchTerm'.$term.'-SearchCity'.$city_id))
            $results = Cache::get('SearchTerm'.$term.'-SearchCity'.$city_id);
        else
        {
            //Search clinics, doctors and services based on city id
            $results = 
            Search::add(Clinic::whereIn('id',$addrArray ), 'name')
                  ->add(Doctor::whereIn('clinic_id', Clinic::whereIn('id',$addrArray )->pluck('id')->toArray()), ['firstname','middlename','lastname'])
                  ->add(Service::class, 'name')
                  ->paginate(10)
                  ->beginWithWildcard()
                  ->search($term);
            //Save results to cache for one day
            Cache::put('SearchTerm'.$term.'-SearchCity'.$city_id,$results,now()->addDay());
        }
        return view('search', [
            'results' => $results,
            'term'    => $term,
            'city_id' =>$city_id,
            'city_name' => $city_name
        ]);
        
    }
     /**
     * Get cities based on search on name
     *
     * @return response()
     */
    public function cities(Request $request)
    {
        $cities = [];

        if($request->has('q')){
            $search = $request->q;
            $cities =City::select("id", "name")
                    ->where('name', 'LIKE', "%$search%")
                    ->get();
        }
        return response()->json($cities);
    } 
}
