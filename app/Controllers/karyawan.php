<?php

namespace App\Controllers;

use App\Models\karyawanmodel;
use App\Models\cabangmodel;


class karyawan extends BaseController
{
    protected $helpers = [];
    protected $karyawanmodel;
    protected $cabangmodel;

    public function __construct()
    {
        helper('form');
        $this->cabangmodel = new cabangmodel();
        $this->karyawanmodel = new karyawanmodel();
    }

    public function index()
    {
        $data['karyawan'] = $this->karyawanmodel->getkaryawan();
        return view('karyawan/index', $data);
    }

    public function create()
    {
        $data['cabang'] = $this->cabangmodel->getCabang();
        return view('karyawan/create', $data);
    }

    public function process()
    {
        $userModel = new \App\Models\UserModel();
        $karyawanModel = new $this->karyawanmodel;
        $session = session();

        $nomorKaryawan = $this->request->getPost('nomor_karyawan');
        $namaKaryawan = $this->request->getPost('nama_karyawan');

        if ($userModel->where('username', $nomorKaryawan)->first()) {
            $session->setFlashdata('error', 'Gagal menambahkan karyawan. Nomor HP karyawan  sudah terdaftar.');
            return redirect()->to(base_url('/karyawan/create'))->withInput();
        }

        $userData = [
            'username'   => $nomorKaryawan,
            'password'   => password_hash("12345", PASSWORD_DEFAULT),
            'role'       => 'karyawan',
        ];

        if ($userModel->insert($userData)) {
            $newUserId = $userModel->getInsertID();

            $karyawanData = [
                'nama_karyawan'          => $this->request->getPost('nama_karyawan'),
                'no_hp'         => $this->request->getPost('nomor_karyawan'),
                'tempat_lahir'  => $this->request->getPost('tempat_lahir'),
                'tgl_lahir'     => $this->request->getPost('tanggal_lahir'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'id_cabang'     => $this->request->getPost('id_cabang'),
                'alamat'        => $this->request->getPost('alamat'),
                'id_user'       => $newUserId,
            ];

            if ($karyawanModel->insertkaryawan($karyawanData)) {
                $session->setFlashdata('success', 'Berhasil Menambahkan Data Karyawan beserta Akun User.');
                return redirect()->to(base_url('/karyawan'));
            } else {
                $userModel->delete($newUserId);
                $session->setFlashdata('error', 'Gagal Menambahkan Data Karyawan setelah User dibuat. User telah dibatalkan.');
                return redirect()->to(base_url('/karyawan/create'))->withInput();
            }
        } else {
            $errors = $userModel->errors();
            $errorMessage = 'Gagal membuat akun user untuk karyawan.';
            if (!empty($errors)) {
                $errorMessage .= ' Detail: ' . implode(', ', array_values($errors));
            }
            $session->setFlashdata('error', $errorMessage);
            return redirect()->to(base_url('/karyawan/create'))->withInput();
        }
    }

    public function edit($id)
    {
        $data['cabang'] = $this->cabangmodel->getCabang();
        $data['karyawan'] = $this->karyawanmodel->getkaryawan($id)->getRowArray();
        return view('karyawan/edit', $data);
    }

    public function edit_process()
    {
        $id = $this->request->getVar('id_karyawan');
        $karyawanData = [
            'nama_karyawan'          => $this->request->getPost('nama_karyawan'),
            'no_hp'         => $this->request->getPost('nomor_karyawan'),
            'tempat_lahir'  => $this->request->getPost('tempat_lahir'),
            'tgl_lahir'     => $this->request->getPost('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'id_cabang'     => $this->request->getPost('id_cabang'),
            'alamat'        => $this->request->getPost('alamat'),
        ];
        $simpan = $this->karyawanmodel->updatekaryawan($karyawanData, $id);
        if ($simpan) {
            session()->setFlashdata('warning', 'Berhasil Edit Data karyawan');
            return redirect()->to(base_url('/karyawan'));
        }
    }

    public function delete($id)
    {
        $hapus = $this->karyawanmodel->deletekaryawan($id);
        if ($hapus) {
            session()->setFlashdata('error', 'Berhasil Hapus Data karyawan');
            return redirect()->to(base_url('/karyawan'));
        }
    }
}
