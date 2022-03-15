<?php
namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Complex;
use App\Models\Country;
use App\Models\Building;
use App\Models\Property;
use App\Models\Governorate;
use App\Models\PropertyStatus;
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
        $statuses = PropertyStatus::all();
        return view('admin.properties.create', [
            'countries' => $countries,
            'cities' => $cities,
            'complexes' => $complexes,
            'governorates' => $governorates,
            'buildings' => $buildings,
            'statuses' => $statuses
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
        $image_url = $file->store('public/images');
        $image_url = str_replace('public/images/', '', $image_url);

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
            'number' => $request->input('number'),
            'country_id' => $request->input('country_id'),
            'governorate_id' => $request->input('governorate_id'),
            'city_id' => $request->input('city_id'),
            'complex_id' => $request->input('complex_id'),
            'building_id' => $request->input('building_id'),
            'status_id' => $request->input('status_id'),
            'number_of_bedrooms' => $request->input('number_of_bedrooms'),
            'number_of_bathrooms' => $request->input('number_of_bathrooms'),
            'number_of_balconies' => $request->input('number_of_balconies'),
            'balconies_space' => $request->input('balconies_space'),
            'total_space' => $request->input('total_space'),
            'property_description' => $request->input('property_description'),
            'price' => $request->input('price'),
            'image' => $image_url,

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
        $statuses = PropertyStatus::all();

        return view('admin.properties.edit', [
            'property' => $property,
            'buildings' => $buildings,
            'countries' => $countries,
            'governorates' => $governorates,
            'cities' => $cities,
            'complexes' => $complexes,
            'statuses' => $statuses
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
        if ($request->input('image') != null) {
            $file = $request->file('image');
            $image_url = $file->store('public/images');
            $image_url = str_replace('public/images/', '', $image_url);
        }

        // dd(request()->input('image'), $property->image);
        $property->update([
            'number' => $request->input('number'),
            'country_id' => $request->input('country_id'),
            'city_id' => $request->input('city_id'),
            'complex_id' => $request->input('complex_id'),
            'building_id' => $request->input('building_id'),
            'status_id' => $request->input('status_id'),
            'number_of_bedrooms' => $request->input('number_of_bedrooms'),
            'number_of_bathrooms' => $request->input('number_of_bathrooms'),
            'number_of_balconies' => $request->input('number_of_balconies'),
            'balconies_space' => $request->input('balconies_space'),
            'total_space' => $request->input('total_space'),
            'property_description' => $request->input('property_description'),
            'price' => $request->input('price'),
            'image' => $request->input('image') == null ? $property->image : $image_url,

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
