<?php
$menu = Menu();
?>
<header class="top-header theme_two_menu">
    <div class="home_one_header" id="sticky-nav">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="home-one-menu">
                        <div class="navbar navbar-expand-lg">
                            <a class="navbar-brand justify-content-end" href="<?= base_url() ?>">
                                <div class="row">
                                    <img style="width : 50%; height:auto" src="<?= base_url() ?>assets/images/c-logo.png" class="logo-display" alt="shipo">
                                    <!-- <h2 style="color: #fff">DINKES KAB BANGKA</h2> -->
                                </div>
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav_mneu">
                                <i class="fas fa-bars"></i>
                            </button>
                            <div class="collapse navbar-collapse justify-content-end" id="nav_mneu">
                                <ul class="navbar-nav">
                                    <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>">Home</a></li>
                                    <!-- <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>profil">Profil</a></li> -->
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Profil
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <?php foreach ($menu['Profil'] as $profil) {
                                                echo '  <a class="dropdown-item" href="' . base_url('profil/') . $profil['menu_slug'] . '">' . $profil['menu_judul'] . '</a>';
                                            } ?>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Layanan
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <?php foreach ($menu['Layanan'] as $layanan) {
                                                echo '  <a class="dropdown-item" href="' . base_url('layanan/') . $layanan['menu_slug'] . '">' . $layanan['menu_judul'] . '</a>';
                                            } ?>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Informasi
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="<?= base_url('#aplikasi') ?>">Aplikasi Kami</a>
                                            <a class="dropdown-item" href="<?= base_url('#pengumuman') ?>">Pengumuman</a>
                                            <a class="dropdown-item" href="<?= base_url('#review') ?>">Pendapat Publik</a>
                                            <a class="dropdown-item" href="<?= base_url('bank-data') ?>">Bank Data</a>

                                        </div>
                                    </li>
                                    <!-- <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>profil">Informasi</a></li> -->
                                    <!-- <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>tentang">Tentang</a></li> -->
                                    <li class="nav-item"><a style="width : 150px" class="nav-link" href="<?= base_url() ?>daftar-tamu">Daftar Tamu</a></li>
                                </ul>
                                <a href="<?= base_url('login') ?>" class="btn_subscribe">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<?php if (!empty($navbar)) { ?>
    <section class="page-banner-wrap breadcrumb-wrap align-items-center d-flex" style="height: 300px; background-image: url('<?= base_url() ?>assets/images/hero_bg.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-12 col-md-12 col-sm-12 text-center">
                    <div class="page-banner-title">
                        <h1><?= $navbar['title'] ?></h1>
                    </div>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                            <li class="breadcrumb-item active"><?= $navbar['kategori'] ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
<?php
} else { ?>
    <section class="hero_one_wrapper bg d-flex align-items-center overflow" style="height: 630px; padding-top: 110px;background-image:url('<?= base_url() ?>assets/images/hero_bg.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-12 col-md-5 col-sm-12 wow animated fadeInLeft" data-wow-duration="3s">
                    <div class="mobile-app-bg text-right">
                        <img src="<?= base_url() ?>assets/images/kadin_bupati.png" alt="shipo">
                    </div>

                </div>
                <div class="col-xl-6 col-md-8 col-sm-8 col-12">
                    <div class="single-hero-wrap wow animated fadeInUp" data-wow-duration="2s" style="visibility: visible;">
                        <h1>Dinas Kesehatan <br>Kabupaten Bangka</h1>
                        <p>Bersama membangun Bangka Sehat.</p>
                        <!-- <div class="hero-form">
                            <form action="#">
                                <input type="text" placeholder="Enter Your Email">
                                <button type="submit">Try It Free <i class="fas fa-arrow-right"></i></button>
                            </form>
                            <span>No Credit Card Required</span>
                        </div> -->
                    </div>
                </div>

            </div>
        </div>
    </section>
<?php }
