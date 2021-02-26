<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="{{asset('assets/img/brand/blue.png')}}" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="{{asset('assets/img/theme/ind.jpg')}}">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">INDONESIA</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <a href="provinsi" class="dropdown-item">
                <i class="fa fa-university"></i>
                  <span>Provinsi</span>
                </a>
                <a href="kota" class="dropdown-item">
                <i class="fa fa-building"></i>
                  <span>Kota</span>
                </a>
                <a href="kecamatan" class="dropdown-item">
                <i class="fa fa-building"></i>
                  <span>Kecamatan</span>
                </a>
                <a href="kelurahan" class="dropdown-item">
                <i class="fa fa-building"></i>
                  <span>Kelurahan</span>
                </a>
                <a href="rw" class="dropdown-item">
                <i class="fa fa-address-card"></i>
                  <span>Rw</span>
                </a>
                <a href="tracking" class="dropdown-item">
                <i class="fa fa-bookmark"></i>
                  <span>Tracking</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item"onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();" class="nav-link">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                       @csrf
                  </form>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
          
          