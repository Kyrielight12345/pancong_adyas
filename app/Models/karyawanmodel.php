<?php

namespace App\Models;

use CodeIgniter\Model;

class karyawanmodel extends Model
{
    protected $table = 'karyawan';
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    public function getkaryawan($id = false)
    {
        if ($id == false) {
            return $this->db->table('karyawan')
                ->select('karyawan.*, cabang.nama_cabang, cabang.alamat AS alamat_cabang')
                ->join('cabang', 'cabang.id_cabang = karyawan.id_cabang')
                ->where('karyawan.is_deleted', 0)
                ->where('karyawan.id_karyawan !=', 1)
                ->get()->getResultArray();
        } else {
            return $this->getWhere(['id_karyawan' => $id, 'is_deleted' => 0]);
        }
    }

    public function getKaryawanByIdUser($id_user)
    {
        return $this->where('id_user', $id_user)
            ->where('is_deleted', 0)
            ->first();
    }
    public function insertkaryawan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updatekaryawan($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_karyawan' => $id]);
    }

    public function deletekaryawan($id)
    {
        return $this->db->table($this->table)->update(['is_deleted' => 1], ['id_karyawan' => $id]);
    }
}
