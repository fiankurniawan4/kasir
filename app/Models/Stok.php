<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Stok extends Model
{
    use HasFactory, Searchable;
    protected $guarded = [];

    public function product() {
        $this->belongsTo(Product::class, 'product_barcode');
    }

    public function supplier() {
        $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function toSearchableArray(): array
    {
        return [
            'keterangan' => $this->keterangan,
        ];
    }
}
