<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CS TOOLS') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}" ></script>
    <script src="{{ asset('js/app.js') }}" ></script>
    
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('vendors/simplebar/css/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendors/simplebar.css') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
      <div class="sidebar-brand d-none d-md-flex">
        CS TOOLS
      </div>
      <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item"><a class="nav-link" href="index.html">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
            </svg> Dashboard<span class="badge badge-sm bg-info ms-auto">NEW</span></a></li>
        <li class="nav-title">Settings</li>
        <li class="nav-item"><a class="nav-link" href="c{{route('users.index')}}">
            <svg class="nav-icon">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-drop"></use>
            </svg> Users</a></li>
     
        <li class="nav-title">Appplications</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
            </svg> JNS</a>
          <ul class="nav-group-items">
            <li class="nav-item"><a class="nav-link" href="{{route('jns.users.index')}}"><span class="nav-icon"></span> Users</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('jns.divisions.index')}}"><span class="nav-icon"></span> Divisions</a></li>
            <li class="nav-item"><a class="nav-link" href="base/cards.html"><span class="nav-icon"></span> Informations</a></li>
         
          </ul>
        </li>

        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
            </svg> CPRO</a>
          <ul class="nav-group-items">
            <li class="nav-item"><a class="nav-link" href="base/accordion.html"><span class="nav-icon"></span> Users</a></li>
            <li class="nav-item"><a class="nav-link" href="base/breadcrumb.html"><span class="nav-icon"></span> Divisions</a></li>
            <li class="nav-item"><a class="nav-link" href="base/cards.html"><span class="nav-icon"></span> Informations</a></li>
         
          </ul>
        </li>

        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
          <svg class="nav-icon">
            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
          </svg> M2M</a>
        <ul class="nav-group-items">
          <li class="nav-item"><a class="nav-link" href="{{route('m2m.users.index')}}"><span class="nav-icon"></span> HTTP Users</a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('smpps.users.index')}}"><span class="nav-icon"></span> SMPP Users</a></li>
       
        </ul>
      </li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
          <svg class="nav-icon">
            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
          </svg> WAI</a>
        <ul class="nav-group-items">
          <li class="nav-item"><a class="nav-link" href="base/accordion.html"><span class="nav-icon"></span> Users</a></li>
            <li class="nav-item"><a class="nav-link" href="base/breadcrumb.html"><span class="nav-icon"></span> Divisions</a></li>
            <li class="nav-item"><a class="nav-link" href="base/cards.html"><span class="nav-icon"></span> Informations</a></li>
       
        </ul>
      </li>
        
        
      <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
        <svg class="nav-icon">
          <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
        </svg> INFORMATIONS</a>
      <ul class="nav-group-items">
        <li class="nav-item"><a class="nav-link" href="{{route('information.audittrail')}}"><span class="nav-icon"></span> Audit Trail</a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('information.invalidwording')}}"><span class="nav-icon"></span> Invalid Wording</a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('information.blacklist')}}"><span class="nav-icon"></span> Black List</a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('information.drlist')}}"><span class="nav-icon"></span> DR List</a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('information.masking')}}"><span class="nav-icon"></span> Masking</a></li>
     
      </ul>
    </li>
      <li class="nav-item"><a class="nav-link" href=""><span class="nav-icon"></span> Report</a></li>
        
      </ul>
    </div>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
      <header class="header header-sticky mb-4">
        <div class="container-fluid">
          <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <svg class="icon icon-lg">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
            </svg>
          </button><a class="header-brand d-md-none" href="#">
            <svg width="118" height="46" alt="CoreUI Logo">
              <use xlink:href="{{ asset('assets/brand/coreui.svg#full') }}"></use>
            </svg></a>
          
          <ul class="header-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="#">
                <svg class="icon icon-lg">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
                </svg></a></li>
            
            <li class="nav-item"><a class="nav-link" href="{{route('auth.logout')}}">
                <svg class="icon icon-lg">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                </svg></a></li>
          </ul>
          
        </div>
        <div class="header-divider"></div>
        <div class="container-fluid">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-2">
              <li class="breadcrumb-item">
                <!-- if breadcrumb is single--><span>Home</span>
              </li>
              <li class="breadcrumb-item active"><span>Dashboard</span></li>
            </ol>
          </nav>
        </div>
      </header>
      <div class="body flex-grow-1 px-3">
        @yield('content')
      </div>
      <footer class="footer">
        <div> cstools © 2022 </div>
      </footer>
    </div>
   
 
</body>
</html>
 <!-- CoreUI and necessary plugins-->
 <script src="{{ asset('vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('vendors/simplebar/js/simplebar.min.js') }}"></script>

    <script src="{{ asset('vendors/@coreui/utils/js/coreui-utils.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
