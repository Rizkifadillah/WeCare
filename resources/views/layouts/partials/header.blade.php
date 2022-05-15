<nav class="main-header navbar navbar-expand navbar-white bg-info elevation-2 navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-white"></i></a>
      </li>
      
    </ul>

    <!-- SEARCH FORM -->
    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell text-white"></i>
          <span class="badge badge-danger navbar-badge">{{ $countNotifikasi}}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right overflow-hidden">
          <span class="dropdown-item dropdown-header">{{ $countNotifikasi}} Notifikasi</span>
          @foreach ($listNotifikasi as $key => $notifikasi)
          @if ($notifikasi)
              
          <div class="dropdown-divider"></div>
          <a href="{{ route("$key.index")}}" class="dropdown-item">
            <i class="fas 
            @switch($key)
                @case('donatur') fa-user-plus text-warning @break
                @case('subscriber') fa-user-plus text-secondary @break
                @case('contact') fa-envelope text-info @break
                @case('donation') fa-donate text-primary @break
                @case('cashout') fa-hand-holding-usd text-success @break
            @endswitch
            mr-2"></i> {{ $notifikasi->$key}} {{$key}} pesan baru
            <span class=" text-muted text-sm d-block">
              {{ now()->parse($notifikasi->created_at)->diffForhumans() }}
            </span>
          </a>
          
          @endif
          @endforeach
          
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#" 
          onclick="document.querySelector('#form-logout').submit()">
          <i class="fas fa-sign-out-alt text-white"></i>Keluar
        </a>
        <form action="{{ route('logout')}}" method="post" id="form-logout">
          @csrf
        </form>
      </li>
    </ul>
  </nav>