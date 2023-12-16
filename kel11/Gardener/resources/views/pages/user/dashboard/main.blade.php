@section('css')
<style>
.calendar-toolbar {
  margin-bottom: 10px;
}
.calendar-month-row {
  height: 75px;
}
.calendar-prior-months-date {
  color: #DDD;
}
.calendar-current-date {
  text-align: center;
  display: inline-block;
  width: 115px;
}
.contain{
  padding: 5% 10%;
  font-family: "Poppins", sans-serif;
}

.time {
  font-size: 5rem;
  display: inline-block;
}

.time-per {
  display: inline-block;
  text-transform: uppercase;
  font-size: 1.2rem;
  margin-left: 1em;
}
</style>
@endsection
<x-web-layout title="Dashboard">

    <div class="row g-5 g-xl-8">
        <div class="col-xl-12">
            <div class="card card-xl-stretch mb-xl-8">
                <div class="card-header align-items-center border-0 mt-4">
                    
                    <h3 class="card-title align-items-start flex-column">
                        <span class="fw-bolder text-dark">Welcome Message !!</span>
                    </h3>
                </div>
                <div class="card-body pt-3">
                    <div class="d-flex align-items-sm-center mb-7">
                        <div class="d-flex flex-row-fluid flex-wrap align-items-center">
                            <div class="flex-grow-1 me-2">
                                <span class="text-gray-800 fw-bolder text-hover-primary fs-6">Selamat Datang {{Auth::user()->username}},</span><br><br>
                                <span class="text-gray-800 text-hover-primary fs-6">Tampilan Admin Kelompok 11 PAM</span><br>
                                <span class="text-gray-800 text-hover-primary fs-6">Jangan Berikan Username dan Password Anda pada Siapapun</span> <br>
                            </div>
                            <span class="fw-bolder text-info py-1"><img alt="Logo" src="{{ asset('img/logo.png') }}" class="h-200px" /><br></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body p-lg-17">
            <div class="row g-5 mb-5 mb-lg-15">
                <div class="col-sm-6 pe-lg-10">
                    <div class="text-center bg-light card-rounded d-flex flex-column justify-content-center p-10 h-100">
                        <div class="container">

                            <h1 class="page-header">
                              <i class="fa fa-calendar"></i> Kalendar
                            </h1>
                            
                            <div class="calendar" id="calendar">

                              <div class="calendar-toolbar">

                                <button data-toggle="calendar" data-action="today" class="btn btn-default">
                                  Today
                                </button>

                                <button data-toggle="calendar" data-action="prev" class="btn btn-default">
                                  <i class="fa fa-chevron-left"></i>
                                </button>

                                <div class="calendar-current-date "
                                      data-day-format="MM/DD/YYYY"
                                      data-week-format="MM/DD/YYYY"
                                      data-month-format="MMMM, YYYY">
                                  (placeholder)
                                </div>

                                <button data-toggle="calendar" data-action="next" class="btn btn-default">
                                  <i class="fa fa-chevron-right"></i>
                                </button>
                                
                              </div>                          
                            </div>
                          </div>                           
                    </div>
                </div>
                <div class="col-sm-6 ps-lg-10">
                    <div class="text-center bg-light card-rounded d-flex flex-column justify-content-center p-10 h-100">
                        <div class="container contain">
                            <h1 class="page-header">
                                <i class="fa fa-calendar"></i> Waktu
                            </h1>
                            <div class="time">12:05:32</div>
                            <div class="time-per">am</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-web-layout>