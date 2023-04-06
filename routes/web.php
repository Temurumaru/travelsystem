<?php

use Illuminate\Support\Facades\Route;
use RedBeanPHP\R as R;
use RedBeanPHP\Util\DispenseHelper as RDH;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

define('APP_NAME', getenv('APP_NAME'));

$DB_TYPE = getenv('DB_CONNECTION');
$DB_HOST = getenv('DB_HOST');
$DB_NAME = getenv('DB_DATABASE');
$DB_USER = getenv('DB_USERNAME');
$DB_PASS = getenv('DB_PASSWORD');

R::setup($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASS);
RDH::setEnforceNamingPolicy(false);

if(!R::testConnection()) {
  exit("There is no connection to the database :(");
}

unset($DB_TYPE);
unset($DB_HOST);
unset($DB_NAME);
unset($DB_USER);
unset($DB_PASS);

if(@$_SESSION['user'] -> remember) {
  session_start();
} else {
  session_start([
    'cookie_lifetime' => 43200,
  ]);
}

$p = "App\\Http\\Controllers\\";


// Views

Route::get('/', function () {
  return redirect() -> route('sign_in');
}) -> name('home');

Route::get('/sign_in', function () {
  // if(@$_SESSION['user'] -> premission == "admin") {
  //   return redirect() -> route('admin');
  // } else if(@$_SESSION['user'] -> premission == "agent") {
  //   return redirect() -> route('agent');
  // } else {
  return  view('sign_in');
  // }
}) -> name('sign_in');

// Admin segment

// if(@$_SESSION['user'] -> premission == "admin") {
  Route::get('/admin', function () {
    return view('admin.home');
  }) -> name('admin');

  Route::get('/admin_tour_actives', function () {
    return view('admin.tour_actives');
  }) -> name('admin_tour_actives');

  Route::get('/admin_tour_old', function () {
    return view('admin.tour_old');
  }) -> name('admin_tour_old');
// }

// if(@$_SESSION['user'] -> premission == "agent") {
  Route::get('/agent', function () {
    return view('agent.home');
  }) -> name('agent');

  Route::get('/tour', function () {
    return view('agent.tour');
  }) -> name('tour');

  Route::get('/tour_booked', function () {
    return view('agent.tour_booked');
  }) -> name('tour_booked');

  Route::get('/tour_actives', function () {
    return view('agent.tour_actives');
  }) -> name('tour_actives');

  Route::get('/tour_old', function () {
    return view('agent.tour_old');
  }) -> name('tour_old');
// }


// Controllers

// Route::post(
//   '/sign_in_validate', 
//   $p.'SignInController@SignIn'
// ) -> name('SignInValidate');

if(@$_SESSION['user']) {  
//   Route::post(
//     '/create_client', 
//     $p.'ClientController@Create'
//   ) -> name('CreateClient');
}