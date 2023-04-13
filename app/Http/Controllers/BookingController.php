<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ThreadBeanPHP\C as C;

class BookingController extends Controller
{


	public function Delete(Request $req) {
		if(@$req -> id) {
			$busy = C::findOne("busy", "id = ?", [$req -> id]);
			C::trash($busy);
			return "OK";
		}
		return "ERR";
	}
}
