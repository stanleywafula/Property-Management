<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css') }}" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/light-bootstrap-dashboard790f.css?v=2.0.1') }}" rel="stylesheet" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/icons8-software-64.png') }}">
    @yield('css')
</head>
<body>
    <div id="app">

        <div class="wrapper">
            <div
              class="sidebar"
              data-color="orange"
              data-image="{{ asset('img/sidebar-5.jpg') }}"
            >
              <!--
              Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

              Tip 2: you can also add an image using data-image tag
          -->
              <div class="sidebar-wrapper">
                <div class="logo">
                  <a
                    href="#"
                    class="simple-text logo-mini"
                  >



                  </a>
                  <a
                    href=""
                    class="simple-text logo-normal"
                  >

                  Property

                  </a>
                </div>

                @auth
                <div class="user">
                    <div class="photo">
                      <img

                          src=""

                       />
                    </div>
                    <div class="info">

                            <a href="{{ route('home') }}" data-toggle="collapse"  class="collapsed">
                                <span>{{ Auth::user()->name }}

                                </span>
                            </a>



                    </div>
                  </div>

                  @if (auth()->user()->isTenant())
                     <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('home') }}">
                                <i class="nc-icon nc-chart-pie-35"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('wordorders.index') }}">
                                <i class="nc-icon nc-compass-05"></i>
                                <p>Work Orders</p>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('messages') }}">
                                <i class="nc-icon nc-app"></i>
                                <p>Messages</p>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('econtacts.index') }}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>Emergency Contacts</p>
                            </a>
                        </li>
                     </ul>

                  @else
                  <ul class="nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('home') }}">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('properties.index') }}">
                            <i class="nc-icon nc-app"></i>
                            <p>Properties</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('tenants.index') }}">
                            <i class="nc-icon nc-atom"></i>
                            <p>Tenants</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#pagesExamples">
                            <i class="nc-icon nc-paper-2"></i>
                            <p>
                                Accounting
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse " id="pagesExamples">
                            <ul class="nav">

                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ route('leases.index') }}">
                                        <span class="sidebar-mini">LS</span>
                                        <span class="sidebar-normal">Lease</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ route('bills.index') }}">
                                        <span class="sidebar-mini">BS</span>
                                        <span class="sidebar-normal">Bills</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ route('payments.index') }}">
                                        <span class="sidebar-mini">PS</span>
                                        <span class="sidebar-normal">Payments</span>
                                    </a>
                                </li>


                            </ul>
                        </div>
                    </li>



                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('wordorders.index') }}">
                            <i class="nc-icon nc-compass-05"></i>
                            <p>Work Orders</p>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('services.index') }}">
                            <i class="nc-icon nc-delivery-fast"></i>
                            <p>Services</p>
                        </a>
                    </li>



                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('messages') }}">
                            <i class="nc-icon nc-mobile"></i>
                            <p>Messages</p>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('memos.index') }}">
                            <i class="nc-icon nc-notes"></i>
                            <p>Memos</p>
                        </a>
                    </li>



                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('users.index') }}">
                            <i class="nc-icon nc-single-02"></i>
                            <p>Users</p>
                        </a>
                    </li>






                </ul>
                  @endif





                @endauth
              </div>
            </div>
            <div class="main-panel">
              <!-- Navbar -->
              <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                  <div class="navbar-wrapper">
                    <div class="navbar-minimize">
                      <button
                        id="minimizeSidebar"
                        class="btn btn-warning btn-fill btn-round btn-icon d-none d-lg-block"
                      >
                        <i class="fa fa-ellipsis-v visible-on-sidebar-regular"></i>
                        <i class="fa fa-navicon visible-on-sidebar-mini"></i>
                      </button>
                    </div>
                    @auth
                    @if (!auth()->user()->isTenant())
                    <a class="navbar-brand" href="#"> Manage without a hitch </a>
                    @endif
                @endauth
                  </div>
                  <button
                    class="navbar-toggler navbar-toggler-right"
                    type="button"
                    data-toggle="collapse"
                    aria-controls="navigation-index"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                  >
                    <span class="navbar-toggler-bar burger-lines"></span>
                    <span class="navbar-toggler-bar burger-lines"></span>
                    <span class="navbar-toggler-bar burger-lines"></span>
                  </button>
                  <div class="collapse navbar-collapse justify-content-end">
                    <ul class="navbar-nav ml-auto">

                        @auth
                        <li class="dropdown nav-item">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                <i class="nc-icon nc-chat-round"></i>
                                <span class="notification">{{ auth()->user()->newThreadsCount() }}</span>
                                <span class="d-lg-none">Messages</span>
                            </a>
                            <ul class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('messages') }}">View All Messages</a>
                            </ul>
                        </li>

                        @if (!auth()->user()->isTenant())
                        <li class="dropdown nav-item">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                <i class="nc-icon nc-bank">New</i>
                            </a>
                            <ul class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('properties.create') }}">Property</a>
                                <li class="divider"></li>
                                <a class="dropdown-item" href="{{ route('tenants.create') }}">Tenant</a>
                                <li class="divider"></li>
                                <a class="dropdown-item" href="{{ route('payments.create') }}">Payment</a>
                                <li class="divider"></li>
                                <a class="dropdown-item" href="{{ route('tasks.create') }}">Task</a>
                                <li class="divider"></li>
                                <a class="dropdown-item" href="{{ route('bills.create') }}">Bill</a>
                            </ul>
                        </li>
                        @endif
                        @endauth

                        @auth
                        <li class="dropdown nav-item">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                <i class="nc-icon nc-bell-55"></i>
                                <span class="notification">{{ auth()->user()->unreadnotifications->count() }}</span>
                                <span class="d-lg-none">Notification</span>
                            </a>
                            <ul class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('users.notifications') }}">View All Notifications</a>
                            </ul>
                        </li>
                        @endauth


                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">


                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>

                </div>
                </div>
              </nav>
              <!-- End Navbar -->
              <div class="content">
                <div class="container-fluid">
                  @if(session()->has('success'))
                   <div class="alert alert-success">
                     {{ session()->get('success') }}
                    </div>
                    @elseif (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                       </div>
                  @endif

                  @if($errors->any())
                  <div class="alert alert-danger">
                    <ul class="list-group">
                      @foreach ( $errors->all() as $error )
                        <li class="list-group-item text-danger"> {{ $error }}
                        </li>
                      @endforeach
                    </ul>
                  </div>
                  @endif

                  @yield('content')


                </div>
              </div>
              <footer class="footer">
                <div class="container">
                  <nav>
                    <ul class="footer-menu">
                      <li>
                        <a href=""> Home </a>
                      </li>
                      <li>
                        <a href="#">
                          About us
                        </a>
                      </li>
                      <li>
                        <a href="#"> FAQs </a>
                      </li>
                      <li>
                        <a href="#"> Blog </a>
                      </li>
                    </ul>
                    <p class="copyright text-center">
                      ©
                      <script>
                        document.write(new Date().getFullYear());
                      </script>
                      <a href="https://www.creativestan.com/">Creative Stan</a>, made
                      with love for a better web
                    </p>
                  </nav>
                </div>
              </footer>
            </div>
          </div>


    </div>
</body>


    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}"></script>



