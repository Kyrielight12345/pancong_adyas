<?php

namespace App\Models;

use CodeIgniter\Model;

class cabangmodel extends Model
{
    protected $table = 'cabang';
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    public function getCabang($id = false)
    {
        if ($id == false) {
            return $this->db->table('cabang')
                ->where('cabang.is_deleted', 0)
                ->where('cabang.id_cabang !=', 1)
                ->get()->getResultArray();
        } else {
            return $this->getWhere(['id_cabang' => $id, 'is_deleted' => 0]);
        }
    }

    public function insertCabang($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateCabang($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_cabang' => $id]);
    }

    public function deleteCabang($id)
    {
        return $this->db->table($this->table)->update(['is_deleted' => 1], ['id_cabang' => $id]);
    }
}
