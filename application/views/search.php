<section class="blog-page-wrap blog-one grid-blog section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-2">

                <div class="search-box">
                    <form action="<?= base_url('search') ?>" method="get">
                        <input type="text" placeholder="Search here" name="s" value="<?= $search ?>">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
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
                                        <p style="  word-break: break-word;   overflow: hidden;   text-overflow: ellipsis;   display: -webkit-box;   -webkit-box-orient: vertical;"><?= substr(strip_tags($b['berita_isi']), 0, 225) ?></p>
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
        <div class="blog-page-nav blog-pages-link text-center">
            <ul>
                <!-- <li><a href="#" class="active">01</a></li> -->
                <?php for ($i = 1; $i <= $pager; $i++) {
                    echo '<li><a href="' . base_url('search?s=' . $search . '&page=') . $i . '">' . $i . '</a></li>';
                }
                ?>
                <!-- <li><a href="#">02</a></li> -->
                <!-- <li><a href="#">03</a></li> -->
                <!-- <li><a href="#">04</a></li> -->
                <!-- <li><a href="#"><i class="fas fa-angle-right"></i></a></li> -->
            </ul>
        </div>
    </div>

</section>

<?php
// $this->load->view('e_survey') 
?>