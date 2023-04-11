<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ThreadBeanPHP\C as C;

class AdminController extends Controller
{
	public function Create(Request $req) {
		$req -> validate([
			'login' => 'required|min:4|max:40|regex:/^[a-z0-9_]*$/',
			'password' => 'required|min:6|max:128|regex:/^[a-zA-Z0-9_]*$/',
			'full_name' => 'required|min:4|max:40',
			'description' => 'max:140'
		]);

		if(C::count('admins', 'login = ?', [$req -> login]) > 0) {
			return redirect() -> back() -> withErrors(['login' => 'Такой пользователь уже существует!']);
		}

		$admin = C::dispense("admins");

		$admin -> login = $req -> login;
		$admin -> password = hash('sha256', $req -> password);
		$admin -> full_name = $req -> full_name;
		$admin -> permission = "admin";
		$admin -> supreme = false;
		$admin -> description = $req -> description;

		C::store($admin);

		return redirect() -> route('admin') -> with('success', 'Администратор "'.$req -> login.'" создан ✔️');
	}

	public function Update(Request $req) {
		$req -> validate([
			'id' => 'required|numeric',
			'login' => 'required|min:4|max:40|regex:/^[a-z0-9_]*$/',
			'full_name' => 'required|min:4|max:40',
			'description' => 'max:140'
		]);

		if(C::count('admins', 'id != ? AND login = ?', [$req -> id, $req -> login]) > 0) {
			return redirect() -> back() -> withErrors(['login' => 'Такой Администратор уже существует!']);
		}

		$admin = C::findOne("admins", "id = ?", [$req -> id]);

		$admin -> login = $req -> login;
		$admin -> full_name = $req -> full_name;
		$admin -> description = $req -> description;

		C::store($admin);

		return redirect() -> route('admin') -> with('success', 'Администратор "'.$req -> login.'" изменён ✔️');
	}

	public function Delete(Request $req) {
		if(isset($req -> id)) {
			$admin = C::findOne("admins", "id = ?", [$req -> id]);
			C::trash($admin);
			return "OK";
		} else {
			return "ERR";
		}
	}
}
