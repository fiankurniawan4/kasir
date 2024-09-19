<?php

namespace App\Livewire\Pages\Dashboard;

use App\Livewire\Forms\supplier\AddSupplierForm;
use App\Livewire\Forms\supplier\EditSupplier;
use App\Models\Supplier as ModelsSupplier;
use Illuminate\Http\Request;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Supplier extends Component
{
    use WithPagination;
    public AddSupplierForm $supplierForm;
    public EditSupplier $editSupplier;

    public function selectEdit($id) {
        if($this->editSupplier->id) {
            $this->editSupplier->id = '';
        }
        $this->editSupplier->id = $id;
        $supplier = ModelsSupplier::find($id);
        $this->editSupplier->nama = $supplier->nama;
        $this->editSupplier->alamat = $supplier->alamat;
        $this->editSupplier->nomor = $supplier->nomor;
        $this->editSupplier->keterangan = $supplier->keterangan;
    }

    public function edit() {
        $edit = $this->editSupplier->edit();
        $this->dispatch('supplierAdded',$edit);
    }

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
