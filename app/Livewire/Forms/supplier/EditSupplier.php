<?php

namespace App\Livewire\Forms\supplier;

use App\Models\Supplier;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EditSupplier extends Form
{
    public $id;
    public $nama, $alamat, $nomor, $keterangan;
    
    protected function rules() {
        return [
            'nama' => 'required|unique:suppliers',
            'alamat' => 'required',
            'nomor' => 'required|numeric|digits_between:12,15',
            'keterangan' => 'required',
        ];
    }

    public function edit() {
        $this->validate();
        $supplier = Supplier::find($this->id);
        if($this->nama || $this->alamat || $this->nomor || $this->keterangan) {
            $supplier->nama = $this->nama;
            $supplier->alamat = $this->alamat;
            $supplier->nomor = $this->nomor;
            $supplier->keterangan = $this->keterangan;
            $supplier->save();
        } else {
            return false;
        }

        return $supplier;
    }
}
