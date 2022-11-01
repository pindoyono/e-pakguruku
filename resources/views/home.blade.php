@extends('layouts.app')

@section('content')
  <div class="row">
    <!-- Display the countdown timer in an element -->
    <div class="col-lg-4"></div>
    <div class="col-lg-4"><p id="demo" style="font-size:40px;text-align: center;font-weight:bold"></p></div>
    <div class="col-lg-4"></div>


    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-warning card-header-icon">
          <div class="card-icon">
            <i class="material-icons">people_alt</i>
          </div>
          <p class="card-category">Jumlah Guru</p>
          <h3 class="card-title">{{ get_juml_guru() }}</h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons text-danger"></i>
            <a href="#pablo">...</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-rose card-header-icon">
          <div class="card-icon">
            <i class="material-icons">update</i>
          </div>
          <p class="card-category">PAK TAHUNAN</p>
          <h3 class="card-title">{{ get_juml_guru_pak('PAK TAHUNAN') }}</h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons"></i> ...
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-success card-header-icon">
          <div class="card-icon">
            <i class="material-icons">trending_up</i>
          </div>
          <p class="card-category">NAIK PANGKAT</p>
          <h3 class="card-title">{{ get_juml_guru_pak('NAIK PANGKAT') }}</h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons"></i> ...
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-info card-header-icon">
          <div class="card-icon">
            <i class="material-icons">functions </i>
          </div>
          <p class="card-category">Total Usulan</p>
          <h3 class="card-title"> {{ get_juml_guru_pak('NAIK PANGKAT') + get_juml_guru_pak('PAK TAHUNAN') }} </h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">functions </i> ...
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="container-fluid">
    <div class="header text-center">
      <h3 class="title">Timeline</h3>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card card-timeline card-plain">
          <div class="card-body">
            <ul class="timeline">
              <li class="timeline-inverted">
                <div class="timeline-badge danger">
                  <i class="material-icons">card_travel</i>
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <span class="badge badge-pill badge-danger">Okt - Nov 2022</span>
                  </div>
                  <div class="timeline-body">
                    <p>Input Dupak</p>
                  </div>
                  <h6>
                    <i class="ti-time"></i>
                  </h6>
                </div>
              </li>
              <li>
                <div class="timeline-badge success">
                  <i class="material-icons">extension</i>
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <span class="badge badge-pill badge-success">Okt - Nov 2022</span>
                  </div>
                  <div class="timeline-body">
                    <p>Verifikasi Berkas</p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-badge info">
                  <i class="material-icons">fingerprint</i>
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <span class="badge badge-pill badge-info">Nov 2022</span>
                  </div>
                  <div class="timeline-body">
                    <p>Penilaian PAK</p>
                    <p></p>
                    <hr>
                  </div>
                  {{-- <div class="timeline-footer">
                    <div class="dropdown">
                      <button type="button" class="btn btn-round btn-info dropdown-toggle" data-toggle="dropdown">
                        <i class="material-icons">build</i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </div>
                  </div> --}}
                </div>
              </li>
              <li>
                <div class="timeline-badge warning">
                  <i class="material-icons">flight_land</i>
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <span class="badge badge-pill badge-warning">...</span>
                  </div>
                  <div class="timeline-body">
                    <p>...</p>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection


<script>
    // Set the date we're counting down to
    var countDownDate = new Date("{{get_tgl_count()}}"+" 24:00:00").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

      // Get today's date and time
      var now = new Date().getTime();

      // Find the distance between now and the count down date
      var distance = countDownDate - now;

      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Display the result in the element with id="demo"
      document.getElementById("demo").innerHTML = days + "d " + hours + "h "
      + minutes + "m " + seconds + "s ";

      // If the count down is finished, write some text
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "Masa Pengusulan Sudah Berakhir";
      }
    }, 1000);
    </script>
