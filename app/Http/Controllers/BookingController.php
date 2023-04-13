<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ThreadBeanPHP\C as C;
use Codedge\Fpdf\Fpdf\Fpdf as FP;

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

	public function Stat(Request $req) {
		$tour = C::findOne("tours", "id = ?", [$req -> tour]);
		$org = C::findOne("companys", "id = ?", [$tour -> company]);
		$agent = C::findOne("agents", "company = ?", [$org -> id]);
		$busyes = C::find("busy", "tour = ?", [$tour -> id]);

		$fpdf = new FP;
		$fpdf -> SetTitle($tour -> name." - ".$org -> name);
		$fpdf->AddPage();
		$fpdf->SetFont('Courier', 'B', 22);
		$fpdf -> Image((@$agent -> avatar) ? $agent -> avatar : "../public/assets/img/profile-img.jpg", 10, 10, 15, 15);
		$fpdf->Cell(50, 40, $tour -> name." - ".$org -> name);

		$fpdf->SetFont('Courier', 'B', 16);

		$i = 1;
		$x1 = 0;
		$y1 = 45;
		$x2 = 210;
		$y2 = 45;

		$j = 0;
		while($j < ((@$req -> long) ? 100 : 1)) {

			foreach ($busyes as $busy) {

				$org_busy = C::findOne("companys", "id = ?", [$busy -> company]);
				$agent_busy = C::findOne("agents", "company = ?", [$org_busy -> id]);

				$fpdf->Line($x1, $y1, $x2, $y2);

				$fpdf -> Text(5, $y1+8, $i." |");
				
				$fpdf -> Image((@$agent_busy -> avatar) ? $agent_busy -> avatar : "../public/assets/img/profile-img.jpg", 24, $y1+2, 9, 9);
		
				$fpdf->SetFont('Courier', '', 16);
				
				$bonus = 0;
				if($busy -> company != $tour -> company) {
					$bonus = $tour -> bonus * $busy -> places;
				}

				$fpdf -> Text(37, $y1+8, $org_busy -> name." | ".((@$agent_busy -> full_name) ? $agent_busy -> full_name : "Unknown")." | ".$busy -> places." place"." | ".$bonus." $");

				$fpdf->SetFont('Courier', 'B', 16);

				$y1 += 12;
				$y2 += 12;

				$fpdf->Line($x1, $y1, $x2, $y2);

				// $y1 += 12;
				// $y2 += 12;

				if($y1 > 284) {
					$fpdf->AddPage();

					$y1 = 0;
					$y2 = 0;
				}

				$i++;
			}

			$j++;
		}
		

    $fpdf->Output();
    exit;
	}
}
