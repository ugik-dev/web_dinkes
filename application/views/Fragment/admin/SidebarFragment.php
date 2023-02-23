<div id="wrapper">

  <nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
      <ul class="nav metismenu" id="side-menu">
        <?= $this->load->view('Fragment/SidebarHeaderFragment', NULL, TRUE); ?>
        <li id="dashboard">
          <a href="<?= base_url('') ?>"><i class="fa fa-home"></i> <span class="nav-label">HOME</span></a>
        </li>
        <li id="news_post">
          <a href="<?= base_url('admin/berita') ?>"><i class="fa fa-newspaper"></i> <span class="nav-label">News Post</span></a>
        </li>
        <li id="kelolah_menu">
          <a href="<?= base_url('admin/menu') ?>"><i class="fa fa-users-cog"></i> <span class="nav-label">Menu / Halaman</span></a>
        </li>
        <li id="kelola_user">
          <a href="<?= base_url('admin/kelola_user') ?>"><i class="fa fa-users-cog"></i> <span class="nav-label">Pengguna</span></a>
        </li>
        <li id="bank_data">
          <a href="<?= base_url('admin/bank_data') ?>"><i class="fa fa-users-cog"></i> <span class="nav-label">Bank Data</span></a>
        </li>
        <li id="ikm">
          <a href="<?= base_url('admin/ikm') ?>"><i class="fa fa-users-cog"></i> <span class="nav-label">e-Survey / Indeks Kepuasan Masyrakat</span></a>
        </li>
        <li id="pengaduan">
          <a href="<?= base_url('admin/pengaduan') ?>"><i class="fa fa-users-cog"></i> <span class="nav-label">Pengaduan</span></a>
        </li>

        <li id="setting_parm">
          <a href="#"><i class="fa fa-tasks"></i> <span class="nav-label">Galeri</span> <span class="fa arrow"></span></a>
          <ul class="nav nav-second-level" aria-expanded="true">
            <li id="kelola_standar_mutu">
              <a href="<?= base_url('admin/album') ?>"><i class="fa fa-balance-scale"></i> <span class="nav-label"> Album</span></a>
            </li>
            <li id="kelola_jenis_dokumen_perusahaan">
              <a href="<?= base_url('admin/galeri') ?>"><i class="fa fa-archive"></i> <span class="nav-label"> Galeri</span></a>
            </li>
            <li id="kelola_email">
              <a href="<?= base_url('AdminController/kelola_email') ?>"><i class="fa fa-link"></i> <span class="nav-label">Kelolah Email</span></a>
            </li>
          </ul>
        </li>
        <!-- <li id="setting_parm">
          <a href="#"><i class="fa fa-tasks"></i> <span class="nav-label">Setting</span> <span class="fa arrow"></span></a>
          <ul class="nav nav-second-level" aria-expanded="true">
            <li id="kelola_email">
              <a href="<?= base_url('AdminController/kelola_email') ?>"><i class="fa fa-link"></i> <span class="nav-label">Kelolah Email</span></a>
            </li>
          </ul>
        </li> -->

        <li id="logout">
          <a href="#" class="logout"><i class="fa fa-sign-out"></i> <span class="nav-label">Logout</span></a>
        </li>
    </div>
  </nav>
  <script>
    $(document).ready(function() {});
  </script>