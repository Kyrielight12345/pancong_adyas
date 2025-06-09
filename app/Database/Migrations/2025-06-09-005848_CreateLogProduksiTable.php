<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BuatTabelLogProduksi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_log' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'id_produk' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],
            'jumlah_hasil' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'total_modal' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0,
            ],
            'id_cabang' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],
            'tgl_produksi' => [
                'type' => 'DATETIME'
            ],
        ]);
        $this->forge->addKey('id_log', true);
        $this->forge->addForeignKey('id_produk', 'produk', 'id_produk', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_cabang', 'cabang', 'id_cabang', 'CASCADE', 'CASCADE');
        $this->forge->createTable('log_produksi');
    }

    public function down()
    {
        $this->forge->dropTable('log_produksi', true);
    }
}
