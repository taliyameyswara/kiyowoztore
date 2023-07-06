<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */

 /*
 $routes -> get('/about', 'Page::about', [])
 $routes : objek router
 get: metode pengiriman data ke server
 /about: halaman yg dibuka/request
 Page: controller yg akan menangani request
 about: method pada controller yg menangani request
 */

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// my routing

//---------------user---------------
$routes->get('/', 'Home::index', ['filter' => 'auth']);

//----- route session start -------
$routes->get('/login','AuthController::login');
$routes->add('/login','AuthController::login');
$routes->get('/logout','AuthController::logout');
$routes->get('/register','UserController::register');
$routes->add('/register/create','UserController::create');
//----- route session end -------

//----- route cart start -------
$routes->get('/checkout', 'TransactionController::checkout', ['filter' => 'auth']);
$routes->get('/cart', 'TransactionController::cart_show', ['filter' => 'auth']);
$routes->add('/cart', 'TransactionController::cart_add', ['filter' => 'auth']);
$routes->add('/cart/edit', 'TransactionController::cart_edit', ['filter' => 'auth']);
$routes->add('/cart/delete/(:any)', 'TransactionController::cart_delete/$1', ['filter' => 'auth']);
$routes->add('/cart/clear', 'TransactionController::cart_clear', ['filter' => 'auth']);
// for api raja ongkir and transaction
$routes->get('/cart/getcity','TransactionController::getcity', ['filter' => 'auth']);
$routes->get('/cart/getcost','TransactionController::getcost', ['filter' => 'auth']);
$routes->add('/cart/buy','TransactionController::buy', ['filter' => 'auth']);
//----- route cart start -------

//---------------profile start---------------
$routes->get('/profile','Page::profile', ['filter' => 'auth']);
$routes->add('/profile','UserController::changePassword', ['filter' => 'auth']);
//---------------profile end---------------


//---------------admin---------------



//----- route produk start -------
$routes->get('/products','ProductController::index', ['filter' => 'auth']); //tampilkan data
$routes->add('/products','ProductController::create', ['filter' => 'auth']); // insert data
//(:any) digunakan untuk menangkap seluruh jenis inputan
//products->nama controller, edit->function di controller, nilai parameter
$routes->add('/products/edit/(:any)','ProductController::edit/$1', ['filter' => 'auth']); // edit data
$routes->add('/products/delete/(:any)','ProductController::delete/$1', ['filter' => 'auth']); // hapus data
//----- route produk end -------


//----- route user start -------
$routes->get('/user','UserController::index', ['filter' => 'auth']);
$routes->add('/user/create','UserController::create',['filter' => 'auth']);
$routes->add('/user/edit/(:any)','UserController::edit/$1',['filter' => 'auth']);
$routes->add('/user/delete/(:any)','UserController::delete/$1',['filter' => 'auth']);
//----- route user end -------

//----- route history start -------
$routes->get('/history','HistoryController::history', ['filter' => 'auth']);
//----- route history start -------


$routes->get('/transaction','HistoryController::transaction', ['filter' => 'auth']);
$routes->get('/transaction/completed/(:any)','HistoryController::transaction_completed/$1', ['filter' => 'auth']);
$routes->get('/transaction/incompleted/(:any)','HistoryController::transaction_incompleted/$1', ['filter' => 'auth']);





/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
