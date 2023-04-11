<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ThreadBeanPHP\C as C;
use Illuminate\Validation\Rule;

class TourController extends Controller
{
	public function Create(Request $req) {
		$req -> validate([
			'all_flys' => '',
			'all_flys_end' => '',
			'all_cityes' => '',
			'org' => '',
			'start_leave_*_date' => '',
			'start_leave_*_time' => '',
			'start_leave_*_city' => '',
			'start_come_*_date' => '',
			'start_come_*_time' => '',
			'start_come_*_city' => '',
			'end_leave_*_date' => '',
			'end_leave_*_time' => '',
			'end_leave_*_city' => '',
			'end_come_*_date' => '',
			'end_come_*_time' => '',
			'end_come_*_city' => '',
			'city_name_*' => '',
			'city_days_*' => '',
			'city_nights_*' => '',
			'distance_city_*' => '',
			'city_eats_*' => '',
			'city_hotel_*' => '',
			'city_hotel_stars_*' => '',
			'price' => '',
			'bonus' => '',
			'places' => '',
			'places_limit' => '',
			'transfer' => [
				Rule::in([true, false])
			],
			'guide' => [
				Rule::in([true, false])
			],
			'description' => 'max:140'
		]);
	} 
}
