<?php

namespace App\Controllers;

class Payment extends BaseController
{
    public function index(): string
    {
        return view('layout/navbar') . view('pages/payment') . view('layout/footer');
    }
}
