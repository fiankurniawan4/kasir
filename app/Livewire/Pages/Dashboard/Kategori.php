<?php

namespace App\Livewire\Pages\Dashboard;

use App\Livewire\Forms\EditKategoriForm;
use App\Livewire\Forms\KategoriForm;
use App\Models\Kategori as ModelsKategori;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class Kategori extends Component
{
    use WithPagination;

    public KategoriForm $kategoriForm;
    public EditKategoriForm $editForm;

    public function selectEdit($id) {
        $kategori = ModelsKategori::find($id);
        if($this->editForm->nama) {
            $this->editForm->nama = '';
        } elseif($this->editForm->id) {
            $this->editForm->id = '';
            
        }
        $this->editForm->nama = $kategori->nama;
        $this->editForm->id = $kategori->id;
    }

    public function edit() {
        $form = $this->editForm->editForm();
        $this->dispatch('kategoriAdded', $form);
    }

    public function save() {
        $kategoriF = $this->kategoriForm->postKategori();
        $this->dispatch('kategoriAdded', $kategoriF);
    }

    public function delete($id) {
        $idKategori = ModelsKategori::find($id);
        $idKategori->delete();
        $this->dispatch('kategoriAdded', $idKategori);
    }

    #[\Livewire\Attributes\On('kategoriAdded')]
    public function updateList($kategori)
    {
    }

    public function render(Request $request)
    {
        if($request->keyword) {
            $kategori = ModelsKategori::search($request->keyword)->paginate(5);
        } else {
            $kategori = ModelsKategori::paginate(5);
        }
        return view('livewire.pages.dashboard.kategori', ['kategoris' => $kategori]);
    }
}
