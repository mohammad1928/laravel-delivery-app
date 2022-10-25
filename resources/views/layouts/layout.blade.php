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
    @livewireStyles
</head>
<body class="dashboard dashboard_1">
<div class="full_container">
    <div class="inner_container">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar_blog_1">
                <div class="sidebar-header">
                    <div class="logo_section">
                        <a href="/"><img class="logo_icon img-responsive" src="{{asset("images/logo/dash-logo.png")}}" alt="#" /></a>
                    </div>
                </div>
                <div class="sidebar_user_info">
                    <div class="icon_setting"></div>
                    <div class="user_profle_side">
                        <div class="user_img"><img class="img-responsive" src="{{asset("images/layout_img/user_img.jpg")}}" alt="#" /></div>
                        <div class="user_info">
                            <h6>{{\Illuminate\Support\Facades\Auth::user()->first_name}}</h6>
                            <p><span class="online_animation"></span> Online</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidebar_blog_2">
                <h4>General</h4>
                <ul class="list-unstyled components">
                    @if(\Illuminate\Support\Facades\Auth::user()->hasRole("admin"))
                        <li class="active">
                            <a href="#users" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-user green_color"></i> <span>Users</span></a>
                            <ul class="collapse list-unstyled" id="users">
                                <li>
                                    <a href="profile.html">> <span>Manage Users</span></a>
                                </li>
                                <li>
                                    <a href="project.html">> <span>Add new admin</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="active">
                            <a href="#additional_page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-align-left green_color"></i> <span>Categories</span></a>
                            <ul class="collapse list-unstyled" id="additional_page">
                                <li>
                                    <a href="/categories">> <span>Manage Categories</span></a>
                                </li>
                                <li>
                                    <a href="project.html">> <span>Categories Statistics</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="active">
                            <a href="#meals" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-cutlery green_color"></i> <span>Meals</span></a>
                            <ul class="collapse list-unstyled" id="meals">
                                <li>
                                    <a href="/meals">> <span>Manage Meals</span></a>
                                </li>
                                <li>
                                    <a href="project.html">> <span>Meals Statistics</span></a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="/meals"><i class="fa fa-indent green_color"></i> <span>Blog</span></a></li>
                        <li><a href="/orders"><i class="fa fa-truck green_color"></i> <span>Orders</span></a></li>
                        <li><a href="/laratrust"><i class="fa fa-shield green_color"></i> <span>Roles & Permissions</span></a></li>
                    @elseif(auth()->user()->hasRole("delivery-worker"))
                        <li><a href="/my-orders"><i class="fa fa-truck green_color"></i> <span>My Orders</span></a></li>
                    @endif
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
                        <a href="/"><img class="img-responsive" width="50" height="75" src="{{asset("images/logo/dash-logo.png")}}" alt="#" />
                        <p class="d-inline mt-3 text-light" style="font-size: 24px; letter-spacing: 10px; font-weight: bold; position:absolute; top:6px;">FOODIES</p>
                        </a>
                    </div>
                </div>
                <div class="right_topbar">
                    <div class="icon_info">
                        <ul>
                            <li><a href="#" onclick="playSound()" id="notify"><i class="fa fa-bell-o"></i><span class="badge">2</span></a></li>
                            <li class="mr-3">
                                <livewire:notifcations-component></livewire:notifcations-component>
                            </li>
                            <li><a href="#"><i class="fa fa-question-circle"></i></a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>
                        </ul>
                        <ul class="user_profile_dd">
                            <li>
                                <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="{{asset("images/layout_img/user_img.jpg")}}" alt="#" /><span class="name_user">{{auth()->user()->first_name}}</span></a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="profile.html">My Profile</a>
                                    <a class="dropdown-item" href="settings.html">Settings</a>
                                    <a class="dropdown-item" href="help.html">Help</a>
                                    <form action="/logout" method="post" id="logoutForm">
                                        @csrf
                                        <a id="logoutBtn" type="submit">
                                         <span>Log Out</span> <i class="fa fa-sign-out"></i>
                                        </a>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <section class="d-flex justify-content-center">
        @yield("content")
        <audio id="my-aud" style="display: none" controls src="{{asset("notification_sounds/order_completed.mp3")}}">
            Not Supported
        </audio>
    </section>
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

<script>
    var fm=document.getElementById("logoutForm");
    var lbtn=document.getElementById("logoutBtn");
    lbtn.onclick=function logout(){
        fm.submit();
    };
</script>
<script>
    let x={{json_decode(3)}};
    window.addEventListener('worker-added', event => {
        alert("Worker add successfully "+x);
    })
</script>
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script>
    function playSound(){
        const audio=document.getElementById("my-aud");
        audio.play();
    }

    Pusher.logToConsole = true;
    var pusher = new Pusher('103c12c17ab1a12e15b6', {
        cluster: 'ap2'
    });

    var channel = pusher.subscribe('worker-'+{{json_decode(\Illuminate\Support\Facades\Auth::id())}});
    channel.bind('worker-selected', function(data) {
        const notify=document.getElementById("notify");
        notify.click();
        var notification_box=document.getElementById("notification-box");
        notification_box.innerHTML+=" <a class='dropdown-item text-dark' href='#'> <div class='d-flex flex-column'> <h3>"+data.message.title+"</h3> <p>"+data.message.body+"</p> </div> <span class='dropdown-divider'></span> </a>";
        var dropbtn=document.getElementById("dropbtn");
        if(dropbtn.children.length<2){
            dropbtn.innerHTML=" <i class='fa fa-bell'></i> <span class='badge badge-danger' id='notify-counter'>"+1+"</span>";
        }else{
            var notify_counter=document.getElementById("notify-counter");
            var count=parseInt(notify_counter.innerText);
            notify_counter.innerText=count+1;
        }
    });
    function hideCounter(){
        document.getElementById('notify-counter').style.display='none';
    }
</script>
@livewireScripts
</body>
</html>
