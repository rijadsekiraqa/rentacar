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
        $session = Session::getInstance();
        if (!$session->isSignedIn()) {
            header('Location: /login-form');
            exit;
        }
    }



    public function index()
    {
         $brands = Brand::orderBy('id', 'desc')->get();
         View::renderTemplate('Brands/index.html', ['brands' => $brands]);
    }

    public function create()
    {
         View::renderTemplate('Brands/create.html');
    }

    public function store()
    {
        $brand = new Brand();
        $brand->name = $_POST['name'];
        $brand->save();
        header("Location: /brands");
    }

    public function edit()
    {
        $id = $_POST['id'];
        $brand = Brand::find($id);
        View::renderTemplate('Brands/edit.html', ['brand' => $brand]);
    }


    public function update()
    {
        $id = $_POST['id'];
        $brand = Brand::find($id);
        $brand->name = $_POST['name'];
        $brand->save();
        header("Location: /brands");
    }

    public function delete()
    {
        $id = $_POST['id'];
        $brand = Brand::find($id);
        $brand->delete();
        header("Location: /brands");
    }



}
