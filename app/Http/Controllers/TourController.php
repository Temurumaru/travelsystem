<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ThreadBeanPHP\C as C;
use Illuminate\Validation\Rule;

class TourController extends Controller
{
	public function Create(Request $req) {
		$req -> validate([
			'name' => 'required|min:4|max:40',
			'all_flys' => 'required|numeric',
			'all_flys_end' => 'required|numeric',
			'all_cityes' => 'required|numeric',
			'company' => 'required|numeric',
			
			'start_leave_1_date' => 'required',
			'start_leave_1_time' => 'required',
			'start_leave_1_city' => 'required|max:40',
			'end_leave_1_date' => 'required',
			'end_leave_1_time' => 'required',
			'end_leave_1_city' => 'required|max:40',

			// 'start_leave_2_date' => 'required',
			// 'start_leave_2_time' => 'required',
			'start_leave_2_city' => 'max:40',
			// 'start_come_2_date' => 'required',
			// 'start_come_2_time' => 'required',
			'start_come_2_city' => 'max:40',
			// 'end_leave_2_date' => 'required',
			// 'end_leave_2_time' => 'required',
			'end_leave_2_city' => 'max:40',
			// 'end_come_2_date' => 'required',
			// 'end_come_2_time' => 'required',
			'end_come_2_city' => 'max:40',

			// 'start_leave_3_date' => 'required',
			// 'start_leave_3_time' => 'required',
			'start_leave_3_city' => 'max:40',
			// 'start_come_3_date' => 'required',
			// 'start_come_3_time' => 'required',
			'start_come_3_city' => 'max:40',
			// 'end_leave_3_date' => 'required',
			// 'end_leave_3_time' => 'required',
			'end_leave_3_city' => 'max:40',
			// 'end_come_3_date' => 'required',
			// 'end_come_3_time' => 'required',
			'end_come_3_city' => 'max:40',

			'start_come_4_date' => 'required',
			'start_come_4_time' => 'required',
			'start_come_4_city' => 'required|max:40',
			'end_come_4_date' => 'required',
			'end_come_4_time' => 'required',
			'end_come_4_city' => 'required|max:40',


			'city_name_1' => 'required|min:4|max:40',
			'city_days_1' => 'required',
			'city_nights_1' => 'required',
			'distance_city_1' => 'required',
			'city_eats_1' => 'required|max:5',
			'city_hotel_1' => 'required|max:40',
			'city_hotel_stars_1' => 'required|min:1|max:7',

			'city_name_2' => 'max:40',
			// 'city_days_2' => '',
			// 'city_nights_2' => '',
			// 'distance_city_2' => '',
			'city_eats_2' => 'max:5',
			'city_hotel_2' => 'max:40',
			'city_hotel_stars_2' => 'max:7',


			'price' => 'required',
			'bonus' => 'required',
			'places' => 'required',
			'places_limit' => '',
			'description' => 'max:140'
		]);

		
		$tour = C::dispense("tours");

		$tour -> name = $req -> name;
		$tour -> all_flys = $req -> all_flys;
		$tour -> all_flys_end = $req -> all_flys_end;
		$tour -> all_cityes = $req -> all_cityes;
		$tour -> company = $req -> company;
		
		$tour -> start_leave_1 = '{"date":"'.$req -> start_leave_1_date.'","time":"'.$req -> start_leave_1_time.'","city":"'.$req -> start_leave_1_city.'"}';
		if(@$req -> start_come_2_date) $tour -> start_come_2 = '{"date":"'.@$req -> start_come_2_date.'","time":"'.@$req -> start_come_2_time.'","city":"'.@$req -> start_come_2_city.'"}';
		if(@$req -> start_leave_2_date) $tour -> start_leave_2 = '{"date":"'.@$req -> start_leave_2_date.'","time":"'.@$req -> start_leave_2_time.'","city":"'.@$req -> start_leave_2_city.'"}';
		if(@$req -> start_come_3_date) $tour -> start_come_3 = '{"date":"'.@$req -> start_come_3_date.'","time":"'.@$req -> start_come_3_time.'","city":"'.@$req -> start_come_3_city.'"}';
		if(@$req -> start_leave_3_date) $tour -> start_leave_3 = '{"date":"'.@$req -> start_leave_3_date.'","time":"'.@$req -> start_leave_3_time.'","city":"'.@$req -> start_leave_3_city.'"}';
		if(@$req -> start_come_4_date) $tour -> start_come_4 = '{"date":"'.@$req -> start_come_4_date.'","time":"'.@$req -> start_come_4_time.'","city":"'.@$req -> start_come_4_city.'"}';
		
		if(@$req -> end_leave_1_date) $tour -> end_leave_1 = '{"date":"'.@$req -> end_leave_1_date.'","time":"'.@$req -> end_leave_1_time.'","city":"'.@$req -> end_leave_1_city.'"}';
		if(@$req -> end_come_2_date) $tour -> end_come_2 = '{"date":"'.@$req -> end_come_2_date.'","time":"'.@$req -> end_come_2_time.'","city":"'.@$req -> end_come_2_city.'"}';
		if(@$req -> end_leave_2_date) $tour -> end_leave_2 = '{"date":"'.@$req -> end_leave_2_date.'","time":"'.@$req -> end_leave_2_time.'","city":"'.@$req -> end_leave_2_city.'"}';
		if(@$req -> end_come_3_date) $tour -> end_come_3 = '{"date":"'.@$req -> end_come_3_date.'","time":"'.@$req -> end_come_3_time.'","city":"'.@$req -> end_come_3_city.'"}';
		if(@$req -> end_leave_3_date) $tour -> end_leave_3 = '{"date":"'.@$req -> end_leave_3_date.'","time":"'.@$req -> end_leave_3_time.'","city":"'.@$req -> end_leave_3_city.'"}';
		if(@$req -> end_come_4_date) $tour -> end_come_4 = '{"date":"'.$req -> end_come_4_date.'","time":"'.$req -> end_come_4_time.'","city":"'.$req -> end_come_4_city.'"}';

		$tour -> city_name_1 = $req -> city_name_1;
		$tour -> city_days_1 = $req -> city_days_1;
		$tour -> city_nights_1 = $req -> city_nights_1;
		$tour -> distance_city_1 = $req -> distance_city_1;
		$tour -> city_eats_1 = $req -> city_eats_1;
		$tour -> city_hotel_1 = $req -> city_hotel_1;
		$tour -> city_hotel_stars_1 = $req -> city_hotel_stars_1;
		
		$tour -> city_name_2 = $req -> city_name_2;
		$tour -> city_days_2 = $req -> city_days_2;
		$tour -> city_nights_2 = $req -> city_nights_2;
		$tour -> distance_city_2 = $req -> distance_city_2;
		$tour -> city_eats_2 = $req -> city_eats_2;
		$tour -> city_hotel_2 = $req -> city_hotel_2;
		$tour -> city_hotel_stars_2 = $req -> city_hotel_stars_2;

		$tour -> price = $req -> price;
		$tour -> bonus = $req -> bonus;
		$tour -> places = $req -> places;
		$tour -> places_limit = $req -> places_limit;
		$tour -> transfer = (bool)$req -> transfer;
		$tour -> guide = (bool)$req -> guide;
		$tour -> description = $req -> description;
		$tour -> active = true;

		C::store($tour);

		return redirect() -> route('admin') -> with('success', 'Тур "'.$req -> name.'" создан ✔️');
		// dd($req);
	} 

