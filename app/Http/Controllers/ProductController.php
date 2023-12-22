<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;
use App\Models\category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'bail|required|string',
            'description' => 'bail|required|string',
            'price' => 'bail|required|numeric',
            'stock' => 'bail|required|numeric',
            // 'pro_pic' => 'bail|image|mimes:png,jpg,jpeg,svg',
            'pro_pic' => 'bail',
            'category_id' => 'required|numeric',
            'supplier_id' => 'bail|required|numeric',
        ]);

        /*****************************************************************/
        //Save photo in the folder
        // $newImageName = rand(1000, 9999) . '_' . time() . '_' . $request->name . '.' . $request->pro_pic->extension();
        // dd($newImageName);
        // $request->pro_pic->move(public_path('images/products'), $newImageName);

        // $newImageName = $request->file('image')->store('product','public');
        // dd($newImageName);
        /*****************************************************************/


        // $validator = Validator::make($request->all(), [
        //     'name' => 'bail|string',
        //     'description' => 'bail|required|string',
        //     'price' => 'bail|required|numeric',
        //     'stock' => 'bail|required|numeric',
        //     'pro_pic' => 'bail',
        //     'category_id' => 'required|numeric',
        //     'supplier_id' => 'bail|required|numeric'
        // ]);

        /*****************************************************************/
        // product::create([
        //     'name' => $request->input('name'),
        //     'description' => $request->input('description'),
        //     'price' => $request->input('price'),
        //     'stock' => $request->input('stock'),
        //     // 'pro_pic' => $newImageName,
        //     'category_id' => $request->input('category_id'),
        //     'supplier_id' => $request->input('supplier_id'),
        // ]);

        $createNewProduct = new product();
        $createNewProduct->name = $request->name;
        $createNewProduct->description = $request->description;
        $createNewProduct->price = $request->price;
        $createNewProduct->stock = $request->stock;
        $createNewProduct->pro_pic = $request->pro_pic;
        $createNewProduct->category_id = $request->category_id;
        $createNewProduct->supplier_id = $request->supplier_id;
        $createNewProduct->save();

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
    public function destroy(string $id)
    {
        // $coa = product::find($id);
        // $path1 = public_path('images/coaches/' . $coa->coa_pic);
        // if (File::exists($path1)) {
        //     File::delete($path1);
        // }
        product::find($id)->delete();
        return redirect('/products')->with('successDel', 'product deleted successfully.');
    }
}
