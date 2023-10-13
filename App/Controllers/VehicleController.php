<?php

namespace App\Controllers;

use App\Helper\Session;
use App\Models\Brand;
use App\Models\Vehicle;
use \Core\View;
use \Core\Controller;


class VehicleController extends Controller
{

    public function index()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn()) {
            header('Location: /login-form');
            exit;
        }
        if (!$session->user || $session->client) {
            header('Location: /login-form');
            exit;
        }
        $message = '';
        if(!empty($session->message)){
            $message = $session->message;
        }
        $loggedInUser = $session->user;
        $vehicles = Vehicle::orderBy('name')->with('brand')->get();
        View::renderTemplate('Vehicles/index.html', [
        'vehicles' => $vehicles,
        'username' =>$loggedInUser,
        'message' => $message
        ]);
    }


    public function create()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn()) {
            header('Location: /login-form');
            exit;
        }
        if (!$session->user || $session->client) {
            header('Location: /login-form');
            exit;
        }
        $loggedInUser = $session->user;
        $brands = Brand::orderBy('name')->get();
        View::renderTemplate('Vehicles/create.html', [
            'brands' => $brands,
            'username' => $loggedInUser
        ]);
    }

    public function store()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn()) {
            header('Location: /login-form');
            exit;
        }
        if (!$session->user || $session->client) {
            header('Location: /login-form');
            exit;
        }
        $photos = [];
        $file_tmp = $_FILES['photo1']['tmp_name'];
        $file_name1 = $_FILES['photo1']['name'];
        $photos[] = $file_name1;
        move_uploaded_file($file_tmp, "../public/uploads/" . $file_name1);

        $file_tmp = $_FILES['photo2']['tmp_name'];
        $file_name2 = $_FILES['photo2']['name'];
        $photos[] = $file_name2;
        move_uploaded_file($file_tmp, "../public/uploads/" . $file_name2);

        $file_tmp = $_FILES['photo3']['tmp_name'];
        $file_name3 = $_FILES['photo3']['name'];
        $photos[] = $file_name3;
        move_uploaded_file($file_tmp, "../public/uploads/" . $file_name3);

        $file_tmp = $_FILES['photo4']['tmp_name'];
        $file_name4 = $_FILES['photo4']['name'];
        $photos[] = $file_name4;
        move_uploaded_file($file_tmp, "../public/uploads/" . $file_name4);

        $file_tmp = $_FILES['photo5']['tmp_name'];
        $file_name5 = $_FILES['photo5']['name'];
        $photos[] = $file_name5;
        move_uploaded_file($file_tmp, "../public/uploads/" . $file_name5);

        $photos = json_encode($photos);

        $vehicle = new Vehicle();
        $vehicle->name = $_POST['name'];
        $vehicle->brand_id = $_POST['brand_id'];
        $vehicle->overview = $_POST['overview'];
        $vehicle->transmission = $_POST['transmission'];
        $vehicle->fuel = $_POST['fuel'];
        $vehicle->cubical = $_POST['cubical'];
        $vehicle->price = $_POST['price'];
        $vehicle->power = $_POST['power'];
        $vehicle->mileage = $_POST['mileage'];
        $vehicle->year = $_POST['year'];
        $vehicle->seat = $_POST['seat'];
        $vehicle->photo = 'file_name';
        $vehicle->photo1 = $photos;
        $vehicle->airconditioner = isset($_POST['airconditioner']) ? true : false;
        $vehicle->powerdoorlocks = isset($_POST['powerdoorlocks']) ? true : false;
        $vehicle->antilock = isset($_POST['antilock']) ? true : false;
        $vehicle->brakeassist = isset($_POST['brakeassist']) ? true : false;
        $vehicle->powersteering = isset($_POST['powersteering']) ? true : false;
        $vehicle->driverairbag = isset($_POST['driverairbag']) ? true : false;
        $vehicle->passengerairbag = isset($_POST['passengerairbag']) ? true : false;
        $vehicle->powerwindows = isset($_POST['powerwindows']) ? true : false;
        $vehicle->cdplayer = isset($_POST['cdplayer']) ? true : false;
        $vehicle->centralock = isset($_POST['centralock']) ? true : false;
        $vehicle->crashsensor = isset($_POST['crashsensor']) ? true : false;
        $vehicle->leatherseats = isset($_POST['leatherseats']) ? true : false;

        if($vehicle->save()){
            $session->message('Vehicle created successfully.');
        }
        header("Location: /vehicles");
    }


    public function edit()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn()) {
            header('Location: /login-form');
            exit;
        }
        if (!$session->user || $session->client) {
            header('Location: /login-form');
            exit;
        }
        $loggedInUser = $session->user;
        $id = $_GET['id'];
        $vehicle = Vehicle::find($id);
        $vehicle->photo1 = json_decode($vehicle->photo1);


        $brands = Brand::orderBy('name')->get();
        View::renderTemplate('Vehicles/edit.html', [
            'vehicle' => $vehicle,
            'brands' => $brands,
            'username' => $loggedInUser
        ]);
    }


    public function update()
    {

        $session = Session::getInstance();
        if (!$session->isSignedIn()) {
            header('Location: /login-form');
            exit;
        }
        if (!$session->user || $session->client) {
            // Redirect to an unauthorized page or handle this case accordingly
            header('Location: /login-form'); // Redirect to an unauthorized page
            exit;
        }

        $id = $_POST['id'];
        $vehicle = Vehicle::find($id);

        $photos = json_decode($vehicle->photo1);

        for ($i = 1; $i <= 5; $i++) {
            $photoKey = 'photo' . $i;

            // Check if a new file is uploaded for the current photo
            if (isset($_FILES[$photoKey]) && $_FILES[$photoKey]['error'] !== UPLOAD_ERR_NO_FILE) {
                $file_tmp = $_FILES[$photoKey]['tmp_name'];
                $file_name = $_FILES[$photoKey]['name'];
                // Update the photo with the new file
                $photos[$i - 1] = $file_name;
                move_uploaded_file($file_tmp, "../public/uploads/" . $file_name);
            }
        }


        $vehicle->name = $_POST['name'];
        $vehicle->brand_id = $_POST['brand_id'];
        $vehicle->overview = $_POST['overview'];
        $vehicle->transmission = $_POST['transmission'];
        $vehicle->fuel = $_POST['fuel'];
        $vehicle->cubical = $_POST['cubical'];
        $vehicle->price = $_POST['price'];
        $vehicle->power = $_POST['power'];
        $vehicle->mileage = $_POST['mileage'];
        $vehicle->year = $_POST['year'];
        $vehicle->seat = $_POST['seat'];
        $vehicle->photo1 = json_encode($photos);
        $vehicle->airconditioner = isset($_POST['airconditioner']) ? true : false;
        $vehicle->powerdoorlocks = isset($_POST['powerdoorlocks']) ? true : false;
        $vehicle->antilock = isset($_POST['antilock']) ? true : false;
        $vehicle->brakeassist = isset($_POST['brakeassist']) ? true : false;
        $vehicle->powersteering = isset($_POST['powersteering']) ? true : false;
        $vehicle->driverairbag = isset($_POST['driverairbag']) ? true : false;
        $vehicle->passengerairbag = isset($_POST['passengerairbag']) ? true : false;
        $vehicle->powerwindows = isset($_POST['powerwindows']) ? true : false;
        $vehicle->cdplayer = isset($_POST['cdplayer']) ? true : false;
        $vehicle->centralock = isset($_POST['centralock']) ? true : false;
        $vehicle->crashsensor = isset($_POST['crashsensor']) ? true : false;
        $vehicle->leatherseats = isset($_POST['leatherseats']) ? true : false;
        if($vehicle->save()){
            $session->message('Vehicle updated successfully.');
        }


        header("Location: /vehicles");

    }


    public function delete()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn()) {
            header('Location: /login-form');
            exit;
        }
        if (!$session->user || $session->client) {
            // Redirect to an unauthorized page or handle this case accordingly
            header('Location: /login-form'); // Redirect to an unauthorized page
            exit;
        }

        $id = $_GET['id'];
        $vehicle = Vehicle::find($id);
        if($vehicle->delete()){
            $session->message('Vehicle deleted successfully.');
        }
        header("Location: /vehicles");
    }


}
