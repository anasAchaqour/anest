<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;
use App\Models\category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $byCategorie = null;
    public $bySupplier = null;
    public $orderBy = 'name';
    public $perPage = 5;
    public $search;

    public function index()
    {
        $categories = category::all();
        $suppliers = Supplier::all();
        return view('products.index', [
            'categories' => $categories,
            'suppliers' => $suppliers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //


        $validatedData = $request->validate([
            'name' => 'bail|required|string',
            'description' => 'bail|required|string',
            'price' => 'bail|required|numeric',
            'stock' => 'bail|required|numeric',
            'pro_pic' => 'bail',
            'category_id' => 'required|numeric',
            'supplier_id' => 'bail|required|numeric'
        ]);
        /*****************************************************************/


        product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
            'pro_pic' => $request->input('pro_pic'),
            'category_id' => $request->input('category_id'),
            'supplier_id' => $request->input('supplier_id'),
        ]);



        return redirect('/products')->with('success', 'product added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateproductRequest $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        //
    }
}
