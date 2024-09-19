<?php

namespace App\Livewire\Pages\Dashboard;

use App\Models\Stok as ModelsStok;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class Stok extends Component
{
    use WithPagination;

    public function render(Request $request)
    {
        if($request->keyword) {
            $stok = ModelsStok::search($request->keyword)->paginate(5);
        } else {
            $stok = ModelsStok::paginate(5);
        }
        return view('livewire.pages.dashboard.stok', ['stoks' => $stok]);
    }
}
