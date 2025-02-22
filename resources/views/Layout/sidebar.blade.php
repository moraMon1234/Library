<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
    <a class="sidebar-brand brand-logo" href="index.html"><img src="{{ asset('images/logo.svg') }}" alt="logo" /></a>
    <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="{{ asset('images/logo-mini.svg') }}" alt="logo" /></a>
  </div>
  <ul class="nav">
    <li class="nav-item profile">
      <div class="profile-desc">
        <div class="profile-pic">
          <div class="count-indicator">
            <img class="img-xs rounded-circle" src="{{ asset('storage/' . Auth::user()->image) }}" style="height: 40px ; width: 40px; " alt="">
          </div>
          <div class="profile-name">
            <h5 class="mb-0 font-weight-normal text-center">
              {{ ucfirst(Auth::user()->name ?? 'Guest') }}
            </h5>
          </div>
        </div>
      </div>
    </li>
    
    <li class="nav-item nav-category">
      <span class="nav-link">Features</span>
    </li>

    <li class="nav-item menu-items">
      <a class="nav-link" href="index.html">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    @auth
      @if(Auth::user()->type == 'admin')
        <li class="nav-item menu-items">
          <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-icon">
              <i class="mdi mdi-table-large"></i>
            </span>
            <span class="menu-title">Tables</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="/book">Book</a></li>
              <li class="nav-item"> <a class="nav-link" href="/author">Author</a></li>
              <li class="nav-item"> <a class="nav-link" href="/student">Student</a></li>
              <li class="nav-item"> <a class="nav-link" href="/category">Category</a></li>
            </ul>
          </div>
        </li>
        @endif
        @endauth
        <li class="nav-item menu-items">
          <a class="nav-link" data-toggle="collapse" href="#authentication" aria-expanded="false" aria-controls="authentication">
            <span class="menu-icon">
              <i class="mdi mdi-security"></i>
            </span>
            <span class="menu-title">Authentication</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="authentication">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="/login"> Change Password </a></li>
              <li class="nav-item"> <a class="nav-link" href="/register">Change Phone </a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="/chart">
            <span class="menu-icon">
              <i class="mdi mdi-email"></i>
            </span>
            <span class="menu-title">Contact US</span>
          </a>
        </li>
      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <span class="menu-icon">
            <i class="mdi mdi-account-circle"></i>
          </span>
          <span class="menu-title">User Account</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="/login"> Login </a></li>
            <li class="nav-item"> <a class="nav-link" href="/register"> Register </a></li>
          </ul>
        </div>
      </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="/terms">
        <span class="menu-icon">
          <i class="mdi mdi-clipboard-text"></i>
        </span>
        <span class="menu-title">Terms & Conditions</span>
      </a>
    </li>
  </ul>
</nav>
