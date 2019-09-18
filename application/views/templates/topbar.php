<?php
$name = $user['name'];

$query = "SELECT * FROM `approval`
WHERE `setuju`=0
AND `approval` LIKE '$name'
";
$approv = $this->db->query($query)->result_array();

$lihat = "SELECT * FROM `approval`
WHERE `lihat`=0
AND `review` LIKE '$name'
";
$read = $this->db->query($lihat)->result_array();

$pesan = "SELECT * FROM `approval`
WHERE `setuju`=3
AND `made` LIKE '$name'
";
$message = $this->db->query($pesan)->result_array();

?>


<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>


      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">



        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <!-- Counter - Alerts -->
            <span class="badge badge-danger badge-counter"><?php echo (count($approv)); ?></span>
          </a>
          <!-- Dropdown - Alerts -->
          <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
              Asesmen yang belum ditinjau
            </h6>
            <?php foreach ($approv as $a) : ?>
              <a class="dropdown-item d-flex align-items-center" href="<?= base_url('home/index') ?>?id=<?= $a['id_identification'] ?>&tw=<?= $a['tw'] ?>&app=1">>
                <div class="mr-3">
                  <div class="icon-circle bg-primary">
                    <i class="fas fa-file-alt text-white"></i>
                  </div>
                </div>
                <div>
                  <div class="small text-gray-500"><?= $a['rincian_tgl'] ?> </div>
                  <span class="font-weight-bold"><?= $a['bagian'] ?> (triwulan <?= $a['tw'] ?>)</span>
                </div>
              </a>
            <?php endforeach; ?>
          </div>
        </li>







        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <!-- Counter - Messages -->
            <span class="badge badge-danger badge-counter"><?php echo (count($message) + count($read)) ?></span>
          </a>
          <!-- Dropdown - Messages -->
          <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
            <?php if (count($message) > 0) : ?>

              <h6 class="dropdown-header">
                Asesmen yang harus diperbaiki
              </h6>
              <?php foreach ($message as $m) : ?>


                <a class="dropdown-item d-flex align-items-center" href="<?= base_url('pages/ubahIdentifikasiMitigasi/') ?><?= $m['id_identification'] ?>?ok=ok&tw=<?= $m['tw'] ?>">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate"><?= $m['pesan'] ?></div>
                    <div class="small text-gray-500"><?= $m['bagian'] ?> · triwulan <?= $m['tw'] ?></div>
                  </div>
                </a>

              <?php endforeach; ?>
            <?php endif; ?>

            <?php if (count($read) > 0) : ?>

              <h6 class="dropdown-header">
                Asesmen yang belum dibaca
              </h6>
              <?php foreach ($read as $r) : ?>

                <a class="dropdown-item d-flex align-items-center" href="<?= base_url('home/index') ?>?id=<?= $r['id_identification'] ?>&tw=<?= $r['tw'] ?>">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate"><?= $r['bagian'] ?> </div>
                    <div class="small text-gray-500"><?= $r['rincian_tgl'] ?></div>
                  </div>
                </a>
              <?php endforeach; ?>
            <?php endif; ?>


          </div>
        </li>






        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name']; ?></span>
            <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['image']; ?>">
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="<?= base_url('User') ?>">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              My Profile
            </a>

            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Logout
            </a>
          </div>
        </li>

      </ul>

    </nav>
    <!-- End of Topbar -->