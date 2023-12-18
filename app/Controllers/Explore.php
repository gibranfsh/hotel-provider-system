<?php

namespace App\Controllers;

use App\Models\HotelModel;

class Explore extends BaseController
{
    public function index(): string
    {
        $hotelModel = new HotelModel();
        $data = $hotelModel->findAll();

        $viewData = [
            'data' => $data,
        ];

        return view('layout/navbar') . view('pages/explore', $viewData) . view('layout/footer');
    }
}
