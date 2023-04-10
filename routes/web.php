<?php

use Illuminate\Support\Facades\Route;
use ThreadBeanPHP\C as C;
use ThreadBeanPHP\Util\DispenseHelper as CDH;

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

$p = "App\\Http\\Controllers\\";

$DB_TYPE = getenv('DB_CONNECTION');
$DB_HOST = getenv('DB_HOST');
$DB_NAME = getenv('DB_DATABASE');
$DB_USER = getenv('DB_USERNAME');
$DB_PASS = getenv('DB_PASSWORD');

C::setup($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASS);
CDH::setEnforceNamingPolicy(false);

if(!C::testConnection()) {
  exit("There is no connection to the database :(");
}

unset($DB_TYPE);
unset($DB_HOST);
unset($DB_NAME);
unset($DB_USER);
unset($DB_PASS);


session_start();


if(@$_COOKIE['remember'] != "have") {
  unset($_SESSION['user']);
} elseif(isset($_SESSION['user'])) {
  $admin = C::findOne("admins", "login = ?", [$_SESSION['user'] -> login]);

	$agent = C::findOne("agents", "login = ?", [$_SESSION['user'] -> login]);

  if(isset($admin)) {
		$_SESSION['user'] = $admin;
	} elseif(isset($agent)) {
		$_SESSION['user'] = $agent;
	}
} else {
  setcookie('remember', '');
  unset($_SESSION['user']);
}


// Views

Route::get('/', function () {
  return redirect() -> route('sign_in');
}) -> name('home');

Route::get('/sign_in', function () {
  if(@$_SESSION['user'] -> permission == "admin") {
    return redirect() -> route('admin');
  } elseif(@$_SESSION['user'] -> permission == "agent") {
    return redirect() -> route('agent');
  } else {
    return view('sign_in');
  }
}) -> name('sign_in');

Route::post(
  '/SignIn', 
  $p.'SignInController@SignIn'
) -> name('SignIn');


if(@$_SESSION['user']) {

  // Admin segment
  
  if($_SESSION['user'] -> permission == "admin") {
    Route::get('/admin', function () {
      return view('admin.home');
    }) -> name('admin');

    Route::get('/admin_create', function () {
      return view('admin.admin_create');
    }) -> name('admin_create');

    Route::get('/admin_tour_create', function () {
      return view('admin.admin_tour_create');
    }) -> name('admin_tour_create');

    Route::get('/admin_tour_update', function () {
      return view('admin.admin_tour_update');
    }) -> name('admin_tour_update');

    Route::get('/admin_company_create', function () {
      return view('admin.admin_company_create');
    }) -> name('admin_company_create');

    Route::get('/admin_agent_create', function () {
      return view('admin.admin_agent_create');
    }) -> name('admin_agent_create');

    Route::get('/admin_tour_actives', function () {
      return view('admin.tour_actives');
    }) -> name('admin_tour_actives');

    Route::get('/admin_tour_old', function () {
      return view('admin.tour_old');
    }) -> name('admin_tour_old');

    // Route::post(
    //   '/create_client', 
    //   $p.'ClientController@Create'
    // ) -> name('CreateClient');
  }

  // Agent segment

  if($_SESSION['user'] -> permission == "agent") {
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
  }

  Route::get(
    '/SignOut', 
    $p.'SignOutController@SignOut'
  ) -> name('SignOut');

}