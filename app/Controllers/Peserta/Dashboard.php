<?php

namespace App\Controllers\Peserta;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('peserta/dashboard');
    }
}

