<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Booking extends BaseController
{
    public function index(): string
    {
        return view('layout/navbar') . view('pages/booking') . view('layout/footer');
        // return view('layout/navbar') . view('pages/booking') . view('layout/footer');
    }
}
