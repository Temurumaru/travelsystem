@extends('layouts.agent')


@section('title', 'Тур '.$tour -> name.' - '.$org -> name)
@section('header_title', APP_NAME)
@section('sub_title', 'Тур '.$tour -> name)

@section('username', $_SESSION['user'] -> full_name)
@php
use ThreadBeanPHP\C as C;
$org_h = C::findOne("companys", "id = ?", [$_SESSION['user'] -> company]);
@endphp
@section('usersubname', $org_h -> name)


@section('content')

  @php

	function convertMinutesToDaysHoursMinutes($minutes) {
	  $days = floor($minutes / 1440); // 1 день = 1440 минут
	  $hours = floor(($minutes % 1440) / 60); // 1 час = 60 минут
	  $remainingMinutes = $minutes % 60;

		if($days != 0) {
			return $days . "д " . $hours . "ч " . $remainingMinutes . "мин";
		}elseif ($hours != 0) {
			return $hours . "ч " . $remainingMinutes . "мин";
		} else {
			return $remainingMinutes . "мин";
		}

	}

	$agent = C::findOne("agents", "company = ?", [$org -> id]);
	$busy = C::findOne("busy", "tour = ? AND company = ?", [$tour -> id, $_SESSION['user'] -> company]);

	$busy_count = C::find("busy", "tour = ?", [$tour -> id]);
	$places_rem = $tour -> places;
	foreach ($busy_count as $item) {
	  $places_rem -= $item -> places;
	}

	$city_name_1 = $tour -> city_name_1;
	$city_days_1 = $tour -> city_days_1;
	$city_nights_1 = $tour -> city_nights_1;
	$city_distance_1 = $tour -> distance_city_1;
	$city_eats_1 = $tour -> city_eats_1;
	$city_hotel_1 = $tour -> city_hotel_1;
	$city_hotel_stars_1 = $tour -> city_hotel_stars_1;

	$city_name_2 = @$tour -> city_name_2;
	$city_days_2 = @$tour -> city_days_2;
	$city_nights_2 = @$tour -> city_nights_2;
	$city_distance_2 = @$tour -> distance_city_2;
	$city_eats_2 = @$tour -> city_eats_2;
	$city_hotel_2 = @$tour -> city_hotel_2;
	$city_hotel_stars_2 = @$tour -> city_hotel_stars_2;


	$start_leave_1 = json_decode($tour -> start_leave_1, true);
	$start_come_2 = json_decode(@$tour -> start_come_2, true);
	$start_leave_2 = json_decode(@$tour -> start_leave_2, true);
	$start_come_3 = json_decode(@$tour -> start_come_3, true);
	$start_leave_3 = json_decode(@$tour -> start_leave_3, true);
	$start_come_4 = json_decode($tour -> start_come_4, true);

	$end_leave_1 = json_decode($tour -> end_leave_1, true);
	$end_come_2 = json_decode(@$tour -> end_come_2, true);
	$end_leave_2 = json_decode(@$tour -> end_leave_2, true);
	$end_come_3 = json_decode(@$tour -> end_come_3, true);
	$end_leave_3 = json_decode(@$tour -> end_leave_3, true);
	$end_come_4 = json_decode($tour -> end_come_4, true);

	if(@$tour -> city_days_2) {
	  $days = $tour -> city_days_1 + $tour -> city_days_2;
	  $nights = $tour -> city_nights_1 + $tour -> city_nights_2;
	} else {
	  $days = $tour -> city_days_1;
	  $nights = $tour -> city_nights_1;
	}


	$date1 = DateTime::createFromFormat('Y-m-d H:i', ($start_leave_1['date'].' '.$start_leave_1['time']));
	$date6 = DateTime::createFromFormat('Y-m-d H:i', ($start_come_4['date'].' '.$start_come_4['time']));

	if(@$start_come_2) {
	  $date2 = DateTime::createFromFormat('Y-m-d H:i', ($start_come_2['date'].' '.$start_come_2['time']));
	  $date3 = DateTime::createFromFormat('Y-m-d H:i', ($start_leave_2['date'].' '.$start_leave_2['time']));

	  $diff = $date1->diff($date2);
	  $hours1_2 = convertMinutesToDaysHoursMinutes(($diff->h + $diff->days * 24) * 60);

	  $diff = $date2->diff($date3);
	  $hours2_3 = convertMinutesToDaysHoursMinutes(($diff->h + $diff->days * 24) * 60);
	}

	if(@$start_come_2 && @$start_come_3) {
	  $date3 = DateTime::createFromFormat('Y-m-d H:i', ($start_leave_2['date'].' '.$start_leave_2['time']));
	  $date4 = DateTime::createFromFormat('Y-m-d H:i', ($start_come_3['date'].' '.$start_come_3['time']));
	  $diff = $date3->diff($date4);
	  $hours3_4 = convertMinutesToDaysHoursMinutes(($diff->h + $diff->days * 24) * 60);
	} else {
	  $diff = $date1->diff($date6);
	  $hours3_4 = convertMinutesToDaysHoursMinutes(($diff->h + $diff->days * 24) * 60);
	}

	if(@$start_come_3) {
	  $date4 = DateTime::createFromFormat('Y-m-d H:i', ($start_come_3['date'].' '.$start_come_3['time']));
	  $date5 = DateTime::createFromFormat('Y-m-d H:i', ($start_leave_3['date'].' '.$start_leave_3['time']));

	  $diff = $date4->diff($date5);
	  $hours4_5 = convertMinutesToDaysHoursMinutes(($diff->h + $diff->days * 24) * 60);

	  $diff = $date5->diff($date6);
	  $hours5_6 = convertMinutesToDaysHoursMinutes(($diff->h + $diff->days * 24) * 60);
	}


	$date_end1 = DateTime::createFromFormat('Y-m-d H:i', ($end_leave_1['date'].' '.$end_leave_1['time']));
	$date_end6 = DateTime::createFromFormat('Y-m-d H:i', ($end_come_4['date'].' '.$end_come_4['time']));

	if(@$end_come_2) {
	  $date_end2 = DateTime::createFromFormat('Y-m-d H:i', ($end_come_2['date'].' '.$end_come_2['time']));
	  $date_end3 = DateTime::createFromFormat('Y-m-d H:i', ($end_leave_2['date'].' '.$end_leave_2['time']));

	  $diff = $date_end1->diff($date_end2);
	  $end_hours1_2 = convertMinutesToDaysHoursMinutes(($diff->h + $diff->days * 24) * 60);

	  $diff = $date_end2->diff($date_end3);
	  $end_hours2_3 = convertMinutesToDaysHoursMinutes(($diff->h + $diff->days * 24) * 60);
	}

	if(@$end_come_2 && @$end_come_3) {
	  $date_end3 = DateTime::createFromFormat('Y-m-d H:i', ($end_leave_2['date'].' '.$end_leave_2['time']));
	  $date_end4 = DateTime::createFromFormat('Y-m-d H:i', ($end_come_3['date'].' '.$end_come_3['time']));
	  $diff = $date_end3->diff($date_end4);
	  $end_hours3_4 = convertMinutesToDaysHoursMinutes(($diff->h + $diff->days * 24) * 60);
	} else {
	  $diff = $date_end1->diff($date_end6);
	  $end_hours3_4 = convertMinutesToDaysHoursMinutes(($diff->h + $diff->days * 24) * 60);
	}

	if(@$end_come_3) {
	  $date_end4 = DateTime::createFromFormat('Y-m-d H:i', ($end_come_3['date'].' '.$end_come_3['time']));
	  $date_end5 = DateTime::createFromFormat('Y-m-d H:i', ($end_leave_3['date'].' '.$end_leave_3['time']));

	  $diff = $date_end4->diff($date_end5);
	  $end_hours4_5 = convertMinutesToDaysHoursMinutes(($diff->h + $diff->days * 24) * 60);

	  $diff = $date_end5->diff($date_end6);
	  $end_hours5_6 = convertMinutesToDaysHoursMinutes(($diff->h + $diff->days * 24) * 60);
	}




	// echo $total_hours; // вывод общего количества часов
  @endphp

  @if (!$tour -> active)
	<div class="col-lg-12">
	  <div class="card" style="background-color: red;color:white;">
		<div class="card-body" >
		  <h1 class="mt-4" align="center"><b>Тур Закрыт! <i class="bi bi-x-octagon-fill"></i></b></h1>
		</div>
	  </div>
	</div>
  @endif

  <div class="col-lg-6">
	<div class="card">
	  <div class="card-body profile-overview">
		<h5 class="card-title hdr">Путь туда. {{$start_leave_1['city']}} <i class="bi bi-chevron-double-right"></i> {{$start_come_4['city']}}</h5>
		<div class="activity">

		  <div class="activity-item d-flex">
			<div class="activite-label lead">{{$start_leave_1['date']." ".$start_leave_1['time']}}</div>
			<i class="bi bi-airplane-fill rot-45 activity-badge text-danger align-self-start"></i>
			<div class="activity-content lead">
			  {{$start_leave_1['city']}}
			</div>
		  </div><!-- End activity item-->

		  @if(@$start_come_2)
		  {{-- <div class="activity-item d-flex">
			<div class="activite-label lead"></div>
			<i class="bi bi-alarm-fill activity-badge text-badge align-self-start"></i>
			<div class="activity-content lead">
			  {{$hours1_2}}
			</div>
		  </div><!-- End activity item--> --}}

		  <div class="activity-item d-flex">
			<div class="activite-label lead">{{$start_come_2['date']." ".$start_come_2['time']}}</div>
			<i class="bi bi-airplane-fill rot-135 activity-badge text-success align-self-start"></i>
			<div class="activity-content lead">
			  {{$start_come_2['city']}}
			</div>
		  </div><!-- End activity item-->

		  <div class="activity-item d-flex">
			<div class="activite-label lead"></div>
			<i class="bi bi-alarm-fill activity-badge text-badge align-self-start"></i>
			<div class="activity-content lead">
			  {{$hours2_3}}
			</div>
		  </div><!-- End activity item-->

		  <div class="activity-item d-flex">
			<div class="activite-label lead">{{$start_leave_2['date']." ".$start_leave_2['time']}}</div>
			<i class="bi bi-airplane-fill rot-45 activity-badge text-danger align-self-start"></i>
			<div class="activity-content lead">
			  {{$start_leave_2['city']}}
			</div>
		  </div><!-- End activity item-->
		  @endif

		  {{-- <div class="activity-item d-flex">
			<div class="activite-label lead"></div>
			<i class="bi bi-alarm-fill activity-badge text-badge align-self-start"></i>
			<div class="activity-content lead">
			  {{$hours3_4}}
			</div>
		  </div><!-- End activity item--> --}}

		  @if(@$start_come_3)
		  <div class="activity-item d-flex">
			<div class="activite-label lead">{{$start_come_3['date']." ".$start_come_3['time']}}</div>
			<i class="bi bi-airplane-fill rot-135 activity-badge text-success align-self-start"></i>
			<div class="activity-content lead">
			  {{$start_come_3['city']}}
			</div>
		  </div><!-- End activity item-->

		  <div class="activity-item d-flex">
			<div class="activite-label lead"></div>
			<i class="bi bi-alarm-fill activity-badge text-badge align-self-start"></i>
			<div class="activity-content lead">
			  {{$hours4_5}}
			</div>
		  </div><!-- End activity item-->

		  <div class="activity-item d-flex">
			<div class="activite-label lead">{{$start_leave_3['date']." ".$start_leave_3['time']}}</div>
			<i class="bi bi-airplane-fill rot-45 activity-badge text-danger align-self-start"></i>
			<div class="activity-content lead">
			  {{$start_leave_3['city']}}
			</div>
		  </div><!-- End activity item-->

		  {{-- <div class="activity-item d-flex">
			<div class="activite-label lead"></div>
			<i class="bi bi-alarm-fill activity-badge text-badge align-self-start"></i>
			<div class="activity-content lead">
			  {{$hours5_6}}
			</div>
		  </div><!-- End activity item--> --}}
		  @endif

		  <div class="activity-item d-flex">
			<div class="activite-label lead">{{$start_come_4['date']." ".$start_come_4['time']}}</div>
			<i class="bi bi-airplane-fill rot-135 activity-badge text-success align-self-start"></i>
			<div class="activity-content lead">
			  {{$start_come_4['city']}}
			</div>
		  </div><!-- End activity item-->

		</div>
	  </div>
	</div>
  </div>
  <div class="col-lg-6">
	<div class="card">
	  <div class="card-body profile-overview">
		<h5 class="card-title hdr">Путь обратно. {{$end_leave_1['city']}} <i class="bi bi-chevron-double-right"></i> {{$end_come_4['city']}}</h5>
		<div class="activity">

		  <div class="activity-item d-flex">
			<div class="activite-label lead">{{$end_leave_1['date']." ".$end_leave_1['time']}}</div>
			<i class="bi bi-airplane-fill rot-45 activity-badge text-danger align-self-start"></i>
			<div class="activity-content lead">
			  {{$start_leave_1['city']}}
			</div>
		  </div><!-- End activity item-->

		  @if(@$end_come_2)
		  {{-- <div class="activity-item d-flex">
			<div class="activite-label lead"></div>
			<i class="bi bi-alarm-fill activity-badge text-badge align-self-start"></i>
			<div class="activity-content lead">
			  {{$end_hours1_2}}
			</div>
		  </div><!-- End activity item--> --}}

		  <div class="activity-item d-flex">
			<div class="activite-label lead">{{$end_come_2['date']." ".$end_come_2['time']}}</div>
			<i class="bi bi-airplane-fill rot-135 activity-badge text-success align-self-start"></i>
			<div class="activity-content lead">
			  {{$start_come_2['city']}}
			</div>
		  </div><!-- End activity item-->

		  <div class="activity-item d-flex">
			<div class="activite-label lead"></div>
			<i class="bi bi-alarm-fill activity-badge text-badge align-self-start"></i>
			<div class="activity-content lead">
			  {{$end_hours2_3}}
			</div>
		  </div><!-- End activity item-->

		  <div class="activity-item d-flex">
			<div class="activite-label lead">{{$end_leave_2['date']." ".$end_leave_2['time']}}</div>
			<i class="bi bi-airplane-fill rot-45 activity-badge text-danger align-self-start"></i>
			<div class="activity-content lead">
			  {{$start_leave_2['city']}}
			</div>
		  </div><!-- End activity item-->
		  @endif

		  {{-- <div class="activity-item d-flex">
			<div class="activite-label lead"></div>
			<i class="bi bi-alarm-fill activity-badge text-badge align-self-start"></i>
			<div class="activity-content lead">
			  {{$end_hours3_4}}
			</div>
		  </div><!-- End activity item--> --}}

		  @if(@$end_come_3)
		  <div class="activity-item d-flex">
			<div class="activite-label lead">{{$end_come_3['date']." ".$end_come_3['time']}}</div>
			<i class="bi bi-airplane-fill rot-135 activity-badge text-success align-self-start"></i>
			<div class="activity-content lead">
			  {{$start_come_3['city']}}
			</div>
		  </div><!-- End activity item-->

		  <div class="activity-item d-flex">
			<div class="activite-label lead"></div>
			<i class="bi bi-alarm-fill activity-badge text-badge align-self-start"></i>
			<div class="activity-content lead">
			  {{$end_hours4_5}}
			</div>
		  </div><!-- End activity item-->

		  <div class="activity-item d-flex">
			<div class="activite-label lead">{{$end_leave_3['date']." ".$end_leave_3['time']}}</div>
			<i class="bi bi-airplane-fill rot-45 activity-badge text-danger align-self-start"></i>
			<div class="activity-content lead">
			  {{$start_leave_3['city']}}
			</div>
		  </div><!-- End activity item-->

		  {{-- <div class="activity-item d-flex">
			<div class="activite-label lead"></div>
			<i class="bi bi-alarm-fill activity-badge text-badge align-self-start"></i>
			<div class="activity-content lead">
			  {{$end_hours5_6}}
			</div>
		  </div><!-- End activity item--> --}}
		  @endif

		  <div class="activity-item d-flex">
			<div class="activite-label lead">{{$end_come_4['date']." ".$end_come_4['time']}}</div>
			<i class="bi bi-airplane-fill rot-135 activity-badge text-success align-self-start"></i>
			<div class="activity-content lead">
			  {{$start_come_4['city']}}
			</div>
		  </div><!-- End activity item-->

		</div>
	  </div>
	</div>
  </div>

  <div class="col-lg-6">

	<div class="card">
	  <div class="card-body">
		<div class="card-title hdr">Информайия о туре</div>

		<p class="lead-p">
		  <b>Город: </b>{{$city_name_1}} (<b>{{$city_days_1}}</b> дней, <b>{{$city_nights_1}}</b> ночей) <br>
		  <b>Питание: </b><b>{{$city_eats_1}}</b> раза (в день) <br>
		  <b>Отель: </b>{{$city_hotel_1}} {{str_repeat('★', $city_hotel_stars_1)}} <br>
		  <b>Расстояние: </b><b>{{$city_distance_1}}</b> м <br>
		  <b>Гид: </b>{{($tour -> guide) ? "Есть" : "Нет"}} <br>
		  <b>Трансфер: </b>{{($tour -> transfer) ? "Есть" : "Нет"}} <br>
		</p>

		<hr>

		@if(@$city_name_2)
		<p class="lead-p">
		  <b>Город: </b>{{$city_name_2}} (<b>{{$city_days_2}}</b> дней, <b>{{$city_nights_2}}</b> ночей) <br>
		  <b>Питание: </b><b>{{$city_eats_2}}</b> раза (в день) <br>
		  <b>Отель: </b>{{$city_hotel_2}} {{str_repeat('★', $city_hotel_stars_2)}} <br>
		  <b>Расстояние: </b><b>{{$city_distance_2}}</b> м <br>
		  <b>Гид: </b>{{($tour -> guide) ? "Есть" : "Нет"}} <br>
		  <b>Трансфер: </b>{{($tour -> transfer) ? "Есть" : "Нет"}} <br>
		</p>

		<hr>
		@endif

		<p class="lead">
		  {{$tour -> description}}
		</p>
	  </div>
	</div>

  </div>

  <div class="col-lg-6">
	<div class="card">
	  @if($tour -> active)
	  @php

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


	  @endphp
	  <form method="post" action="{{route('CreateBusy')}}" class="card-body">
		@csrf
		<input type="hidden" name="tour" value="{{$tour -> id}}">
		<input type="hidden" name="company" value="{{$_SESSION['user'] -> company}}">

		<div class="card-title hdr">Бронирование
		  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
			<i class="bi bi-eye-fill"></i>
		  </button>
		</div>

		<h3 id="price" bonus="{{$tour -> bonus}}" class="unselectable">Цена тура: <b>{{$tour -> price}}$</b></h3>

		<div class="row">
		  <h3 class="col-md-auto">Всего мест <b>{{$tour -> places}}</b></h3>
		  <h3 class="col-md-auto">Свободно <b>{{$places_rem}}</b></h3>
		</div>
		<hr>
		<form action="" method="post">
		  <div class="row mb-2 mx-1">
			<div class="row cnt">
			  <div class="col-md-4 lead">
				Забронировать
			  </div>
			  <div class="col-md-5 my-2">
				<input type="number" class="form-control" name="places" placeholder="Введите кол-во мест" value="{{@$busy -> places}}" min="0" max="{{$max_places}}" step="1">

			  </div>
			  <div class="col-md-3">

				<button type="submit" class="btn btn-primary">Забронировать</button>
			  </div>
			</div>
		  </div>
		</form>
	  </form>
	  @else
	  <div class="card-body">
		<input type="hidden" name="tour" value="{{$tour -> id}}">
		<input type="hidden" name="company" value="{{$_SESSION['user'] -> company}}">

		<div class="card-title hdr">Бронирование
		  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
			<i class="bi bi-eye-fill"></i>
		  </button>
		</div>

		<h3 id="price" bonus="{{$tour -> bonus}}" class="unselectable">Цена тура: <b>{{$tour -> price}}$</b></h3>

		<div class="row">
		  <h3 class="col-md-auto">Всего мест <b>{{$tour -> places}}</b></h3>
		  <h3 class="col-md-auto">Свободно <b>{{$places_rem}}</b></h3>
		</div>
	  </div>
	</div>
	@endif

  </div>


  <div class="modal fade" id="largeModal" tabindex="-1" style="display: none;" aria-hidden="true">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title">Список забронировавших Агентов</h5>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
		  <table class="table table-borderless">
			<tbody class="agent_tour_element">
			  @foreach ($busyes as $busy)

			  @php
				$org = C::findOne("companys", "id = ?", [$busy -> company]);
				$agent = C::findOne("agents", "company = ?", [$org -> id]);
				$bonus = 0;
				if($busy -> company != $tour -> company) {
				  $bonus = $tour -> bonus * $busy -> places;
				}
			  @endphp
			  <tr>
				<td><img src="{{(@$agent -> avatar) ? "/uploads/avatar/".$agent -> avatar : "/assets/img/profile-img.jpg"}}" alt="Profile" class="rounded-circle" width="50px"></td>
				<td><b>{{$org -> name}}<b></td>
				{{-- <td>{{((@$agent -> full_name) ? $agent -> full_name : "Undefined")}}</td> --}}
				<td><b>{{$bonus}}</b>$</td>
				<td><b>{{$busy -> places}}</b> <i class="bi bi-people-fill"></i></td>
			  </tr>

			  @endforeach

			</tbody>
		  </table>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
		</div>
	  </div>
	</div>
  </div>

@endsection
