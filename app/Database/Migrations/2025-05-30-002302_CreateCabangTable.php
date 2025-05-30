<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCabangTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_cabang' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_cabang' => [
                'type'       => 'VARCHAR',
                'constraint' => '25',
            ],
            'alamat' => [
                'type'       => 'VARCHAR',
                'constraint' => '25',
            ],
            'is_deleted' => [
                'type'       => 'INT',
                'constraint' => 1,
                'default'    => 0,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_cabang', true);
        $this->forge->createTable('cabang');

        $Data = [
            'nama_cabang'   => 'pusat',
            'alamat'   => 'pusat',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $this->db->table('cabang')->insert($Data);
    }

    public function down()
    {
        $this->forge->dropTable('cabang', true);
    }
}
