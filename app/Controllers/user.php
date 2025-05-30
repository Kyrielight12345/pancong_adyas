<?php

namespace App\Controllers;

use App\Models\usermodel;

class user extends BaseController
{
    protected $helpers = [];
    protected $usermodel;



    public function __construct()
    {
        helper('form');
        $this->usermodel = new usermodel();
    }

    public function index()
    {
        $data['user'] = $this->usermodel->getuser();
        return view('user/index', $data);
    }


    public function edit($id)
    {
        $data['user'] = $this->usermodel->getuser($id)->getRowArray();
        return view('user/edit', $data);
    }

    public function edit_process($id)
    {
        $data = array(
            'is_deleted' => 0,

        );
        $simpan = $this->usermodel->updateuser($data, $id);
        if ($simpan) {
            session()->setFlashdata('warning', 'Berhasil Mengaktifkan Data user');
            return redirect()->to(base_url('/user'));
        }
    }

    public function delete($id)
    {
        $hapus = $this->usermodel->deleteuser($id);
        if ($hapus) {
            session()->setFlashdata('error', 'Berhasil Menonaktifkan Data user');
            return redirect()->to(base_url('/user'));
        }
    }
}
