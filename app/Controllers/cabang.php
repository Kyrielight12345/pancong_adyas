<?php

namespace App\Controllers;

use App\Models\cabangmodel;

class cabang extends BaseController
{
    protected $helpers = [];
    protected $cabangmodel;



    public function __construct()
    {
        helper('form');
        $this->cabangmodel = new cabangmodel();
    }

    public function index()
    {
        $data['cabang'] = $this->cabangmodel->getCabang();
        return view('cabang/index', $data);
    }

    public function create()
    {
        return view('cabang/create');
    }

    public function process()
    {
        $data = array(
            'nama_cabang' => $this->request->getPost('nama_cabang'),
            'Alamat' => $this->request->getPost('alamat'),

        );
        $simpan = $this->cabangmodel->insertCabang($data);
        if ($simpan) {
            session()->setFlashdata('success', 'Berhasil Menambahkan Data Cabang');
            return redirect()->to(base_url('/cabang'));
        }
    }

    public function edit($id)
    {
        $data['cabang'] = $this->cabangmodel->getCabang($id)->getRowArray();
        return view('cabang/edit', $data);
    }

    public function edit_process()
    {
        $id = $this->request->getVar('id_cabang');
        $data = array(
            'nama_cabang' => $this->request->getPost('nama_cabang'),
            'Alamat' => $this->request->getPost('alamat'),

        );
        $simpan = $this->cabangmodel->updateCabang($data, $id);
        if ($simpan) {
            session()->setFlashdata('warning', 'Berhasil Edit Data Cabang');
            return redirect()->to(base_url('/cabang'));
        }
    }

    public function delete($id)
    {
        $hapus = $this->cabangmodel->deleteCabang($id);
        if ($hapus) {
            session()->setFlashdata('error', 'Berhasil Hapus Data Cabang');
            return redirect()->to(base_url('/cabang'));
        }
    }
}
