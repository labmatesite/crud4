<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['insert'] = 'home/insert';
$route['update/:num'] = 'home/update';
$route['updatedata'] = 'home/updatedata';
$route['delete/:num'] = 'home/deletedata';



