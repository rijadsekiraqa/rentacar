<?php

namespace App\Controllers;

use App\Helper\Session;
use App\Models\Contact;
use \Core\View;
use \Core\Controller;



class ContactController extends Controller
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
         $contacts = Contact::orderBy('id','desc')->get();
         View::renderTemplate('Contacts/index.html',[
             'contacts' => $contacts,
             'username' => $loggedInUser]);
    }

    public function create()
    {
        $session = Session::getInstance();
        $loggedInClient = null; // Initialize the client as null by default

        // Check if the user is signed in, and if so, get the client object
        if ($session->isSignedIn()) {
            $loggedInClient = $session->client; // Assuming the logged-in client is stored in the 'user' session variable
        }
        View::renderTemplate('Contacts/create.html',['client' => $loggedInClient]);
    
    }

    public function store()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn()) {
           header('Location: /login-form');
           exit;
        }
        $contact = new Contact();
        $contact->name = $_POST['name'];
        $contact->email = $_POST['email'];
        $contact->phone = $_POST['phone'];
        $contact->message = $_POST['message'];
        $contact->save();
        header("Location: /contact-us");
    }

    public function edit()
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
        $id = $_GET['id'];
        $contact = Contact::find($id);
        View::renderTemplate('Contacts/edit.html', [
            'contact' => $contact,
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
        if (!$session->user || $session->client) {
            header('Location: /login-form');
            exit;
        }
        $id = $_GET['id'];
        $contact = Contact::find($id);
        $contact->delete();
        header("Location: /contacts");
    }






}
