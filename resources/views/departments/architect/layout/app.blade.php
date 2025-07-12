<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>GAF | Engineers</title>
  <!-- base:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="logo.png" />
</head>
<body>
  <div class="container-scroller d-flex">
    <!-- partial:./partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item sidebar-category">
          <p>Navigation</p>
          <span></span>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/architect')}}">
            <i class="mdi mdi-file-document-box-outline menu-icon"></i>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item sidebar-category">
          <p>Transfers</p>
          <span></span>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/architect-share')}}">
            <i class="mdi mdi-file-document menu-icon"></i>
            <span class="menu-title">File Sharing</span>
          </a>
        </li>        
        <li class="nav-item sidebar-category">
          <p>Status</p>
          <span></span>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/architect-pending')}}">
            <i class="mdi mdi-book menu-icon"></i>
            <span class="menu-title">Pending Projects</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/architect-completed')}}">
            <i class="mdi mdi-book menu-icon"></i>
            <span class="menu-title">Completed Projects</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/architect-backup')}}">
            <i class="mdi mdi-book menu-icon"></i>
            <span class="menu-title">Backups</span>
          </a>
        </li>
        <li class="nav-item sidebar-category">
          <p>Notifications</p>
          <span></span>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/architect-part1')}}">
          <i class="mdi mdi-book menu-icon"></i>
            <span class="menu-title">Part 1</span>
          </a>
        </li>
        <!-- <li class="nav-item sidebar-category">
          <p>Settings</p>
          <span></span>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/architect-filtering')}}">
            <i class="mdi mdi-view-quilt menu-icon"></i>
            <span class="menu-title">Filtering</span>
          </a>
        </li> -->
      </ul>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:./partials/_navbar.html -->
      <nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="navbar-brand-wrapper">
            <a class="navbar-brand brand-logo" href="{{url('/')}}"><img src="logo.png" height="100px" width="100px" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="{{url('/')}}"><img src="logo.png" alt="logo"/></a>
          </div>
          <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1">     </h4>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item">
              <h4 class="mb-0 font-weight-bold d-none d-xl-block">{{ $currentDateTime->format('M d, Y H:i:s') }}</h4>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
        <div class="navbar-menu-wrapper navbar-search-wrapper d-none d-lg-flex align-items-center">
        <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-search d-none d-lg-block">
                <div class="input-group">
                    <input type="text" class="form-control" id="departmentSearch" readonly placeholder="GAF, Architect Department" aria-label="search" aria-describedby="search">
                </div>
            </li>
        </ul>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                <img src="logo.png" alt="profile"/>
                <span class="nav-profile-name">{{Auth::user()->name}}</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="mdi mdi-logout text-primary"></i>
                    Logout
                </a>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

              </div>
            </li>
            <li class="nav-item">
              <a href="{{url('/help-architect')}}" class="nav-link icon-link">
                <i class="mdi mdi-help-circle-outline"></i>
              </a>
            </li>
          </ul>
        </div>
      </nav>



