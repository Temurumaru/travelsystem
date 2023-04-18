@extends('layouts.admin')


@section('title', 'Завершённые туры')
@section('header_title', APP_NAME)
@section('sub_title', 'Завершённые туры')


@section('content')
  <div class="card">
    <div class="card-body">
      <div class="card-title">Список Завершённых туров туров</div>
      <div style="overflow-y:scroll;">
        @php
          use ThreadBeanPHP\C as C;
        @endphp

        @foreach ($tours as $tour)

          @php
            $org = C::findOne("companys", "id = ?", [$tour -> company]);
            $agent = C::findOne("agents", "company = ?", [$org -> id]);

            $busy = C::find("busy", "tour = ?", [$tour -> id]);
            $places_rem = $tour -> places;
            foreach ($busy as $item) {
              $places_rem -= $item -> places;
            }

            $city_start_1 = json_decode($tour -> start_leave_1, true);
            $city_start_2 = json_decode(@$tour -> start_come_2, true);
            $city_start_3 = json_decode(@$tour -> start_come_3, true);
            $city_start_4 = json_decode($tour -> start_come_4, true);

            $city_end_1 = json_decode($tour -> end_leave_1, true);
            $city_end_2 = json_decode(@$tour -> end_come_2, true);
            $city_end_3 = json_decode(@$tour -> end_come_3, true);
            $city_end_4 = json_decode($tour -> end_come_4, true);

            if(@$tour -> city_days_2) {
              $days = $tour -> city_days_1 + $tour -> city_days_2;
              $nights = $tour -> city_nights_1 + $tour -> city_nights_2;
            } else {
              $days = $tour -> city_days_1;
              $nights = $tour -> city_nights_1;
            }


            // $date1 = DateTime::createFromFormat('Y-m-d H:i', ($city_start_4['date'].' '.$city_start_1['time'])); // первая дата
            // $date2 = DateTime::createFromFormat('Y-m-d H:i', ($city_end_1['date'].' '.$city_end_1['time'])); // вторая дата

            // $diff = $date1->diff($date2);
            // $total_hours = $diff->h + $diff->days * 24;

            // echo $total_hours; // вывод общего количества часов

          @endphp

          <div class="col card-2 mb-4">
            <span class="un-style">
              <div class="row-lg-12 cnt">
                <img src="{{(@$agent -> avatar) ? "/uploads/avatar/".$agent -> avatar : "/assets/img/profile-img.jpg"}}" alt="Profile" class="rounded-circle" width="50rem">
                <span class="mx-3 lead"><b>{{$org -> name}}</b></span>
                |
                <span class="mx-3 lead">Цена <q><b>{{$tour -> price}}$</b></q></span>
                |
                <span class="mx-3 lead">Всего мест <b>{{$tour -> places}}</b></span>
                |
                <span class="mx-3 lead">Свободно мест <b>{{$places_rem}}</b></span>
                |
                <span class="mx-3 lead"><b>{{$tour -> ended_date}}</b></span>
              </div>
            </span>
            <div class="row-lg-12 mt-3">
              <nav style="--bs-breadcrumb-divider: '>';">
                <ol class="breadcrumb">
                  <span class="lead" style="margin-right:0.5rem;margin-top:-1px;"><b>Отправление |</b> </span>
                  <li class="breadcrumb-item lead active"> {{$city_start_1['city']}}</li>
                  {!!(@$tour -> start_come_2) ? '<li class="breadcrumb-item lead">'.$city_start_2['city'].'</li>' : ""!!}
                  {!!(@$tour -> start_come_3) ? '<li class="breadcrumb-item lead">'.$city_start_3['city'].'</li>' : ""!!}
                  <li class="breadcrumb-item lead active">{{$city_start_4['city']}}</li>
                  <span class="lead-p" style="margin-left:0.5rem;margin-top:-2px;"><b><i>{{$city_start_4['date']}}</i></b>
                    <a href="{{route('admin_tour_update')}}?id={{$tour -> id}}" class="btn btn-warning mx-2"><i class="bi bi-pencil-fill"></i></a>
                  </span>
                </ol>
              </nav>
              <nav style="--bs-breadcrumb-divider: '>';">
                <ol class="breadcrumb">
                  <span class="lead" style="margin-right:0.5rem;margin-top:-1px;"><b>Возвращение |</b> </span>
                  <li class="breadcrumb-item lead active"> {{$city_end_1['city']}}</li>
                  {!!(@$tour -> end_come_2) ? '<li class="breadcrumb-item lead">'.$city_end_2['city'].'</li>' : ""!!}
                  {!!(@$tour -> end_come_3) ? '<li class="breadcrumb-item lead">'.$city_end_3['city'].'</li>' : ""!!}
                  <li class="breadcrumb-item lead active">{{$city_end_4['city']}}</li>
                  <span class="lead-p" style="margin-left:0.5rem;margin-top:-2px;"><b><i>{{$city_end_4['date']}}</i></b>
                    <button delid="{{$tour -> id}}" class="tour_delete_btn btn btn-danger mx-2"><i class="bi bi-trash-fill"></i></button>
                  </span>
                </ol>
              </nav>
            </div>
          </div>

        @endforeach
        

      </div>
    </div>
  </div>

  <script>
    const req_del_tour_url = "{{route('DeleteTour')}}";
  </script>
@endsection
