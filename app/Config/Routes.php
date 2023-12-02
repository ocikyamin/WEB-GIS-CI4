<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
$routes->get('/', 'Home::index');
$routes->get('/daftar', 'Home::Daftar');
$routes->post('/daftar', 'Home::ProsesDaftar');

// Testimoni 
$routes->post('/testimoni', 'Home::SimpanTestimoni');

$routes->get('/login', 'Login::index');
$routes->post('/login', 'Login::LoginCek');

// Wilayah 
$routes->post('wilayah/kab', 'Home::GetKabupaten');
$routes->post('wilayah/kec', 'Home::GetKecamatan');

$routes->get('map/prov', 'Home::FilterProvinsi');

// Detail 
$routes->get('alumni/detail/(:num)', 'Home::Detail/$1');


// Admins 
$routes->group('admin', static function ($routes) {
    $routes->get('/', 'Admin::index');
    $routes->get('wilayah/provinsi', 'Admin::Wilayah');
    $routes->get('provinsi/add', 'Admin::AddProvinsi');
    $routes->post('provinsi/save', 'Admin::SaveProvinsi');
    $routes->get('provinsi/edit', 'Admin::EditProvinsi');
    $routes->post('provinsi/edit', 'Admin::UpdateProvinsi');
    $routes->post('hapus', 'Admin::HapusRow');
    // Kab 
    $routes->get('kabupaten/add', 'Admin::AddKabupaten');
    $routes->post('kabupaten/save', 'Admin::SaveKabupaten');
    $routes->get('kabupaten/edit', 'Admin::EditKabupaten');
    $routes->post('kabupaten/edit', 'Admin::UpdateKabupaten');
    
    $routes->get('wilayah/provinsi/(:num)', 'Admin::ListKabupaten/$1');

    // Kec
    $routes->get('wilayah/kabupaten/(:num)', 'Admin::ListKecamatan/$1');
    $routes->get('kecamatan/add', 'Admin::AddKecamatan');
    $routes->post('kecamatan/save', 'Admin::SaveKecamatan');
    $routes->get('kecamatan/edit', 'Admin::EditKecamatan');
    $routes->post('kecamatan/edit', 'Admin::UpdateKecamatan');

// Pekerjaan
    $routes->get('pekerjaan', 'Admin::ListPekerjaan');
    $routes->get('pekerjaan/add', 'Admin::AddPekerjaan');
    $routes->post('pekerjaan/save', 'Admin::SavePekerjaan');
    $routes->get('pekerjaan/edit', 'Admin::EditPekerjaan');
    $routes->post('pekerjaan/update', 'Admin::UpdatePekerjaan');

    // Alumni 
    $routes->get('alumni/all', 'Admin::ListAlumni');
    $routes->get('alumni/detail/(:num)', 'Admin::Detail/$1');
    $routes->get('alumni/print/(:num)', 'Admin::PrintDetail/$1');

    $routes->get('alumni/tahun', 'Admin::FilterTahun');
    $routes->get('alumni/prov', 'Admin::FilterProvinsi');
    $routes->get('alumni/pekerjaan', 'Admin::FilterPekerjaan');

// Profile 
$routes->get('profile', 'Admin::Profile');
$routes->post('profile', 'Admin::UpdateProfile');
$routes->post('profile/password', 'Admin::UpdatePassword');

// Testimoni 
$routes->get('testimoni', 'Admin::ListTestimoni');
$routes->get('testimoni/edit', 'Admin::EditTestimoni');

$routes->get('logout', 'Admin::Logout');


// Laporan 
$routes->get('laporan', 'Laporan::index');
$routes->get('laporan/tahun/(:any)', 'Laporan::Pertahun/$1');
$routes->get('laporan/prov/(:any)', 'Laporan::Provinsi/$1');
$routes->get('laporan/kab/(:any)', 'Laporan::Kabupaten/$1');


    
    
   
});

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
