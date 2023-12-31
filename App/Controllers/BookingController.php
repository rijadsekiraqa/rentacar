<?php

namespace App\Controllers;

use App\Helper\Session;
use App\Models\Vehicle;
use App\Models\Booking;
use App\Models\Client;
use \Core\View;
use \Core\Controller;


class BookingController extends Controller
{

    public function __construct()
    {
        $this->session = Session::getInstance();
        if (!$this->session->isSignedIn()) {
            header('Location: /login-form');
            exit;
        }
        if (!$this->session->user || $this->session->client) {
            header('Location: /login-form');
            exit;
        }

    }


    public function index()
    {
        $message = isset($_GET['message']) ? urldecode($_GET['message']) : '';
        $bookings = Booking::orderBy('id', 'desc')->with('vehicle')->get();
        $loggedInUser = $this->session->user;
        View::renderTemplate('Bookings/index.html', [
            'bookings' => $bookings,
            'username' => $loggedInUser,
            'message' => $message]);
    }
    public function confirmBooking()
    {
        $id = $_GET['id'];
        $booking = Booking::find($id);

        $message = '';

        if ($booking) {
            $booking->status = 'confirmed';
            $booking->save();
            $message = "Booking successfully confirmed!";
        }

        header('Location: /bookings?message=' . urlencode($message));
        exit();
    }


    public function cancelBooking()
    {
        $id = $_GET['id'];
        $booking = Booking::find($id);
        $message = '';
        if ($booking) {
            $booking->status = 'canceled';
            $booking->save();
            $message = "Booking successfully canceled!";
        }

        header('Location: /bookings?message=' . urlencode($message));
        exit();
    }



}
