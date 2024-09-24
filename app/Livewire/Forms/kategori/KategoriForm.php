<?php

namespace App\Livewire\Forms\kategori;

use App\Models\Kategori;
use Livewire\Attributes\Validate;
use Livewire\Form;

class KategoriForm extends Form
{
    #[Validate('required|unique:kategoris')]
    public $nama = '';

    public function postKategori() {
        $this->validate();
        $kategori = Kategori::create(
            $this->only(['nama'])
        );
        $this->reset();

        return $kategori;
    }
}
