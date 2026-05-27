<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class GuestFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session('is_logged_in') === true) {
            $role = (string) session('role');

            if ($role === 'admin') {
                return redirect()->to('/admin/dashboard');
            }

            if ($role === 'peserta') {
                return redirect()->to('/peserta/dashboard');
            }

            session()->destroy();

            return redirect()->to('/login')->with('error', 'Role akun tidak valid.');
        }

        return null;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}

