<body class="">
    <div class="wrapper">
      <div class="sidebar">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
      -->
        <div class="sidebar-wrapper">
          <div class="logo">
            <a href="javascript:void(0)" class="simple-text logo-mini">
              DT
            </a>
            <a href="javascript:void(0)" class="simple-text logo-normal">
                IMI Kabupaten Ciamis
            </a>
          </div>
          <ul class="nav">
            <li class="{{ (request()->is('/')) ? 'active' : '' }}">
              <a href="{{ route('home') }}">
                <i class="tim-icons icon-chart-pie-36"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="{{ (request()->is('admin/post/data_post')) ? 'active' : '' }}">
              <a href="{{ route('admin/post/data_post') }}">
                <i class="tim-icons icon-atom"></i>
                <p>Berita</p>
              </a>
            </li>
            <li class="{{ (request()->is('ssl')) ? 'active' : '' }}">
              <a href="{{ route('ssl') }}">
                <i class="tim-icons icon-pin"></i>
                <p>Event</p>
              </a>
            </li>

          </ul>
        </div>
      </div>
      <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
          <div class="container-fluid">
            <div class="navbar-wrapper">
              <div class="navbar-toggle d-inline">
                <button type="button" class="navbar-toggler">
                  <span class="navbar-toggler-bar bar1"></span>
                  <span class="navbar-toggler-bar bar2"></span>
                  <span class="navbar-toggler-bar bar3"></span>
                </button>
              </div>
              <a class="navbar-brand" href="javascript:void(0)">Dashboard</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-bar navbar-kebab"></span>
              <span class="navbar-toggler-bar navbar-kebab"></span>
              <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>

            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav ml-auto">
                <li class="search-bar input-group">

                  <button class="btn btn-link" id="search-button" data-toggle="modal" data-target="#searchModal"><i class="tim-icons icon-zoom-split" ></i>
                    <span class="d-lg-none d-md-block">Search</span>
                  </button>

                </li>
                {{-- <li class="dropdown nav-item">
                  <a href="javascript:void(0)" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <div class="notification d-none d-lg-block d-xl-block"></div>
                    <i class="tim-icons icon-sound-wave"></i>
                    <p class="d-lg-none">
                      Notifications
                    </p>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
                    <li class="nav-link"><a href="#" class="nav-item dropdown-item">Mike John responded to your email</a></li>
                    <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">You have 5 more tasks</a></li>
                    <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Your friend Michael is in town</a></li>
                    <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Another notification</a></li>
                    <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Another one</a></li>
                  </ul>
                </li> --}}
                <li class="dropdown nav-item">
                  <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <div class="photo">
                      <img src="{{ URL::to('backend/assets/img/anime3.png') }}" alt="Profile Photo">
                    </div>
                    <b class="caret d-none d-lg-block d-xl-block"></b>
                    <p class="d-lg-none">
                      Log out
                    </p>
                  </a>
                  <ul class="dropdown-menu dropdown-navbar">
                    <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Profile</a></li>
                    <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Settings</a></li>
                    <li class="dropdown-divider"></li>
                    <li class="nav-link"><a href="{{ route('logout.perform') }}" class="nav-item dropdown-item">Log out</a></li>
                  </ul>
                </li>
                <li class="separator d-lg-none"></li>
              </ul>
            </div>
          </div>
        </nav>
        <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <form action="/website/cari" method="GET">
                  <input type="text" class="form-control" name="cari" id="inlineFormInputGroup" placeholder="SEARCH"  value="{{ old('cari') }}">

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                    <i class="tim-icons icon-simple-remove"></i>
                  </button>
              </form>
                </div>
              </div>
            </div>
          </div>
          <!-- End Navbar -->

