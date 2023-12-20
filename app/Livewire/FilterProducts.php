<?php

namespace App\Livewire;


use App\Models\category;
use App\Models\Supplier;
use Livewire\Component;
use App\Models\product;

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

        // Filtering by category
        if ($this->byCategory) {
            $products->whereHas('category', function ($query) {
                $query->where('id', $this->byCategory);
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
            $this->resetS = false; // Reset the trigger
        }


        $products = $products->paginate($this->perPage);

        return view('livewire.filter-products', [
            'products' => $products,
            'categories' => $categories,
            'suppliers' => $suppliers
        ]);
    }

    // Reset the search query when the "Reset Search" button is clicked
    public function resetSearch()
    {
        $this->resetS = true; // Set the trigger to true
        $this->byCategory = null;
    }
}
