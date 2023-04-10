<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use ThreadBeanPHP\C as C;

class SignInController extends Controller
{
	public function SignIn(Request $req) {
		$req -> validate([
			'username' => 'required|max:40',
			'password' => 'required|max:128',
			'' => [
				Rule::in([true, false])
			]
		]);
		
		$admin = C::findOne("admins", "login = ? AND password = ?", [$req -> username, hash('sha256', $req -> password)]);

		$agent = C::findOne("agents", "login = ? AND password = ?", [$req -> username, hash('sha256', $req -> password)]);
		// dd($agent);
		if(isset($admin)) {
			$admin -> remember = (bool)$req -> remember;
			C::store($admin);

			$_SESSION['user'] = $admin;
			if((bool)$_SESSION['user'] -> remember) {
				setcookie('remember', 'have', time() + 8035200);
			} else {
				setcookie('remember', 'have', time() + 43200);
			}
		} elseif(isset($agent)) {
			$agent -> remember = (bool)$req -> remember;
			C::store($agent);

			$_SESSION['user'] = $agent;
			if((bool)$_SESSION['user'] -> remember) {
				setcookie('remember', 'have', time() + 8035200);
			} else {
				setcookie('remember', 'have', time() + 43200);
			}
		} else {
			return redirect() -> route('sign_in') -> withErrors(['login' => 'Неправильный логин или пароль!']);
		}


		return redirect() -> route('sign_in');
 	}
}
