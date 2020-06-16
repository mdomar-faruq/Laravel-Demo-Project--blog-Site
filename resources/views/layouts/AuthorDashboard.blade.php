<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Target Material Design Bootstrap Admin Template</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('assets/materialize/css/materialize.min.css') }}" media="screen,projection" />
    <!-- Bootstrap Styles-->
    <link href="{{ asset('admin/assets/css/bootstrap.css') }}" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="{{ asset('admin/assets/css/font-awesome.css') }}" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="{{ asset('admin/assets/js/morris/morris-0.4.3.min.css') }}" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="{{ asset('admin/assets/css/custom-styles.css') }}" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="{{ asset('admin/assets/js/Lightweight-Chart/cssCharts.css') }}">
      <link href="{{ asset('admin/assets/materialize//css/materialize.min.css') }}" rel="stylesheet" />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle waves-effect waves-dark" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand waves-effect waves-dark" href="index.html"><i class="large material-icons">track_changes</i> <strong>target</strong></a>

		<div id="sideNav" href=""><i class="material-icons dp48">toc</i></div>
            </div>

            <ul class="nav navbar-top-links navbar-right">
				<li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown4"><i class="fa fa-envelope fa-fw"></i> <i class="material-icons right">arrow_drop_down</i></a></li>
				<li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown3"><i class="fa fa-tasks fa-fw"></i> <i class="material-icons right">arrow_drop_down</i></a></li>
				<li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown2"><i class="fa fa-bell fa-fw"></i> <i class="material-icons right">arrow_drop_down</i></a></li>
				  <li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown1"><i class="fa fa-user fa-fw"></i> <b>  {{ Auth::user()->name }} </b> <i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
        </nav>

		<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
<li><a href="#"><i class="fa fa-user fa-fw"></i> My Profile</a>
</li>
<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
</li>
<li>
  <form method="POST" id="logout-form" action="{{route('logout')}}" >@csrf</form>
  <a href="#"  onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
  <i class="fa fa-sign-out fa-fw"></i> Logout</a>
</li>
</ul>
<ul id="dropdown2" class="dropdown-content w250">
  <li>
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
</ul>

	   <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                      <h5><i class="fa fa-user fa-fw"></i> Author </h5>
                    </li>

                    <li>
                        <a class="{{Route::currentRouteName() == 'AuthorDashboard' ? 'active':''}}waves-effect waves-dark" href="{{route('AuthorDashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a  href="{{route('AuthorProfile')}}" class="{{Route::currentRouteName() == 'AuthorProfile' ? 'active':''}}waves-effect waves-dark"><i class="fa fa-user fa-fw"></i>Profile</a>
                    </li>
                    <li>
                        <a href="{{route('AuthorPosts')}}" class="waves-effect waves-dark"><i class="fa fa-clipboard"></i>Post</a>
                    </li>
                    <li>
                        <a href="{{route('AuthorNewPosts')}}" class="waves-effect waves-dark"><i class="fa fa-clipboard"></i>Create Post</a>
                    </li>

                    <li>
                        <a href="#" class="waves-effect waves-dark"><i class="fa fa-comments-o"></i>Comments</a>
                    </li>


                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->

@yield('Content')

                <!-- /. ROW  -->
			   <div class="fixed-action-btn horizontal click-to-toggle">
    <a class="btn-floating btn-large red">
      <i class="material-icons">menu</i>
    </a>
    <ul>
      <li><a class="btn-floating red"><i class="material-icons">track_changes</i></a></li>
      <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
      <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
      <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
    </ul>
  </div>

				<footer><p >All right reserved</p>


				</footer>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="{{ asset('admin/assets/js/jquery-1.10.2.js') }}"></script>

	<!-- Bootstrap Js -->
    <script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>

	<script src="{{ asset('admin/assets/materialize/js/materialize.min.js') }}"></script>

    <!-- Metis Menu Js -->
    <script src="{{ asset('admin/assets/js/jquery.metisMenu.js') }}"></script>
    <!-- Morris Chart Js -->
    <script src="{{ asset('admin/assets/js/morris/raphael-2.1.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/morris/morris.js') }}"></script>


	<script src="{{ asset('admin/assets/js/easypiechart.js') }}"></script>
	<script src="{{ asset('admin/assets/js/easypiechart-data.js') }}"></script>

	 <script src="{{ asset('admin/assets/js/Lightweight-Chart/jquery.chart.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset('admin/assets/js/custom-scripts.js') }}"></script>


</body>

</html>
