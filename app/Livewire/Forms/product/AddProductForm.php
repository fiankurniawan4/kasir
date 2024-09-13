<?php

namespace App\Livewire\Forms\product;

use App\Models\Product;
use Livewire\Attributes\Validate;
use Livewire\Form;

class AddProductForm extends Form
{

    public $nama, $kategori, $harga, $barcode;

    protected function rules() {
        return [
            'nama' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'barcode' => 'required',
        ];
    }

    public function addProduct() {
        $this->validate();
        if($this->kategori == null) {
            return;
        }
        if (!is_numeric($this->harga)) {
            return;
        }
        
        $product = Product::create(
            [
                'nama' => $this->nama,
                'kategori_id' => $this->kategori,
                'harga' => $this->harga,
                'barcode' => $this->barcode
            ]
        );
        $this->reset();

        return $product;
    }
}
