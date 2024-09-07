<?php

namespace App\Livewire\Pages\Dashboard;

use App\Livewire\Forms\product\AddProductForm;
use App\Livewire\Forms\product\EditProductForm;
use App\Models\Kategori;
use App\Models\Product as ModelsProduct;
use Illuminate\Http\Request;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Product extends Component
{
    use WithPagination;

    public AddProductForm $addProductForm;
    public EditProductForm $editProductForm;

    public function selectEdit($id) {
        $product = ModelsProduct::find($id);
        if($this->editProductForm->id) {
            $this->editProductForm->id = '';
        }
        $this->editProductForm->id = $product->id;
        $this->editProductForm->nama = $product->nama;
        $kategori = Kategori::find($product->kategori_id);
        $this->editProductForm->kategori = $kategori->id;
        $this->editProductForm->harga = $product->harga;
        $this->editProductForm->stok = $product->stok;
    }

    public function edit() {
        $edit = $this->editProductForm->edit();
        $this->dispatch('productAdded', $edit);
    }

    public function save() {
        $add = $this->addProductForm->addProduct();
        $this->dispatch('productAdded', $add);
    }

    #[On('productAdded')]
    public function updateList($product) {
    }

    public function render(Request $request)
    {
        if($request->keyword) {
            $product = ModelsProduct::search($request->keyword)->paginate(5);
        } else {
            $product = ModelsProduct::paginate(5);
        }
        $kategori = Kategori::all();
        return view('livewire.pages.dashboard.product', ['kategoris' => $kategori, 'products' => $product]);
    }
}
