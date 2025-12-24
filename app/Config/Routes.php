<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//HALAMAN UMUM / PUBLIC //
$routes->get('/', 'pages::index');
$routes->get('pages', 'pages::index');
$routes->get('/dokum', 'pages::dokum');

$routes->get('/', 'Home::index');
$routes->get('home', 'Home::index');

$routes->get('/berita', 'Berita1::index');



// (LOGIN & REGISTER)//
$routes->get('/login', 'logreg::login');
$routes->post('/process', 'logreg::loginProcess');

$routes->get('/register', 'logreg::register');
$routes->post('/register/save', 'logreg::saveRegister');

$routes->get('/user/logout', 'logreg::logout');


/*  USER (BANSOS) */
$routes->get('/user/dashboard', 'bansos::dashboard');
$routes->get('/user/profile', 'bansos::profil');
$routes->get('/user/profil', 'bansos::profil');
$routes->get('/user/upload', 'bansos::upload');
$routes->get('/user/ganti', 'bansos::ganti');
$routes->get('/user/status', 'bansos::status');
$routes->post('user/profil/(:num)', 'user::profil/$1');


$routes->post('user/update', 'bansos::updateProfile');
$routes->post('user/uploadSubmit', 'bansos::uploadSubmit');
$routes->post('/upload/(:num)', 'bansos::uploadSubmit/$1');

$routes->get('/status_page', 'bansos::index');


/* ADMIN USER (PENGAJUAN & PENERIMA)*/
$routes->get('/adminuser', 'adminuser::index');
$routes->get('/adminuser/pengajuan', 'adminuser::index');
$routes->get('/adminuser/penerima', 'adminuser::penerima');
$routes->post('/adminuser/penerima', 'adminuser::penerima');

$routes->get('/adminuser/edit/(:num)', 'adminuser::edit/$1');
$routes->post('/adminuser/update/(:num)', 'adminuser::update/$1');
$routes->get('/adminuser/hapus/(:num)', 'adminuser::hapus/$1');

$routes->get('/adminuser/edit_penerima/(:num)', 'adminuser::edit_penerima/$1');

$routes->get('/adminuser/setujui/(:num)', 'adminuser::setujui/$1');
$routes->get('/adminuser/tolak/(:num)', 'adminuser::tolak/$1');

$routes->get('/adminuser/status/(:num)', 'adminuser::status/$1');

$routes->get('adminuser/upload', 'adminuser::upload');
$routes->get('adminuser/upload/(:num)', 'bansos::detail/$1');

$routes->get('adminuser/unduh/(:num)', 'adminuser::unduh/$1');
$routes->get('adminuser/download/(:num)', 'adminuser::download/$1');

$routes->get('adminuser/detail/(:num)', 'bansos::detail/$1');

$routes->get('/adminuser/tdokum', 'adminuser::tdokum');


/* ADMIN DASHBOARD */
$routes->get('admin/dashboard', 'Adminuser::dashboard');


/*  ADMIN NOTIFIKASI */
$routes->get('admin/notifikasi', 'AdminNotifikasi::index');
$routes->get('admin/notifikasi/hapus/(:num)', 'AdminNotifikasi::hapus/$1');
$routes->get('admin/notifikasi/hapusSemua', 'AdminNotifikasi::hapusSemua');
$routes->get('admin/notifikasi/baca/(:num)', 'AdminNotifikasi::baca/$1');


/* ADMIN DOKUMENTASI (admindokum) */
$routes->get('/admindokum/berita', 'admindokum::index');
$routes->get('/admindokum/tambah', 'admindokum::tambah');
$routes->post('/admindokum/simpan', 'admindokum::simpan');
$routes->get('dokum/dokumc', 'dokumc::ccc');
$routes->get('/admindokum/berita', 'admindokum::index');
$routes->get('/admindokum/hapus/(:num)', 'admindokum::hapus/$1');

$routes->get('/dokum/tambah', 'admindokum::tambah');
$routes->post('/dokum/simpan', 'admindokum::simpan');


/* DOKUMC (CONTROLLER dokumc) */
$routes->get('/admindokum', 'dokumc::ccc');
$routes->get('/admindokum/dokumc', 'dokumc::ccc');
$routes->get('/dokumc', 'dokumc::ccc');

$routes->get('/dokumc/tambah', 'dokumc::tambah');
$routes->post('/dokumc/simpan', 'dokumc::simpan');
$routes->get('/dokumc/hapus/(:num)', 'dokumc::hapus/$1');

$routes->get('/admindokum/tambah_dokum', 'dokumc::tambah');
$routes->post('/admindokum/simpan', 'dokumc::simpan');


/*ADMIN STATUS (PROSES PENGAJUAN) */
$routes->post('adminuser/pengajuan', 'AdminUser::pengajuan');
$routes->get('adminuser/pengajuan', 'AdminUser::pengajuan');
$routes->get('adminuser', 'adminuser::index');
$routes->post('adminuser', 'adminuser::index');

$routes->get('/user/status/(:num)', 'Adminstatus::status/$1');
$routes->get('/user/next_step/(:num)', 'Adminstatus::nextStep/$1');
$routes->get('/user/complete_process/(:num)', 'Adminstatus::completeProcess/$1');
$routes->get('/user/reject/(:num)', 'Adminstatus::reject/$1');
$routes->get('/user/status_setuju/(:num)', 'Adminstatus::setujui/$1');
$routes->get('/user/status_tolak/(:num)', 'Adminstatus::tolak/$1');

$routes->group('adminstatus', function($routes) {
    $routes->get('status/(:num)', 'Adminstatus::status/$1');
    $routes->get('next/(:num)', 'Adminstatus::nextStep/$1');
    $routes->get('reject/(:num)', 'Adminstatus::reject/$1');
});


/* WILAYAH */
$routes->get('wilayah/kabupaten/(:num)', 'Wilayah::kabupaten/$1');
$routes->get('wilayah/kecamatan/(:num)', 'Wilayah::kecamatan/$1');
$routes->get('wilayah/kelurahan/(:num)', 'Wilayah::kelurahan/$1');
$routes->get('wilayah/provinsi', 'Wilayah::provinsi');
$routes->get('wilayah/kota', 'Wilayah::kota');
$routes->get('wilayah/kecamatan', 'Wilayah::kecamatan');
$routes->get('wilayah/kelurahan', 'Wilayah::kelurahan');


/* AKSES ROLE BERBASIS MIDDLWARE */
$routes->group('', ['filter' => 'auth'], function($routes) {
});     


//Berita Detail
$routes->get('/berita', 'Berita1::index');  
$routes->get('berita/detail/(:num)', 'Berita1::detail/$1');

$routes->get('/berita/(:num)', 'Berita1::detail/$1'); 
