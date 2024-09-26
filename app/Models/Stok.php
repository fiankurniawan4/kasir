<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Stok extends Model
{
    use HasFactory, Searchable;
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_barcode', 'barcode');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }

    public function toSearchableArray(): array
    {
        return [
            'keterangan' => $this->keterangan,
        ];
    }
}
