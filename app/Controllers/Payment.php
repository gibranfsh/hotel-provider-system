<?php

namespace App\Controllers;

class Payment extends BaseController
{
    public function index(): string
    {
        // Mendapatkan nilai query parameters dari URL
        $hotelID = $this->request->getGet('hotelID');
        $checkInDate = $this->request->getGet('checkInDate');
        $checkOutDate = $this->request->getGet('checkOutDate');
        $roomID = $this->request->getGet('roomID');
        $roomNumber = $this->request->getGet('roomNumber');
        $floor = $this->request->getGet('floor');
        $roomType = $this->request->getGet('roomType');
        $price = $this->request->getGet('price');

        return view('layout/navbar') . view('pages/payment', [
            'hotelID' => $hotelID,
            'checkInDate' => $checkInDate,
            'checkOutDate' => $checkOutDate,
            'roomID' => $roomID,
            'roomNumber' => $roomNumber,
            'floor' => $floor,
            'roomType' => $roomType,
            'price' => $price,
        ]) . view('layout/footer');
    }
}
