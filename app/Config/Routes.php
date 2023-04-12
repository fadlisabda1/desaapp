<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
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
//random
//halaman utama
$routes->get('/', 'administrasiumum\peraturanDesaController::index');
$routes->get('/login', 'homeController::login');
$routes->get('/register', 'homeController::register');
$routes->get('/forgot', 'homeController::forgot');
$routes->get('/reset-password', 'homeController::reset');
//profil desa
$routes->get('/profil', 'profilPemerintahanController::index');
//berita
$routes->get('/beritaController/detail/(:segment)', 'beritaController::detail/$1');
$routes->get('/beritaController/create', 'beritaController::create');
$routes->post('/beritaController/save', 'beritaController::save');
$routes->get('/beritaController/edit/(:segment)', 'beritaController::edit/$1');
$routes->delete('/beritaController/delete/(:num)', 'beritaController::delete/$1');
$routes->post('/beritaController/update/(:segment)', 'beritaController::update/$1');
//epasar
$routes->get('/epasarController/create', 'epasarController::create');
$routes->post('/epasarController/save', 'epasarController::save');
$routes->get('/epasarController/detail/(:num)', 'epasarController::detail/$1');
$routes->get('/epasarController/edit/(:segment)', 'epasarController::edit/$1');
$routes->post('/epasarController/update/(:segment)', 'epasarController::update/$1');
$routes->delete('/epasarController/delete/(:num)', 'epasarController::delete/$1');
//transaksi epasar
$routes->get('/transaksiController/index', 'transaksiController::index');
$routes->get('/transaksiController/create/(:num)', 'transaksiController::create/$1');
$routes->post('/transaksiController/save', 'transaksiController::save');
$routes->get('/transaksiController/edit/(:segment)/(:segment)', 'transaksiController::edit/$1/$2');
$routes->post('/transaksiController/update/(:segment)', 'transaksiController::update/$1');
$routes->delete('/transaksiController/delete/(:num)', 'transaksiController::delete/$1');
//User List
$routes->get('/admin', 'adminController::index', ['filter' => 'role:admin']);
$routes->get('/admin/index', 'adminController::index', ['filter' => 'role:admin']);
$routes->get('/admin/(:num)', 'adminController::detail/$1', ['filter' => 'role:admin']);
$routes->match(['post', 'get'], '/user', 'userController::index');
//delete user list
$routes->delete('/adminController/delete', 'adminController::delete');
$routes->delete('/adminController/ceklisDeleteButton', 'adminController::ceklisDeleteButton');
//my profile
$routes->post('/user/edit', 'userController::edit');
$routes->post('/user/action', 'userController::action');
//peraturan desa 
$routes->post('/peraturanDesaController/ambilData', 'administrasiumum\peraturanDesaController::ambilData');
$routes->post('/peraturanDesaController/action', 'administrasiumum\peraturanDesaController::action');
$routes->delete('/peraturanDesaController/delete', 'administrasiumum\peraturanDesaController::delete');
$routes->delete('/peraturanDesaController/ceklisDeleteButton', 'administrasiumum\peraturanDesaController::ceklisDeleteButton');
$routes->post('/peraturanDesaController/edit', 'administrasiumum\peraturanDesaController::edit');
//Inventaris dan Kekayaan Desa
$routes->get('/inventarisKekayaanDesaController/index', 'administrasiumum\inventarisKekayaanDesaController::index');
$routes->post('/inventarisKekayaanDesaController/ambilData', 'administrasiumum\inventarisKekayaanDesaController::ambilData');
$routes->post('/inventarisKekayaanDesaController/action', 'administrasiumum\inventarisKekayaanDesaController::action');
$routes->post('/inventarisKekayaanDesaController/edit', 'administrasiumum\inventarisKekayaanDesaController::edit');
$routes->delete('/inventarisKekayaanDesaController/delete', 'administrasiumum\inventarisKekayaanDesaController::delete');
$routes->delete('/inventarisKekayaanDesaController/ceklisDeleteButton', 'administrasiumum\inventarisKekayaanDesaController::ceklisDeleteButton');
// pelayanan desa
$routes->get('/layananUmumController/create', 'pelayanandesa\layananUmumController::create');
$routes->post('/layananUmumController/save', 'pelayanandesa\layananUmumController::save');
$routes->get('/layananUmumController/edit/(:segment)', 'pelayanandesa\layananUmumController::edit/$1');
$routes->post('/layananUmumController/update/(:segment)', 'pelayanandesa\layananUmumController::update/$1');
$routes->get('/layananUmumController/delete/(:num)', 'pelayanandesa\layananUmumController::delete/$1');
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
