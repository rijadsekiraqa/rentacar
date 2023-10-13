<?php

namespace App\Controllers;

use App\Helper\Session;
use App\Models\User;
use \Core\View;
use \Core\Controller;


class UserController extends Controller
{


    

    public function index()
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
        $loggedInUser = $session->user;
        $users = User::orderBy('id','desc')->get();
        $message = '';
        if(!empty($session->message)){
            $message = $session->message;
        }
        View::renderTemplate('Users/index.html', [
            'users' => $users,
            'username' => $loggedInUser,
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
            // Redirect to an unauthorized page or handle this case accordingly
            header('Location: /login-form'); // Redirect to an unauthorized page
            exit;
        }
        $loggedInUser = $session->user;
        View::renderTemplate('Users/create.html',[
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
            // Redirect to an unauthorized page or handle this case accordingly
            header('Location: /login-form'); // Redirect to an unauthorized page
            exit;
        }
        $user = new User();
        $user->name = $_POST['name'];
        $user->surname = $_POST['surname'];
        $user->email = $_POST['email'];
        $passwordHash = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $user->password = $passwordHash;


        if ($user->save())
        {
            $session->message('User created successfully.');
        }
        header("Location: /admins");
            exit();

    }

    public function edit()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn())
        {
            header('Location: /login-form');
            exit;
        }
        if (!$session->user || $session->client) {
            // Redirect to an unauthorized page or handle this case accordingly
            header('Location: /login-form'); // Redirect to an unauthorized page
            exit;
        }
        $loggedInUser = $session->user;
        $id = $_GET['id'];
        $user = User::findOrFail($id);
        View::renderTemplate('Users/edit.html', [
            'user' => $user,
            'username'=>$loggedInUser
        ]);
    }

    public function update()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn())
        {
            header('Location: /login-form');
            exit;
        }
        if (!$session->user || $session->client) {
            // Redirect to an unauthorized page or handle this case accordingly
            header('Location: /login-form'); // Redirect to an unauthorized page
            exit;
        }
        $id = $_POST['id'];
        $user = User::findOrFail($id);
        $user->name = $_POST['name'];
        $user->surname = $_POST['surname'];
        $user->email = $_POST['email'];
        // Hash the password using bcrypt
        $passwordHash = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $user->password = $passwordHash;
        if($user->save()){
        $session->message('User updated successfully.');
        }
        header("Location: /admins");
    }
  
    public function delete()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn())
        {
            header('Location: /login-form');
            exit;
        }
        if (!$session->user || $session->client) {
            // Redirect to an unauthorized page or handle this case accordingly
            header('Location: /login-form'); // Redirect to an unauthorized page
            exit;
        }
        $id = $_GET['id'];
        $user = User::find($id);
        if($user->delete()){
            $session->message('User deleted successfully.');
        }
        header("Location: /admins");
    }

    public function loginForm()
    {
        $session = Session::getInstance();

        $message = '';
        if(!empty($session->message)){
            $message = $session->message;
        }
        View::renderTemplate('Auth/login.html',['message'=>$message]);
    }

    public function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = User::where('email', $email)->where('password', $password)->latest()->first();
        $session = Session::getInstance();
        if ($user)
        {
            $session->loginUser($user);
            header('Location: /dashboard');
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
        header("Location: /login-form");
    }

    public function changePassword()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn())
        {
            header('Location: /login-form');
            exit;
        }
        if (!$session->user || $session->client) {
            // Redirect to an unauthorized page or handle this case accordingly
            header('Location: /login-form'); // Redirect to an unauthorized page
            exit;
        }

        $loggedInUser = $session->user;
        $user = $loggedInUser;


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
                    $loggedInUser->password = $newPassword;
                    $loggedInUser->save();
                    $messages[] = "Password updated successfully!";
                }
            }
        }
        View::renderTemplate('Users/change-password.html',[
            'username' => $loggedInUser,
            'user' => $user
        ]);



    }

    public function passwordUpdate()
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
        $user = User::findOrFail($id);
        $user->password = $_POST['password'];
        $user->save();
        header("Location: /users/{$id}");

    }



}


