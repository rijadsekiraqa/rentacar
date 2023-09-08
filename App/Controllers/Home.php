<?php

namespace App\Controllers;
use App\Helper\Session;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Brand;
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
        $usercount = User::count();
        $brandCount = Brand::count();
        $vehicleCount = Vehicle::count();
        $contactCount = Contact::count();
        View::renderTemplate('Dashboard/index.html', ['userCount' => $usercount,'brandCount' => $brandCount,'vehicleCount' => $vehicleCount,'contactCount'=>$contactCount]);
    }

//    public function profileClient()
//    {
//
//        View::renderTemplate('Clients/profileclient.html');
//    }





}
