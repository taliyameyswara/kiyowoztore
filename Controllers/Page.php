<?php

namespace App\Controllers;
use App\Models\productsModel; //utk menggunakan productsModel pada Models


class Page extends BaseController{
    // user view
    // membuat controller keranjang
    public function cart(){
        // return ke tampilan this_cart.php pd app/Views
        return view('this_cart');
    }

    // contrtoller history
    public function history(){
        // return ke tampilan this_history.php pd app/Views
        return view('this_history');
    }

     // contrtoller profile
     public function profile(){
        // return ke tampilan this_profile.php pd app/Views
        return view('this_profile');
    }


    // admin view
    // membuat controller produk
    public function products(){
        // membuat objek 
        $productsModel = new productsModel();
        $product = $productsModel->findAll(); // ambil semua data dari tabel
        $data['products'] = $product; // diparsing ke this_products / this_home dg var $products

        // return ke tampilan this_products.php pd app/Views
        return view('this_products',$data); 
    }

     // contrtoller user
    public function user(){
        // return ke tampilan this_user.php pd app/Views
        return view('this_user');
    }

    // contrtoller transaction
    public function transaction(){
        // return ke tampilan this_transaction.php pd app/Views
        return view('this_transaction');
    }
    // contrtoller transaction


}

?>