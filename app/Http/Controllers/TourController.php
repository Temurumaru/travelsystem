<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ThreadBeanPHP\C as C;
use Illuminate\Validation\Rule;

class TourController extends Controller
{
	public function Create(Request $req) {
		$req -> validate([
			'all_flys' => 'required',
			'all_flys_end' => 'required',
			'all_cityes' => 'required',
			'org' => 'required',
			
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
			'city_eats_1' => 'required',
			'city_hotel_1' => 'required|max:40',
			'city_hotel_stars_1' => 'required|min:1|max:7',

			// 'city_name_2' => 'required|min:4|max:40',
			// 'city_days_2' => 'required',
			// 'city_nights_2' => 'required',
			// 'distance_city_2' => 'required',
			// 'city_eats_2' => 'required',
			// 'city_hotel_2' => 'required|max:40',
			// 'city_hotel_stars_2' => 'required|min:1|max:7',


			'price' => 'required',
			'bonus' => 'required',
			'places' => 'required',
			'places_limit' => '',
			'description' => 'max:140'
		]);

		dd($req);
	} 
}
