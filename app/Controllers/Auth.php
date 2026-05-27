<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function attempt()
    {
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->to('/login')->withInput()->with('error', 'Email atau password tidak valid.');
        }

        $email = (string) $this->request->getPost('email');
        $password = (string) $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->findByEmail($email);

        if ($user === null || ! password_verify($password, (string) $user['password'])) {
            return redirect()->to('/login')->withInput()->with('error', 'Email atau password salah.');
        }

        if (! in_array($user['role'], ['admin', 'peserta'], true)) {
            session()->destroy();

            return redirect()->to('/login')->with('error', 'Role akun tidak valid.');
        }

        session()->set([
            'user_id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'role' => $user['role'],
            'is_logged_in' => true,
        ]);

        if ($user['role'] === 'admin') {
            return redirect()->to('/admin/dashboard');
        }

        return redirect()->to('/peserta/dashboard');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login')->with('success', 'Berhasil logout.');
    }
}

