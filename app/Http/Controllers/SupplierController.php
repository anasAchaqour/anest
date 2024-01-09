<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use Illuminate\Http\Request;
use App\Models\product;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $suppliers = Supplier::all();
        return view('suppliers.index', ['suppliers' => $suppliers]);
    }

    public function showAllSuppliersWithProducts()
    {
        $suppliers = Supplier::with('products')->get();
        return view('suppliers.suppliers-products', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);
        Supplier::create([
            "name" => $valData['name'],
            "address" => $valData['address'],
            "phone_number" => $valData['phone_number'],
            "email" => $valData['email'],
        ]);
        return redirect('/suppliers')->with('success', 'Supplier Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $supplier = Supplier::find($id);
        return view('suppliers.edit', ['supplier' => $supplier]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20', // Adjust max length as needed
            'email' => 'required|email|max:255',
        ]);

        // Find the supplier by ID
        $supplier = Supplier::findOrFail($id);

        // Update the supplier with the validated data
        $supplier->update($validatedData);

        // Optionally, you may redirect to a specific route or return a response
        return redirect('/suppliers')->with('success', 'Supplier updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the supplier by ID
        $supplier = Supplier::findOrFail($id);

        // handle product
        $relatedProducts = product::where('supplier_id', $id)->get();

        foreach ($relatedProducts as $product) {
            $product->supplier_id = null; // or set to a different supplier_id
            $product->save();
        }

        // Delete the supplier
        $supplier->delete();

        // Optionally, you may redirect to a specific route or return a response
        return redirect('/suppliers')->with('successDel', 'Supplier deleted successfully');
    }
}
