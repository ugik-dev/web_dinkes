<section class="blog-page-wrap blog-one grid-blog section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-md-12 col-12 col-sm-12 col-lg-12  order-xl-2  order-lg-2 order-md-1 order-sm-1 order-1">
                <div class="blog-post-list">
                    <div class="row">
                        <?php foreach ($berita as $b) {
                            if (!empty($b['file_galeri'])) {
                                $url = base_url('upload/galeri/') . $b['file_galeri'];
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
                                        <h6 style="color:black;"><a style="color:black;" href="<?= base_url('galeri/' . $b['galeri_id']) ?>"><?= $b['nama_album'] ?> / <?= $b['nama_galeri'] ?></a></h6>
                                    </div>

                                </div>
                            </div>

                        <?php } ?>
                    </div>
                    <!-- single post item end -->
                    <!-- single post item start -->
                </div>

            </div>
            <?php
            // $this->load->view('sidemenu');
            ?>
        </div>
        <div class="blog-page-nav blog-pages-link text-center">
            <ul>
                <!-- <li><a href="#" class="active">01</a></li> -->
                <?php for ($i = 1; $i <= $pager; $i++) {
                    echo '<li><a href="' . base_url('galeri?page=') . $i . '">' . $i . '</a></li>';
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