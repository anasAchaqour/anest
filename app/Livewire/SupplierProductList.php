<?php

namespace App\Livewire;

use App\Models\product;
use App\Models\Supplier;
use Livewire\Component;
use Livewire\WithPagination;

class SupplierProductList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {

        $suppliers = Supplier::with('products')->paginate(3);
        return view('livewire.supplier-product-list', ['suppliers' => $suppliers]);
    }
}
