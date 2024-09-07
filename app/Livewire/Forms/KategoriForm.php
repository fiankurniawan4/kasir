<?php

namespace App\Livewire\Forms;

use App\Models\Kategori;
use Livewire\Attributes\Validate;
use Livewire\Form;

class KategoriForm extends Form
{
    #[Validate('required')]
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
