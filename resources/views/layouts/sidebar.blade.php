<ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">

                  <img src="{{asset('images/djp2.jpeg')}}" alt="profile image">

                </div>
                <div class="text-wrapper">
                  <p class="profile-name">{{Auth::user()->name}}</p>
                  <div>
                    <small class="designation text-muted" style="text-transform: uppercase;letter-spacing: 1px;">{{ Auth::user()->level }}</small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item"> 
            <a class="nav-link" href="{{url('/')}}">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          @if(Auth::user()->level == 'admin')
          <li class="nav-item {{ setActive(['wajibpajak*', 'berkas*','upload*']) }}">
            <a class="nav-link  " data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Master Data</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ setShow(['wajibpajak*', 'berkas*','upload*']) }}" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link {{ setActive(['wajibpajak*']) }}" href="{{route('wajibpajak.index')}}">Cari berkas</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ setActive(['berkas*']) }}" href="{{route('berkas.index')}}">Download Berkas</a>
                </li>
                 <li class="nav-item">
                  <a class="nav-link {{ setActive(['upload*']) }}" href="{{ route('upload.create')}}">Upload Berkas</a>
                </li>
              </ul>
            </div>
          </li>
          @endif
          <li class="nav-item  {{ setActive(['user*']) }}">
            <a class="nav-link" href="{{route('user.index')}}">
              <i class="menu-icon mdi mdi-account"></i>
              <span class="menu-title">User</span>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-laporan" aria-expanded="false" aria-controls="ui-laporan">
              <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title">Laporan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-laporan">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="{{url('laporan/trs')}}">Laporan Transaksi</a>
                </li>
                <!-
                <li class="nav-item">
                  <a class="nav-link" href="">Laporan Anggota</a>
                </li>
               
                 <li class="nav-item">
                  <a class="nav-link" href="{{url('laporan/buku')}}">Laporan Buku</a>
                </li>
              </ul>
            </div>
          </li> --> 
         
        </ul>