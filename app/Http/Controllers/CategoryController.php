<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Http\Requests\StorecategoryRequest;
use App\Http\Requests\UpdatecategoryRequest;
use App\Models\product;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $valDtata = $request->validate([
            'name' => 'bail|required|string',
            'description' => 'bail|required|string',
            'cat_pic' => ['image', 'mimes:png,jpg,jpeg,svg', 'max:10240'],
        ]);

        if ($request->hasFile('cat_pic')) {
            // If a file was uploaded, store it and get the path
            $newImageName = $request->file('cat_pic')->store('category', 'public');
        } else {
            // If no file was uploaded, use the default image path
            $newImageName = 'category/default.png'; // Adjust the default image filename/path
        }
        category::create([
            "name" => $valDtata['name'],
            "description" => $valDtata['description'],
            "cat_pic" => $newImageName,
        ]);
        return redirect('/categories')->with('success', 'Category Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = category::find($id);
        return view('categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $valDtata = $request->validate([
            'name' => 'bail|required|string',
            'description' => 'bail|required|string',
        ]);

        $category = category::find($id);
        // Update product image if a new file is provided
        $oldImagePath = $category->cat_pic;
        if ($request->cat_pic == null) {
            $newImageName = $oldImagePath;
        } else {
            // Delete the old image
            if ($oldImagePath != 'category/default.png' && Storage::exists('public/' . $oldImagePath)) {
                Storage::delete('public/' . $oldImagePath);
            }
            $newImageName = $request->file('cat_pic')->store('category', 'public');
        }

        $category->name = $valDtata['name'];
        $category->description = $valDtata['description'];
        $category->cat_pic = $newImageName;
        $category->save();

        return redirect('/categories')->with('successUP', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $category = category::findOrFail($id);

        // Get the image path
        $imagePath = storage_path('app/public/' . $category->cat_pic);
        // Check if the file exists before attempting to delete it
        if (file_exists($imagePath)) {
            unlink($imagePath); // Delete the file
        }

        // handle product
        $relatedProducts = product::where('category_id', $id)->get();

        foreach ($relatedProducts as $product) {
            $product->category_id = null; // or set to a different category ID
            $product->save();
        }

        // Delete the product
        $category->delete();
        return redirect('/categories')->with('successDel', 'Category deleted successfully.');
    }
}
