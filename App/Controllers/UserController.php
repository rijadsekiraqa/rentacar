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
        $users = User::orderBy('id','desc')->get();
        View::renderTemplate('Users/index.html', ['users' => $users]);
    }

    public function create()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn()) {
            header('Location: /login-form');
            exit;
        }
        View::renderTemplate('Users/create.html');
    }

    public function store()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn()) {
            header('Location: /login-form');
            exit;
        }
        $user = new User();
        $user->name = $_POST['name'];
        $user->surname = $_POST['surname'];
        $user->email = $_POST['email'];
        $user->password = $_POST['password'];
        $user->save();
        header("Location: /users");
    }

    public function edit()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn()) {
            header('Location: /login-form');
            exit;
        }
        $id = $_POST['id'];
        $user = User::findOrFail($id);
        View::renderTemplate('Users/edit.html', ['user'=>$user]);
    }

    public function update()
    {
        $id = $_POST['id'];
        $user = User::findOrFail($id);
        $user->name = $_POST['name'];
        $user->surname = $_POST['surname'];
        $user->email = $_POST['email'];
        $user->password = $_POST['password'];
        $user->save();
        header("Location: /users");
    }
  
    public function delete()
    {
        $id = $_POST['id'];
        $user = User::find($id);
        $user->delete();
        header("Location: /users");
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
        if ($user) {
            $session->login($user); 
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
        if (!$session->isSignedIn()) {
            header('Location: /login-form');
            exit;
        }
        View::renderTemplate('Users/change-password.html');
    }

    public function passwordUpdate()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn()) {
            header('Location: /login-form');
            exit;
        }
        $id = $_POST['id'];
        $user = User::findOrFail($id);
        $user->password = $_POST['password'];
        $user->save();
        header("Location: /users/{$id}");

    }



}


