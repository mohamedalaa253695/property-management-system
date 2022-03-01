<?php
namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Complex;
use App\Models\Country;
use App\Models\Building;
use App\Models\Property;
use App\Models\Governorate;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::all();
        return view('admin.properties.index', ['properties' => $properties]);
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
        $buildings = Building::all();
        return view('admin.properties.create', [
            'countries' => $countries,
            'cities' => $cities,
            'complexes' => $complexes,
            'governorates' => $governorates,
            'buildings' => $buildings
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
        $file = $request->file('image');
        // dd($file);
        // $name = Str::random(10);
        $image_url = $file->store('public/images');
        $image_url = str_replace('public/images/', '', $image_url);
        // dd($image_name);

        // // $complete_url = env('APP_URL') . '/' . $image_url;
        $request->validate([
            'image' => 'mimes:jpg,png',
            'number' => 'required',
            'country_id' => 'required',
            'governorate_id' => 'required',
            'city_id' => 'required',
            'complex_id' => 'required',
            'building_id' => 'required',

        ]);

        Property::create([
            'image' => $image_url,
            'number' => $request->input('number'),
            'country_id' => $request->input('country_id'),
            'governorate_id' => $request->input('governorate_id'),
            'city_id' => $request->input('city_id'),
            'complex_id' => $request->input('complex_id'),
            'building_id' => $request->input('building_id'),
        ]);
        return redirect('/properties');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Building  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        $property = Property::find($property->id);
        $countries = Country::all();
        $cities = City::all();
        $complexes = Complex::all();
        $governorates = Governorate::all();
        $buildings = Building::all();

        return view('admin.properties.edit', [
            'property' => $property,
            'buildings' => $buildings,
            'countries' => $countries,
            'governorates' => $governorates,
            'cities' => $cities,
            'complexes' => $complexes
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        $property = Property::find($property->id);
        $request->validate([
            'number' => 'required',
        ]);

        $property->update([
            'number' => $request->input('number'),
            'country_id' => $request->input('country_id'),
            'city_id' => $request->input('city_id'),
            'complex_id' => $request->input('complex_id'),
            'building_id' => $request->input('building_id'),

        ]);
        // dd($request->input('number'));

        return redirect('/properties');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        Property::destroy($property->id);
        return redirect('/properties');
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids');
        foreach ($ids as $id) {
            Property::destroy($id);
        }
        return redirect('/properties');
    }
}
