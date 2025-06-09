<?php

namespace App\Models;

use CodeIgniter\Model;

class bahanbakumodel extends Model
{
    protected $table            = 'bahan_baku';
    protected $primaryKey       = 'id_bahan';
    protected $allowedFields    = ['nama_bahan', 'harga_beli', 'satuan'];

    public function getBahanPrices(): array
    {
        $allBahan = $this->findAll();
        $prices = [];
        foreach ($allBahan as $bahan) {
            $prices[$bahan['nama_bahan']] = $bahan['harga_beli'];
        }
        return $prices;
    }
}
