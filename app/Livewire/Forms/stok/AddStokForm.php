<?php

namespace App\Livewire\Forms\stok;

use App\Models\Product;
use App\Models\Stok;
use Livewire\Attributes\Validate;
use Livewire\Form;

class AddStokForm extends Form
{

    public $barcode = null;
    public $supplier = null;
    public $keterangan = null;

    public $jumlah;

    protected function rules()
    {
        return [
            'barcode' => 'required',
            'supplier' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required',
        ];
    }

    public function add()
    {
        $this->validate();

        if ($this->jumlah <= -1) {
            return;
        }
        if ($this->barcode || $this->supplier || $this->jumlah || $this->keterangan) {
            $product = Product::where('barcode', $this->barcode)->first();
            $jumlah = $this->jumlah;
            if (!$product) {
                return;
            }

            if ($this->keterangan == 'Pengurangan') {

                if ($product->stok < $jumlah) {
                    return;
                }
            }

            $stok = Stok::create(
                [
                    'product_barcode' => $this->barcode,
                    'supplier_id' => $this->supplier,
                    'jumlah' => $this->jumlah,
                    'keterangan' => $this->keterangan,
                ]
            );
            if ($stok) {
                if ($this->keterangan == 'Pengurangan') {

                    $product->stok -= $jumlah;
                } else {
                    $product->stok += $jumlah;
                }
                $product->save();
            }
            $this->reset();

        } else {
            return;
        }
        return $stok;
    }
}
