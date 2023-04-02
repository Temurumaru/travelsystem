@extends('layouts.agent')


@section('title', 'Агент панель')
@section('header_title', APP_NAME)
@section('sub_title', '')


@section('content')
  
  <div class="col">

    <div class="row">
     <!-- Sales Card -->
     <div class="col-xxl-4 col-md-6">
       <div class="card info-card sales-card">

         <div class="card-body">
           <h5 class="card-title">Осталось <span>| Всего</span><h5>
    
           <div class="d-flex align-items-center">
             <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
               <i class="bi bi-airplane-engines"></i>
             </div>
             <div class="ps-3">
               <h6>145 мест</h6>
             </div>
           </div>
         </div>
    
       </div>
     </div><!-- End Sales Card -->
    
     <!-- Revenue Card -->
     <div class="col-xxl-4 col-md-6">
       <div class="card info-card revenue-card">

         <div class="card-body">
           <h5 class="card-title">Баланс <span>| За этот месяц</span></h5>
    
           <div class="d-flex align-items-center">
             <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
               <i class="bi bi-currency-dollar"></i>
             </div>
             <div class="ps-3">
               <h6>$3,264</h6>
             </div>
           </div>
         </div>
    
       </div>
     </div><!-- End Revenue Card -->
    
     <!-- Customers Card -->
     <div class="col-xxl-4 col-xl-12">
    
       <div class="card info-card customers-card">
    
         <div class="card-body">
           <h5 class="card-title">Занято <span>| Всего</span></h5>
    
           <div class="d-flex align-items-center">
             <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
               <i class="bi bi-people"></i>
             </div>
             <div class="ps-3">
               <h6>55 мест</h6>
             </div>
           </div>
    
         </div>
       </div>
    
     </div><!-- End Customers Card -->
      
    </div>

    {{-- <div class="card">
      <div class="card-body">
        <div class="card-title">Hello!</div>
        <p>
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, aliquam, debitis nulla rem, cupiditate error doloremque sit ea aspernatur reprehenderit blanditiis commodi ipsa fugiat aliquid quos culpa maiores sunt alias?
        </p>
      </div>
    </div> --}}
  </div>

@endsection