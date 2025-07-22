<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\product_table;

class ProductSearch extends Component
{
    public $name = '';

    public function render()
    {
        $products = [];

        if (!empty($this->name)) {
            $products = product_table::where('name', 'like', '%' . $this->name . '%')->get();
        }

        return view('livewire.product-search', compact('products'));
    }
}
