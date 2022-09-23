<!-- <div class="container"> -->
<div class="row">
    <div class="col-xl-6 col-lg-6 sm-6">
        <div class="colorun" style="background: #6bbbda;">
            <h2> Berita </h2>
        </div>
        <div class="col-xl-12">

            <!-- <div class="col-xl-9"> -->
            <?php
            if (!empty($berita[0]['berita_image'])) {
                $url = base_url('upload/berita_image/') . $berita[0]['berita_image'];
            } else {
                $url = base_url('assets/images/pengumuman.jpg');
            }
            ?>
            <img class="carousel-img d-block w-100" src="<?= $url ?>" alt="First slide" style="">
            <div style="background: rgba(0, 0, 0, 0.5);" class="carousel-caption  d-md-block">
                <h5 style="color:white;"><a style="color:white;" href="<?= base_url($berita[0]['tipe'] . '/' . $berita[0]['berita_slug']) ?>"><?= $berita[0]['berita_judul'] ?></a></h5>
                <!-- <h5></h5> -->
                <p><?= substr(strip_tags($berita[0]['berita_isi']), 0, 50) ?></p>
            </div>
            <!-- </div>
            <div class="col-xl-3">

            </div> -->
        </div>
    </div>
    <div class="col-lg-3 col-sm-3">
        <!-- <div class="col-xl-3"> -->
        <div class="single-sidebar-widget">
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
            <!-- </div> -->
        </div>
    </div>
    <div class="col-lg-3 col-sm-3">terkait</div>
</div>
<!-- </div> -->