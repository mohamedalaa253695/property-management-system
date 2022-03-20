<?php
namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        return view('admin.reports.index');
    }

    public function search(Request $request)
    {
        // dd($request->all());
        $properties = DB::table('properties')
                                ->join('countries', 'properties.country_id', '=', 'countries.id')
                                ->join('governorates', 'properties.governorate_id', '=', 'governorates.id')
                                ->join('cities', 'properties.city_id', '=', 'cities.id')
                                ->join('complexes', 'properties.complex_id', '=', 'complexes.id')
                                ->join('buildings', 'properties.building_id', '=', 'buildings.id')
                                ->where('properties.created_at', '>=', $request->input('from'))
                                ->where('properties.created_at', '<=', $request->input('to'))
                                ->where('properties.status_id', $request->input('statusId'))
                                ->select(
                                    'properties.number as property_number',
                                    'properties.price as price',
                                    'properties.total_space as total_space',
                                    'properties.number_of_balconies as number_of_balconies',
                                    'properties.number_of_bedrooms as number_of_bedrooms',
                                    'properties.number_of_bedrooms as number_of_bathrooms',
                                    'properties.property_description as property_description',
                                    'countries.country_name as country_name',
                                    'governorates.name as governorate_name',
                                    'cities.name as city_name',
                                    'complexes.name as complex_name',
                                    'buildings.number as building_number'
                                )
                                ->get();
        // dd($properties);
        return  response()->json($properties, 200);
    }

    // public function exportPDF(){
    //     // $pdf = PDF::loadView('myPDF');
    //     $pdf = new PDF();

    //     return $pdf->download('itsolutionstuff.pdf');
    // }
}
