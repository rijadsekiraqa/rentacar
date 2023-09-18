<?php

namespace App\Controllers;

use App\Helper\Session;
use App\Models\Booking;
use App\Models\Client;
use App\Models\User;
use App\Models\Vehicle;
use \Core\View;
use \Core\Controller;


class ClientController extends Controller
{



    public function index(){

        $session = Session::getInstance();
        if (!$session->isSignedIn()) {
            header('Location: /login-form');
            exit;
        }
        $clients = Client::orderBy('id','desc')->get();
        View::renderTemplate('Clients/index.html', ['clients' => $clients]);
    }

    public function create()
    {

        View::renderTemplate('Clients/create.html');
    }

    public function store()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn()) {
            header('Location: /login-form');
            exit;
        }

        $client = new Client();
        $client->name = $_POST['name'];
        $client->email = $_POST['email'];
        $client->password = $_POST['password'];
        $client->phone = $_POST['phone'];
        $client->save();

    }

    public function edit()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn()) {
            header('Location: /user-login'); // Redirect clients to the user login page
            exit;
        }

        $id = $_GET['id'];
        $client = Client::findOrFail($id);
        View::renderTemplate('Clients/edit.html', ['client'=>$client]);
    }

    public function delete()
    {
        $id = $_GET['id'];
        $client = Client::find($id);
        $client->delete();
        header("Location: /clients");
    }


    public function clientprofile()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn()) {
            header('Location: /user-login'); // Redirect clients to the user login page
            exit;
        }
        $loggedInClient = $session->user; // Assuming the logged-in client is stored in the 'user' session variable

        View::renderTemplate('Clients/profileclient.html', ['client' => $loggedInClient]);
    }


    public function editprofile()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn()) {
            header('Location: /user-login'); // Redirect clients to the user login page
            exit;
        }

        $id = $_POST['id'];
        $client = Client::findOrFail($id);
        View::renderTemplate('Clients/profileclient.html', ['client'=>$client]);
    }
    public function updateprofile()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn()) {
            header('Location: /user-login'); // Redirect clients to the user login page
            exit;
        }
        $id = $_POST['id'];
        $client = Client::findOrFail($id);
        $client->name = $_POST['name'];
        $client->email = $_POST['email'];
        $client->phone = $_POST['phone'];
        $client->address = $_POST['address'];
        $client->save();
        header("Location: /profileclient");
    }



    public function loginForm()
    {
        $session = Session::getInstance();
        $message = '';
        if(!empty($session->message)){
            $message = $session->message;
        }
        View::renderTemplate('Auth/userlogin.html',['message'=>$message]);
    }

    public function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $client = Client::where('email', $email)->where('password', $password)->latest()->first();
        $session = Session::getInstance();

        if ($client) {
            $session->login($client);
            // Redirect to the referring URL
            $referer = $_SERVER['HTTP_REFERER'] ?? '/';
            header("Location: $referer");
            exit;
        } else {
            $session->message("Your email or password is incorrect");
            $this->loginForm();
        }
    }


    public function logout ()
    {
        $session = Session::getInstance();
        $session->logout();
        header("Location: /index.php");
    }




    public function updatepassword()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn()) {
            header('Location: /user-login');
            exit;
        }

        $loggedInClient = $session->user;

        $errors = [];
        $messages = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $currentPassword = $_POST['password'];
            $newPassword = $_POST['newpassword'];

            // Check if new password is the same as the current password
            if ($newPassword === $currentPassword) {
                $errors[] = "New password cannot be the same as the current password.";
            } else {
                $confirmPassword = $_POST['confirmpassword'];

                if ($newPassword !== $confirmPassword) {
                    $errors[] = "New password and confirm password do not match.";
                } else {
                    // Update the user's password
                    $loggedInClient->password = $newPassword;
                    $loggedInClient->save();
                    $messages[] = "Password updated successfully!";
                }
            }
        }

        View::renderTemplate('Clients/updatepassword.html', [
            'client' => $loggedInClient,
            'errors' => $errors,
            'messages' => $messages,
        ]);
    }


    public function mybookings()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn()) {
            header('Location: /user-login');
            exit;
        }

        // Get the currently logged-in client
        $loggedInClient = $session->user;

        // Fetch the client's bookings using the relationship
        $bookings = $loggedInClient->bookings()
            ->orderBy('id', 'desc')
            ->with('vehicle')
            ->get();

        foreach ($bookings as $booking) {
            $vehicle = $booking->vehicle;
            if ($vehicle) {
                $vehicle->decodedPhotos = json_decode($vehicle->photo1);
            }
        }

        View::renderTemplate('Clients/mybookings.html', [
            'bookings' => $bookings,
            'client' => $loggedInClient
        ]);
    }




    public function signupform()
    {
        View::renderTemplate('Auth/signupform.html');
    }

    public function register()
    {

        $client = new Client();
        $client->name = $_POST['name'];
        $client->email = $_POST['email'];
        $client->password = $_POST['password'];
        $client->phone = $_POST['phone'];
        $client->address = $_POST['address'];
        $client->save();
        header("Location: /index.php");

    }

}


