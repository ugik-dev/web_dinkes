<section class="blog-page-wrap blog-one left-sidebar-blog section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-md-12 col-12 col-sm-12 col-lg-12  order-xl-2  order-lg-2 order-md-1 order-sm-1 order-1">
                <div class="blog-post-list">
                    <div class="row">
                        <?php foreach ($berita as $b) {
                            if (!empty($b['berita_image'])) {
                                $url = base_url('upload/berita_image/') . $b['berita_image'];
                            } else {
                                $url = base_url('assets/images/pengumuman.jpg');
                            }
                        ?>

                            <div class="col-lg-4">

                                <div class="single-post-item">
                                    <div class="post-thumbnail">
                                        <img style=" height : 250px" src="<?= $url ?>" alt="shipo">
                                    </div>
                                    <div class="post-contents">
                                        <h6 style="color:black;"><a style="color:black;" href="<?= base_url($b['tipe'] . '/' . $b['berita_slug']) ?>"><?= $b['berita_judul'] ?></a></h6>
                                        <p style="  word-break: break-word;
   overflow: hidden;
   text-overflow: ellipsis;
   display: -webkit-box;
   line-height: 16px; /* fallback */
   max-height: 32px; /* fallback */
   -webkit-line-clamp: 2; /* number of lines to show */
   -webkit-box-orient: vertical;"><?= substr(strip_tags($b['berita_isi']), 0, 225) ?></p>
                                        <a href="<?= base_url($b['tipe'] . '/' . $b['berita_slug']) ?>" class="permalink_btn">lanjutkan baca <i class="fas fa-angle-right"></i></a>
                                    </div>
                                    <div class="post-metabox">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <img src="<?= base_url('assets/images/avatar-9.png') ?>" alt="author">
                                                    Admin Dinkes
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="far fa-calendar-alt"></i><?= $b['berita_tanggal'] ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>
                    </div>
                    <!-- single post item end -->
                    <!-- single post item start -->
                </div>
                <!-- <a href="<?= base_url('berita') ?>" class="btn_theme_one color_one">Lainnya ..</a> -->
                <!-- <div class="blog-page-nav blog-pages-link">
                    <ul>
                        <li><a href="#">01</a></li>
                        <li><a href="#">02</a></li>
                        <li><a href="#">03</a></li>
                        <li><a href="#">04</a></li>
                        <li><a href="#"><i class="fas fa-angle-right"></i></a></li>
                    </ul>
                </div> -->
            </div>
            <?php
            // $this->load->view('sidemenu');
            ?>

        </div>
    </div>
</section>

<section class="software-services-wrap section-padding" id="aplikasi">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-md-10 col-12 col-sm-12 offset-xl-2 offset-md-1">
                <div class="section-title-three text-center">
                    <h2>Aplikasi Kami</h2>
                    <!-- <span>Why I say old chap that is spiffing lavatory chip shop gosh off his nut, smashing boot <br>are you taking the piss posh loo brilliant matie boy.!</span> -->
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-4 col-md-6 col-12 col-sm-12">
                <a href="https://mallsipandu.bangka.go.id/">
                    <div class="single-service-item text-center  wow  fadeInUp animated" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s; animation-name: fadeInUp;">
                        <div class="s_icon_box">
                            <img src="assets/images/home-three/icon1.png" alt="modinatheme">
                        </div>
                        <h3>Mall Si Pandu</h3>
                        <p>Informasi dan Pelayanan di bidang kesehatan.</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-4 col-md-6 col-12 col-sm-12">
                <a href="https://puskesmas.bangka.go.id/">
                    <div class="single-service-item text-center wow  fadeInUp animated" data-wow-duration="2s" data-wow-delay=".9s" style="visibility: visible; animation-duration: 2s; animation-delay: 0.9s; animation-name: fadeInUp;">
                        <div class="s_icon_box">
                            <img src="assets/images/home-three/icon4.png" alt="modinatheme">
                        </div>
                        <h3>Portal Puskesmas</h3>
                        <p>Portal Puskesmas diseluruh Kabupaten Bangka.</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-4 col-md-6 col-12 col-sm-12">
                <a href="https://smartinpirt-bangka.babelprov.go.id/smartin_pirt/">
                    <div class="single-service-item text-center wow  fadeInUp animated" data-wow-duration="2s" data-wow-delay=".3s" style="visibility: visible; animation-duration: 2s; animation-delay: 0.3s; animation-name: fadeInUp;">
                        <div class="s_icon_box">
                            <img src="assets/images/home-three/icon2.png" alt="modinatheme">
                        </div>
                        <h3>SMART-IN PIRT</h3>
                        <p>Sertifikat Pangan Industri Rumah Tangga.</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-4 col-md-6 col-12 col-sm-12">
                <a href="https://smartinpirt-bangka.babelprov.go.id/smartin_pirt/">
                    <div class="single-service-item text-center wow  fadeInUp animated" data-wow-duration="2s" data-wow-delay=".6s" style="visibility: visible; animation-duration: 2s; animation-delay: 0.6s; animation-name: fadeInUp;">
                        <div class="s_icon_box">
                            <img src="assets/images/home-three/icon3.png" alt="modinatheme">
                        </div>
                        <h3>SI KOMPAK</h3>
                        <p>Rekomendasi Perizinan Praktik Tenaga Kesehatan.</p>
                    </div>
                </a>
            </div>

            <div class="col-xl-4 col-md-6 col-12 col-sm-12">
                <div class="single-service-item text-center wow  fadeInUp animated" data-wow-duration="2s" data-wow-delay="1.3s" style="visibility: visible; animation-duration: 2s; animation-delay: 1.3s; animation-name: fadeInUp;">
                    <div class="s_icon_box">
                        <img src="assets/images/home-three/icon5.png" alt="modinatheme">
                    </div>
                    <h3>SI JANTAN</h3>
                    <p>Jaminan Pelayanan Kesehatan.</p>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 col-12 col-sm-12">
                <div class="single-service-item text-center wow  fadeInUp animated" data-wow-duration="2s" data-wow-delay="1.6s" style="visibility: visible; animation-duration: 2s; animation-delay: 1.6s; animation-name: fadeInUp;">
                    <div class="s_icon_box">
                        <img src="assets/images/home-three/icon6.png" alt="modinatheme">
                    </div>
                    <h3>SI RESTRAD</h3>
                    <p>Rekomendasi Surat Tanda Daftar Pengobatan Tradisional.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="why-we-best-two section-padding theme-two-bg" id="pengumuman">
    <div class="container">
        <div class="row text-center">
            <div class="col-xl-8 col-12 offset-xl-2 offset-md-1 col-md-10">
                <div class="section-title-two">
                    <h2>Pengumuman</h2>
                    <span>Dapatkan informasi terbaru tentang kami.</span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="why-we-best-tabs-nav col-12 col-xl-6 col-md-12 col-sm-12 align-items-end d-flex">
                <ul class="nav nav-pills " id="pills-tab" role="tablist">
                    <?php
                    $pengumuman = array();
                    $pengumuman = Pengumuman();
                    $i = 1;
                    foreach ($pengumuman as $p) {
                        if ($i == 1) {
                    ?>
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="<?= base_url('pengumuman/' . $p['berita_slug']) ?>" role="tab">
                                    <div style="width : 500px" class="why-nav d-flex align-self-baseline align-items-center">
                                        <div class="why-icon">
                                            <img src="assets/images/home-two/idea_icon.png" alt="shipo">
                                            <img src="assets/images/home-two/idea_active.png" alt="shipo">
                                        </div>
                                        <div class="why-nav-text">
                                            <h4><?= $p['berita_judul'] ?></h4>
                                            <!-- <p>Build integration aute irure design in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p> -->
                                        </div>
                                    </div>
                                </a>
                            </li>
                        <?php
                        } else if ($i == 2) { ?>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="<?= base_url('pengumuman/' . $p['berita_slug']) ?>" role="tab">
                                    <div style="width : 500px" class="why-nav d-flex align-self-baseline align-items-center">
                                        <div class="why-icon">
                                            <img src="assets/images/home-two/mobile_icon.png" alt="shipo">
                                            <img src="assets/images/home-two/mobile_icon_active.png" alt="shipo">
                                        </div>
                                        <div class="why-nav-text">
                                            <h4><?= $p['berita_judul'] ?></h4>
                                            <!-- <p>Build integration aute irure design in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p> -->
                                        </div>
                                    </div>
                                </a>
                            </li> <?php

                                } else { ?>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="<?= base_url('pengumuman/' . $p['berita_slug']) ?>" role="tab">
                                    <div style="width : 500px" class="why-nav d-flex align-self-baseline align-items-center">
                                        <div class="why-icon">
                                            <img src="assets/images/home-two/idea_icon.png" alt="shipo">
                                            <img src="assets/images/home-two/idea_active.png" alt="shipo">
                                        </div>
                                        <div class="why-nav-text">
                                            <h4><?= $p['berita_judul'] ?></h4>
                                            <!-- <p>Build integration aute irure design in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p> -->
                                        </div>
                                    </div>
                                </a>
                            </li><?php

                                }
                                $i++;
                            }
                                    ?>




                </ul>
            </div>

            <div class="why-we-best-tabs-content col-12 col-xl-6 col-md-6 col-sm-12">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="why-tab-one" role="tabpanel">
                        <img src="assets/images/home-two/why_img_one.png" alt="shipo">
                    </div>
                    <div class="tab-pane fade show" id="why-tab-two" role="tabpanel">
                        <img src="assets/images/home-two/why_img_one.png" alt="shipo">
                    </div>
                    <div class="tab-pane fade show" id="why-tab-three" role="tabpanel">
                        <img src="assets/images/home-two/why_img_one.png" alt="shipo">
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<section class="about-app-wrap-two section-padding" id="about">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-md-12 col-12 col-sm-12">
                <div class="about-app-img wow animated fadeInLeft" data-wow-duration="2s">
                    <img src="<?= base_url() ?>assets/images/lg-kadin.png" alt="shipo">
                </div>
            </div>

            <div class="col-xl-6 col-md-12 col-12 col-sm-12">
                <div class="about-app-text wow animated fadeInRight" data-wow-duration="2s">
                    <h2>Pelayanan Cepat <br> Ramah dan Berkalitas</h2>
                    <p>Website Dinas Kesehatan Kabupaten Bangka merupakan halaman untuk memudahkan akses masyarakat kepada informasi-informasi dari Dinas Kesehatan Kabupaten Bangka. Informasi yang disampaikan berasal dari kegiatan yang dilaksanakan oleh Dinas Kesehatan Kabupaten Bangka beserta jajarannya yaitu 12 Puskesmas, 3 Rumah Sakit yaitu Rumah Sakit Umum Daerah Depati Bahrin, Rumah Sakit Pratama Eko Maulana Ali dan Rumah Sakit Pratama Sjafrie Rahman, UPT PSC 119 Sepintu Sedulang dan UPT Laboratorium Kesehatan Daerah.</p>
                    <span class="highlight_text">Sejahterah <br>
                        Kondisi Masyarakat yang terpenuhi Ketahanan Materil dan Spiritual yang ditunjukkan oleh Pertumbuhan Ekonomi tinggi, Meratanya Tingkat Pendapatan Masyarakat, Keterbebasan dari Kemiskinan, SDM yang Berkualitas dan Berdaya Saing serta Terciptanya Pemerataan Pembangunan antar Wilayah
                    </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-12 col-12 col-sm-12">
                <div class="about-app-text wow animated fadeInLeft" data-wow-duration="2s">
                    <span class="highlight_text mb-4">Mulia <br>
                        Kondisi Masyarakat yang Memiliki Harkat dan Martabat serta Kedudukan yang Setara/Mulia/Tinggi karena Keberhasilan dalam Pencapaian Pembangunan dan Kesejahteraan Sosial yang Ideal. Masyarakat yang Mulia Memiliki Kemampuan dan Membentuk Karakter serta Peradaban yang Bermartabat dan Unggul dalam Menjadi Manusia yang Sehat, Berilmu Pengetahuan, Cakap, Kreatif dan Mandiri
                    </span> <!-- <h2>Visi Misi <br>digital app landing</h2> -->
                    <p>1. Mewujudkan Tata Kelola Pemerintahan yang Bersih dan Berbasis Teknologi Informasi<br>
                        2. Mewujudkan Sumber Daya Manusia yang Berkualitas dan Berintegritas<br>
                        3. Mewujudkan Pemeratan Pembangunan Infrastruktur antar Wilayah<br>
                        4. Mewujudkan Gerbang Kota dan Pariwisata Berskala Internasional<br>
                        5. Mewujudkan Perekonomian Daerah yang Berdaya Saing dan Berkelanjutan.</p>
                    <!-- <a href="#" class="btn_about">Download</a> -->
                </div>
            </div>

            <div class="col-xl-6 col-md-12 col-12 col-sm-12">
                <div class="about-app-img wow animated fadeInUp" data-wow-duration="2s">
                    <img src="assets/images/home-two/about_app_2.png" alt="shipo">
                </div>
            </div>
        </div>
    </div>
</section>



<section class="testimonial-theme-one section-padding theme-two-bg" id="review">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-12 col-md-12">
                <div class="section-title-one text-center">
                    <span>Pendapat Publik</span>
                    <h2>Apakah yang dikatakan <br>publik tentang kami ?<br></h2>
                </div>
            </div>
        </div>
    </div>

    <div class="testimonial_items_wrap theme-two-testimonial">
        <div class="client_list">
            <ul class="nav nav-tabs">
                <?php
                $i = 1;
                foreach ($surveys as $sur) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link <?= $i == 1 ? 'active' : '' ?>" data-toggle="tab" href="#review-<?= $sur['id'] ?>">
                            <img src="<?= base_url('assets/images/avatar-' . $i . '.png') ?>" alt="shipo">
                        </a>
                    </li>
                <?php
                    $i++;
                } ?>
            </ul>
        </div>

        <div class="testimonial-content-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-md-10 col-12 col-sm-12">
                        <div class="tab-content text-center">

                            <?php
                            $i = 1;
                            foreach ($surveys as $sur) {
                            ?>
                                <div class="tab-pane container <?= $i == 1 ? 'active' : 'fade' ?>" id="review-<?= $sur['id'] ?>">
                                    <div class="single-testimonial">
                                        <span class="icon-review">
                                            <i class="fas fa-quote-right"></i>
                                        </span>
                                        <p><?= $sur['alasan'] ?></p>
                                        <div class="client_info">
                                            <h5><?= $sur['nama'] ?></h5>
                                            <span><?= $sur['alamat'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                $i++;
                            } ?>


                            <div class="tab-pane container fade" id="review-three">
                                <div class="single-testimonial">
                                    <span class="icon-review">
                                        <i class="fas fa-quote-right"></i>
                                    </span>
                                    <p>Lorem ipsum dolor sit amet, consectetur scing elit, sed do eiusmod temp or incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse is an ultrices gravida. Risus commodo. consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <div class="client_info">
                                        <h5>Jone Devs</h5>
                                        <span>WP Developer</span>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane container fade" id="review-four">
                                <div class="single-testimonial">
                                    <span class="icon-review">
                                        <i class="fas fa-quote-right"></i>
                                    </span>
                                    <p>Lorem ipsum dolor sit amet, consectetur scing elit, sed do eiusmod temp or incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse is an ultrices gravida. Risus commodo. consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <div class="client_info">
                                        <h5>Charls babyes</h5>
                                        <span>CEO of P.C</span>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane container fade" id="review-five">
                                <div class="single-testimonial">
                                    <span class="icon-review">
                                        <i class="fas fa-quote-right"></i>
                                    </span>
                                    <p>Lorem ipsum dolor sit amet, consectetur scing elit, sed do eiusmod temp or incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse is an ultrices gravida. Risus commodo. consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <div class="client_info">
                                        <h5>Takmina Alom</h5>
                                        <span>WordPress Pro</span>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane container fade" id="review-six">
                                <div class="single-testimonial">
                                    <span class="icon-review">
                                        <i class="fas fa-quote-right"></i>
                                    </span>
                                    <p>Lorem ipsum dolor sit amet, consectetur scing elit, sed do eiusmod temp or incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse is an ultrices gravida. Risus commodo. consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <div class="client_info">
                                        <h5>Rohit mehta</h5>
                                        <span>UI Designer</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<section class="our-team-two-wrap section-padding" id="team">
    <div class="container">
        <div class="row text-center">
            <div class="col-xl-8 col-12 offset-xl-2 offset-md-1 col-md-10">
                <div class="section-title-two">
                    <h2>Struktur Organisasi</h2>
                    <!-- <span>There are many variations of passages of lorem ipsum available, but the majority have suffered alteration in some form, by injected.</span> -->
                </div>
            </div>
        </div>

        <div class="row">
            <div class="owl-carousel team-carousel owl-theme col-xl-12 col-md-12 col-12 wow animated zoomIn" data-wow-duration="2s">

                <div class="single-member text-center">
                    <div class="member-img">
                        <img src="<?= base_url() ?>assets/images/140-sekdin.png" alt="shipo" class="img-fluid">
                    </div>
                    <div class="member-info">
                        <h4>Nora Sukma Dewi, SKM, M.KM</h4>
                        <span>Sekretaris Kepala Dinas</span>
                    </div>
                    <!-- <ul class="social-profile">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="#"><i class="fab fa-behance"></i></a></li>
                    </ul> -->
                </div>
                <div class="single-member text-center">
                    <div class="member-img">
                        <img src="<?= base_url() ?>assets/images/140-kadin.png" alt="shipo" class="img-fluid">
                    </div>
                    <div class="member-info">
                        <h4>dr. Then Suyanti, MM</h4>
                        <span>Kepala Dinas</span>
                    </div>
                    <!-- <ul class="social-profile">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="#"><i class="fab fa-behance"></i></a></li>
                    </ul> -->
                </div>
                <div class="single-member text-center">
                    <div class="member-img">
                        <img src="<?= base_url() ?>assets/images/140-kasubagpp.png" alt="shipo" class="img-fluid">
                    </div>
                    <div class="member-info">
                        <h4>Shodiana, SKM, MKM, M.Med, Sc</h4>
                        <span>Kasubag Perencaan & Pelaporan</span>
                    </div>
                    <!-- <ul class="social-profile">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="#"><i class="fab fa-behance"></i></a></li>
                    </ul> -->
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('e_survey') ?>
<!-- <section class="contact-form-wrap-two section-padding bg-light" id="contact">
    <div class="container">
        <div class="row text-center">
            <div class="col-xl-8 col-12 offset-xl-2 offset-md-1 col-md-10">
                <div class="section-title-two">
                    <h2>Berikan Pendapat Anda</h2>
                    <span>Mari berikan pendapat anda, agar Dinas Kesehatan Kabupaten Bangka menjadi lebih baik.</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-12 col-md-12 col-sm-12">
                <div class="contact-form-two wow animated fadeInUp" data-wow-duration="2s">
                    <form action="mail.php" id="contact-form" method="POST">
                        <div class="row">
                            <div class="form-group col-12 col-md-6 col-sm-6 col-xl-6">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                <span class="form-icon"><i class="fas fa-user"></i></span>
                            </div>
                            <div class="form-group col-12 col-md-6 col-sm-6 col-xl-6">
                                <input type="email" class="form-control" name="email" id="email" placeholder="E Mail">
                                <span class="form-icon"><i class="fas fa-envelope"></i></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12 col-md-6 col-sm-6 col-xl-6">
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Nomor Telepon">
                                <span class="form-icon"><i class="fas fa-phone"></i></span>
                            </div>
                            <div class="form-group col-12 col-md-6 col-sm-6 col-xl-6">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Alamat">
                                <span class="form-icon"><i class="fas fa-map"></i></span>
                            </div>
                            <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12 message-box">
                                <textarea name="message" id="message" rows="6" name="message" placeholder="Pendapat Anda"></textarea>
                                <span class="form-icon"><i class="fas fa-edit"></i></span>
                            </div>
                        </div>
                        <div class="send-message text-center">
                            <button type="submit" class="btn-send">kirim</button>
                        </div>
                        <span class="form-message"></span>
                    </form>
                </div>
            </div>
            <div class="col-xl-6 col-12 col-md-12 col-sm-12 d-flex align-items-end justify-content-end">
                <div class="contact-form-image text-right">
                    <img src="assets/images/home-two/contact_us.png" alt="shipo">
                </div>
            </div>
        </div>
    </div>
</section> -->