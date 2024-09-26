<?php

namespace App\Livewire\Pages\Dashboard;

use App\Livewire\Forms\stok\AddStokForm;
use App\Models\Product;
use App\Models\Stok as ModelsStok;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Stok extends Component
{
    use WithPagination;

    public AddStokForm $addForm;

    public function addStok() {
        $stok = $this->addForm->add();
        $this->dispatch('addStok', $stok);
    }

    #[On('addStok')]
    public function updateList($stok) {
    }

    public function render(Request $request)
    {
        if($request->keyword) {
            $stok = ModelsStok::search($request->keyword)->paginate(5);
        } else {
            $stok = ModelsStok::paginate(5);
        }

        $barcode = Product::all();
        $supplier = Supplier::all();
        return view('livewire.pages.dashboard.stok', ['stoks' => $stok, 'barcode' => $barcode, 'supplier' => $supplier]);
    }
}
