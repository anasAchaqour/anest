<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;
use App\Models\category;
use App\Models\Stock;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

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
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'category_id' => 'required',
            'supplier_id' => 'required',
        ]);

        // Handle product image upload
        if ($request->hasFile('pro_pic')) {
            $newImageName = $request->file('pro_pic')->store('product', 'public');
        } else {
            $newImageName = 'product/default.png';
        }

        // Create a new product
        $newProduct = new Product([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'pro_pic' => $newImageName,
            'category_id' => $request->category_id,
            'supplier_id' => $request->supplier_id,
        ]);
        $newProduct->save();

        // Retrieve the newly created product's ID
        $productId = $newProduct->id;

        // Create a new stock record
        $newStock = new Stock([
            'product_id' => $productId,
            'quantity' => $request->stock,
        ]);
        $newStock->save();

        return redirect('/products')->with('success', 'Product added successfully.');
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
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'category_id' => 'required',
            'supplier_id' => 'required',
        ]);

        $product = Product::find($id);

        // Update product image if a new file is provided
        $oldImagePath = $product->pro_pic;
        if ($request->hasFile('pro_pic')) {
            // Delete the old image
            if ($oldImagePath != 'product/default.png' && Storage::exists('public/' . $oldImagePath)) {
                Storage::delete('public/' . $oldImagePath);
            }

            // Store the new image
            $newImageName = $request->file('pro_pic')->store('product', 'public');
            $product->pro_pic = $newImageName;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->supplier_id = $request->supplier_id;
        $product->save();

        // Update or create stock information
        $stock = Stock::updateOrCreate(
            ['product_id' => $product->id],
            ['quantity' => $request->stock]
        );

        return redirect('/products')->with('successUP', 'Product updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //dd($id);
        // $coa = product::find($id);
        // $path1 = public_path('images/coaches/' . $coa->coa_pic);
        // if (File::exists($path1)) {
        //     File::delete($path1);
        // }
        $product = product::findOrFail($id);

        if ($product->pro_pic !== 'product/default.png') {
            // Get the image path
            $imagePath = storage_path('app/public/' . $product->pro_pic);

            // Check if the file exists before attempting to delete it
            if (file_exists($imagePath)) {
                unlink($imagePath); // Delete the file
            }
        }
        // Delete the product
        $product->delete();
        return redirect('/products')->with('successDel', 'Product deleted successfully.');
    }
}
