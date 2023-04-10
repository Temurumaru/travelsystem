<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ThreadBeanPHP\C as C;

class SignOutController extends Controller
{
	public function SignOut() {
		unset($_SESSION['user']);
		return redirect() -> route('home');
	}
}
