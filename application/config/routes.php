<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'C_Index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'C_Auth/login';
$route['logout'] = 'C_Auth/logout';
$route['auth']['POST'] = 'C_Auth/auth';

$route['dashboard'] = 'C_Index/dashboard';

$route['C_Pegawai'] = 'C_Pegawai';
$route['C_Pegawai/(:any)'] = 'C_Pegawai/$1';
$route['C_Pegawai/(:any)/(:any)'] = 'C_Pegawai/$1/$2';
$route['C_Pegawai/(:any)/(:any)/(:any)'] = 'C_Pegawai/$1/$2/$3';

$route['C_Dipa'] = 'C_Dipa';
$route['C_Dipa/(:any)'] = 'C_Dipa/$1';
$route['C_Dipa/(:any)/(:any)'] = 'C_Dipa/$1/$2';
$route['C_Dipa/(:any)/(:any)/(:any)'] = 'C_Dipa/$1/$2/$3';

$route['C_Surat'] = 'C_Surat';
$route['C_Surat/(:any)'] = 'C_Surat/$1';
$route['C_Surat/(:any)/(:any)'] = 'C_Surat/$1/$2';
$route['C_Surat/(:any)/(:any)/(:any)'] = 'C_Surat/$1/$2/$3';

$route['C_Kendaraan'] = 'C_Kendaraan';
$route['C_Kendaraan/(:any)'] = 'C_Kendaraan/$1';
$route['C_Kendaraan/(:any)/(:any)'] = 'C_Kendaraan/$1/$2';
$route['C_Kendaraan/(:any)/(:any)/(:any)'] = 'C_Kendaraan/$1/$2/$3';

$route['C_Keberangkatan'] = 'C_Keberangkatan';
$route['C_Keberangkatan/(:any)'] = 'C_Keberangkatan/$1';
$route['C_Keberangkatan/(:any)/(:any)'] = 'C_Keberangkatan/$1/$2';
$route['C_Keberangkatan/(:any)/(:any)/(:any)'] = 'C_Keberangkatan/$1/$2/$3';

$route['C_Tujuan'] = 'C_Tujuan';
$route['C_Tujuan/(:any)'] = 'C_Tujuan/$1';
$route['C_Tujuan/(:any)/(:any)'] = 'C_Tujuan/$1/$2';
$route['C_Tujuan/(:any)/(:any)/(:any)'] = 'C_Tujuan/$1/$2/$3';

$route['C_Input'] = 'C_Input';
$route['C_Input/(:any)'] = 'C_Input/$1';
$route['C_Input/(:any)/(:any)'] = 'C_Input/$1/$2';
$route['C_Input/(:any)/(:any)/(:any)'] = 'C_Input/$1/$2/$3';

$route['C_Cetak'] = 'C_Cetak';
$route['C_Cetak/(:any)'] = 'C_Cetak/$1';
$route['C_Cetak/(:any)/(:any)'] = 'C_Cetak/$1/$2';
$route['C_Cetak/(:any)/(:any)/(:any)'] = 'C_Cetak/$1/$2/$3';