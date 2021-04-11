<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{asset('img/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Banking system</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('img/boss.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->fullName()}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">

                    <ul class="nav nav-treeview">


                        <li class="nav-item has-treeview menu-open">
                            <a href="{{route('showHome')}}" class="nav-link {{Route::is('showHome') ? 'active' :  ''}}">
                                <i class="nav-icon fas fa-network-wired"></i>
                                <p>Networks</p>
                            </a>
                        </li>

                        {{-- <li class="nav-item has-treeview">
                  <a href="{{route('showRoles')}}" class="nav-link {{Route::is('showRoles') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Roles

                        </p>
                        </a>

                </li> --}}


                <li class="nav-item has-treeview">
                    <a href="{{route('showUsers')}}" class="nav-link {{Route::is('showUsers') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users

                        </p>
                    </a>

                </li>

                <li class="nav-item has-treeview 
                {{ Route::is('showImages') || Route::is('showVideos') ? 'menu-open' : ''}}">

                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Media
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                        <a href="{{route('showImages')}}" class="nav-link {{Route::is('showImages') ? 'active' : ''}}">
                              <i class="fas fa-image nav-icon"></i>
                            
                                <p>Images</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('showVideos')}}" class="nav-link {{Route::is('showVideos') ? 'active' : ''}}">
                              <i class="fas fa-photo-video nav-icon"></i>
                                <p>Videos</p>
                            </a>
                        </li>
                    
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="{{route('showPlayers')}}" class="nav-link {{Route::is('showPlayers') ? 'active' : ''}}">
                        <i class="fas fa-tv nav-icon"></i>
                        <p>
                            Monitoring

                        </p>
                    </a>

                </li>

                <li class="nav-item has-treeview">
                    <a href="{{route('showOffPlayers')}}" class="nav-link {{Route::is('showOffPlayers') ? 'active' : ''}}">
                        <i class="fas fa-exclamation-triangle nav-icon"></i>
                        <p>
                            Alerts

                        </p>
                    </a>

                </li>

                <li class="nav-item has-treeview">
                    <a href="{{route('showEmails')}}" class="nav-link {{Route::is('showEmails') ? 'active' : ''}}">
           
                        <i class="fas fa-envelope-square nav-icon"></i>
                        <p>
                            Emails

                        </p>
                    </a>

                </li>


                <li class="nav-item has-treeview">
                    <a href="{{route('showPlannings')}}" class="nav-link {{Route::is('showPlannings') ? 'active' : ''}}">
                        <i class="fas fa-clock nav-icon"></i>
                     
                        <p>
                            Plannings

                        </p>
                    </a>

                </li>
            </ul>
            </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
