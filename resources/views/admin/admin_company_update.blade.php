@extends('layouts.admin')


@section('title', 'Создать Компанию')
@section('header_title', APP_NAME)
@section('sub_title', 'Создать Компанию')


@section('content')
  
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Форма создания Компании</h5>

        <!-- General Form Elements -->
        <form method="post" action="{{route('UpdateCompany')}}">

          @csrf

          <input type="hidden" name="id" value="{{$org -> id}}">

          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Название</label>
            <div class="col-sm-10">
              <input type="text" name="name" minlength="4" maxlength="40" class="form-control" required value="{{$org -> name}}">
            </div>
          </div>
          
          <div class="row mb-3">
            <label for="inputPassword" class="col-sm-2 col-form-label">Описание</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="description" maxlength="140" style="height: 100px">{{$org -> description}}</textarea>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Изменить</label>
            <div class="col-sm-10">
              <button type="submit" class="btn btn-warning">Нажать</button>
            </div>
          </div>

        </form><!-- End General Form Elements -->

      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="card-title">Список броней Компании</div>
        <table class="table table-borderless">
          <tbody class="agent_tour_element">

            @php
              use ThreadBeanPHP\C as C;
              $busyes = C::find("busy", "company = ?", [$org -> id]);
                
            @endphp

            @foreach ($busyes as $busy)

              @php
                $org = C::findOne("companys", "id = ?", [$busy -> company]);
                $tour = C::findOne("tours", "id = ?", [$busy -> tour]);
                $agent = C::findOne("agents", "company = ?", [$org -> id]);

                $bonus = 0;
                if($busy -> company != $tour -> company) {
                  $bonus = $tour -> bonus * $busy -> places;
                }
              @endphp
                
              <tr>
                <td><img src="{{(@$agent -> avatar) ? $agent -> avatar : "/assets/img/profile-img.jpg"}}" alt="Profile" class="rounded-circle" width="50px"></td>
                <td><b>{{$org -> name}}<b></td>
                <td>{{$tour -> name}}</td>
                <td>{{$bonus}}$</td>
                <td><b>{{$busy -> places}}</b> мест</td>
                <td><button delid="{{$busy -> id}}" class="busy_delete_btn btn btn-danger"><i class="bi bi-trash-fill"></i></button></td>
              </tr>

            @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script>
    const req_del_busy_url = "{{route('DeleteBusy')}}";
  </script>

@endsection