<?php

namespace App\Livewire\Forms\product;

use App\Models\Product;
use Livewire\Attributes\Validate;
use Livewire\Form;

class AddProductForm extends Form
{

    #[Validate('required')]
    public $nama, $kategori, $harga;

    public function addProduct() {
        $this->validate();
        if($this->kategori == null) {
            return;
        }
        $product = Product::create(
            [
                'nama' => $this->nama,
                'kategori_id' => $this->kategori,
                'harga' => $this->harga
            ]
        );
        $this->reset();

        return $product;
    }
}
