<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyStatus;

class PropertyStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $statuses = PropertyStatus::all();
        return response()->json($statuses, 200);
        // return view('admin.property_status.index', ['statuses' => $statuses]) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.property_status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyStatus $status)
    {
        request()->validate([
            'name' => 'required',
        ]);

        PropertyStatus::create([
            'name' => request()->input('name'),
        ]);
        // dd('created');
        return redirect('/statuses');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PropertyStatus  $status
     * @return \Illuminate\Http\Response
     */
    public function show(PropertyStatus $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PropertyStatus  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(PropertyStatus $status)
    {
        $status = PropertyStatus::find($status->id);

        return view('admin.property_status.edit', ['status' => $status]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PropertyStatus  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PropertyStatus $status)
    {
        $status = PropertyStatus::find($status->id);
        // dd($status, $request->all());
        $status->update([
            'name' => $request->input('name'),
        ]);
        return redirect('/statuses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PropertyStatus  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(PropertyStatus $status)
    {
        PropertyStatus::destroy($status->id);
        return redirect('/statuses');
    }
}
