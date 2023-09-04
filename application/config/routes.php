<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
// $route['default_controller'] = 'welcome';
$route['default_controller'] = 'main';
$route['berita/(:any)'] = 'main/berita/$1';
$route['pelayanan/(:any)'] = 'main/pelayanan/$1';
$route['pengumuman/(:any)'] = 'main/pengumuman/$1';
$route['artikel/(:any)'] = 'main/artikel/$1';
// sampai sini postingan
$route['layanan/(:any)'] = 'main/cari_menu/layanan/$1';
$route['profil/(:any)'] = 'main/cari_menu/profil/$1';
$route['informasi/(:any)'] = 'main/cari_menu/informasi/$1';
$route['bank-data/download/(:num)'] = 'BankDataController/download/$1';
$route['bank-data'] = 'BankDataController';
$route['daftar-tamu'] = 'main/daftar_tamu';
$route['profil'] = 'main/profil';
$route['login'] = 'main/login';
$route['admin'] = 'main/login';
$route['galeri'] = 'main/galeri';
$route['e-survey'] = 'main/survey';
$route['pengaduan'] = 'main/pengaduan';
$route['berita'] = 'main/pagger';
$route['search'] = 'main/search';
// $route['admin/menu'] = 'admin/NewsController';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
