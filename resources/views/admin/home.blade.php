@extends('layouts.admin')


@section('title', 'Админ панель')
@section('header_title', APP_NAME)
@section('sub_title', '')

@section('content')

  @php
    use ThreadBeanPHP\C as C;
  @endphp

  <div class="col-xl-3">

    <div class="card">
      <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

        <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
        <h2>{{$_SESSION['user'] -> full_name}}</h2>
        <h3>
          @if((bool)$_SESSION['user'] -> supreme)
          Верховный
          @endif
          Админ
        </h3>
        <a href="{{route('admin_tour_create')}}" class="btn btn-primary">Создать Тур</a>
      </div>
    </div>

  </div>

  <div class="col-xl-9">

    <div class="col">

      <div class="row">
        @php
          $agents_count = C::count("agents");
          $tours_count = C::count("tours", "active = ?", [1]);
          $places_stat_db = C::find("tours", "active = ?", [1]);
          $places_stat = 0;
          foreach ($places_stat_db as $val) {
            $places_stat += $val -> places;
          }
        @endphp
       
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card sales-card">
   
            <div class="card-body">
              <h5 class="card-title">Места <span>| В общем во всех объявлениях</span></h5>
       
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-airplane-engines"></i>
                </div>
                <div class="ps-3">
                  <h6>{{$places_stat}}</h6>
                </div>
              </div>
            </div>
       
          </div>
        </div>
       
       <div class="col-xxl-4 col-md-6">
         <div class="card info-card revenue-card">
  
           <div class="card-body">
             <h5 class="card-title">Туров <span>| Всего</span></h5>
      
             <div class="d-flex align-items-center">
               <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-globe-central-south-asia"></i>
               </div>
               <div class="ps-3">
                 <h6>{{$tours_count}}</h6>
               </div>
             </div>
           </div>
      
         </div>
       </div>
      
       <!-- Customers Card -->
       <div class="col-xxl-4 col-xl-12">
      
         <div class="card info-card customers-card">
      
           <div class="card-body">
             <h5 class="card-title">Агентов <span>| Всего</span></h5>
      
             <div class="d-flex align-items-center">
               <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                 <i class="bi bi-people"></i>
               </div>
               <div class="ps-3">
                 <h6>{{$agents_count}}</h6>
               </div>
             </div>
      
           </div>
         </div>
      
       </div><!-- End Customers Card -->
        
      </div>

    </div>

    @if((bool)$_SESSION['user'] -> supreme)

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Список Администраторов</h5>
        
        <a href="{{route('admin_create')}}" class="btn btn-primary mb-4">Добавить Администратора <i class="bi bi-person-plus-fill"></i></a>
        <!-- Bordered Table -->
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Имя</th>
              <th scope="col" class="d-none d-lg-block">Описание</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>

            @foreach ($admins as $admin)
                
            <tr>
              <th scope="row">{{$admin -> id}}</th>
              <td>{{$admin -> full_name}} ({{$admin -> login}})</td>
              <td class="d-none d-lg-block" >{{$admin -> description}}</td>
              <td class="col" >
                <a href="{{route('admin_update')}}?id={{$admin -> id}}" class="m-1 btn btn-warning"><i class="bi bi-pencil-fill"></i></a>
                <a class="m-1 btn btn-danger admin_delete_btn" delid="{{$admin -> id}}"><i class="bi bi-trash-fill"></i></a>
              </td>
            </tr>
            
            @endforeach

          </tbody>
        </table>

      </div>
    </div>

    @endif

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Список Компаний</h5>
        
        <a href="admin_company_create" class="btn btn-primary mb-4">Добавить Компанию <i class="bi bi-person-plus-fill"></i></a>
        <!-- Bordered Table -->
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Название</th>
              <th scope="col">Туров</th>
              <th scope="col" class="d-none d-lg-block">Описание</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>

            @foreach ($orgs as $org)

              @php
                $tours = C::count("tours", "company = ?", [$org -> id]);
              @endphp

              <tr>
                <th scope="row">{{$org -> id}}</th>
                <td>{{$org -> name}}</td>
                <td>{{$tours}}</td>
                <td class="d-none d-lg-block" >{{$org -> description}}</td>
                <td class="col" >
                  <a href="{{route('admin_company_update')}}?id={{$org -> id}}" class="m-1 btn btn-warning"><i class="bi bi-pencil-fill"></i></a>
                  <a delid="{{$org -> id}}" class="org_delete_btn m-1 btn btn-danger"><i class="bi bi-trash-fill"></i></a>
                </td>
              </tr>
            
            @endforeach

          </tbody>
        </table>

      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Список Агентов</h5>
        
        <a href="{{route('admin_agent_create')}}" class="btn btn-primary mb-4">Добавить Агента <i class="bi bi-person-plus-fill"></i></a>
        <!-- Bordered Table -->
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Имя</th>
              <th scope="col">Компания</th>
              <th scope="col" class="d-none d-lg-block">Описание</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>

            @foreach ($agents as $agent)
              @php

                $org = C::findOne("companys", "id = ?", [$agent -> company]);
              @endphp

              <tr>
                <th scope="row">{{$agent -> id}}</th>
                <td>{{$agent -> login}}</td>
                <td>{{$org -> name}}</td>
                <td class="d-none d-lg-block" >{{$agent -> description}}</td>
                <td class="col" >
                  <a href="{{route('admin_agent_update')}}?id={{$agent -> id}}" class="m-1 btn btn-warning"><i class="bi bi-pencil-fill"></i></a>
                  <a delid="{{$agent -> id}}" class="agent_delete_btn m-1 btn btn-danger"><i class="bi bi-trash-fill"></i></a>
                </td>
              </tr>
            
              @endforeach

          </tbody>
        </table>

      </div>
    </div>

  </div>

  <script>
    @if((bool)$_SESSION['user'] -> supreme)
      const req_del_admin_url = "{{route('DeleteAdmin')}}";
    @endif

    const req_del_org_url = "{{route('DeleteCompany')}}";
    const req_del_agent_url = "{{route('DeleteAgent')}}";
  </script>

@endsection