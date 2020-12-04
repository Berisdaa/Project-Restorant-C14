<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('dashboard', 'Admin\Login::index');
$routes->get('/', 'Front\HomePage::index');

// $routes->get('Kategori/(:any)', 'Admin\Kategori::selectWhere/$1');

$routes->group('Admin', ['filter' => 'Auth'], function ($routes) {

	$routes->add('/', 'Admin\AdminPage::index');
	$routes->add('Kategori', 'Admin\Kategori::read');
	$routes->add('Kategori/create', 'Admin\Kategori::create');
	$routes->add('Kategori/find/(:any)', 'Admin\Kategori::find/$1');
	$routes->add('Kategori/delete/(:any)', 'Admin\Kategori::find/$1');

	$routes->add('Menu', 'Admin\Menu::index');
	$routes->add('Menu/create', 'Admin\Kategori::create');
	$routes->add('Menu/find/(:any)', 'Admin\Menu::find/$1');
	$routes->add('Menu/delete/(:any)', 'Admin\Menu::find/$1');

	$routes->add('Pelanggan', 'Admin\Pelanggan::index');
	$routes->add('Pelanggan/create', 'Admin\Kategori::create');
	$routes->add('Pelanggan/find/(:any)', 'Admin\Pelanggan::find/$1');
	$routes->add('Pelanggan/delete/(:any)', 'Admin\Pelanggan::find/$1');


	$routes->add('Order', 'Admin\Order::index');
	$routes->add('Order/find/(:any)', 'Admin\Order::find/$1');

	$routes->add('OrderDetail', 'Admin\OrderDetail::index');

	$routes->add('User', 'Admin\User::index');
	$routes->add('User/find/(:any)', 'Admin\User::find/$1');
	$routes->add('User/delete/(:any)', 'Admin\User::find/$1');
});

$routes->group('Front', ['filter' => 'Front'], function ($routes) {

	$routes->add('KeranjangBelanja', 'Front\KeranjangBelanja::index');
	$routes->add('KeranjangBelanja/index/(:any)', 'Front\KeranjangBelanja::index/$1');
	$routes->add('KeranjangBelanja/delete/(:any)', 'Front\KeranjangBelanja::delte/$1');
	$routes->add('KeranjangBelanja/tambah/(:any)', 'Front\KeranjangBelanja::tambah/$1');
	$routes->add('KeranjangBelanja/kurang/(:any)', 'Front\KeranjangBelanja::kurang/$1');
	$routes->add('KeranjangBelanja/checkout/(:any)', 'Front\KeranjangBelanja::checkout/$1');
	$routes->add('KeranjangBelanja/checkout', 'Front\KeranjangBelanja::checkout');
	$routes->add('Homepage/histori', 'Front\Homepage::histori');
	$routes->add('Homepage/detail/(:any)', 'Front\Homepage::detail/$1');
});

/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
