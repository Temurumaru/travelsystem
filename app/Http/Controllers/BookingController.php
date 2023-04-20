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

			$tour = C::findOne("tours", "id = ?", [$req -> tour]);

			if(!$tour -> active) {
				return redirect() -> back() -> withErrors(['tour' => 'Тур закрыт!!!']);
			}

			$busy = C::findOne("busy", "tour = ? AND company = ?", [$tour -> id, $_SESSION['user'] -> company]);

			if($req -> places > $tour -> places) {
				return redirect() -> back() -> withErrors(['network' => 'Что-то пошло не так, пожалуйста попробуйте поже!']);
			}


			$busy_count = C::find("busy", "tour = ?", [$tour -> id]);
			$places_rem = $tour -> places;
			foreach ($busy_count as $item) {
				$places_rem -= $item -> places;
			}

			$max_places = 0;
      if($_SESSION['user'] -> company == $tour -> company || $tour -> places_limit == null || $tour -> places_limit == 0) {
				if (@$busy -> places) {
					$max_places = $busy -> places + $places_rem;
				} else {
					$max_places = $tour -> places;
				}
      } else {
        if (@$busy -> places) {
					$max_places = $busy -> places + abs($busy -> places - $tour -> places_limit);
				} if($places_rem < $tour -> places_limit) {
					$max_places = $tour -> places;
				} else {
					$max_places = $tour -> places_limit;
				}
      }

			$home = 'admin';

			if($_SESSION['user'] -> permission == "agent") {
				if($req -> places > $max_places) {
					return redirect() -> back() -> withErrors(['network' => 'Что-то пошло не так, пожалуйста попробуйте поже!']);
				}
				$home = 'agent';
			}

			if(C::count('busy', 'tour = ? AND company = ?', [$req -> tour, $req -> company]) <= 0) {
				$busy = C::dispense("busy");
				$busy -> tour = $req -> tour;
				$busy -> company = $req -> company;
				$busy -> places = $req -> places;
				C::store($busy);
				
				return redirect() -> route($home) -> with('success', 'Бронь создана ✔️');
			}

			$busy = C::findOne('busy', 'tour = ? AND company = ?', [$req -> tour, $req -> company]);
			
			if($req -> places == 0) {
				C::trash($busy);
				return redirect() -> route($home) -> with('success', 'Бронь удалён ✔️');
			}

			$busy -> places = $req -> places;
			C::store($busy);

			return redirect() -> route($home) -> with('success', 'Бронь изменена ✔️');

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
		$fpdf -> Image((@$agent -> avatar) ? "../public/uploads/avatar/".$agent -> avatar : "../public/assets/img/profile-img.jpg", 10, 10, 15, 15);
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
				
				$fpdf -> Image(
					((@$agent_busy -> avatar) ? "../public/uploads/avatar/".$agent_busy -> avatar : "../public/assets/img/profile-img.jpg"), 
					20, 
					$y1+2, 
					9, 
					9
				);
		
				$fpdf->SetFont('Courier', '', 16);
				
				$bonus = 0;
				if($busy -> company != $tour -> company) {
					$bonus = $tour -> bonus * $busy -> places;
				}

				$fpdf -> Text(30, $y1+8, $org_busy -> name." | ".((@$agent_busy -> full_name) ? $agent_busy -> full_name : "Unknown")." | ".$busy -> places." place"." | ".$bonus." $");

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
