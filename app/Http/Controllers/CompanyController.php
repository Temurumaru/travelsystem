<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ThreadBeanPHP\C as C;

class CompanyController extends Controller
{
	public function Create(Request $req) {
		$req -> validate([
			'name' => 'required|min:4|max:40',
			'description' => 'max:140'
		]);

		if(C::count('organizations', 'name = ?', [$req -> name]) > 0) {
			return redirect() -> back() -> withErrors(['login' => 'Такая Организация уже существует!']);
		}

		
	}
}
