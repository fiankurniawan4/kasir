<?php

namespace App\Livewire\Forms\product;

use App\Models\Product;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EditProductForm extends Form
{
    public $id;

    #[Validate('required')]
    public $nama, $kategori, $harga, $barcode;

    public function edit() {
        $this->validate();
        $product = Product::find($this->id);
        if($this->nama || $this->kategori || $this->harga || $this->barcode) {
            $product->nama = $this->nama;
            $product->kategori_id = $this->kategori;
            $product->harga = $this->harga;
            $product->barcode = $this->barcode;
            $product->save();
        } else {
            return;
        }

        return $product;
    }
}
