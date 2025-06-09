<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BuatTabelBahanBaku extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_bahan' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nama_bahan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'unique' => true
            ],
            'harga_beli' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ],
            'satuan' => [
                'type' => 'VARCHAR',
                'constraint' => '50'
            ],
        ]);
        $this->forge->addKey('id_bahan', true);
        $this->forge->createTable('bahan_baku');
    }

    public function down()
    {
        $this->forge->dropTable('bahan_baku', true);
    }
}
