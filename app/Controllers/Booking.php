<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BookingModel;
use App\Models\HotelModel;
use App\Models\PaymentModel;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Booking extends BaseController
{
    private function authenticate(): string
    {
        // Email dan password untuk autentikasi ke API
        $ginHotelAPIEmail = getenv('ginHotelAPIEmail');
        $ginHotelAPIPassword = getenv('ginHotelAPIPassword');

        // Melakukan login ke API untuk mendapatkan access token (send a post request to the login endpoint) bersama dengan body request berupa email dan password
        $ginHotelAPILoginURL = getenv('ginHotelBaseURL') . '/api/login';

        // Initialize Guzzle client
        $client = new Client();

        // Prepare the data for the login request
        $loginData = [
            'email' => $ginHotelAPIEmail,
            'password' => $ginHotelAPIPassword,
        ];

        $jwt = '';

        try {
            // Send a POST request
            $response = $client->post($ginHotelAPILoginURL, [
                'json' => $loginData,
            ]);

            // Get the response body as a string
            $body = $response->getBody()->getContents();

            // Process the response
            $body = json_decode($body, true);

            $jwt = $body['token'];
        } catch (GuzzleException $e) {
            // Catch and handle exceptions
            dd($e->getMessage());
        }

        return $jwt;
    }

    public function index(): string
    {
        // Get all bookings data from the database with user_id = session()->get('user_id'), including the payment data
        $bookingModel = new BookingModel();
        $bookings = $bookingModel->where('user_id', session()->get('user_id'))->findAll();

        // Get payment data for each booking
        $paymentModel = new PaymentModel();
        $paymentData = [];

        foreach ($bookings as $booking) {
            $payment = $paymentModel->find($booking['payment_id']);
            $paymentData[] = $payment;
        }

        // Combine the bookings data with the payment data
        for ($i = 0; $i < count($bookings); $i++) {
            $bookings[$i]['payment'] = $paymentData[$i];
        }

        $viewData = [
            'bookings' => $bookings,
        ];

        // Return the view with the bookings data
        return view('layout/navbar') . view('pages/bookings', $viewData) . view('layout/footer');
    }

    public function initBooking($id): string
    {
        // id is hotel's id
        $hotelModel = new HotelModel();
        $hotelData = $hotelModel->find($id);

        // Initialize Guzzle client
        $client = new Client();

        // Get the JWT from the authenticate() method
        $jwt = $this->authenticate();

        // Melakukan HTTP request GET dengan guzzlehttp dengan Authorization header berupa Bearer token
        $ginHotelAPIURL = getenv('ginHotelBaseURL') . '/api/rooms';

        try {
            // Send a GET request with the Bearer token in the Authorization header
            $response = $client->get($ginHotelAPIURL, [
                'headers' => [
                    'Authorization' => $jwt,
                ],
            ]);

            // Get the response body as a string
            $rooms = $response->getBody()->getContents();

            // Process the response
            $rooms = json_decode($rooms, true);
        } catch (GuzzleException $e) {
            // Catch and handle exceptions
            dd($e->getMessage());
        }

        $viewData = [
            'hotel' => $hotelData,
            'rooms' => $rooms,
        ];

        return view('layout/navbar') . view('pages/booking', $viewData) . view('layout/footer');
    }

    public function create()
    {
        // dapatkan nilai dari form input
        $checkInDate = $this->request->getPost('checkInDate');
        $checkOutDate = $this->request->getPost('checkOutDate');
        $hotelID = $this->request->getPost('hotelID');
        $roomID = $this->request->getPost('roomID');
        $roomNumber = $this->request->getPost('roomNumber');
        $floor = $this->request->getPost('floor');
        $roomType = $this->request->getPost('roomType');
        $price = $this->request->getPost('price');
        $paymentMethod = $this->request->getPost('paymentMethod');

        // Masukkan data ke dalam database tabel Booking dan Payment
        $bookingModel = new BookingModel();
        $paymentModel = new PaymentModel();

        $paymentData = [
            'bill_total' => $price, // di tabel Payment
            'payment_method' => $paymentMethod, // di tabel Payment
            'payment_status' => 'Paid', // di tabel Payment
        ];

        $paymentModel->insert($paymentData);

        // Initialize Guzzle client
        $client = new Client();

        // Get the JWT from the authenticate() method
        $jwt = $this->authenticate();

        // Melakukan HTTP request POST dengan guzzlehttp dengan Authorization header berupa Bearer token
        $ginHotelAPIURL = getenv('ginHotelBaseURL') . '/api/reservations';

        // Prepare the data for the POST request
        $reservationData = [
            'user_id' => session()->get('user_id'),
            'user_full_name' => session()->get('user_full_name'),
            'user_email' => session()->get('user_email'),
            'user_phone_number' => session()->get('user_phone_number'),
            'checkInDate' => $checkInDate,
            'checkOutDate' => $checkOutDate,
            'roomID' => $roomID,
            'paymentMethod' => $paymentMethod,
        ];

        try {
            // Send a POST request with the Bearer token in the Authorization header
            $response = $client->post($ginHotelAPIURL, [
                'headers' => [
                    'Authorization' => $jwt,
                ],
                'json' => $reservationData,
            ]);

            // Get the response body as a string
            $body = $response->getBody()->getContents();

            // Process the response
            $body = json_decode($body, true);

            $reservationID = $body['reservationID'];

            $bookingData = [
                'user_id' => session()->get('user_id'), // di tabel Booking
                'check_in_date' => $checkInDate, // di tabel Booking
                'check_out_date' => $checkOutDate, // di tabel Booking
                'hotel_id' => $hotelID, // di tabel Booking
                'payment_id' => $paymentModel->getInsertID(), // di tabel Booking
                'room_id' => $roomID, // di tabel Booking
                'room_number' => $roomNumber, // di tabel Booking
                'room_floor' => $floor, // di tabel Booking
                'room_type' => $roomType, // di tabel Booking
                'reservation_id' => $reservationID, // di tabel Booking
            ];

            $bookingModel->insert($bookingData);

            // set flash data with success message
            session()->setFlashdata('success', 'Booking created successfully');
            // Redirect to the bookings page
            return redirect()->to('/bookings');
        } catch (GuzzleException $e) {
            // Catch and handle exceptions
            dd($e->getMessage());
        }
    }

    public function updateProvider($reservationID)
    {
        // Get JWT from request Authorization header
        $token = $this->request->getHeaderLine('Authorization');

        $this->response->setJSON(['token' => $token]);
        // Validate JWT
        $key = getenv('JWT_SECRET');

        try {
            $decodedJWT = JWT::decode($token, new Key($key, 'HS256'));
        } catch (\Exception $e) {
            // Log the exception message for debugging
            log_message('error', 'Exception during JWT validation: ' . $e->getMessage());

            // Return a JSON response indicating a server error
            return $this->response->setStatusCode(500)->setJSON(['error' => 'Internal Server Error']);
        }

        $body = $this->request->getJSON();

        $checkInDate = $body->checkInDate;
        $checkOutDate = $body->checkOutDate;

        $bookingModel = new BookingModel();

        $booking = $bookingModel->where('reservation_id', $reservationID)->first();

        $bookingData = [
            'check_in_date' => $checkInDate,
            'check_out_date' => $checkOutDate,
        ];

        try {
            $bookingModel->update($booking['id'], $bookingData);
        } catch (\Exception $e) {
            // Log the exception message for debugging
            log_message('error', 'Exception during booking update: ' . $e->getMessage());

            // Return a JSON response indicating a server error
            return $this->response->setStatusCode(500)->setJSON(['error' => 'Internal Server Error']);
        }

        return $this->response->setJSON(['message' => 'Booking updated successfully']);
    }

    public function deleteProvider($reservationID)
    {
        // Get JWT from request Authorization header
        $token = $this->request->getHeaderLine('Authorization');

        // Validate JWT
        $key = getenv('JWT_SECRET');

        try {
            $decodedJWT = JWT::decode($token, new Key($key, 'HS256'));
        } catch (\Exception $e) {
            // Log the exception message for debugging
            log_message('error', 'Exception during JWT validation: ' . $e->getMessage());

            // Return a JSON response indicating a server error
            return $this->response->setStatusCode(500)->setJSON(['error' => 'Internal Server Error']);
        }

        $paymentModel = new PaymentModel();
        $bookingModel = new BookingModel();

        $booking = $bookingModel->where('reservation_id', $reservationID)->first();

        try {
            $paymentModel->delete($booking['payment_id']);
            $bookingModel->delete($booking['id']);
        } catch (\Exception $e) {
            // Log the exception message for debugging
            log_message('error', 'Exception during booking deletion: ' . $e->getMessage());

            // Return a JSON response indicating a server error
            return $this->response->setStatusCode(500)->setJSON(['error' => 'Internal Server Error']);
        }

        return $this->response->setJSON(['message' => 'Booking deleted successfully']);
    }
}
