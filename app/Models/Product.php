<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory, Searchable;
    public $guarded = [];

    public function priceToRupiah() {
        return 'Rp ' . number_format($this->harga, 0, ',', '.');
    }

    public function kategori() {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function toSearchableArray(): array
    {
        return [
            'nama' => $this->nama,
        ];
    }
}
