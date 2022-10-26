<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      
      <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

      <meta name="mobile-web-app-capable" content="yes">
      <meta name="apple-mobile-web-app-capable" content="yes">
      <meta name="theme-color" content="#000000">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>GIS | BANGKA</title>

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
      <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="{{ asset('bahan/assets/css/app.css') }}">
      @notifyCss
      @notifyJs

      {{-- <link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon-76.png">
      <link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon-120.png">
      <link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicon-152.png">
      <link rel="icon" sizes="196x196" href="assets/img/favicon-196.png">
      <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"> --}}

      @yield('styles')
  </head>

  <body>
    <div class="navbar navbar-inverse navbar-fixed-top" style="background: #0000ff; border-bottom:5px solid #ffff00;" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                    <div class="navbar-icon-container">
                      <a href="#" class="navbar-icon pull-right visible-xs" id="nav-btn"><i class="fa fa-bars fa-lg white"></i></a>
                      <a href="#" class="navbar-icon pull-right visible-xs" id="sidebar-toggle-btn"><i class="fa fa-search fa-lg white"></i></a>
                    </div>
                    <a class="navbar-brand" href="#">GIS KAB.BANGKA</a>
            </div>
            <div class="navbar-collapse collapse">
                  <form class="navbar-form navbar-right" role="search">
                      <div class="form-group has-feedback">
                          <input id="searchbox" type="text" placeholder="Search" class="form-control">
                          <span id="searchicon" class="fa fa-search form-control-feedback"></span>
                      </div>
                  </form>
                  <ul class="nav navbar-nav">
                    <li><a href="#" data-toggle="collapse" data-target=".navbar-collapse.in" id="about-btn"><i class="fa fa-question-circle white"></i>&nbsp;&nbsp;About</a></li>
                      <li class="dropdown">
                          <a id="toolsDrop" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-globe white"></i>&nbsp;&nbsp;Tools <b class="caret"></b></a>
                          <ul class="dropdown-menu">
                              <li>
                                <a href="#" data-toggle="collapse" data-target=".navbar-collapse.in" id="full-extent-btn"><i class="fa fa-arrows-alt"></i>&nbsp;&nbsp;Zoom To Full Extent</a>
                              </li>
                              <li>
                                <a href="#" data-toggle="collapse" data-target=".navbar-collapse.in" id="legend-btn"><i class="fa fa-picture-o"></i>&nbsp;&nbsp;Show Legend</a>
                              </li>
                              <li class="divider hidden-xs"></li>
                              <li>
                                <a href="#" data-toggle="collapse" data-target=".navbar-collapse.in" id="login-btn"><i class="fa fa-user"></i>&nbsp;&nbsp;Login</a>
                              </li>
                          </ul>
                      </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" id="downloadDrop" href="#" role="button" data-toggle="dropdown"><i class="fa fa-cloud-download white"></i>&nbsp;&nbsp;Download <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                              <a href="" download="boroughs.geojson" target="_blank" data-toggle="collapse" data-target=".navbar-collapse.in"><i class="fa fa-download"></i>&nbsp;&nbsp;Boroughs</a>
                            </li>
                            <li>
                              <a href="" download="subways.geojson" target="_blank" data-toggle="collapse" data-target=".navbar-collapse.in"><i class="fa fa-download"></i>&nbsp;&nbsp;Subway Lines</a>
                            </li>
                            <li>
                              <a href="" download="theaters.geojson" target="_blank" data-toggle="collapse" data-target=".navbar-collapse.in"><i class="fa fa-download"></i>&nbsp;&nbsp;Theaters</a>
                            </li>
                            <li>
                              <a href="" download="museums.geojson" target="_blank" data-toggle="collapse" data-target=".navbar-collapse.in"><i class="fa fa-download"></i>&nbsp;&nbsp;Museums</a>
                            </li>
                        </ul>
                    </li>
                    <li class="hidden-xs"><a href="#" data-toggle="collapse" data-target=".navbar-collapse.in" id="list-btn"><i class="fa fa-list white"></i>&nbsp;&nbsp;POI List</a></li>
                  </ul>
            </div><!--/.navbar-collapse -->
        </div>
    </div>

    <div>
      @yield('content')
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.10.5/typeahead.bundle.min.js"></script>  --}}
    
    
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    {{-- <script src="{{ asset('bahan/assets/js/apps.js') }}"></script> --}}


    @stack('DataTables')
    @stack('scripts')
    <script>
  //     $("#about-btn").click(function() {
  //   $("#aboutModal").modal("show");
  //   $(".navbar-collapse.in").collapse("hide");
  //   return false;
  // });
    </script>
  </body>
</html>