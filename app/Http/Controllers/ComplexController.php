<?php
namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Complex;
use App\Models\Country;
use App\Models\Governorate;
use Illuminate\Http\Request;

class ComplexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complexes = Complex::paginate(15);
        return  view('admin.complexes.index', ['complexes' => $complexes]);
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
        $governorates = Governorate::all();

        return view('admin.complexes.create', ['countries' => $countries, 'cities' => $cities, 'governorates' => $governorates]);
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
            'name' => 'required'
        ]);

        Complex::create($request->only('name', 'country_id', 'city_id', 'governorate_id'));

        return redirect('/complexes')->with('message', 'complex created') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Complex  $complex
     * @return \Illuminate\Http\Response
     */
    public function show(Complex $complex)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Complex  $complex
     * @return \Illuminate\Http\Response
     */
    public function edit(Complex $complex)
    {
        $complex = Complex::find($complex->id);
        $countries = Country::all();
        $cities = City::all();
        $governorates = Governorate::all();
        return view('admin.complexes.edit', ['complex' => $complex, 'cities' => $cities, 'countries' => $countries, 'governorates' => $governorates]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Complex  $complex
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complex $complex)
    {
        $complex = Complex::find($complex->id);

        // dd($complex);
        $complex->update($request->only('name', 'country_id', 'city_id', 'governorate_id'));

        return redirect('/complexes')->with('message', 'complex updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Complex  $complex
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complex $complex)
    {
        Complex::destroy($complex->id);
        return redirect('/complexes')->with('message', 'compelex deleted');
    }
}
