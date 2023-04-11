<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ThreadBeanPHP\C as C;

class AgentController extends Controller
{
	public function Create(Request $req) {
		$req -> validate([
			'org' => 'required|numeric',
			'login' => 'required|min:4|max:40|regex:/^[a-z0-9_]*$/',
			'password' => 'required|min:6|max:128|regex:/^[a-zA-Z0-9_]*$/',
			'description' => 'max:140'
		]);

		if(C::count('companys', 'id = ?', [$req -> org]) <= 0) {
			return redirect() -> back() -> withErrors(['org' => 'Такой компании не существует!']);
		}

		if(C::count('agents', 'login = ?', [$req -> login]) > 0) {
			return redirect() -> back() -> withErrors(['login' => 'Такой пользователь уже существует!']);
		}

		$agent = C::dispense("agents");

		$agent -> login = $req -> login;
		$agent -> password = hash('sha256', $req -> password);
		$agent -> company = $req -> org;
		$agent -> permission = "agent";
		$agent -> description = $req -> description;

		C::store($agent);

		return redirect() -> route('admin') -> with('success', 'Администратор "'.$req -> login.'" создан ✔️');
	}

	public function Update(Request $req) {
		$req -> validate([
			'id' => 'required|numeric',
			'login' => 'required|min:4|max:40|regex:/^[a-z0-9_]*$/',
			'description' => 'max:140'
		]);

		if(C::count('agents', 'id != ? AND login = ?', [$req -> id, $req -> login]) > 0) {
			return redirect() -> back() -> withErrors(['login' => 'Такой пользователь уже существует!']);
		}

		$admin = C::findOne("agents", "id = ?", [$req -> id]);

		$admin -> login = $req -> login;
		$admin -> description = $req -> description;

		C::store($admin);

		return redirect() -> route('admin') -> with('success', 'Администратор "'.$req -> login.'" изменён ✔️');
	}

	public function Delete(Request $req) {
		if(isset($req -> id)) {
			$agent = C::findOne("agents", "id = ?", [$req -> id]);
			C::trash($agent);
			return "OK";
		} else {
			return "ERR";
		}
	}
}
