<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use ThreadBeanPHP\C as C;
use Codedge\Fpdf\Fpdf\Fpdf as FP;
use \PhpOffice\PhpSpreadsheet\Style\Alignment;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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


		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$activeWorksheet = $spreadsheet->getActiveSheet();

		$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(12.6);
		for ($jn = 2; $jn < 19; $jn++) {
			$spreadsheet->getActiveSheet()->getColumnDimension((string)$this->numberToColumn($jn))->setAutoSize(true);
		}
		$spreadsheet->getActiveSheet()->getRowDimension('1')->setRowHeight(75);
		$spreadsheet->getActiveSheet()->getRowDimension('2')->setRowHeight(60);

		for ($nj = 3; $nj < 303; $nj++) {
			$spreadsheet->getActiveSheet()->getRowDimension((string)$nj)->setRowHeight(30);
		}

		$sheet->mergeCells("B1:S1");
		$sheet->setCellValue("B1", "B1:S1");

		$sheet->mergeCells("A2:E2");
		$sheet->setCellValue("A2", "A2:E2");
		
		$spreadsheet->getActiveSheet()->getStyle('A2')->getAlignment()->setVertical(Alignment::VERTICAL_TOP);
		$sheet->getStyle("A2")->getAlignment()->setWrapText(true);
		$sheet->getStyle("A2")->getFont()->setSize(16);

		$spreadsheet->getDefaultStyle()->getFont()->setName('Arial');
		$sheet->getStyle("B1")->getFont()->setSize(45);

		$sheet->getStyle("A3:S303")->getFont()->setSize(22);
		$spreadsheet->getActiveSheet()->getStyle('A3:S303')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
		$spreadsheet->getActiveSheet()->getStyle('A3:S303')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
		

		$activeWorksheet->setCellValue('B1', $tour -> name." - ".$org -> name);
		$activeWorksheet->setCellValue('A2', $tour -> description);
		
		
		$drawing = new Drawing();
		$drawing->setPath(((@$agent -> avatar) ? '../public/uploads/avatar/'.$agent -> avatar : '../public/assets/img/profile-img.jpg'));
		$drawing->setCoordinates('A1');  
		$drawing->setWidth(100); 
		$drawing->setHeight(100); 
		$drawing->setWorksheet($sheet);

		$sheet->getStyle("A3:S3")->getFont()->setBold(true);

		$activeWorksheet->setCellValue('A3', "№");
		$activeWorksheet->setCellValue('B3', "Агентство");
		$activeWorksheet->setCellValue('C3', "Имя Агента");
		$activeWorksheet->setCellValue('D3', "Места");
		$activeWorksheet->setCellValue('E3', "Бонус");

		$styleArray = [
			'borders' => [
				'outline' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
					'color' => ['argb' => '00000000'],
				],
			],
		];

		$activeWorksheet->getStyle('A3:E3')->applyFromArray($styleArray);


		$i = 4;

		$j = 0;
		while($j < ((@$req -> long) ? 10 : 1)) {

			foreach ($busyes as $busy) {

				$org_busy = C::findOne("companys", "id = ?", [$busy -> company]);
				$agent_busy = C::findOne("agents", "company = ?", [$org_busy -> id]);

				
				$drawing = new Drawing();
				$drawing->setPath(((@$agent_busy -> avatar) ? "../public/uploads/avatar/".$agent_busy -> avatar : "../public/assets/img/profile-img.jpg"));
				$drawing->setCoordinates('A'.$i);  
				$drawing->setOffsetX(60); 
				$drawing->setWidth(40); 
				$drawing->setHeight(40); 
				$drawing->setWorksheet($sheet);
				
				$activeWorksheet->setCellValue("A".$i, (string)$i-3);

				$bonus = 0;
				if($busy -> company != $tour -> company) {
					$bonus = $tour -> bonus * $busy -> places;
				}

				$activeWorksheet->setCellValue("B".$i, $org_busy -> name);
				$activeWorksheet->setCellValue("C".$i, @$agent_busy -> full_name);
				$activeWorksheet->setCellValue("D".$i, $busy -> places);
				$activeWorksheet->setCellValue("E".$i, $bonus."$ USD");
				// $activeWorksheet->setCellValue("F".$i, $agent_busy -> full_name);
				// $activeWorksheet->setCellValue("G".$i, $agent_busy -> full_name);

				$activeWorksheet->getStyle('A'.$i.':E'.$i)->applyFromArray($styleArray);

				$i++;
			}

			$j++;
		}


		$writer = new Xlsx($spreadsheet);
		$writer->save(public_path('/outs/exel/tour-'.$tour -> name.'-'.$tour -> id.'.xlsx'));

		return Redirect::to('outs/exel/tour-'.$tour -> name.'-'.$tour -> id.'.xlsx');
	}

	private function numberToColumn($number) {
		$column = "";
		while ($number > 0) {
			$remainder = ($number - 1) % 26;
			$column = chr(65 + $remainder) . $column;
			$number = (int)(($number - $remainder) / 26);
		}
		return $column;
	}
}
