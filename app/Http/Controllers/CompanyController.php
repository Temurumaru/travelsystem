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

		if(C::count('companys', 'name = ?', [$req -> name]) > 0) {
			return redirect() -> back() -> withErrors(['name' => 'Такая Организация уже существует!']);
		}

		$org = C::dispense("companys");

		$org -> name = $req -> name;
		$org -> description = $req -> description;

		C::store($org);

		return redirect() -> route('admin') -> with('success', 'Огранизация "'.$req -> name.'" создана ✔️');
		
	}

	public function Update(Request $req) {
		$req -> validate([
			'id' => 'required|numeric',
			'name' => 'required|min:4|max:40',
			'description' => 'max:140'
		]);

		if(C::count('companys', 'id != ? AND name = ?', [$req -> id, $req -> name]) > 0) {
			return redirect() -> back() -> withErrors(['name' => 'Такая Организация уже существует!']);
		}

		$company = C::findOne("companys", "id = ?", [$req -> id]);

		$company -> name = $req -> name;
		$company -> description = $req -> description;

		C::store($company);

		return redirect() -> route('admin') -> with('success', 'Компания "'.$req -> name.'" изменена ✔️');
	}

	public function Delete(Request $req) {
		if(isset($req -> id)) {
			if(C::count('agents', 'company = ?', [$req -> id]) <= 0) {

				$org = C::findOne("companys", "id = ?", [$req -> id]);
				C::trash($org);
				return "OK";
			} else {
				return "HAVE";
			}
		} else {
			return "ERR";
		}
	}
}
