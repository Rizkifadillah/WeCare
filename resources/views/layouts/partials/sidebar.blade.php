<aside class="main-sidebar sidebar-light-primary elevation-2">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard.index')}}" class="brand-link">
      <img src="{{ url($setting->path_image) ?? asset('assets/backend/dist/img/AdminLTELogo.png') }}" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ $setting->company_name}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('profile.show')}}" class="d-block">{{ auth()->user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('dashboard.index')}}" class="nav-link {{ request()->is('dashboard*') ? 'active bg-info elevation-2' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">MASTER</li>

          <li class="nav-item">
            <a href="{{ route('category.index')}}" class="nav-link {{ request()->is('category*') ? 'active bg-info elevation-2' : ''}}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Kategori
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('campaign.index')}}" class="nav-link {{ request()->is('campaign*') ? 'active bg-info elevation-2' : ''}}">
              <i class="nav-icon fas fa-thumbs-up"></i>
              <p>
                Project
              </p>
            </a>
          </li>

          <li class="nav-header">REFERENSI</li>

          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link ">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Donatur
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link ">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Daftar Donatur
              </p>
            </a>
          </li>

          @if (auth()->user()->hasRole('admin'))
          <li class="nav-header">INFORMASI</li>

          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link ">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Kontak Masuk
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link ">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Subscriber
              </p>
            </a>
          </li>
          @endif

          <li class="nav-header">REPORT</li>

           <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link ">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>

          @if (auth()->user()->hasRole('donatur'))
            <li class="nav-header">LOG</li>
            <li class="nav-item">
                <a href="pages/widgets.html" class="nav-link ">
                <i class="nav-icon fas fa-file"></i>
                <p>
                    Log Aktivitas
                </p>
                </a>
            </li>
          @endif
          <li class="nav-header">PENGATURAN</li>
          @if (auth()->user()->hasRole('admin'))

          <li class="nav-item">
            <a href="{{ route('setting.index')}}" class="nav-link {{ request()->is('setting*') ? 'active bg-info elevation-2' : ''}}">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Setting
              </p>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link ">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profil
              </p>
            </a>
          </li>
           
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>