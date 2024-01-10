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

    public $perPage = 3;
    public $query;

    public function updatingQuery() {
        $this->resetPage();
    }

    public function render()
    {
        $suppliers = Supplier::where('name', 'like', '%' . $this->query . '%')->with('products')->paginate($this->perPage);
        return view('livewire.supplier-product-list', ['suppliers' => $suppliers]);
    }
}
