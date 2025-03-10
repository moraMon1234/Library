<nav class="navbar p-0 fixed-top d-flex flex-row">
  <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
    <a class="navbar-brand brand-logo-mini" href="/"><img src="{{ asset('images/logo-mini.svg') }}" alt="logo" /></a>
  </div>
  <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch" style=" margin-left: 235px;">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button>
    <ul class="navbar-nav w-100">
      <li class="nav-item w-100">
        <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
          <input type="text" class="form-control" placeholder="Search products">
        </form>
      </li>
    </ul>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item nav-settings d-none d-lg-block">
        <a class="nav-link" href="#">
          <i class="mdi mdi-view-grid"></i>
        </a>
      </li>
      <li class="nav-item dropdown border-left">
        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
          <i class="mdi mdi-theme-light-dark"></i>
        </a>
      </li>
      <li class="nav-item  border-left">
        <a class="nav-link" href="/" >
          <i class="mdi mdi-logout"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  href="#">
          <div class="navbar-profile">
          <img 
            class="img-xs rounded-circle" 
            src="{{ asset('storage/' . Auth::user()->image) }}"
            style="height: 50px; width: auto;" 
            alt="Profile Image">
            <p class="mb-0 d-none d-sm-block navbar-profile-name">
              {{ ucfirst(Auth::user()->name ?? 'Guest') }}
            </p>
          </div>
        </a>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"  data-toggle="offcanvas">
      <span class="mdi mdi-format-line-spacing"></span>
    </button>
  </div>
</nav>
