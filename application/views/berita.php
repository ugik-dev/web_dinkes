<section class="blog-page-wrap blog-one left-sidebar-blog section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-md-12 col-12 col-sm-12 col-lg-8  order-xl-2  order-lg-2 order-md-1 order-sm-1 order-1">
                <div class="blog-post-list">
                    <!-- single post item start -->
                    <?php foreach ($berita as $b) {
                    ?>
                        <div class="single-post-item">
                            <div class="post-thumbnail">
                                <img style=" max-height : 350px" src="<?= base_url('upload/berita_image/' . $b['berita_image']) ?>" alt="shipo">
                            </div>
                            <div class="post-contents">
                                <h3><a href="<?= base_url('berita/' . $b['berita_id']) ?>"><?= $b['berita_judul'] ?></a></h3>
                                <p><?= substr(preg_replace("/<img[^>]+\>/i", "",  $b['berita_isi']), 0, 225) ?>..</p>
                                <a href="<?= base_url('berita/' . $b['berita_id']) ?>" class="permalink_btn">lanjutkan baca <i class="fas fa-angle-right"></i></a>
                            </div>
                            <div class="post-metabox">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <img src="<?= base_url() ?>assets/images/blog/author.png" alt="author">
                                            Admin Dinkes
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="far fa-calendar-alt"></i><?= $b['berita_tanggal'] ?></a>
                                    </li>
                                    <!-- <li>
                                        <a href="#"><i class="fas fa-heart"></i>50 Likes</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fas fa-comment"></i>25 comments</a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>

                    <?php } ?>
                    <!-- single post item end -->
                    <!-- single post item start -->
                </div>
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

<!-- TAMBAHAN -->




