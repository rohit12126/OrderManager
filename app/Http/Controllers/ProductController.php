<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Enums\AlertStatusClass;
use App\Services\ProductService;
use App\DataTables\ProductDataTable;

class ProductController extends Controller
{

    //Product service object
    protected $service;

    /**
     * Constructor
     *
     * @param  \App\Repositories\ProductService $service
     *
     * @return \App\Services\ProductController
     */
    function __construct(ProductService $service)
    {
        $this->service = $service;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products');
    }

    /**
     * Get the datatable listing of the resource.
     * @param App\DataTables\ProductDataTable $datatable
     * @return App\DataTables\ProductDataTable ajax response
     */
    public function datatables(ProductDataTable $datatable)
    {
        return $datatable->ajax();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = $this->service->add($request->all());

        Session::flash('message',__('products.add.success',[
                'name'=>$product->name
        ])); 
        Session::flash('status', AlertStatusClass::getValue("CLASS_".Response::HTTP_OK));

        return redirect()->route('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $this->service->update($product,$request->all());
        Session::flash('message',  __('products.update.success',[
                'name'=>$product->name
            ])); 
        Session::flash('status', AlertStatusClass::getValue("CLASS_".Response::HTTP_OK));

        return redirect()->route('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $message = __('products.delete.error');
        $status = AlertStatusClass::getValue("CLASS_".Response::HTTP_INTERNAL_SERVER_ERROR);
        

        if($this->service->delete($product))
        {
            $message =  __('products.delete.success',[
                'name'=>$product->name
            ]);
            $status = AlertStatusClass::getValue("CLASS_".Response::HTTP_OK);
        }
        Session::flash('message',$message); 
        Session::flash('status', $status);

        return redirect()->route('products');
    }
}