	public function Update(Request $req) {
		$req -> validate([
			'name' => 'required|min:4|max:40',
			'all_flys' => 'required|numeric',
			'all_flys_end' => 'required|numeric',
			'all_cityes' => 'required|numeric',
			'company' => 'required|numeric',
			
			'start_leave_1_date' => 'required',
			'start_leave_1_time' => 'required',
			'start_leave_1_city' => 'required|max:40',
			'end_leave_1_date' => 'required',
			'end_leave_1_time' => 'required',
			'end_leave_1_city' => 'required|max:40',

			// 'start_leave_2_date' => 'required',
			// 'start_leave_2_time' => 'required',
			'start_leave_2_city' => 'max:40',
			// 'start_come_2_date' => 'required',
			// 'start_come_2_time' => 'required',
			'start_come_2_city' => 'max:40',
			// 'end_leave_2_date' => 'required',
			// 'end_leave_2_time' => 'required',
			'end_leave_2_city' => 'max:40',
			// 'end_come_2_date' => 'required',
			// 'end_come_2_time' => 'required',
			'end_come_2_city' => 'max:40',

			// 'start_leave_3_date' => 'required',
			// 'start_leave_3_time' => 'required',
			'start_leave_3_city' => 'max:40',
			// 'start_come_3_date' => 'required',
			// 'start_come_3_time' => 'required',
			'start_come_3_city' => 'max:40',
			// 'end_leave_3_date' => 'required',
			// 'end_leave_3_time' => 'required',
			'end_leave_3_city' => 'max:40',
			// 'end_come_3_date' => 'required',
			// 'end_come_3_time' => 'required',
			'end_come_3_city' => 'max:40',

			'start_come_4_date' => 'required',
			'start_come_4_time' => 'required',
			'start_come_4_city' => 'required|max:40',
			'end_come_4_date' => 'required',
			'end_come_4_time' => 'required',
			'end_come_4_city' => 'required|max:40',


			'city_name_1' => 'required|min:4|max:40',
			'city_days_1' => 'required',
			'city_nights_1' => 'required',
			'distance_city_1' => 'required',
			'city_eats_1' => 'required|max:5',
			'city_hotel_1' => 'required|max:40',
			'city_hotel_stars_1' => 'required|min:1|max:7',

			'city_name_2' => 'max:40',
			// 'city_days_2' => '',
			// 'city_nights_2' => '',
			// 'distance_city_2' => '',
			'city_eats_2' => 'max:5',
			'city_hotel_2' => 'max:40',
			'city_hotel_stars_2' => 'max:7',


			'price' => 'required',
			'bonus' => 'required',
			'places' => 'required',
			'places_limit' => '',
			'description' => 'max:140'
		]);

		
		$tour = C::dispense("tours");

		$tour -> name = $req -> name;
		$tour -> all_flys = $req -> all_flys;
		$tour -> all_flys_end = $req -> all_flys_end;
		$tour -> all_cityes = $req -> all_cityes;
		$tour -> company = $req -> company;
		
		$tour -> start_leave_1 = '{"date":"'.$req -> start_leave_1_date.'","time":"'.$req -> start_leave_1_time.'","city":"'.$req -> start_leave_1_city.'"}';
		if(@$req -> start_come_2_date) $tour -> start_come_2 = '{"date":"'.@$req -> start_come_2_date.'","time":"'.@$req -> start_come_2_time.'","city":"'.@$req -> start_come_2_city.'"}';
		if(@$req -> start_leave_2_date) $tour -> start_leave_2 = '{"date":"'.@$req -> start_leave_2_date.'","time":"'.@$req -> start_leave_2_time.'","city":"'.@$req -> start_leave_2_city.'"}';
		if(@$req -> start_come_3_date) $tour -> start_come_3 = '{"date":"'.@$req -> start_come_3_date.'","time":"'.@$req -> start_come_3_time.'","city":"'.@$req -> start_come_3_city.'"}';
		if(@$req -> start_leave_3_date) $tour -> start_leave_3 = '{"date":"'.@$req -> start_leave_3_date.'","time":"'.@$req -> start_leave_3_time.'","city":"'.@$req -> start_leave_3_city.'"}';
		if(@$req -> start_come_4_date) $tour -> start_come_4 = '{"date":"'.@$req -> start_come_4_date.'","time":"'.@$req -> start_come_4_time.'","city":"'.@$req -> start_come_4_city.'"}';
		
		if(@$req -> end_leave_1_date) $tour -> end_leave_1 = '{"date":"'.@$req -> end_leave_1_date.'","time":"'.@$req -> end_leave_1_time.'","city":"'.@$req -> end_leave_1_city.'"}';
		if(@$req -> end_come_2_date) $tour -> end_come_2 = '{"date":"'.@$req -> end_come_2_date.'","time":"'.@$req -> end_come_2_time.'","city":"'.@$req -> end_come_2_city.'"}';
		if(@$req -> end_leave_2_date) $tour -> end_leave_2 = '{"date":"'.@$req -> end_leave_2_date.'","time":"'.@$req -> end_leave_2_time.'","city":"'.@$req -> end_leave_2_city.'"}';
		if(@$req -> end_come_3_date) $tour -> end_come_3 = '{"date":"'.@$req -> end_come_3_date.'","time":"'.@$req -> end_come_3_time.'","city":"'.@$req -> end_come_3_city.'"}';
		if(@$req -> end_leave_3_date) $tour -> end_leave_3 = '{"date":"'.@$req -> end_leave_3_date.'","time":"'.@$req -> end_leave_3_time.'","city":"'.@$req -> end_leave_3_city.'"}';
		if(@$req -> end_come_4_date) $tour -> end_come_4 = '{"date":"'.$req -> end_come_4_date.'","time":"'.$req -> end_come_4_time.'","city":"'.$req -> end_come_4_city.'"}';

		$tour -> city_name_1 = $req -> city_name_1;
		$tour -> city_days_1 = $req -> city_days_1;
		$tour -> city_nights_1 = $req -> city_nights_1;
		$tour -> distance_city_1 = $req -> distance_city_1;
		$tour -> city_eats_1 = $req -> city_eats_1;
		$tour -> city_hotel_1 = $req -> city_hotel_1;
		$tour -> city_hotel_stars_1 = $req -> city_hotel_stars_1;
		
		$tour -> city_name_2 = $req -> city_name_2;
		$tour -> city_days_2 = $req -> city_days_2;
		$tour -> city_nights_2 = $req -> city_nights_2;
		$tour -> distance_city_2 = $req -> distance_city_2;
		$tour -> city_eats_2 = $req -> city_eats_2;
		$tour -> city_hotel_2 = $req -> city_hotel_2;
		$tour -> city_hotel_stars_2 = $req -> city_hotel_stars_2;

		$tour -> price = $req -> price;
		$tour -> bonus = $req -> bonus;
		$tour -> places = $req -> places;
		$tour -> places_limit = $req -> places_limit;
		$tour -> transfer = (bool)$req -> transfer;
		$tour -> guide = (bool)$req -> guide;
		$tour -> description = $req -> description;
		$tour -> active = true;

		C::store($tour);

		return redirect() -> route('admin') -> with('success', 'Тур "'.$req -> name.'" создан ✔️');
		// dd($req);
	} 

	public function Delete(Request $req) {
		if(isset($req -> id)) {
			if(C::count('busy', 'tour = ?', [$req -> id]) <= 0) {

				$tour = C::findOne("tour", "id = ?", [$req -> id]);
				C::trash($tour);

				return "OK";
			} else {
				return "HAVE";
			}
		} else {
			return "ERR";
		}
	}

}
