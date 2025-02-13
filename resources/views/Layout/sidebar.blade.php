<nav class="sidebar sidebar-offcanvas h-100" id="sidebar" >
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top  ">
          <a class="sidebar-brand brand-logo" href="index.html"><img src="{{ asset('images/logo.svg') }}" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="{{ asset('images/logo-mini.svg') }}" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="{{ asset('images/faces/face10.jpg') }}" alt="">
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal text-center">Mora Montasser</h5>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list bg-dark" aria-labelledby="profile-dropdown">
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-black rounded-circle">
                      <i class="mdi mdi-tools  text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small text-light">Account settings</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-black rounded-circle">
                      <i class="mdi mdi-onepassword  text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small text-light">Change Password</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-black rounded-circle">
                      <i class="mdi mdi-calendar-today text-success"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small text-light">To-do list</p>
                  </div>
                </a>
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
              </ul>
            </div>
          </li>
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
                <i class="mdi  mdi-account-circle"></i>
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
            <a class="nav-link" href="pages/icons/mdi.html">
              <span class="menu-icon">
                <i class="mdi mdi-contacts"></i>
              </span>
              <span class="menu-title">Terms & Conditions</span>
            </a>
          </li>
        </ul>
      </nav>