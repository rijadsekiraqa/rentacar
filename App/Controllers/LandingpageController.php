<?php

namespace App\Controllers;

use App\Helper\Session;
use App\Models\Vehicle;
use App\Models\Booking;
use App\Models\Client;
use \Core\View;
use \Core\Controller;


class LandingpageController extends Controller
{



    public function listVehicles()
    {
        $session = Session::getInstance();
        $loggedInClient = null; // Initialize the client as null by default

        // Check if the user is signed in, and if so, get the client object
        if ($session->isSignedIn()) {
            $loggedInClient = $session->client;  // Assuming the logged-in client is stored in the 'user' session variable
        }

        $vehicles = Vehicle::orderBy('id', 'desc')
            ->with('brand')
            ->get();

        foreach ($vehicles as $vehicle) {
            $vehicle->photo1 = json_decode($vehicle->photo1);
        }

        View::renderTemplate('LandingPage/index.html', [
            'vehicles' => $vehicles,
            'client' => $loggedInClient,
        ]);
    }




    public function edit()
    {

        $id = $_GET['id'];
        $vehicle = Vehicle::find($id);
        $vehicle->photo1 = json_decode($vehicle->photo1);
        $session = Session::getInstance();
        $loggedInClient = null; // Initialize the client as null by default

        // Check if the user is signed in, and if so, get the client object
        if ($session->isSignedIn()) {
            $loggedInClient = $session->client;  // Assuming the logged-in client is stored in the 'user' session variable
        }



        View::renderTemplate('LandingPage/vehiclesdetail.html', [
            'vehicle' => $vehicle,
            'client' => $loggedInClient, // Pass the loggedIn status to the template
        ]);

    }


    public function create()
    {
        View::renderTemplate('LandingPage/vehiclesdetail.html');
    }

    public function store()
    {
        $vehicleId = $_GET['id'];
        $session = Session::getInstance(); // Initialize the $session variable
        $loggedInClient = $session->client;
        $booking = new Booking();
        $booking->name = $_POST['name'];
        $booking->client_id = $loggedInClient->id;
        $booking->fromdate = $_POST['fromdate'];
        $booking->todate = $_POST['todate'];
        $booking->total = $_POST['price'];
        $booking->status = 'Not confirmed yet';
        $booking->vehicle_id = $vehicleId;
        $booking->save();
        echo '<script>alert("Booking successful.");</script>';
        header('Location: /vehicles-details?id=' . $vehicleId);
    }
    public function getPrice()
    {
        $vehicleId = $_GET['id'];

        // Fetch the vehicle based on the ID
        $vehicle = Vehicle::find($vehicleId);

        if (!$vehicle) {
            throw new Exception('Vehicle not found');
        }

        $pricePerDay = $vehicle->price;

        echo $pricePerDay;
        exit;
    }





}
