<?php

namespace App\Livewire\Forms\product;

use App\Models\Product;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EditProductForm extends Form
{
    public $id;

    #[Validate('required')]
    public $nama, $kategori, $harga, $stok;

    public function edit() {
        $this->validate();
        $product = Product::find($this->id);
        if($this->nama || $this->kategori || $this->harga || $this->stok) {
            $product->nama = $this->nama;
            $product->kategori_id = $this->kategori;
            $product->harga = $this->harga;
            $product->stok = $this->stok;
            $product->save();
        } else {
            return;
        }

        return $product;
    }
}
