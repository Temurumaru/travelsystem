<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ThreadBeanPHP\C as C;

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
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'description' => 'max:140'
		]);
	} 
}