<!--  Plugin for Switches, full documentation here: https://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{ asset('js/plugins/bootstrap-switch.js') }}"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>
<!--  Chartist Plugin  -->
<script src="{{ asset('js/plugins/chartist.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('js/plugins/bootstrap-notify.js') }}"></script>
<!--  Share Plugin -->
<script src="{{ asset('js/plugins/jquery.sharrre.js') }}"></script>
<!--  jVector Map  -->
<script src="{{ asset('js/plugins/jquery-jvectormap.js') }}" type="text/javascript"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{ asset('js/plugins/moment.min.js') }}"></script>
<!--  DatetimePicker   -->
<script src="{{ asset('js/plugins/bootstrap-datetimepicker.js') }}"></script>
<!--  Sweet Alert  -->
<script src="{{ asset('js/plugins/sweetalert2.min.js') }}" type="text/javascript"></script>
<!--  Tags Input  -->
<script src="{{ asset('js/plugins/bootstrap-tagsinput.js') }}" type="text/javascript"></script>
<!--  Sliders  -->
<script src="{{ asset('js/plugins/nouislider.js') }}" type="text/javascript"></script>
<!--  Bootstrap Select  -->
<script src="{{ asset('js/plugins/bootstrap-selectpicker.js') }}" type="text/javascript"></script>
<!--  jQueryValidate  -->
<script src="{{ asset('js/plugins/jquery.validate.min.js') }}" type="text/javascript"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="{{ asset('js/plugins/jquery.bootstrap-wizard.js') }}"></script>
<!--  Bootstrap Table Plugin -->
<script src="{{ asset('js/plugins/bootstrap-table.js') }}"></script>
<!--  DataTable Plugin -->
<script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>

<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('js/light-bootstrap-dashboard790f.js?v=2.0.1') }}" type="text/javascript"></script>

@yield('scripts')


</html>

</html>
