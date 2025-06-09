<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BuatTabelProduk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_produk' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nama_produk' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'unique' => true
            ],
            'harga' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ],
            'stok' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ],
        ]);
        $this->forge->addKey('id_produk', true);
        $this->forge->createTable('produk');
    }

    public function down()
    {
        $this->forge->dropTable('produk', true);
    }
}
