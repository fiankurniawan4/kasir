<?php

namespace App\Livewire\Forms\supplier;

use App\Models\Supplier;
use Livewire\Attributes\Validate;
use Livewire\Form;

class AddSupplierForm extends Form
{

    public $nama, $alamat, $nomor, $keterangan;
    
    protected function rules() {
        return [
            'nama' => 'required|unique:suppliers',
            'alamat' => 'required',
            'nomor' => 'required|numeric|digits_between:12,15',
            'keterangan' => 'required',
        ];
    }

    public function addSupplier() {
        $this->validate();

        $supplier = Supplier::create([
            'nama' => $this->nama,
            'alamat' => $this->alamat,
            'nomor' => $this->nomor,
            'keterangan' => $this->keterangan
        ]);

        $this->reset();

        return $supplier;
    }
}
