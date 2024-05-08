@include('layout_login.header')
<body class="register-page">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-transparent " color-on-scroll="100">
      <div class="container">
        <div class="navbar-translate">
          <a class="navbar-brand" href="https://diskominfo.ciamiskab.go.id/" rel="tooltip" title="Created by Diskominfo Kabupaten Ciamis" data-placement="bottom" target="_blank">
            <span>Login•</span> Dashboard Agenda BPKD Aplikasi Kabupaten Ciamis
          </a>
          <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar bar1"></span>
            <span class="navbar-toggler-bar bar2"></span>
            <span class="navbar-toggler-bar bar3"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
          <div class="navbar-collapse-header">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a>
                    Login•
                </a>
              </div>
              <div class="col-6 collapse-close text-right">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="tim-icons icon-simple-remove"></i>
                </button>
              </div>
            </div>
          </div>
          {{-- <ul class="navbar-nav">
            <li class="nav-item p-0">
              <a class="nav-link" rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank">
                <i class="fab fa-twitter"></i>
                <p class="d-lg-none d-xl-none">Twitter</p>
              </a>
            </li>
            <li class="nav-item p-0">
              <a class="nav-link" rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank">
                <i class="fab fa-facebook-square"></i>
                <p class="d-lg-none d-xl-none">Facebook</p>
              </a>
            </li>
            <li class="nav-item p-0">
              <a class="nav-link" rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank">
                <i class="fab fa-instagram"></i>
                <p class="d-lg-none d-xl-none">Instagram</p>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../index.html">Back to Kit</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://github.com/creativetimofficial/blk-design-system/issues">Have an issue?</a>
            </li>
          </ul> --}}
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="wrapper">
      <div class="page-header">
        <div class="page-header-image"></div>
        <div class="content">
          <div class="container">
            <div class="row">
              <div class="col-lg-5 col-md-6 offset-lg-0 offset-md-3">
                {{-- <div id="square7" class="square square-7"></div>
                <div id="square8" class="square square-8"></div> --}}
                <div class="container-login">
                    <div class="heading-login">Sign In</div>


                    <form method="post" action="{{ route('login.perform') }}" class="form-login">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        @include('layout_admin.partials.messages')
                      <input type="text" class="input" name="username" value="{{ old('username') }}" placeholder="Username" required="required" autofocus>
                      @if ($errors->has('username'))
                      <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                  @endif
                  <input type="password" class="input" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
                  <label for="floatingPassword">Password</label>
                  @if ($errors->has('password'))
                      <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                  @endif
                      <input class="login-button" type="submit" value="Sign In">

                    </form>
                    {{-- <div class="social-account-container">
                        <span class="title">Or Sign in with</span>
                        <div class="social-accounts">
                          <button class="social-button google">
                            <svg class="svg" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 488 512">
                              <path d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"></path>
                            </svg></button>
                          <button class="social-button apple">
                            <svg class="svg" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                              <path d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z"></path>
                            </svg>
                          </button>
                          <button class="social-button twitter">
                            <svg class="svg" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                              <path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"></path>
                            </svg>
                          </button>
                        </div>
                      </div> --}}
                       <!-- Google Recaptcha -->
        <div class="g-recaptcha mt-4" data-sitekey={{config('services.recaptcha.key')}}></div>
                  </div>
              </div>
            </div>
            <div class="register-bg"></div>
            <div id="square1" class="square square-1"></div>
            <div id="square2" class="square square-2"></div>
            <div id="square3" class="square square-3"></div>
            <div id="square4" class="square square-4"></div>
            <div id="square5" class="square square-5"></div>
            <div id="square6" class="square square-6"></div>
          </div>
        </div>
      </div>
@include('layout_login.footer')
