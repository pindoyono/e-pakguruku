<div class="user">
    <div class="photo">
        {{-- <img src="../../assets/img/avatar.jpg" /> --}}
        @if (Auth::user()->avatar == null)
            <img height="40px" src="{{ asset('storage/avatar/placeholder.jpg') }}" alt="...">
        @else
            <img height="40px" src="{{ asset('storage/avatar/' . Auth::user()->avatar) }}" alt="...">
        @endif
    </div>
    <div class="user-info">
        <a href="{{ route('users.edit', Crypt::encrypt(Auth::user()->id)) }}" class="username">
            <p>
                {{ Auth::user()->name }}
            </p>
        </a>
        {{-- <div class="collapse" id="collapseExample">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span class="sidebar-mini"> MP </span>
              <span class="sidebar-normal"> My Profile </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span class="sidebar-mini"> EP </span>
              <span class="sidebar-normal"> Edit Profile </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span class="sidebar-mini"> S </span>
              <span class="sidebar-normal"> Settings </span>
            </a>
          </li>
        </ul>
      </div> --}}
    </div>
</div>
<ul class="nav">
    <li class="nav-item ">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="material-icons">dashboard</i>
            <p> Dashboard </p>
        </a>
    </li>
    @role('super-admin')
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('users.index') }}">
                <i class="material-icons">people</i>
                <p> Pengguna </p>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('kegiatans.index') }}">
                <i class="material-icons">switch_access_shortcut_add</i>
                <p> Kegiatan </p>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('jabatans.index') }}">
                <i class="material-icons">trending_up</i>
                <p> Jabatan </p>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('lampiran2pkbs.index') }}">
                <i class="material-icons">assistant</i>
                <p> Lampiran 2 PKB </p>
            </a>
        </li>
    @endrole

    @role('guru')
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('kepegawaians.index') }}">
                <i class="material-icons">receipt_long</i>
                <p> Berkas Kepegawaian </p>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('paks.index') }}">
                <i class="material-icons">folder_open</i>
                <p> DUPAK </p>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('pendidikans.naik_pangkat') }}">
                <i class="material-icons">trending_up</i>
                <p> Kenaikan Pangkat <span class="badge badge-pill badge-info">Beta</span> </p>
            </a>
        </li>
        @role('admin')
            {{-- <li class="nav-item ">
                <a class="nav-link" href="{{ route('pendidikans.naik_pangkat') }}">
                    <i class="material-icons">trending_up</i>
                    <p> Kenaikan Pangkat <span class="badge badge-pill badge-info">Beta</span> </p>
                </a>
            </li> --}}
        @endrole

    @endrole

    @role('penilai')
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('penilais.penilai') }}">
                <i class="material-icons">calculate</i>
                <p> Penilaian <span class="badge badge-pill badge-warning">Kenpa</span> </p>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('penilais.penilai_tahunan') }}">
                <i class="material-icons">calculate</i>
                <p> Penilaian <span class="badge badge-pill badge-success">Tahunan</span> </p>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('lampiran2pkbs.index') }}">
                <i class="material-icons">assistant</i>
                <p> Lampiran 2 PKB </p>
            </a>
        </li>
    @endrole

    @role('admin-prov|cabdin')
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('provinsis.verifikasi') }}">
                <i class="material-icons">verified</i>
                <p> Verifikasi <span class="badge badge-pill badge-warning">Kenpa</span> </p>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('provinsis.verifikasi_tahunan') }}">
                <i class="material-icons">verified</i>
                <p> Verifikasi <span class="badge badge-pill badge-success">Tahunan</span> </p>
            </a>
        </li>
    @endrole

    @role('admin-prov')
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('penilais.pleno') }}">
                <i class="material-icons">view_in_ar</i>
                <p> Rekap Pleno <span class="badge badge-pill badge-warning">Kenpa</span></p>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('penilais.pleno_tahunan') }}">
                <i class="material-icons">view_in_ar</i>
                <p> Rekap Pleno <span class="badge badge-pill badge-success">Tahunan</span> </p>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('settings.index') }}">
                <i class="material-icons">settings</i>
                <p> Setting </p>
            </a>
        </li>
    @endrole



    <li class="nav-item ">
        <a class="nav-link" href="{{ route('penilais.angka_kredit') }}">
            <i class="material-icons">my_location</i>
            <p> Angka Kredit </p>
        </a>
    </li>

    <li class="nav-item ">
        <a class="nav-link" target="_blank" href="https://t.me/+N3_V0kylBOgxY2M1">
            <i class="material-icons">contact_support</i>
            <p> Group Diskusi </p>
        </a>
    </li>

    <li class="nav-item ">
        <a class="nav-link" target="_blank" href="https://youtu.be/OQrhI7BYUYI">
            <i class="material-icons">play_circle</i>
            <p> Video Panduan </p>
        </a>
    </li>

    <li class="nav-item ">
        <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
            <i class="material-icons">logout</i>
            <p> Logout </p>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>
    {{-- <li class="nav-item  active">
      <a class="nav-link" data-toggle="collapse" href="#pagesExamples" aria-expanded="true">
        <i class="material-icons">image</i>
        <p> Pages
          <b class="caret"></b>
        </p>
      </a>
      <div class="collapse show" id="pagesExamples">
        <ul class="nav">
          <li class="nav-item ">
            <a class="nav-link" href="../../examples/pages/pricing.html">
              <span class="sidebar-mini"> P </span>
              <span class="sidebar-normal"> Pricing </span>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../../examples/pages/rtl.html">
              <span class="sidebar-mini"> RS </span>
              <span class="sidebar-normal"> RTL Support </span>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../../examples/pages/timeline.html">
              <span class="sidebar-mini"> T </span>
              <span class="sidebar-normal"> Timeline </span>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../../examples/pages/login.html">
              <span class="sidebar-mini"> LP </span>
              <span class="sidebar-normal"> Login Page </span>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../../examples/pages/register.html">
              <span class="sidebar-mini"> RP </span>
              <span class="sidebar-normal"> Register Page </span>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../../examples/pages/lock.html">
              <span class="sidebar-mini"> LSP </span>
              <span class="sidebar-normal"> Lock Screen Page </span>
            </a>
          </li>
          <li class="nav-item active ">
            <a class="nav-link" href="../../examples/pages/user.html">
              <span class="sidebar-mini"> UP </span>
              <span class="sidebar-normal"> User Profile </span>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../../examples/pages/error.html">
              <span class="sidebar-mini"> E </span>
              <span class="sidebar-normal"> Error Page </span>
            </a>
          </li>
        </ul>
      </div>
    </li> --}}
    {{-- <li class="nav-item ">
      <a class="nav-link" data-toggle="collapse" href="#componentsExamples">
        <i class="material-icons">apps</i>
        <p> Components
          <b class="caret"></b>
        </p>
      </a>
      <div class="collapse" id="componentsExamples">
        <ul class="nav">
          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#componentsCollapse">
              <span class="sidebar-mini"> MLT </span>
              <span class="sidebar-normal"> Multi Level Collapse
                <b class="caret"></b>
              </span>
            </a>
            <div class="collapse" id="componentsCollapse">
              <ul class="nav">
                <li class="nav-item ">
                  <a class="nav-link" href="#0">
                    <span class="sidebar-mini"> E </span>
                    <span class="sidebar-normal"> Example </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../../examples/components/buttons.html">
              <span class="sidebar-mini"> B </span>
              <span class="sidebar-normal"> Buttons </span>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../../examples/components/grid.html">
              <span class="sidebar-mini"> GS </span>
              <span class="sidebar-normal"> Grid System </span>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../../examples/components/panels.html">
              <span class="sidebar-mini"> P </span>
              <span class="sidebar-normal"> Panels </span>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../../examples/components/sweet-alert.html">
              <span class="sidebar-mini"> SA </span>
              <span class="sidebar-normal"> Sweet Alert </span>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../../examples/components/notifications.html">
              <span class="sidebar-mini"> N </span>
              <span class="sidebar-normal"> Notifications </span>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../../examples/components/icons.html">
              <span class="sidebar-mini"> I </span>
              <span class="sidebar-normal"> Icons </span>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../../examples/components/typography.html">
              <span class="sidebar-mini"> T </span>
              <span class="sidebar-normal"> Typography </span>
            </a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item ">
      <a class="nav-link" data-toggle="collapse" href="#formsExamples">
        <i class="material-icons">content_paste</i>
        <p> Forms
          <b class="caret"></b>
        </p>
      </a>
      <div class="collapse" id="formsExamples">
        <ul class="nav">
          <li class="nav-item ">
            <a class="nav-link" href="../../examples/forms/regular.html">
              <span class="sidebar-mini"> RF </span>
              <span class="sidebar-normal"> Regular Forms </span>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../../examples/forms/extended.html">
              <span class="sidebar-mini"> EF </span>
              <span class="sidebar-normal"> Extended Forms </span>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../../examples/forms/validation.html">
              <span class="sidebar-mini"> VF </span>
              <span class="sidebar-normal"> Validation Forms </span>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../../examples/forms/wizard.html">
              <span class="sidebar-mini"> W </span>
              <span class="sidebar-normal"> Wizard </span>
            </a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item ">
      <a class="nav-link" data-toggle="collapse" href="#tablesExamples">
        <i class="material-icons">grid_on</i>
        <p> Tables
          <b class="caret"></b>
        </p>
      </a>
      <div class="collapse" id="tablesExamples">
        <ul class="nav">
          <li class="nav-item ">
            <a class="nav-link" href="../../examples/tables/regular.html">
              <span class="sidebar-mini"> RT </span>
              <span class="sidebar-normal"> Regular Tables </span>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../../examples/tables/extended.html">
              <span class="sidebar-mini"> ET </span>
              <span class="sidebar-normal"> Extended Tables </span>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../../examples/tables/datatables.net.html">
              <span class="sidebar-mini"> DT </span>
              <span class="sidebar-normal"> DataTables.net </span>
            </a>
          </li>
        </ul>
      </div>
    </li> --}}
</ul>
