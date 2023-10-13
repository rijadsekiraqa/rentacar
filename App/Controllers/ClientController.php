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



    public function index()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn()) {
            header('Location: /login-form');
            exit;
        }

        $loggedInUser = $session->user;
        $message = '';
        if(!empty($session->message)){
            $message = $session->message;
        }
        $clients = Client::orderBy('id','desc')->get();

        View::renderTemplate('Clients/index.html', [
            'clients' => $clients,
            'username' => $loggedInUser,
            'message'=>$message
        ]);
    }



    public function create()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn()) {
            header('Location: /login-form');
            exit;
        }
        $loggedInUser = $session->user;
        View::renderTemplate('Clients/create.html',[
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
        $client = new Client();
        $client->name = $_POST['name'];
        $client->email = $_POST['email'];
        $client->password = $_POST['password'];
        $client->phone = $_POST['phone'];
        if ($client->save()) {
            $session->message('Client created successfully.');
        }
        header("Location: /clients");
    }



    public function edit()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn()) {
            header('Location: /user-login'); // Redirect clients to the user login page
            exit;
        }
        $loggedInUser = $session->user;
        $id = $_GET['id'];
        $client = Client::findOrFail($id);
        View::renderTemplate('Clients/edit.html', [
            'client'=>$client,
            'username' => $loggedInUser
        ]);
    }

    public function delete()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn()) {
            header('Location: /login-form');
            exit;
        }

        $id = $_GET['id'];
        $client = Client::find($id);

        if($client->delete()){
            $session->message('Client deleted successfully.');
        }
        header("Location: /clients");
    }


    public function clientprofile()
    {
        $session = Session::getInstance();

        // Check if the user is logged in
        if (!$session->isSignedIn()) {
            header('Location: /user-login'); // Redirect clients to the user login page
            exit;
        }

        // Check if the logged-in user is a client
        if (!$session->client || $session->user) {
            // User is not a client, handle this case accordingly
            header('Location: /not-authorized'); // Redirect to an unauthorized page
            exit;
        }

        $loggedInClient = $session->client;

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
        $response = [];

        if ($client) {
            $session->loginClient($client);
            $response['success'] = true;
        } else {
            $response['success'] = false;
            $response['errors'] = ['Your email or password is incorrect'];
        }

        header('Content-Type: application/json');
        echo json_encode($response);
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

        $loggedInClient = $session->client;

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
        $loggedInClient = $session->client;

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


