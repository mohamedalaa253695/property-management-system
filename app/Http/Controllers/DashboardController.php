<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $avialableForSaleOrRent = DB::table('property_statuses')
                            ->join('properties', 'property_statuses.id', '=', 'properties.status_id')
                            ->where('property_statuses.name', 'for sale')
                            ->orWhere('property_statuses.name', 'for rent')
                            ->select(
                                'property_statuses.name as status',
                                'properties.number as property_number'
                            )->count();

        $sold = DB::table('property_statuses')
                            ->join('properties', 'property_statuses.id', '=', 'properties.status_id')
                            ->where('property_statuses.name', 'sold')
                            ->select(
                                'property_statuses.name as status',
                                'properties.number as property_number',
                                'properties.price as price',
                                'properties.created_at as created_at',
                            )->get();
        $rented = DB::table('property_statuses')
                            ->join('properties', 'property_statuses.id', '=', 'properties.status_id')
                            ->where('property_statuses.name', 'rented')
                            ->select(
                                'property_statuses.name as status',
                                'properties.number as property_number',
                                'properties.price as price',
                            )->get();

        // dd($avialableForSaleOrRent, $sold, $rented);
        $totalRevenue = $rented->sum('price') + $sold->sum('price');

        $sales = DB::table('property_statuses')
                            ->join('properties', 'property_statuses.id', '=', 'properties.status_id')
                            ->where('property_statuses.name', 'sold')
                            ->orWhere('property_statuses.name', 'rented')
                            ->selectRaw(
                                'sum(properties.price) as price,
                                month(properties.created_at) as month',
                            )->groupBy('month')->pluck('price', 'month');
        // dd($sales->values());

        $invoices = DB::table('invoices')
                                ->selectRaw(
                                    'sum(total) as total,
                                    month(created_at) as month',
                                )->groupBy('month')->pluck('total', 'month');
        // dd($invoices);
        return view('admin.dashboard', compact('avialableForSaleOrRent', 'sold', 'rented', 'totalRevenue', 'sales', 'invoices'));
    }
}
