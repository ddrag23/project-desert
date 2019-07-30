<!-- Page Wrapper -->
<div id="wrapper">

  <!-- Sidebar -->
  <?php if (!empty($this->session->userdata('username'))): ?>

  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <?php if ($this->session->userdata('level') == 'administrator'): ?>
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboardadmin'); ?>">
        <div class="sidebar-brand-icon ">
          <i class="fas fa-store"></i>
        </div>
          <div class="sidebar-brand-text mx-3">TOKO ONLINE</div>
      </a>
    <?php endif; ?>
    <?php if ($this->session->userdata('level') == 'penjual'): ?>
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('penjual/dashboard'); ?>">
        <div class="sidebar-brand-icon ">
          <i class="fas fa-store"></i>
        </div>
          <div class="sidebar-brand-text mx-3">TOKO ONLINE</div>
      </a>
    <?php endif; ?>


    <!-- Divider -->
    <?php if ($this->session->userdata('level') == "administrator"): ?>
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="<?= base_url('dashboardadmin'); ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="<?= base_url('users'); ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>list admin</span></a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="<?php echo base_url('produk'); ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>list produk</span></a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="<?php echo base_url('penjual'); ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>list penjual</span></a>
    </li>
  <?php endif; ?>

    <!-- Divider -->
    <?php if ($this->session->userdata('level') == "penjual"): ?>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('penjual/dashboard'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('produk'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>List Produk</span></a>
      </li>
    <?php endif; ?>
    <?php if ($this->session->userdata('level') == "users"): ?>

    <hr class="sidebar-divider">

    <!-- Heading -->
    <!-- <div class="sidebar-heading">
      Interface
    </div> -->

    <!-- Nav Item - Pages Collapse Menu -->

    <!-- Nav Item - Charts -->
    <li class="nav-item">
      <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>keripik lele</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
      <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
    </li>

  <?php endif; ?>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
<?php endif; ?>

  <!-- End of Sidebar -->
  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

      <!-- Topbar -->
      <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <?php if (empty($this->session->userdata('username'))): ?>
        <a class="navbar-brand" href="<?= base_url(); ?>" style="font-size:25px; color:#4e73df;">
          <i class="fas fa-store" style="font-size:35px;"></i>
          Toko Online
        </a>
      <?php endif; ?>

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
          <i class="fa fa-bars"></i>
        </button>



        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

          <!-- Nav Item - Search Dropdown (Visible Only XS) -->
          <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
              <form class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                  <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                      <i class="fas fa-search fa-sm"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </li>
          <li class="nav-item no-arrow mx-1">
            <!-- Topbar Search -->
            <?php if (empty($this->session->userdata('username'))): ?>
              <form method="get" action="<?= base_url(''); ?>" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                  <input type="text" name = "keyword" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="submit" >
                      <i class="fas fa-search fa-sm"></i>
                    </button>
                  </div>
                </div>
              </form>
            <?php endif; ?>




          </li>

          <div class="topbar-divider d-none d-sm-block"></div>

          <!-- Nav Item - User Information -->
          <?php if (!empty($this->session->userdata('username'))): ?>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('username'); ?></span>
                <!-- <img class="img-profile rounded-circle" src="<?php echo base_url(); ?>uploads/<?php echo 'dir_' . $this->session->userdata('username') . '/' . $this->session->userdata('pasfoto'); ?>"> -->
                <?php if ($this->session->userdata('pasfoto') == null): ?>
                  <img src="<?php echo base_url(); ?>uploads/defaultAvatar.png" alt="photo" class="img-profile rounded-circle" >
                <?php endif ?>
                <?php if ($this->session->userdata('pasfoto') != null): ?>
                  <div class="img">
                    <img src="<?php echo base_url(); ?>uploads/<?php echo 'dir_' . $this->session->userdata('username') . '/' . $this->session->userdata('pasfoto'); ?>" alt="photo" class="img-profile rounded-circle" >
                  </div>
                <?php endif ?>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo base_url('profile'); ?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" >
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          <?php else: ?>
            <a href="<?php echo base_url('auth/login'); ?>" class="btn btn-primary btn-icon-split">
              <span class="icon text-white-50">
                <i class="fas fa-user"></i>
              </span>
              <span class="text">Login</span>
            </a>
          <?php endif; ?>
          <!-- <li class="nav-item dropdown no-arrow"> -->
            <!-- <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
              <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
            </a> -->
            <!-- Dropdown - User Information -->
            <!-- <div class="dropdown-menu dropdown-menu-right shadow animated-grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="#">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
              </a>
              <a class="dropdown-item" href="#">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                Settings
              </a>
              <a class="dropdown-item" href="#">
                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                Activity Log
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
              </a>
            </div>
          </li> -->

        </ul>

      </nav>
      <!-- End of Topbar -->
