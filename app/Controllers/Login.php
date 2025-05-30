<?php

namespace App\Controllers;

use App\Models\karyawanmodel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class Login extends Controller
{
    public function index()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/dashboard');
        }

        return view('login');
    }

    public function authenticate()
    {
        $session = session();
        $userModel = new UserModel();
        $karyawanModel = new karyawanmodel();

        $rules = [
            'username' => 'required|min_length[5]|max_length[50]',
            'password' => 'required|min_length[5]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/login')->withInput()->with('error', 'Username atau Password salah!');
        }

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $user = $userModel->getUserByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            $karyawanData = $karyawanModel->getKaryawanByIdUser($user['id_user']);

            $namaKaryawanDiSession = null;
            if ($karyawanData && isset($karyawanData['nama_karyawan'])) {
                $namaKaryawanDiSession = $karyawanData['nama_karyawan'];
            } elseif ($user['role'] === 'admin' && !$karyawanData) {
                $namaKaryawanDiSession = $user['username'];
            }

            $sessionData = [
                'id_user'       => $user['id_user'],
                'username'      => $user['username'],
                'role'          => $user['role'],
                'nama_karyawan' => $namaKaryawanDiSession,
                'logged_in'     => true,
            ];

            $session->set($sessionData);

            return redirect()->to('/');
        } else {
            $session->setFlashdata('error', 'Username atau Password salah!');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
