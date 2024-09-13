<?php

namespace App\Livewire\Pages\Dashboard;

use App\Livewire\Forms\supplier\AddSupplierForm;
use App\Models\Supplier as ModelsSupplier;
use Illuminate\Http\Request;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Supplier extends Component
{
    use WithPagination;
    public AddSupplierForm $supplierForm;

    public function save() {
        $sForm = $this->supplierForm->addSupplier();
        $this->dispatch('supplierAdded',$sForm);
    }

    public function delete($id) {
        $supplier = ModelsSupplier::find($id);
        $supplier->delete();
        $this->dispatch('supplierAdded',$supplier);
    }

    #[On('supplierAdded')]
    public function updateList($supplier) {
    }

    public function render(Request $request)
    {
        if($request->keyword) {
            $supplier = ModelsSupplier::search($request->keyword)->paginate(5);
        } else {
            $supplier = ModelsSupplier::paginate(5);
        }
        return view('livewire.pages.dashboard.supplier', ['supplier' => $supplier]);
    }
}
