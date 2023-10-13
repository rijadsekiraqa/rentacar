<?php

namespace App\Controllers;

use App\Helper\Session;
use App\Models\Brand;
use \Core\View;
use \Core\Controller;


class BrandController extends Controller
{

    public function __construct()
    {
        $this->session = Session::getInstance();
        if (!$this->session->isSignedIn()) {
            header('Location: /login-form');
            exit;
        }
        if (!$this->session->user || $this->session->client) {
            // Redirect to an unauthorized page or handle this case accordingly
            header('Location: /login-form'); // Redirect to an unauthorized page
            exit;
        }

    }


    public function index()
    {

         $loggedInUser = $this->session->user;
         $message = '';
         if(!empty($session->message)){
            $message = $session->message;
         }
         $brands = Brand::orderBy('id', 'desc')->get();
         View::renderTemplate('Brands/index.html', [
             'brands' => $brands,
             'username' => $loggedInUser,
             'message' => $message
         ]);
    }

    public function create()
    {

        $loggedInUser = $this->session->user;
         View::renderTemplate('Brands/create.html',[
             'username' => $loggedInUser
         ]);
    }

    public function store()
    {

        $brand = new Brand();
        $brand->name = $_POST['name'];
        if ($brand->save()){
           $session->message('Brand created successfully.');
        }
        header("Location: /brands");
    }

    public function edit()
    {
        $id = $_GET['id'];
        $brand = Brand::find($id);
        $loggedInUser = $this->session->user;
        View::renderTemplate('Brands/edit.html', [
            'brand' => $brand,
            'username' => $loggedInUser]);
    }


    public function update()
    {


        $id = $_POST['id'];
        $brand = Brand::find($id);
        $brand->name = $_POST['name'];
        if($brand->save()){
           $session->message('Brand updated successfully.');
        }
        header("Location: /brands");
    }

    public function delete()
    {

        $id = $_GET['id'];
        $brand = Brand::find($id);
        if($brand->delete()){
           $session->message('Brand deleted successfully.');
        }
        header("Location: /brands");
    }



}
