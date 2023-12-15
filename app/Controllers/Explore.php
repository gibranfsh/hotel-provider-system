<?php

namespace App\Controllers;

class Explore extends BaseController
{
    public function index(): string
    {
        return view('layout/navbar') . view('pages/explore') . view('layout/footer');
    }
}
