<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
    <img src="{{asset('img/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Banking system</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
   
          <li class="nav-item has-treeview menu-open">
          
            <ul class="nav nav-treeview">

              <li class="nav-item mb-3 mt-2">
                <a href="{{route('showHome')}}" class="nav-link ">
               
                    <i class="nav-icon  fas fa-arrow-left"></i>
                    <p>Go back</p>
                  </a>
                </li>

              <li class="nav-item">
              <a href="{{route('showNetworkChannels',$network->id)}}" class="nav-link {{ Route::is('showNetworkChannels') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-desktop"></i>
                  <p>Channels</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('showNetworkPlayers',$network->id)}}" class="nav-link {{ Route::is('showNetworkPlayers') ? 'active' : ''}}">
                  <i class=" nav-icon fas fa-play-circle"></i>
                  <p>Players</p>
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
