<!DOCTYPE html>
<html lang="en">
@include('Layout.includes.head')

<body>
    <!--Preloader-->
    <div class="preloader-it">
        <div class="la-anim-1"></div>
    </div>
    <!--/Preloader-->
    <div class="wrapper">

        <!-- Top Menu Items -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block mr-20 pull-left"
                href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a href="index.html"><img class="brand-img pull-left" src="{{ asset('Kenny/dist/img/logo.png')}}" alt="brand" /></a>
            <ul class="nav navbar-right top-nav pull-right">
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#site_navbar_search">
                        <i class="fa fa-search top-nav-icon"></i>
                    </a>
                </li>
                <li>
                    <a id="open_right_sidebar" href="javascript:void(0);"><i class="fa fa-cog top-nav-icon"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-th top-nav-icon"></i></a>
                    <ul class="dropdown-menu app-dropdown" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                        <li>
                            <ul class="app-icon-wrap">
                                <li>
                                    <a href="#" class="connection-item">
                                        <i class="pe-7s-umbrella txt-info"></i>
                                        <span class="block">weather</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="connection-item">
                                        <i class="pe-7s-mail-open-file txt-success"></i>
                                        <span class="block">e-mail</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="connection-item">
                                        <i class="pe-7s-date txt-primary"></i>
                                        <span class="block">calendar</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="connection-item">
                                        <i class="pe-7s-map txt-danger"></i>
                                        <span class="block">map</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="connection-item">
                                        <i class="pe-7s-comment txt-warning"></i>
                                        <span class="block">chat</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="connection-item">
                                        <i class="pe-7s-notebook"></i>
                                        <span class="block">contact</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li class="text-center"><a href="#">More</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="fa fa-bell top-nav-icon"></i><span class="top-nav-icon-badge">5</span></a>
                    <ul class="dropdown-menu alert-dropdown" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                        <li>
                            <div class="streamline message-box message-nicescroll-bar">
                                <div class="sl-item">
                                    <div class="sl-avatar avatar avatar-sm avatar-circle">
                                        <img class="img-responsive img-circle" src="../Kenny/dist/img/user.png"
                                            alt="avatar" />
                                    </div>
                                    <div class="sl-content">
                                        <a href="javascript:void(0)"
                                            class="inline-block capitalize-font  pull-left">Sandy Doe</a>
                                        <span class="inline-block font-12  pull-right">12/10/16</span>
                                        <div class="clearfix"></div>
                                        <p>Neque porro quisquam est!</p>
                                    </div>
                                </div>
                                <hr />
                                <div class="sl-item">
                                    <div class="icon">
                                        <i class="fa fa-spotify"></i>
                                    </div>
                                    <div class="sl-content">
                                        <a href="javascript:void(0)" class="inline-block capitalize-font  pull-left">
                                            2 voice mails</a>
                                        <span class="inline-block font-12  pull-right">2pm</span>
                                        <div class="clearfix"></div>
                                        <p>Neque porro quisquam est</p>
                                    </div>
                                </div>
                                <hr />
                                <div class="sl-item">
                                    <div class="icon">
                                        <i class="fa fa-whatsapp"></i>
                                    </div>
                                    <div class="sl-content">
                                        <a href="javascript:void(0)" class="inline-block capitalize-font  pull-left">8
                                            voice messanger</a>
                                        <span class="inline-block font-12 pull-right">1pm</span>
                                        <div class="clearfix"></div>
                                        <p>8 texts</p>
                                    </div>
                                </div>
                                <hr />
                                <div class="sl-item">
                                    <div class="icon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <div class="sl-content">
                                        <a href="javascript:void(0)" class="inline-block capitalize-font  pull-left">2
                                            new messages</a>
                                        <span class="inline-block font-12  pull-right">1pm</span>
                                        <div class="clearfix"></div>
                                        <p>ashjs@gmail.com</p>
                                    </div>
                                </div>
                                <hr />
                                <div class="sl-item">
                                    <div class="sl-avatar avatar avatar-sm avatar-circle">
                                        <img class="img-responsive img-circle" src="../Kenny/dist/img/user4.png"
                                            alt="avatar" />
                                    </div>
                                    <div class="sl-content">
                                        <a href="javascript:void(0)"
                                            class="inline-block capitalize-font  pull-left">Sandy Doe</a>
                                        <span class="inline-block font-12  pull-right">1pm</span>
                                        <div class="clearfix"></div>
                                        <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur,
                                            adipisci velit</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img
                            src="{{ asset('Kenny/dist/img/user1.png')}}" alt="user_auth" class="user-auth-img img-circle" /><span
                            class="user-online-status"></span></a>
                    <ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-credit-card-alt"></i> my balance</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ route('admin.logout') }}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="collapse navbar-search-overlap" id="site_navbar_search">
                <form role="search">
                    <div class="form-group mb-0">
                        <div class="input-search">
                            <div class="input-group">
                                <input type="text" id="overlay_search" name="overlay-search" class="form-control pl-30"
                                    placeholder="Search">
                                <span class="input-group-addon pr-30">
                                    <a href="javascript:void(0)" class="close-input-overlay"
                                        data-target="#site_navbar_search" data-toggle="collapse" aria-label="Close"
                                        aria-expanded="true"><i class="fa fa-times"></i></a>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </nav>
        <!-- /Top Menu Items -->

        <!-- Left Sidebar Menu -->
        <div class="fixed-sidebar-left">
            <ul class="nav navbar-nav side-nav nicescroll-bar">
                <li>
                    <a href="{{ route('admin') }}"><i class="icon-picture mr-10"></i>Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('admin') }}"><i class="icon-note mr-10"></i>General Recruitment</a>
                </li>
                <li>
                    <a   href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard_dr"><i class="icon-note mr-10"></i>Manage Tests <span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
                    <ul id="dashboard_dr" class="collapse collapse-level-1">
                        
                        <li>
                            <a href="{{ route('admin.interface.add') }}">Create New Interface</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.interface') }}">Manage Interfaces</a>
                        </li>
                       
                        <li>
                            <a href="{{ route('admin.jst-pst.subjects') }}">Subjects</a>
                        </li>
                        <li>
                            <a  href="{{ route('admin.jst-pst.tests') }}">Tests</a>
                        </li>
                        <li>
                            <a href="index3.html">Project</a>
                        </li>
                        <li>
                            <a href="index4.html">Classic</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin') }}"><i class="icon-note mr-10"></i>Mock Test</a>
                </li>
                
                <li>
                    <a href="{{ route('admin.subjects') }}"><i class="icon-book-open mr-10"></i>Subjects</a>
                </li>
                <li>
                    <a href="{{ route('admin.departments') }}"><i class="icon-list mr-10"></i>Departments</a>
                </li>
            </ul>
        </div>
        <!-- /Left Sidebar Menu -->

        <!-- Right Sidebar Menu -->
        <div class="fixed-sidebar-right">
            <ul class="right-sidebar nicescroll-bar">
                <li>
                    <div class="tab-struct custom-tab-1">
                        <ul role="tablist" class="nav nav-tabs" id="right_sidebar_tab">
                            <li class="active" role="presentation"><a aria-expanded="true" data-toggle="tab" role="tab"
                                    id="chat_tab_btn" href="#chat_tab">chat</a></li>
                            <li role="presentation" class=""><a data-toggle="tab" id="messages_tab_btn" role="tab"
                                    href="#messages_tab" aria-expanded="false">messages</a></li>
                            <li role="presentation" class=""><a data-toggle="tab" id="todo_tab_btn" role="tab"
                                    href="#todo_tab" aria-expanded="false">todo</a></li>
                        </ul>
                        <div class="tab-content" id="right_sidebar_content">
                            <div id="chat_tab" class="tab-pane fade active in" role="tabpanel">
                                <div class="chat-box-wrap">
                                    <form role="search">
                                        <div class="input-group mb-15">
                                            <input type="text" id="example-input1-group2" name="example-input1-group2"
                                                class="form-control" placeholder="Search">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn  btn-default"><i
                                                        class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                    </form>
                                    <ul class="chat-list-wrap">
                                        <li class="chat-list">
                                            <div class="chat-body">
                                                <a href="javascript:void(0)">
                                                    <div class="chat-data">
                                                        <img class="user-img img-circle"
                                                            src="../Kenny/dist/img/user.png" alt="user" />
                                                        <div class="user-data">
                                                            <span class="name block capitalize-font">ryan gosling</span>
                                                            <span class="time block txt-grey">2pm</span>
                                                        </div>
                                                        <div class="status away"></div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <div class="chat-data">
                                                        <img class="user-img img-circle"
                                                            src="../Kenny/dist/img/user1.png" alt="user" />
                                                        <div class="user-data">
                                                            <span class="name block capitalize-font">ryan gosling</span>
                                                            <span class="time block txt-grey">1pm</span>
                                                        </div>
                                                        <div class="status offline"></div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <div class="chat-data">
                                                        <img class="user-img img-circle"
                                                            src="../Kenny/dist/img/user2.png" alt="user" />
                                                        <div class="user-data">
                                                            <span class="name block capitalize-font">ryan gosling</span>
                                                            <span class="time block txt-grey">2pm</span>
                                                        </div>
                                                        <div class="status online"></div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <div class="chat-data">
                                                        <img class="user-img img-circle"
                                                            src="../Kenny/dist/img/user3.png" alt="user" />
                                                        <div class="user-data">
                                                            <span class="name block capitalize-font">ryan gosling</span>
                                                            <span class="time block txt-grey">2pm</span>
                                                        </div>
                                                        <div class="status online"></div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <div class="chat-data">
                                                        <img class="user-img img-circle"
                                                            src="../Kenny/dist/img/user4.png" alt="user" />
                                                        <div class="user-data">
                                                            <span class="name block capitalize-font">ryan gosling</span>
                                                            <span class="time block txt-grey">2pm</span>
                                                        </div>
                                                        <div class="status online"></div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div id="messages_tab" class="tab-pane fade" role="tabpanel">
                                <div class="message-box-wrap">
                                    <div class="streamline message-box">
                                        <div class="sl-item">
                                            <div class="sl-avatar avatar avatar-sm avatar-circle">
                                                <img class="img-responsive img-circle" src="../Kenny/dist/img/user.png"
                                                    alt="avatar" />
                                            </div>
                                            <div class="sl-content">
                                                <a href="javascript:void(0)"
                                                    class="inline-block capitalize-font  mb-5 pull-left">Sandy Doe</a>
                                                <span class="inline-block font-12 mb-5 pull-right">12/10/16</span>
                                                <div class="clearfix"></div>
                                                <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet,
                                                    consectetur, adipisci velit</p>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="sl-item">
                                            <div class="sl-avatar avatar avatar-sm avatar-circle">
                                                <img class="img-responsive img-circle" src="../Kenny/dist/img/user1.png"
                                                    alt="avatar" />
                                            </div>
                                            <div class="sl-content">
                                                <a href="javascript:void(0)"
                                                    class="inline-block capitalize-font  mb-5 pull-left">Sandy Doe</a>
                                                <span class="inline-block font-12 mb-5 pull-right">2pm</span>
                                                <div class="clearfix"></div>
                                                <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet,
                                                    consectetur, adipisci velit</p>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="sl-item">
                                            <div class="sl-avatar avatar avatar-sm avatar-circle">
                                                <img class="img-responsive img-circle" src="../Kenny/dist/img/user2.png"
                                                    alt="avatar" />
                                            </div>
                                            <div class="sl-content">
                                                <a href="javascript:void(0)"
                                                    class="inline-block capitalize-font  mb-5 pull-left">Sandy Doe</a>
                                                <span class="inline-block font-12 mb-5 pull-right">1pm</span>
                                                <div class="clearfix"></div>
                                                <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet,
                                                    consectetur, adipisci velit</p>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="sl-item">
                                            <div class="sl-avatar avatar avatar-sm avatar-circle">
                                                <img class="img-responsive img-circle" src="../Kenny/dist/img/user3.png"
                                                    alt="avatar" />
                                            </div>
                                            <div class="sl-content">
                                                <a href="javascript:void(0)"
                                                    class="inline-block capitalize-font  mb-5 pull-left">Sandy Doe</a>
                                                <span class="inline-block font-12 mb-5 pull-right">1pm</span>
                                                <div class="clearfix"></div>
                                                <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet,
                                                    consectetur, adipisci velit</p>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="sl-item">
                                            <div class="sl-avatar avatar avatar-sm avatar-circle">
                                                <img class="img-responsive img-circle" src="../Kenny/dist/img/user4.png"
                                                    alt="avatar" />
                                            </div>
                                            <div class="sl-content">
                                                <a href="javascript:void(0)"
                                                    class="inline-block capitalize-font  mb-5 pull-left">Sandy Doe</a>
                                                <span class="inline-block font-12 mb-5 pull-right">1pm</span>
                                                <div class="clearfix"></div>
                                                <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet,
                                                    consectetur, adipisci velit</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="todo_tab" class="tab-pane fade" role="tabpanel">
                                <div class="todo-box-wrap">
                                    <!-- Todo-List -->
                                    <ul class="todo-list">
                                        <li class="todo-item">
                                            <div class="checkbox checkbox-default">
                                                <input type="checkbox" id="checkbox01" />
                                                <label for="checkbox01">Record The First Episode Of HTML
                                                    Tutorial</label>
                                            </div>
                                        </li>
                                        <li class="todo-item">
                                            <div class="checkbox checkbox-pink">
                                                <input type="checkbox" id="checkbox02" />
                                                <label for="checkbox02">Prepare The Conference Schedule</label>
                                            </div>
                                        </li>
                                        <li class="todo-item">
                                            <div class="checkbox checkbox-warning">
                                                <input type="checkbox" id="checkbox03" checked />
                                                <label for="checkbox03">Decide The Live Discussion Time</label>
                                            </div>
                                        </li>
                                        <li class="todo-item">
                                            <div class="checkbox checkbox-success">
                                                <input type="checkbox" id="checkbox04" checked />
                                                <label for="checkbox04">Prepare For The Next Project</label>
                                            </div>
                                        </li>
                                        <li class="todo-item">
                                            <div class="checkbox checkbox-danger">
                                                <input type="checkbox" id="checkbox05" checked />
                                                <label for="checkbox05">Finish Up AngularJs Tutorial</label>
                                            </div>
                                        </li>
                                        <li class="todo-item">
                                            <div class="checkbox checkbox-purple">
                                                <input type="checkbox" id="checkbox06" checked />
                                                <label for="checkbox06">Finish Infinity Project</label>
                                            </div>
                                        </li>
                                    </ul>
                                    <!-- /Todo-List -->
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <!-- /Right Sidebar Menu -->

        <!-- Main Content -->
        <div class="page-wrapper">
            <div class="container-fluid">
                <!-- Title -->
                <div class="row heading-bg  bg-blue">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h5 class="txt-light">@yield('title')</h5>
                    </div>
                    <!-- Breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            @yield('breadcrumb-links')
                        </ol>
                    </div>
                    <!-- /Breadcrumb -->
                </div>
                <!-- /Title -->
                @yield('content')
                <!-- Footer -->
                <footer class="footer container-fluid pl-30 pr-30">
                    <div class="row">
                        <div class="col-sm-5">
                            <a href="#" class="brand mr-30"><img src="{{ asset('Kenny/dist/img/logo-sm.png')}}"
                                    alt="logo" /></a>
                            <ul class="footer-link nav navbar-nav">
                                {{-- <li class="logo-footer"><a href="#">help</a></li>
							<li class="logo-footer"><a href="#">terms</a></li>
							<li class="logo-footer"><a href="#">privacy</a></li> --}}
                            </ul>
                        </div>
                        <div class="col-sm-7 text-right">
                            <p>{{ now()->year }} &copy; Naeem Academy</p>
                        </div>
                    </div>
                </footer>
                <!-- /Footer -->

            </div>
            <!-- /Main Content -->

        </div>
        <!-- /#wrapper -->

        <!-- JavaScript -->

        @include('Layout.includes.foot')
</body>

</html>
