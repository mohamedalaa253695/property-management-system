<?php
namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Governorate;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cities = City::all();
        return view('admin.cities.index', ['cities' => $cities]) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all()->collect();
        $governorates = Governorate::all()->collect();
        // dd($countries);
        return view('admin.cities.create', ['countries' => $countries, 'governorates' => $governorates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(City $city)
    {
        request()->validate([
            'name' => 'required',
        ]);

        City::create([
            'name' => request()->input('name'),
            'country_id' => request()->input('country_id'),
            'governorate_id' => request()->input('governorate_id')
        ]);
        // dd('created');
        return redirect('/cities');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $city = City::find($city->id);
        $countries = Country::all();
        $governorates = Governorate::all();
        return view('admin.cities.edit', ['city' => $city, 'countries' => $countries, 'governorates' => $governorates]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $city = City::find($city->id);
        // dd($city, $request->all());
        $city->update([
            'name' => $request->input('name'),
            // 'country_id' => $request->input('country_id'),
            'governorate_id' => $request->input('governorate_id')
        ]);
        return redirect('/cities');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        City::destroy($city->id);
        return redirect('/cities');
    }
}
