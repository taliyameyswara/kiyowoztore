<?php

namespace App\Controllers;
use App\Models\productsModel;

// default controllers

class Home extends BaseController
{
    function __construct()
    {
        helper('form');
        helper('number');
    }
    
    public function index()
    {
        // membuat objek 
        $productsModel = new productsModel();
        $product = $productsModel->findAll(); // ambil semua data dari tabel
        $data['products'] = $product; // diparsing ke this_products / this_home dg var $products

        // return ke tampilan this_home.php pd app/Views
        return view('this_home',$data); 
    }

}

?>
