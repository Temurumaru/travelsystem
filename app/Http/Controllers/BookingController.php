<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ThreadBeanPHP\C as C;

class BookingController extends Controller
{

	public function Create(Request $req) {
		if(@$req -> tour && @$req -> company && isset($req -> places)) {
			if(C::count('companys', 'id = ?', [$req -> company]) <= 0) {
				return redirect() -> back() -> withErrors(['company' => 'Компании не существует!']);
			}

			if(C::count('busy', 'tour = ? AND company = ?', [$req -> tour, $req -> company]) <= 0) {
				$busy = C::dispense("busy");
				$busy -> tour = $req -> tour;
				$busy -> company = $req -> company;
				$busy -> places = $req -> places;
				C::store($busy);

				return redirect() -> route('admin') -> with('success', 'Бронь создана ✔️');
			}

			$busy = C::findOne('busy', 'tour = ? AND company = ?', [$req -> tour, $req -> company]);
			
			if($req -> places == 0) {
				C::trash($busy);
				return redirect() -> route('admin') -> with('success', 'Бронь удалён ✔️');
			}

			$busy -> places = $req -> places;
			C::store($busy);

			return redirect() -> route('admin') -> with('success', 'Бронь изменена ✔️');

		}

		return redirect() -> back() -> withErrors(['network' => 'Что-то пошло не так, пожалуйста попробуйте поже!']);
	}

	public function Delete(Request $req) {
		if(@$req -> id) {
			$busy = C::findOne("busy", "id = ?", [$req -> id]);
			C::trash($busy);
			return "OK";
		}
		return "ERR";
	}

	public function Count(Request $req) {
		if(@$req -> tour && @$req -> company) {
			if(C::count('busy', 'tour = ? AND company = ?', [$req -> tour, $req -> company]) > 0) {
				$busy = C::findOne('busy', 'tour = ? AND company = ?', [$req -> tour, $req -> company]);
				return $busy -> places;
			}
			return 0;
		}
		return "ERR";
	}
}
