<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKaryawanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_karyawan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_karyawan' => [
                'type'       => 'VARCHAR',
                'constraint' => '25',
            ],
            'no_hp' => [
                'type'       => 'VARCHAR',
                'constraint' => '15',
                'null'       => true,
            ],
            'alamat' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'tempat_lahir' => [
                'type'       => 'VARCHAR',
                'constraint' => '25',
                'null'       => true,
            ],
            'tgl_lahir' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'jenis_kelamin' => [
                'type'       => "ENUM('laki-laki', 'perempuan')",
                'null'       => true,
            ],
            'id_cabang' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],
            'id_user' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
                'unique'     => true,
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
        $this->forge->addKey('id_karyawan', true);
        $this->forge->addForeignKey('id_cabang', 'cabang', 'id_cabang', 'NO ACTION', 'NO ACTION');
        $this->forge->addForeignKey('id_user', 'user', 'id_user', 'NO ACTION', 'NO ACTION');
        $this->forge->createTable('karyawan');

        $Data = [
            'nama_karyawan'   => 'admin',
            'id_cabang'   => 1,
            'id_user'       => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $this->db->table('karyawan')->insert($Data);
    }

    public function down()
    {
        $this->forge->dropTable('karyawan', true);
    }
}
