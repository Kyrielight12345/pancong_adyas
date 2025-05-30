<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id_user';
    protected $allowedFields    = ['username', 'password', 'role', 'is_deleted', 'created_at', 'updated_at'];
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    public function getUserByUsername(string $username)
    {
        return $this->where('username', $username)
            ->where('is_deleted', 0)
            ->first();
    }

    public function getuser($id = false)
    {
        if ($id == false) {
            return $this->db->table('user')
                ->select('karyawan.*, user.*')
                ->join('karyawan', 'user.id_user = karyawan.id_user')
                ->where('user.id_user !=', 1)
                ->get()->getResultArray();
        } else {
            return $this->getWhere(['id_user' => $id, 'is_deleted' => 0]);
        }
    }

    public function insertuser($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateuser($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_user' => $id]);
    }

    public function deleteuser($id)
    {
        return $this->db->table($this->table)->update(['is_deleted' => 1], ['id_user' => $id]);
    }
}
