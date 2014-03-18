<!DOCTYPE html>
<html>
	<head>
		<!-- Title here -->
		<title>Brainsource Asset</title>
		<!-- Description, Keywords and Author -->
		<meta name="description" content="Your description">
		<meta name="keywords" content="Your,Keywords">
		<meta name="author" content="ResponsiveWebInc">
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
      
      <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600italic,600' rel='stylesheet' type='text/css'>
		
		<!-- Styles -->
		<!-- Bootstrap CSS -->


		{{ HTML::style("css/bootstrap.min.css") }}
    <!-- Animate css -->
    {{ HTML::style("css/animate.min.css") }}
    <!-- Gritter -->
    {{ HTML::style("css/jquery.gritter.css") }}
    <!-- Calendar -->
    {{ HTML::style("css/fullcalendar.css") }}
    <!-- Bootstrap toggable -->
    {{ HTML::style("css/bootstrap-switch.css") }}
    <!-- Date and Time picker -->
    {{ HTML::style("css/bootstrap-datetimepicker.min.css") }}
    <!-- Star rating -->
    {{ HTML::style("css/rateit.css") }}
    <!-- Star rating -->
    {{ HTML::style("css/jquery.cleditor.css") }}
    <!-- jQuery UI -->
    {{ HTML::style("css/jquery-ui.css") }}
    <!-- prettyPhoto -->
    {{ HTML::style("css/prettyPhoto.css") }}
		<!-- Font awesome CSS -->
		{{ HTML::style("css/font-awesome.min.css") }}		
		<!-- Custom CSS -->
		{{ HTML::style("css/style.css") }}

    <!-- eternicode's datepicker -->
    {{ HTML::style("css/datepicker.css") }}
    {{ HTML::style("css/datepicker3.css") }}

		<!-- Favicon -->
		<link rel="shortcut icon" href="#">

	</head>
	
	<body>

      <!-- Logo & Navigation starts -->
      
      <div class="header">
         <div class="container">
            <div class="row">
               <div class="col-md-3">
                  <!-- Logo -->
                  <div class="logo">
                     <h1><a href="index.html">BS Asset</a></h1>
                  </div>
               </div>

               <!-- search field on nav bar -->
               <!-- <div class="col-md-3">
                  <div class="row">
                    <div class="col-lg-10">
                      <div class="input-group form">
                           <input type="text" class="form-control" placeholder="Something...">
                           <span class="input-group-btn">
                             <button class="btn btn-info" type="button">Search</button>
                           </span>
                      </div>
                    </div>
                  </div>
               </div> -->

               <div class="col-md-9">
                  <div class="navbar navbar-inverse" role="banner">
                      <div class="navbar-header">
                        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                          <span>Menu</span>
                        </button>
                      </div>
                      <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                        <ul class="nav navbar-nav">
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-comments"></i> Chats <span class="label label-success">5</span> <b class="caret"></b></a>
                            <!-- Big dropdown menu -->
                            <ul class="dropdown-menu dropdown-big animated fadeInUp">
                              <!-- Dropdown menu header -->
                              <div class="dropdown-head">
                                 <span class="dropdown-title">Recent Chats</span>
                              </div>
                              <!-- Dropdown menu body -->
                              <div class="dropdown-body">
                                 <li><i class="icon-comments color"></i> <a href="#">Hi, How are you?</a><span class="label label-info pull-right">8.49</span></li>
                                 <li><i class="icon-comments color"></i> <a href="#">What are you doing?</a><span class="label label-info pull-right">6.49</span></li>
                                 <li><i class="icon-comments color"></i> <a href="#">Why are you doing this?</a><span class="label label-info pull-right">4.49</span></li>
                                 <li><i class="icon-comments color"></i> <a href="#">Mr.Baburae what is this?</a><span class="label label-info pull-right">1.49</span></li>
                              </div>
                              <!-- Dropdown menu footer -->
                              <div class="dropdown-foot text-center">
                                 <a href="#">View All Chats</a>
                              </div>
                            </ul>
                          </li>
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> Users <span class="label label-primary">5</span> <b class="caret"></b></a>
                            <!-- Big dropdown menu -->
                            <ul class="dropdown-menu dropdown-big animated fadeInUp">
                              <!-- Dropdown menu header -->
                              <div class="dropdown-head">
                                 <span class="dropdown-title">Members</span>
                              </div>
                              <!-- Dropdown menu body -->
                              <div class="dropdown-body">
                                 <li><i class="icon-user color"></i> <a href="#">Ashok</a><span class="label label-danger pull-right">Free</span></li>
                                 <li><i class="icon-user color"></i> <a href="#">Ravi Kumar</a><span class="label label-warning pull-right">Premium</span></li>
                                 <li><i class="icon-user color"></i> <a href="#">Baburae</a><span class="label label-primary pull-right">VIP</span></li>
                                 <li><i class="icon-user color"></i> <a href="#">Sunil Kumar</a><span class="label label-warning pull-right">Premium</span></li>
                              </div>
                              <!-- Dropdown menu footer -->
                              <div class="dropdown-foot text-center">
                                 <a href="#">All Members</a>
                              </div>
                            </ul>
                          </li>
                          <li class="dropdown">

                            @if(!Auth::guest())
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Howdy, {{{ Auth::user()->name }}}<b class="caret"></b></a>
                              <ul class="dropdown-menu animated fadeInUp">
                                <li>{{ link_to_route('users.show', "Profile", Auth::user()->id) }}</li>
                                <li>{{ link_to('/logout', "Logout") }}</li>
                              </ul>
                            @else
                              {{ link_to_route('login', 'Login') }}
                            @endif
                          </li>
                        </ul>
                      </nav>
                  </div>
               </div>
            </div>
         </div>
      </div>
      
      <!-- Logo & Navigation ends -->
     
      
      
      <!-- Page content -->
      
      <div class="page-content blocky">
         <div class="container">

                  <div class="side-cont">
                 
                  <div class="sidebar-dropdown"><a href="#">MENU</a></div>
                 
                     <div class="sidey">
                        <ul class="nav">
                            <li>{{ link_to_route('phones.index', 'Phone') }}</li>
                            <li>{{ link_to_route('accessories.index', 'Accessories') }}</li>
                            <li>{{ link_to_route('simcards.index', 'Sim Card') }}</li>
                        </ul>
                     </div>
                  </div>
            
            <div class="mainy">
               <!-- Page title -->
               <div class="page-title">
                  @yield('pageTitle')
                  <!-- <h2><i class="icon-desktop color"></i> Page Title <small>Subtext for header</small></h2> -->
                  <hr />
               </div>
               <!-- Page title -->
               
                  <div class="row">
                     <div class="col-md-12">
                        @yield('main')
                     </div>
                  </div>
                  
            </div>
            
            <div class="clearfix"></div>
            
         </div>
      </div>
     
      
      
      <!-- Footer starts -->
      <footer>
         <div class="container">
         
            <div class="copy text-center">
               Copyright 2013 &copy; - <a href="http://responsivewebinc.com/bootstrap-themes">Bootstrap Themes</a>
            </div>
            
         </div>
      </footer>
      <!-- Footer ends -->
      
      <!-- Scroll to top -->
      <span class="totop"><a href="#"><i class="icon-chevron-up"></i></a></span> 
      
		<!-- Javascript files -->
		<!-- jQuery -->
		{{ HTML::script("js/jquery.js") }}
		  <!-- Bootstrap JS -->
		{{ HTML::script("js/bootstrap.min.js") }} 
      <!-- jQuery UI -->
    {{ HTML::script("js/jquery-ui-1.10.2.custom.min.js") }}    
      <!-- jQuery Peity -->
    {{ HTML::script("js/peity.js") }} 
      <!-- Calendar -->
    {{ HTML::script("js/fullcalendar.min.js") }} 
      <!-- jQuery Star rating -->
    {{ HTML::script("js/jquery.rateit.min.js") }}
      <!-- prettyPhoto -->
    {{ HTML::script("js/jquery.prettyPhoto.js") }} 
      
      <!-- jQuery flot -->
      <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
    {{ HTML::script("js/jquery.flot.js") }}    
    {{ HTML::script("js/jquery.flot.pie.js") }}
    {{ HTML::script("js/jquery.flot.stack.js") }}
    {{ HTML::script("js/jquery.flot.resize.js") }}
      
      
      
      <!-- Gritter plugin -->
    {{ HTML::script("js/jquery.gritter.min.js") }}
      <!-- CLEditor -->
    {{ HTML::script("js/jquery.cleditor.min.js") }}
      <!-- Date and Time picker -->
    {{ HTML::script("js/bootstrap-datetimepicker.min.js") }} 
      <!-- jQuery Toggable -->
    {{ HTML::script("js/bootstrap-switch.min.js") }}
		  <!-- Respond JS for IE8 -->
		{{ HTML::script("js/respond.min.js") }}
		  <!-- HTML5 Support for IE -->
		{{ HTML::script("js/html5shiv.js") }}
		  <!-- Custom JS -->
		{{ HTML::script("js/custom.js") }}


    {{ HTML::script('/js/transaction.js') }}

    <!-- eternicode's datepicker js -->
    {{ HTML::script('js/bootstrap-datepicker.js') }}

	</body>	
</html>