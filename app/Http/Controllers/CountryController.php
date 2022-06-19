<?php
namespace App\Http\Controllers;
use App\Models\City;
use App\Models\country;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Http\Requests\StorecountryRequest;
use App\Http\Requests\UpdatecountryRequest;


class CountryController extends Controller
{

    function dash (){

        // $products = DB::table('products')->get();
        // return view("dash/layouts/products/index",compact('products')) ;
        return view("dash/layouts/products/index") ;



    }

    function index (){
        $shows = DB::table('countries')
        ->select('countries.*','cities.cityName')
        ->join('cities', 'countries.id', '=', 'cities.country_id')
        ->get();

        $cities = City::get();

        $withoutCitys = DB::table('countries')->get();



        return view("dash/layouts/products/index",compact('shows','cities','withoutCitys')) ;




        $Cities = City::get();



    }



    function withoutCity (){
        $withoutCitys = DB::table('countries')

        ->get();


        return view("dash/layouts/products/index",compact('withoutCitys')) ;




        $Cities = City::get();



    }



    function create (){

        $countries = Country::get();

        // $cities = City::get();

        return view("dash/layouts/products/create",compact('countries')) ;


    }

/**
 * Store a new blog post.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
    public function store(StorecountryRequest $request)
    {
        // $request->validate([
        //     'name'          => 'required',
        //     'iso'         => 'required',
        //     'ziCode' => 'required',

        // ]);

        Country::insert([
            'name' =>$request->name,
                    'iso' =>$request->iso,
                    'ziCode' =>$request->ziCode,

]);




        return redirect(route('dash.index'));






    }


    public function storeCity(StoreCityRequest $request)
    {

        City::insert([
                    'cityName' =>$request->cityName,
                    'country_id' =>$request->country_id,

]);

        return redirect(route('dash.index'))->with('success', 'Country add successful');
    }





    function edit ($id){
        $cities = City::get();
        $countries = Country::where('id',$id)->get();

        return view("dash/layouts/products/edit",compact('cities','countries')) ;


    }

    public function update(UpdatecountryRequest $request,$id)
    {



        Country::where('id',$id)->update([
                              'name' =>$request->name,
                              'iso' =>$request->iso,
                              'ziCode' =>$request->ziCode,


     ]);

     return redirect()->route('dash.index')->with('success', 'product update successful');

    }


    public function delete($id)
    {


        Country::where('id',$id)->delete();
        return redirect()->route('dash.index')->with('success', 'product delete successful');
    }

    public function deleteCity($id)
    {


        City::where('id',$id)->delete();
        return redirect()->route('dash.index')->with('success', 'product delete successful');
    }



}
