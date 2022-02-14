<?php
namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Governorate;
use Illuminate\Http\Request;

class GovernorateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $governorates = Governorate::paginate(15);
        return view('admin.governorates.index', ['governorates' => $governorates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('admin.governorates.create', ['countries' => $countries]);
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
            'name' => 'required',
            'country_id' => 'required',
        ]);
        // dd($request->input('name'));
        Governorate::create([
            'name' => $request->input('name'),
            'country_id' => $request->input('country_id')
        ]);

        return redirect('/governorates')->with(['message' => 'country created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Governorate  $governorate
     * @return \Illuminate\Http\Response
     */
    public function show(Governorate $governorate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Governorate  $governorate
     * @return \Illuminate\Http\Response
     */
    public function edit(Governorate $governorate)
    {
        $governorate = Governorate::find($governorate->id);
        $countries = Country::all();
        return view('admin.governorates.edit', ['governorate' => $governorate, 'countries' => $countries]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Governorate  $governorate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Governorate $governorate)
    {
        $governorate = Governorate::find($governorate->id);

        // dd($complex);
        $governorate->update($request->only('name', 'country_id'));
        // $governorate->update([
        //     'name' => $request->input('name'),
        //     'country_id' => $request->input('country_id')
        // ]);

        return redirect('/governorates')->with('message', 'governorate updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Governorate  $governorate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Governorate $governorate)
    {
        Governorate::destroy($governorate->id);
        return redirect('/governorates')->with('message', 'governorate deleted');
    }
}
