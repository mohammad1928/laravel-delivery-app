<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Admin Dashboard</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}" />
    <!-- site css -->
    <link rel="stylesheet" href="{{asset("/css/style.css")}}" />
    <!-- responsive css -->
    <link rel="stylesheet" href="{{asset("css/responsive.css")}}" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="{{asset("css/bootstrap-select.css")}}" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="{{asset("css/perfect-scrollbar.css")}}" />
    <!-- custom css -->
    <link rel="stylesheet" href="{{asset("css/custom.css")}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="dashboard dashboard_1">
<div class="full_container">
    <div class="inner_container">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar_blog_1">
                <div class="sidebar-header">
                    <div class="logo_section">
                        <a href="index.html"><img class="logo_icon img-responsive" src="{{asset("images/logo/logo_icon.png")}}" alt="#" /></a>
                    </div>
                </div>
                <div class="sidebar_user_info">
                    <div class="icon_setting"></div>
                    <div class="user_profle_side">
                        <div class="user_img"><img class="img-responsive" src="{{asset("images/layout_img/user_img.jpg")}}" alt="#" /></div>
                        <div class="user_info">
                            <h6>John David</h6>
                            <p><span class="online_animation"></span> Online</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidebar_blog_2">
                <h4>General</h4>
                <ul class="list-unstyled components">
                    <li class="active">
                        <a href="#additional_page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-clone yellow_color"></i> <span>Additional Pages</span></a>
                        <ul class="collapse list-unstyled" id="additional_page">
                            <li>
                                <a href="profile.html">> <span>Profile</span></a>
                            </li>
                            <li>
                                <a href="project.html">> <span>Projects</span></a>
                            </li>
                            <li>
                                <a href="login.html">> <span>Login</span></a>
                            </li>
                            <li>
                                <a href="404_error.html">> <span>404 Error</span></a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="map.html"><i class="fa fa-map purple_color2"></i> <span>Map</span></a></li>
                    <li><a href="charts.html"><i class="fa fa-bar-chart-o green_color"></i> <span>Charts</span></a></li>
                    <li><a href="settings.html"><i class="fa fa-cog yellow_color"></i> <span>Settings</span></a></li>
                </ul>
            </div>
        </nav>
        <!-- end sidebar -->
        <!-- right content -->
    </div>
    <div class="topbar">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="full">
                <div id="leftSide">
                    <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-align-left" aria-hidden="true"></i></button>
                    <div class="logo_section">
                        <a href="index.html"><img class="img-responsive" width="50" height="75" src="{{asset("images/logo/dash-logo.png")}}" alt="#" /></a>
                        <p class="d-inline mt-3 text-light" style="font-size: 24px; letter-spacing: 10px; font-weight: bold; position:absolute; top:6px;">FOODIES</p>
                    </div>
                </div>
                <div class="right_topbar">
                    <div class="icon_info">
                        <ul>
                            <li><a href="#"><i class="fa fa-bell-o"></i><span class="badge">2</span></a></li>
                            <li><a href="#"><i class="fa fa-question-circle"></i></a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>
                        </ul>
                        <ul class="user_profile_dd">
                            <li>
                                <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="{{asset("images/layout_img/user_img.jpg")}}" alt="#" /><span class="name_user">John David</span></a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="profile.html">My Profile</a>
                                    <a class="dropdown-item" href="settings.html">Settings</a>
                                    <a class="dropdown-item" href="help.html">Help</a>
                                    <a class="dropdown-item" href="#"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    @yield("content")
</div>
<!-- jQuery -->
<script src="{{asset("js/jquery.min.js")}}"></script>
<script src="{{asset("js/popper.min.js")}}"></script>
<script src="{{asset("js/bootstrap.min.js")}}"></script>
<script src="{{asset("js/animate.js")}}"></script>
<!-- select country -->
<script src="{{asset("js/bootstrap-select.js")}}"></script>
<!-- owl carousel -->
<script src="{{asset("js/owl.carousel.js")}}"></script>
<script src="{{asset("js/utils.js")}}"></script>
<script src="{{asset("js/analyser.js")}}"></script>
<script src="{{asset("js/perfect-scrollbar.min.js")}}"></script>
<script>
    var ps = new PerfectScrollbar('#sidebar');
</script>
<script src="{{asset("js/custom.js")}}"></script>


</body>
</html>
