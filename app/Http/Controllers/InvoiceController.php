<?php
namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Invoice as InvoiceDaily;
use Symfony\Component\HttpFoundation\Response;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::paginate(15);
        return view('admin.invoices.index', ['invoices' => $invoices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $invoiceNumber = rand(10000001, 999999999);
        return view('admin.invoices.create', ['invoiceNumber' => $invoiceNumber]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Invoice::create([
            'property_id' => $request->input('property_id'),
            'invoice_number' => $request->input('invoice_number'),
            'description' => 'invoice description',
            'qty' => 1,
            'price' => $request->input('price'),
            'total' => $request->input('price'),
            'issue_date' => Carbon::now(),
            'due_date' => Carbon::now()->add(3, 'day'),
            'customer_name' => $request->input('customer_name'),
            'customer_email' => $request->input('customer_email'),
            'customer_address' => $request->input('customer_address'),
            'customer_phone' => $request->input('customer_phone'),

        ]);
        return response(url('/invoices'), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        Invoice::destroy($invoice->id);
        return redirect('invoices');
    }

    public function export(Invoice $invoice)
    {
        $invoice = Invoice::find($invoice->id);
        $customer = new Buyer([
            'name' => 'John Doe',
            'custom_fields' => [
                'email' => $invoice->customer_email,
            ],
        ]);

        $item = (new InvoiceItem())->title($invoice->description)->pricePerUnit($invoice->price);

        $invoice = InvoiceDaily::make()
            ->buyer($customer)
            ->addItem($item);

        return $invoice->stream();
    }
}
