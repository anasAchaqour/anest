<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Supplier;
use Livewire\Component;
use App\Models\Product;

class FilterProducts extends Component
{


    public $query;
    public $byCategory;
    public $bySupplier;
    public $resetS = false;
    public $perPage = 9;




    public function render()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        $products = Product::query();
        $proCount = Product::count();

        // Filtering by category
        if ($this->byCategory) {
            $products->whereHas('category', function ($query) {
                $query->where('id', $this->byCategory);
            });
        }

        // Filtering by supplier
        if ($this->bySupplier) {
            $products->whereHas('supplier', function ($query) {
                $query->where('id', $this->bySupplier);
            });
        }

        // Searching by name
        if ($this->query) {
            $products->where('name', 'like', '%' . $this->query . '%');
        }

        // Reset search if resetS is true
        if ($this->resetS) {
            $this->query = null;
            $this->byCategory = null;
            $this->bySupplier = null;
            $this->resetS = false; // Reset the trigger
        }

        // $products = $products->paginate($this->perPage);
        $products = $products->take($this->perPage)->get();


        return view('livewire.filter-products', [
            'proCount' => $proCount,
            'products' => $products,
            'categories' => $categories,
            'suppliers' => $suppliers,
        ]);
    }

    // Reset the search query when the "Reset Search" button is clicked
    public function resetSearch()
    {
        $this->resetS = true; // Set the trigger to true
        $this->query = null;
        $this->byCategory = null;
        $this->bySupplier = null;
    }
    public function load(){
        $this->perPage += 9;
    }
}
