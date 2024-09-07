<?php

namespace App\Livewire\Forms;

use App\Models\Kategori;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EditKategoriForm extends Form
{

    public $id;

    #[Validate('required')]
    public $nama = '';

    public function editForm() {
        $update = Kategori::find($this->id);
        $update->nama = $this->nama;
        $update->save();

        return $update;
    }
}
