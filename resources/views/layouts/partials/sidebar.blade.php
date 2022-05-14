<aside class="main-sidebar sidebar-light-primary elevation-2">
    <!-- Brand Logo -->
    <a href="{{ url('/')}}" class="brand-link">
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
          <a href="{{ route('profile.show')}}" class="d-block" data-toggle="tooltip" data-placement="top" title="Edit Profil">
            {{ auth()->user()->name}}
            <i class="fas fa-pencil-alt ml-2 text-sm text-primary"></i>
          </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('dashboard.index')}}" class="nav-link {{ request()->is('admin/dashboard*') ? 'active bg-info elevation-2' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @if (auth()->user()->hasRole('admin'))
          <li class="nav-header">MASTER</li>
          <li class="nav-item">
            <a href="{{ route('category.index')}}" class="nav-link {{ request()->is('admin/category*') ? 'active bg-info elevation-2' : ''}}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Kategori
              </p>
            </a>
          </li>
          @else
            <li class="nav-header">MASTER</li>
          @endif
          
          @if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('donatur'))
          <li class="nav-item">
            <a href="{{ route('campaign.index')}}" class="nav-link {{ request()->is('admin/campaign*') ? 'active bg-info elevation-2' : ''}}">
              <i class="nav-icon fas fa-thumbs-up"></i>
              <p>
                Project
              </p>
            </a>
          </li>
          <li class="nav-header">REFERENSI</li>
          @if (auth()->user()->hasRole('admin'))
          <li class="nav-item">
            <a href="{{ route('donatur.index')}}" class="nav-link {{ request()->is('admin/donatur*') ? 'active bg-info elevation-2' : '' }} ">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Donatur
              </p>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a href="{{ route('donation.index')}}" class="nav-link {{ request()->is('admin/donation*') ? 'active bg-info elevation-2' : '' }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Daftar Donasi
              </p>
            </a>
          </li>
          <li class="nav-item">
              <a href="{{ route('cashout.index')}}" class="nav-link {{ request()->is('admin/cashout*') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-hand-holding-usd"></i>
                  <p>
                      Daftar Pencairan
                  </p>
              </a>
          </li>
          @endif

          @if (auth()->user()->hasRole('admin'))
          <li class="nav-header">INFORMASI</li>

          <li class="nav-item">
            <a href="{{ route('contact.index')}}" class="nav-link {{ request()->is('admin/contact*') ? 'active bg-info elevation-2' : '' }}">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Kontak Masuk
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('subscriber.index')}}" class="nav-link {{ request()->is('admin/subscriber*') ? 'active bg-info elevation-2' : '' }}">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Subscriber
              </p>
            </a>
          </li>
          @endif

          @if (auth()->user()->hasRole('admin'))
          <li class="nav-header">REPORT</li>

           <li class="nav-item">
            <a href="{{ route('report.index')}}" class="nav-link {{ request()->is('admin/report*') ? 'active bg-info elevation-2' : '' }}">
              <i class="nav-icon fas fa-file-pdf"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
          @endif
          @if (auth()->user()->hasRole('donatur'))
            {{-- <li class="nav-header">LOG</li>
            <li class="nav-item">
                <a href="pages/widgets.html" class="nav-link ">
                <i class="nav-icon fas fa-file"></i>
                <p>
                    Log Aktivitas
                </p>
                </a>
            </li> --}}
          @endif
          @if (auth()->user()->hasRole('admin'))
          <li class="nav-header">PENGATURAN</li>

          <li class="nav-item">
            <a href="{{ route('setting.index')}}" class="nav-link {{ request()->is('admin/setting*') ? 'active bg-info elevation-2' : ''}}">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Setting
              </p>
            </a>
          </li>
          @endif
          {{-- <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link ">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profil
              </p>
            </a>
          </li> --}}
           
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>