<section class="about-app-wrap-two section-padding" id="about">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-md-12 col-12 col-sm-12">
                <div class="about-app-img wow animated fadeInLeft" data-wow-duration="2s">
                    <img src="assets/images/home-two/about_app.png" alt="shipo">
                </div>
            </div>

            <div class="col-xl-6 col-md-12 col-12 col-sm-12">
                <div class="about-app-text wow animated fadeInRight" data-wow-duration="2s">
                    <h2>Pelayanan Cepat <br> Ramah dan Berkalitas</h2>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form Bender cobblers chap grub sloshed up the duff I fantastic owt to do with me at public school, James Bond chip shop chancer my lady gormless.</p>
                    <span class="highlight_text">Solve your problem with us and We Provide Awesome
                        Services.<br>So, Downlaod Our App.</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-12 col-12 col-sm-12">
                <div class="about-app-text wow animated fadeInLeft" data-wow-duration="2s">
                    <h2>Inspired design for the <br>digital app landing</h2>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form Bender cobblers chap grub sloshed up the duff I fantastic owt to do with me at public school, James Bond chip shop chancer my lady gormless.</p>
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
<section class="why-we-best-two section-padding theme-two-bg">
    <div class="container">
        <div class="row text-center">
            <div class="col-xl-8 col-12 offset-xl-2 offset-md-1 col-md-10">
                <div class="section-title-two">
                    <h2>Mengayomi Masyarakat</h2>
                    <span>There are many variations of passages of lorem ipsum available, but the majority have suffered alteration in some form, by injected.</span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="why-we-best-tabs-nav col-12 col-xl-6 col-md-12 col-sm-12 align-items-end d-flex">
                <ul class="nav nav-pills " id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="pill" href="#why-tab-one" role="tab">
                            <div class="why-nav d-flex align-self-baseline align-items-center">
                                <div class="why-icon">
                                    <img src="assets/images/home-two/idea_icon.png" alt="shipo">
                                    <img src="assets/images/home-two/idea_active.png" alt="shipo">
                                </div>
                                <div class="why-nav-text">
                                    <h4>User Friendly Designed</h4>
                                    <p>Build integration aute irure design in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#why-tab-two" role="tab">
                            <div class="why-nav d-flex align-self-baseline align-items-center">
                                <div class="why-icon">
                                    <img src="assets/images/home-two/mobile_icon.png" alt="shipo">
                                    <img src="assets/images/home-two/mobile_icon_active.png" alt="shipo">
                                </div>
                                <div class="why-nav-text">
                                    <h4>Free Call Services</h4>
                                    <p>Build integration aute irure design in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#why-tab-three" role="tab">
                            <div class="why-nav d-flex align-self-baseline align-items-center">
                                <div class="why-icon">
                                    <img src="assets/images/home-two/idea_icon.png" alt="shipo">
                                    <img src="assets/images/home-two/idea_active.png" alt="shipo">
                                </div>
                                <div class="why-nav-text">
                                    <h4>User Friendly Designed</h4>
                                    <p>Build integration aute irure design in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p>
                                </div>
                            </div>
                        </a>
                    </li>
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
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#review-one">
                        <img src="assets/images/home-one/testimonial/man1.png" alt="shipo">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#review-two">
                        <img src="assets/images/home-one/testimonial/man2.png" alt="shipo">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#review-three">
                        <img src="assets/images/home-one/testimonial/man3.png" alt="shipo">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#review-four">
                        <img src="assets/images/home-one/testimonial/man4.png" alt="shipo">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#review-five">
                        <img src="assets/images/home-one/testimonial/man5.png" alt="shipo">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#review-six">
                        <img src="assets/images/home-one/testimonial/man6.png" alt="shipo">
                    </a>
                </li>
            </ul>
        </div>

        <div class="testimonial-content-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-md-10 col-12 col-sm-12">
                        <div class="tab-content text-center">
                            <div class="tab-pane container active" id="review-one">
                                <div class="single-testimonial">
                                    <span class="icon-review">
                                        <i class="fas fa-quote-right"></i>
                                    </span>
                                    <p>consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <div class="client_info">
                                        <h5>Abdulrahman</h5>
                                        <span>Alamat : Belinyu</span>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane container fade" id="review-two">
                                <div class="single-testimonial">
                                    <span class="icon-review">
                                        <i class="fas fa-quote-right"></i>
                                    </span>
                                    <p>Lorem ipsum dolor sit amet, consectetur scing elit, sed do eiusmod temp or incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse is an ultrices gravida. Risus commodo. consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <div class="client_info">
                                        <h5>Salman Ahmed</h5>
                                        <span>CEO of ModinaTheme</span>
                                    </div>
                                </div>
                            </div>
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
                        <img src="assets/images/home-one/member1.png" alt="shipo" class="img-fluid">
                    </div>
                    <div class="member-info">
                        <h4>Jhon Abraham</h4>
                        <span>Kepala Dinas</span>
                    </div>
                    <ul class="social-profile">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="#"><i class="fab fa-behance"></i></a></li>
                    </ul>
                </div>
                <div class="single-member text-center">
                    <div class="member-img">
                        <img src="assets/images/home-one/member2.png" alt="shipo" class="img-fluid">
                    </div>
                    <div class="member-info">
                        <h4>Mohammad Mostofa</h4>
                        <span>Wakil Kepala Dinas</span>
                    </div>
                    <ul class="social-profile">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="#"><i class="fab fa-behance"></i></a></li>
                    </ul>
                </div>
                <div class="single-member text-center">
                    <div class="member-img">
                        <img src="assets/images/home-one/member3.png" alt="shipo" class="img-fluid">
                    </div>
                    <div class="member-info">
                        <h4>Tahmina Anny</h4>
                        <span>Sekretaris</span>
                    </div>
                    <ul class="social-profile">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="#"><i class="fab fa-slack-hash"></i></a></li>
                    </ul>
                </div>
                <div class="single-member text-center">
                    <div class="member-img">
                        <img src="assets/images/home-one/member1.png" alt="shipo" class="img-fluid">
                    </div>
                    <div class="member-info">
                        <h4>Jhon Abraham</h4>
                        <span>Bendahara</span>
                    </div>
                    <ul class="social-profile">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="#"><i class="fab fa-behance"></i></a></li>
                    </ul>
                </div>
                <div class="single-member text-center">
                    <div class="member-img">
                        <img src="assets/images/home-one/member2.png" alt="shipo" class="img-fluid">
                    </div>
                    <div class="member-info">
                        <h4>Mohammad Mostofa</h4>
                        <span> Designer</span>
                    </div>
                    <ul class="social-profile">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="#"><i class="fab fa-behance"></i></a></li>
                    </ul>
                </div>
                <div class="single-member text-center">
                    <div class="member-img">
                        <img src="assets/images/home-one/member3.png" alt="shipo" class="img-fluid">
                    </div>
                    <div class="member-info">
                        <h4>Sugi Pramana</h4>
                        <span>Developer</span>
                    </div>
                    <ul class="social-profile">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="#"><i class="fab fa-slack-hash"></i></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="contact-form-wrap-two section-padding bg-light" id="contact">
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
</section>