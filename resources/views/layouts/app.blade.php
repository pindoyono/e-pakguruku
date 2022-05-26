<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.includes.head')
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="rose" data-background-color="black" data-image="../../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="#" class="simple-text logo-mini">
            <img width="30px" src="{{asset('assets/img/kaltara.png')}}" />
        </a>
        <a href="#" class="simple-text logo-normal">
          E-PAK GURU
        </a></div>
      <div class="sidebar-wrapper">
        @include('layouts.includes.sidebar')
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      @include('layouts.includes.nav')
      <!-- End Navbar -->
      <div class="content">
            @yield('content')

            @if(Auth::user()->wilayah_kerja == null || get_upadate_at('kepegawaians',Auth::user()->id) > 0)
            <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <h3>
                          Biodata Dan Berkas Kepegawaian Anda belum lengkap silahkan lengkapi terlebih dahulu dengan klik link di bawah ini <br>
                          <a type="button" href="{{route('users.edit',Crypt::encrypt(Auth::user()->id))}}" class="btn btn-primary">Lengkapi Biodata</a>
                          <a type="button" href="{{route('kepegawaians.edit',get_id_kepegawaian('kepegawaians',Auth::user()->id))}}" class="btn btn-succes">Lengkapi Berkas</a>

                      </h3>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            @endif

      </div>
      <footer class="footer">
        @include('layouts.includes.footer')
      </footer>
    </div>
  </div>



  <!--   Core JS Files   -->
    @include('layouts.includes.js')

    <script>
        $(document).ready(function(){
            $("#Modal").modal("show");
        });
    </script>

</body>

</html>
