  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link">
      <img src="/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">The <strong>Project</strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image" style="max-width:45px; max-height:45px;">
          @auth<img src="storage/{{ Auth::user()->gambar }}" class="img-circle elevation-2" alt="User Image" style="width:35px; height:35px;">@endauth
        </div>
        <div class="info">
          @auth<a class="d-block">{{ Auth::user()->name }}</a>@endauth
        </div>
      </div>

      <!-- SidebarSearch Form -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
    
          <li class="nav-item active menu-open">
            <a href="/home" class="nav-link">
              <i class="nav-icon fas fa-solid fa-robot"></i>
              <p>
                Home
              </p>
            </a>

          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-solid fa-wrench"></i>
              <p>
                Tambah Project
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav-item active nav-treeview">
              <li class="nav-item">
                <a href="/project" class="nav-link">
                  <i class="fas fa-solid fa-toolbox nav-icon"></i>
                  <p>Project</p>
                </a>
              </li>
              @if(Auth::user()->role == 'admin')
              <li class="nav-item menu-open">
                <a href="/komponen" class="nav-link">
                  <i class="fas fa-solid fa-toolbox nav-icon"></i>
                  <p>Komponen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/aplikasi" class="nav-link">
                  <i class="fas fa-solid fa-toolbox nav-icon"></i>
                  <p>Aplikasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/mahasiswa" class="nav-link">
                  <i class="fas fa-solid fa-users nav-icon"></i>
                  <p>Mahasiswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/dospem" class="nav-link">
                  <i class="fas fa-solid fa-user nav-icon"></i>
                  <p>Dosen pembimbing</p>
                </a>
              </li>

                <li class="nav-item">
                <a href="/register" class="nav-link">
                  <i class="fas fa-solid fa-plus nav-icon"></i>
                  <p>Tambah Akun</p>
                </a>
              </li>
              @endif
              

                <li class="nav-item">
                <form action="/logout" class="" method="post">
                  @csrf
                  <i class="fas fa-solid fa-users nav-icon"></i>
                  <button class="btn text-danger" type="submit">Logout</button>
                </form>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>