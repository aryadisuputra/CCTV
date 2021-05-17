

<?php 

	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}

	?>
  <div >
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../../node_modules/admin-lte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">WFH CCTV</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../node_modules/admin-lte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['username']; ?></a>
          <a href="#" class="d-block"><?php echo $_SESSION['level']; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">Dashboard</li>
          <!-- <li class="nav-item">
            <a href="../dashboard/halaman_pegawai.php" class="nav-link">
              <i class="nav-icon fas fa-archive"></i>
              <p>
               Room List
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../table-room/table-ch-kra.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>CH KRA</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../table-room/table-tlc.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>TLC</p>
                </a>
              </li>
            </ul>
          </li> -->
          <li class="nav-item">
            <a href="../table-room/table-ch-kra.php" class="nav-link">
            <i class="nav-icon fas fa-archive"></i>
              <p>
                Room
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
               User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../table-user/list_admin.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../table-user/list_pimpinan.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pimpinan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../table-user/list_user_tlc.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>TLC</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../table-user/list_user_tl.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>TL</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../table-user/list_user_staff.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Staff</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="../table-user/profile_user.php" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Setting
              </p>
            </a>
          </li>
		      <li class="nav-item">
            <a href="../../logout.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  </div>

