<section class="blog-page-wrap blog-one left-sidebar-blog pt-3">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 ">
                <h3 class="sidebar_title">Berita</h3>
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-8  col-sm-12 mb-2">
                        <div class="blog-post-list">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <!-- <ol class="carousel-indicators">
                                    <?php
                                    $i = 1;
                                    foreach ($berita as $b) {
                                        if ($i == 1) {
                                            if (!empty($b['berita_image'])) {
                                                $url = base_url('upload/berita_image/') . $b['berita_image'];
                                            } else {
                                                $url = base_url('assets/images/pengumuman.jpg');
                                            }
                                    ?>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>" class="<?= $i == 0 ? 'active' : '' ?>"></li>
                                    <?php
                                        }
                                        $i++;
                                    } ?>

                                </ol> -->
                                <div class="carousel-inner mb-3">

                                    <?php
                                    $i = 1;
                                    foreach ($berita as $b) {
                                        if ($i == 1) {
                                            if (!empty($b['berita_image'])) {
                                                $url = base_url('upload/berita_image/') . $b['berita_image'];
                                            } else {
                                                $url = base_url('assets/images/pengumuman.jpg');
                                            }
                                    ?>
                                            <div class="carousel-item <?= $i == 1 ? 'active' : '' ?>">
                                                <img class="carousel-img d-block w-100" src="<?= $url ?>" alt="First slide" style="">
                                                <div style="background: rgba(0, 0, 0, 0.5);" class="carousel-caption  d-md-block">
                                                    <h5 style="color:white;"><a style="color:white;" href="<?= base_url($b['tipe'] . '/' . $b['berita_slug']) ?>"><?= $b['berita_judul'] ?></a></h5>
                                                    <!-- <h5></h5> -->
                                                    <p><?= substr(strip_tags($b['berita_isi']), 0, 50) ?></p>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                        $i++;
                                    } ?>
                                </div>
                                <!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a> -->
                            </div>
                            <!-- <div class="row"> -->
                            <h5 class="sidebar_title mt-5 mb-1">Pengumuman</h5>
                            <div class="single-sidebar-widget mb-2">
                                <ul>
                                    <?php
                                    foreach ($pengumuman as $b) {
                                        if (!empty($b['berita_image'])) {
                                            $url = base_url('upload/berita_image/') . $b['berita_image'];
                                        } else {
                                            $url = base_url('assets/images/pengumuman.jpg');
                                        }
                                    ?>
                                        <li class="cat-item"><a style="line-height: 1.6;" href="<?= base_url($b['tipe'] . '/' . $b['berita_slug']) ?>"><?= $b['berita_judul'] ?><i class="fas fa-angle-right"></i></a></li>
                                        <!-- <li class="cat-item"><a href="https://dinkes.bangka.go.id/pengumuman/pengumuman-hasil-kelulusan-tes-administrasi-tahap-vi-dinas-kesehatan-kabupaten-bangka">Pengumuman Hasil Kelulusan Tes Administrasi Tahap VI DInas Kesehatan Kabupaten Bangka<i class="fas fa-angle-right"></i></a></li>
                                    <li class="cat-item"><a href="https://dinkes.bangka.go.id/pengumuman/perpanjangan-penerimaan-calon-tenaga-kontrak-tahap-vi-dinas-kesehatan-kabupaten-bangka">Perpanjangan Penerimaan Calon Tenaga Kontrak Tahap VI Dinas Kesehatan Kabupaten Bangka<i class="fas fa-angle-right"></i></a></li> -->
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>

                            <!-- </div> -->
                        </div>

                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4  col-sm-12 ">
                        <!-- <div class="col-xl-3"> -->
                        <div class="single-sidebar-widget">
                            <!-- <h5 class="sidebar_title">terbaru</h5> -->
                            <ul>
                                <?php
                                $i = 1;
                                foreach ($berita as $b) {
                                    if ($i > 1) {
                                        if (!empty($b['berita_image'])) {
                                            $url = base_url('upload/berita_image/') . $b['berita_image'];
                                        } else {
                                            $url = base_url('assets/images/pengumuman.jpg');
                                        }
                                ?>
                                        <li>
                                            <div class="media">
                                                <img class="mr-3" src="<?= $url ?>" title="<?= $b['berita_judul'] ?>" style="width: 80px ;height: 80px">
                                                <div class="media-body">
                                                    <h6 class="mt-0"><a title="<?= $b['berita_judul'] ?>" href="<?= base_url($b['tipe'] . '/' . $b['berita_slug']) ?>"><?= substr($b['berita_judul'], 0, 45) ?>..</a></h6>
                                                    <span><?= tanggal_indo_sort($b['berita_tanggal']) ?></span>
                                                </div>
                                            </div>
                                        </li>
                                <?php
                                    }
                                    $i++;
                                }
                                ?>
                            </ul>
                            <!-- </div> -->
                        </div>
                    </div>
                    <div class="col-lg-12">

                        <div class="blog-page-nav blog-pages-link text-center mb-5">
                            <a href="<?= base_url('berita') ?>" class="btn_theme_one color_one text-center">Lebih banyak ..</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            // $this->load->view('sidemenu');
            ?>
            <div class="col-xl-3 col-lg-3 col-md-3  col-sm-12 ">
                <div class="blog-sidebar dynamic-right-sidebar">
                    <!-- single sidebar item start -->
                    <div class="single-sidebar-widget">
                        <div class="search-box">
                            <form action="<?= base_url('search') ?>" method="get">
                                <input type="text" placeholder="Search here" name="s">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="single-sidebar-widget mb-1">
                        <a target="" href="https://mallsipandu.bangka.go.id/">
                            <img class="w-100" src="<?= base_url('assets/images/mall.jpg') ?>">
                        </a>
                    </div>
                    <div class="single-sidebar-widget mb-1">
                        <a target="_blank" href="https://covid19.bangka.go.id/">
                            <img class="w-100" src="<?= base_url('assets/images/info-covid2.png') ?>">
                        </a>
                    </div>
                    <div class="single-sidebar-widget mb-1 mt-0">
                        <a target="_blank" href="https://puskesmas.bangka.go.id/">
                            <img class="w-100" src="<?= base_url('assets/images/portal-puskes.png') ?>">
                        </a>
                    </div>
                    <div class="single-sidebar-widget mb-1 mt-0">
                        <a target="_blank" href="http://sidikjari.bangka.go.id/">
                            <img class="w-100" src="<?= base_url('assets/images/fingerprint2.png') ?>">
                        </a>
                    </div>
                    <div class="single-sidebar-widget mb-0 mt-0">
                        <a target="_blank" href="https://www.lapor.go.id/">
                            <img class="w-100" style='width : 100%' src="<?= base_url('assets/images/span_lapor.jpg') ?>">
                        </a>
                    </div>
                    <div style="width: 100%;" class="single-sidebar-widget mb-5">
                        <div id="fb-root"></div>
                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v14.0" nonce="BLkDOsin"></script>
                        <div class="fb-page" style="width: 100%;" data-href="https://www.facebook.com/Dinas-Kesehatan-Kabupaten-Bangka-102114102652620" data-tabs="timeline" data-width="500" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                            <blockquote cite="https://www.facebook.com/Dinas-Kesehatan-Kabupaten-Bangka-102114102652620" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Dinas-Kesehatan-Kabupaten-Bangka-102114102652620">Dinas Kesehatan Kabupaten Bangka</a></blockquote>
                        </div>
                    </div>

                    <!-- single sidebar item start -->
                    <!-- <div class="single-sidebar-widget">
                        <h4 class="sidebar_title">Category</h4>
                        <ul>
                            <li class="cat-item"><a href="#">Graphic Design <i class="fas fa-angle-right"></i></a></li>
                            <li class="cat-item"><a href="#">Web Development <i class="fas fa-angle-right"></i></a></li>
                            <li class="cat-item"><a href="#">Digital Marketing <i class="fas fa-angle-right"></i></a></li>
                            <li class="cat-item"><a href="#">App Development <i class="fas fa-angle-right"></i></a></li>
                            <li class="cat-item"><a href="#">Facebook Marketing <i class="fas fa-angle-right"></i></a></li>
                        </ul>
                    </div> -->
                    <!-- single sidebar item start -->
                    <!-- <div class="single-sidebar-widget">
                        <h4 class="sidebar_title">recent post</h4>
                        <ul>
                            <li>
                                <div class="media">
                                    <img class="mr-3" src="assets/images/blog/thumbnail1.jpg" alt="shipo">
                                    <div class="media-body">
                                        <h6 class="mt-0"><a href="#">English breakfast tea with tasty.</a></h6>
                                        <span>22 March, 2019</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media">
                                    <img class="mr-3" src="assets/images/blog/thumbnail2.jpg" alt="shipo">
                                    <div class="media-body">
                                        <h6 class="mt-0"><a href="#">English breakfast tea with tasty.</a></h6>
                                        <span>22 March, 2017</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media">
                                    <img class="mr-3" src="assets/images/blog/thumbnail1.jpg" alt="shipo">
                                    <div class="media-body">
                                        <h6 class="mt-0"><a href="#">English breakfast tea with tasty.</a></h6>
                                        <span>22 March, 2018</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div> -->
                    <!-- single sidebar item start -->
                    <!-- <div class="single-sidebar-widget">
                        <h4 class="sidebar_title">Tags</h4>
                        <div class="tagcloud">
                            <ul>
                                <li><a href="#">web</a></li>
                                <li><a href="#">android</a></li>
                                <li><a href="#">apps</a></li>
                                <li><a href="#">development</a></li>
                                <li><a href="#">download</a></li>
                                <li><a href="#">software</a></li>
                                <li><a href="#">shipo</a></li>
                            </ul>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <section class="software-services-wrap section-padding" id="aplikasi">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-md-10 col-12 col-sm-12 offset-xl-2 offset-md-1">
                <div class="section-title-three text-center">
                    <h2>Aplikasi Kami</h2>
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
</section> -->
<section class="why-we-best-two section-padding theme-two-bg" id="pengumuman">
    <div class="container">
        <div class="row text-center">
            <div class="col-xl-8 col-12 offset-xl-2 offset-md-1 col-md-10">
                <div class="section-title-two">
                    <h2>Video</h2>
                    <span>Dapatkan informasi terbaru tentang kami.</span>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- <div class="why-we-best-tabs-nav col-12 col-xl-6 col-md-6 col-sm-12">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/YtfuGwTOxxE?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer;  clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div> -->

            <div class="why-we-best-tabs-nav col-12 col-xl-6 col-md-6 col-sm-12">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/fNBK8eTHYi4?autoplay=1&mute=0&enablejsapi=1&controls=0&amp;start=4" title="PSC 119 Bangka Let's go" frameborder="0" allow="accelerometer;  clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="why-we-best-tabs-nav col-12 col-xl-6 col-md-6 col-sm-12">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/Ll_y_wUqmsg?autoplay=1&mute=0&enablejsapi=1&controls=0&amp;start=4" title="PSC 119 Bangka Let's go" frameborder="0" allow="accelerometer;  clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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

<?php
//$this->load->view('e_survey') 
?>