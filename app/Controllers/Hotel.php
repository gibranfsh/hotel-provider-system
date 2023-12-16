<?php

namespace App\Controllers;

class Hotel extends BaseController
{
    public function index(): string
    {
        return view('layout/navbar') . view('pages/hotel') . view('layout/footer');
    }
}
