<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Kategori extends Model
{
    use HasFactory, Searchable;

    protected $guarded = [];

    public function toSearchableArray(): array
    {
        return [
            'nama' => $this->nama,
        ];
    }
}
