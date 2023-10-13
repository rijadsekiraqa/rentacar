<?php

namespace App\Controllers;
use App\Helper\Session;
use App\Models\Client;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Brand;
use App\Models\Booking;
use App\Models\Contact;
use \Core\View;
use \Core\Controller;


class Home extends Controller
{

    public function __construct()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn()) {
            header('Location: /user-login');
            exit;
        }
    }
    

    public function showCount()
    {
        $user = User::count();
        $client = Client::count();
        $brand = Brand::count();
        $vehicle = Vehicle::count();
        $booking = Booking::count();
        $contact = Contact::count();
        $session = Session::getInstance();
        if (!$session->isSignedIn()) {
            header('Location: /login-form');
            exit;
        }
        $loggedInUser = $session->user;
        View::renderTemplate('Dashboard/index.html', [
            'userCount' => $user,
            'clientCount' => $client,
            'brandCount' => $brand,
            'vehicleCount' => $vehicle,
            'bookingCount' => $booking,
            'contactCount'=>$contact,
            'username' => $loggedInUser
        ]);
    }



}
