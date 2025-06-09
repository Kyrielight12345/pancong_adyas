<?php

namespace App\Models;

use CodeIgniter\Model;

class produkmodel extends Model
{
    protected $table            = 'produk';
    protected $primaryKey       = 'id_produk';
    protected $allowedFields    = ['nama_produk', 'harga', 'stok'];

    public function findOrCreateByName(string $namaProduk): int
    {
        $produk = $this->where('nama_produk', $namaProduk)->first();
        if ($produk) {
            return $produk['id_produk'];
        } else {
            return $this->insert(['nama_produk' => $namaProduk, 'harga' => 2500, 'stok' => 0]);
        }
    }

    public function increaseStock(int $idProduk, int $jumlah)
    {
        $this->where('id_produk', $idProduk)->set('stok', "stok + $jumlah", false)->update();
    }
}
