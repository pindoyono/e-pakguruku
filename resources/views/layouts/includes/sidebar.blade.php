<div class="user">
    <div class="photo">
      {{-- <img src="../../assets/img/avatar.jpg" /> --}}
      <img src="{{asset('assets/img/kaltara.png')}}" />
    </div>
    <div class="user-info">
            <a href="{{ route('users.edit',Crypt::encrypt(Auth::user()->id) ) }}" class="username">
                <p>
                    {{Auth::user()->name}}
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
            <p> Kenaikan Pangkat </p>
        </a>
    </li>
    @endrole


    @role('penilai')
    <li class="nav-item ">
        <a class="nav-link" href="{{ route('paks.penilai') }}">
            <i class="material-icons">calculate</i>
            <p> Penilaian </p>
        </a>
    </li>
    @endrole



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
