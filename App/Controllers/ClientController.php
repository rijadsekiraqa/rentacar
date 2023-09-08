<?php

namespace App\Controllers;

use App\Helper\Session;
use App\Models\Booking;
use App\Models\Client;
use App\Models\Vehicle;
use \Core\View;
use \Core\Controller;


class ClientController extends Controller
{


    public function index()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn()) {
            header('Location: /user-login'); // Redirect clients to the user login page
            exit;
        }
        $loggedInClient = $session->user; // Assuming the logged-in client is stored in the 'user' session variable

        View::renderTemplate('Clients/profileclient.html', ['client' => $loggedInClient]);
    }

    public function create()
    {

        View::renderTemplate('Users/create.html');
    }

    public function store()
    {

        $client = new Client();
        $client->name = $_POST['name'];
        $client->surname = $_POST['surname'];
        $client->email = $_POST['email'];
        $client->password = $_POST['password'];
        $client->save();
        header("Location: /profileclient");
    }


    public function edit()
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
    public function update()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn()) {
            header('Location: /user-login'); // Redirect clients to the user login page
            exit;
        }
        $id = $_POST['id'];
        $client = Client::findOrFail($id);
        $client->name = $_POST['name'];
        $client->surname = $_POST['surname'];
        $client->email = $_POST['email'];
        $client->phone = $_POST['phone'];
        $client->address = $_POST['address'];
        $client->password = $_POST['password'];
        $client->save();
        header("Location: /profileclient");
    }

    public function delete()
    {
        $id = $_POST['id'];
        $client = Client::find($id);
        $client->delete();
        header("Location: /users");
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
            header('Location: /profileclient');
            exit;
        } else {
            $session->message("Your email or password is incorrent");
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
        $loggedIn = $session->isSignedIn();
        $bookings = Booking::orderBy('id', 'desc')->with('vehicle')->get();

        foreach ($bookings as $booking) {
            $vehicle = $booking->vehicle;
            if ($vehicle) {
                $vehicle->decodedPhotos = json_decode($vehicle->photo1);
            }
        }

        View::renderTemplate('Clients/mybookings.html', [
            'bookings' => $bookings,
            'loggedIn' => $loggedIn
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
        $client->save();
        header("Location: /index.php");

    }

}


