<?php
namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\City;
use App\Models\Complex;
use App\Models\Country;
use App\Models\Governorate;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buildings = Building::paginate(15);
        return view('admin.buildings.index', ['buildings' => $buildings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        $cities = City::all();
        $complexes = Complex::all();
        $governorates = Governorate::all();
        return view('admin.buildings.create', [
            'countries' => $countries,
            'cities' => $cities,
            'complexes' => $complexes,
            'governorates' => $governorates
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required',
            'country_id' => 'required',
            'governorate_id' => 'required',
            'city_id' => 'required',
            'complex_id' => 'required'
        ]);

        Building::create([
            'number' => $request->input('number'),
            'country_id' => $request->input('country_id'),
            'governorate_id' => $request->input('governorate_id'),
            'city_id' => $request->input('city_id'),
            'complex_id' => $request->input('complex_id'),
        ]);
        return redirect('/buildings');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function show(Building $building)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function edit(Building $building)
    {
        $building = Building::find($building->id);
        $countries = Country::all();
        $cities = City::all();
        $complexes = Complex::all();
        $governorates = Governorate::all();

        return view('admin.buildings.edit', [
            'countries' => $countries,
            'governorates' => $governorates,
            'cities' => $cities,
            'complexes' => $complexes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Building $building)
    {
        $building = Building::find($building->id);
        $request->validate([
            'number' => 'required',
        ]);

        $building->update([
            'number' => $request->input('number'),
            'country_id' => $request->input('country_id'),
            'city_id' => $request->input('city_id'),
            'complex_id' => $request->input('complex_id'),

        ]);
        // dd($request->input('number'));

        return redirect('/buildings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function destroy(Building $building)
    {
        Building::destroy($building->id);
        return redirect('/buildings');
    }
}
