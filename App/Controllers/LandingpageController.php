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


//    public function index()
//    {
//
//        $posts = Post::orderBy('id','desc')-get();
//        View::renderTemplate('LandingPage/index.html',['posts' => $posts]);
//
//    }






    public function listVehicles()
    {
        $session = Session::getInstance();
        $loggedIn = $session->isSignedIn();
        $client = new Client();


        $vehicles = Vehicle::orderBy('id','desc')
            ->with('brand')
            ->get();
        foreach ($vehicles as $vehicle) {
            $vehicle->photo1 = json_decode($vehicle->photo1);
        }
        View::renderTemplate('LandingPage/index.html',
            ['vehicles' => $vehicles,
                'loggedIn' => $loggedIn,
                'client'=>$client]);
    }

    public function edit()
    {

        $id = $_GET['id'];
        $vehicle = Vehicle::find($id);
        $vehicle->photo1 = json_decode($vehicle->photo1);
        // Check if the client is logged in
        $session = Session::getInstance();
        $loggedIn = $session->isSignedIn();



        View::renderTemplate('LandingPage/vehiclesdetail.html', [
            'vehicle' => $vehicle,
            'loggedIn' => $loggedIn, // Pass the loggedIn status to the template
        ]);

    }


    public function create()
    {
        View::renderTemplate('LandingPage/vehiclesdetail.html');
    }

    public function store()
    {
        $vehicleId = $_GET['id'];
        $booking = new Booking();
        $booking->name = $_POST['name'];
        $booking->fromdate = $_POST['fromdate'];
        $booking->todate = $_POST['todate'];
        $booking->total = $_POST['price'];
        $booking->status = 'Not confirmed yet';
        $booking->vehicle_id = $vehicleId;
        $booking->save();
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
