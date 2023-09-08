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
         $contacts = Contact::orderBy('id','desc')->get();
         View::renderTemplate('Contacts/index.html',['contacts' => $contacts]);
    }

    public function create()
    {
        
        View::renderTemplate('Contacts/create.html');
    
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
        $id = $_POST['id'];
        $contact = Contact::find($id);
        View::renderTemplate('Contacts/edit.html', ['contact' => $contact]);
    }


    public function update()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn()) {
           header('Location: /login-form');
           exit;
        }
        $id = $_POST['id'];
        $contact = Contact::find($id);
        $contact->name = $_POST['name'];
        $contact->email = $_POST['email'];
        $contact->phone = $_POST['phone'];
        $contact->message = $_POST['message'];
        $contact->save();
        header("Location: /contacts");
    }

    public function delete()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn()) {
           header('Location: /login-form');
           exit;
        }
        $id = $_POST['id'];
        $contact = Contact::find($id);
        $contact->delete();
        header("Location: /contacts");
    }






}
