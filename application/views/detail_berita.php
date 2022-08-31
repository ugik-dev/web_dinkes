<section class="blog-page-wrap blog-one left-sidebar-blog section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-12 col-12 col-sm-12">
                <!-- single blog details start -->
                <div class="single-blog-content">
                    <?php if (!empty($berita['berita_image'])) {
                    ?>
                        <div class="post-thumbnail">
                            <img src="<?= base_url('upload/berita_image/' . $berita['berita_image']) ?>" alt="shipo">
                        </div>
                    <?php } ?> <h3 class="post-title"><?= $berita['berita_judul'] ?></h3>
                    <div class="post-meta-box">
                        <ul>
                            <li>
                                <a href="#"><i class="far fa-calendar-alt"></i><?= $berita['berita_tanggal'] ?></a>
                            </li>
                            <li>
                                <a href="#"><i class="fas fa-heart"></i>0 Likes</a>
                            </li>
                            <li>
                                <a href="#"><i class="fas fa-comment"></i>0 comments</a>
                            </li>
                        </ul>
                    </div>
                    <!-- konten start -->
                    <!-- <div class="post-meta-box"> -->
                    <?= $berita['berita_isi'] ?>
                    <?php if (!empty($berita['berita_pdf'])) {
                    ?>
                        <object style="width : 100% ; height: 700px" data="<?= base_url('upload/berita_pdf/') . $berita['berita_pdf'] ?>" type="application/pdf">
                            <iframe src="<?= base_url('upload/berita_pdf/') . $berita['berita_pdf'] ?>"></iframe>
                            <div>No online PDF viewer installed</div>
                        </object><br>
                        <a href="<?= base_url('upload/berita_pdf/') . $berita['berita_pdf'] ?>">Download PDF</a>
                    <?php } ?>
                    <!-- </div> konten end -->
                </div>
                <!-- single blog details end -->

                <!-- post social share start -->
                <div class="tags-share-section row  d-flex align-self-baseline align-items-center">
                    <!-- <div class="tags-wrap d-flex col-12 col-xl-6 col-md-6 col-sm-12">
                        <span>Tags:</span>
                        <ul>
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Consulting</a></li>
                            <li><a href="#">Marketing</a></li>
                        </ul>
                    </div> -->
                    <div class="social-share-wrap col-12 col-xl-6 col-md-6 col-sm-12 d-flex align-items-center">
                        <span>share:</span>
                        <ul>
                            <div id="fb-root"></div>
                            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v14.0" nonce="LM9FKUQB"></script>

                            <li>
                                <a class="" data-href="https://www.facebook.com/sharer/sharer.php?u=#<?= base_url('berita/') . $berita['berita_slug'] ?>" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://www.facebook.com/sharer/sharer.php?u=#<?= base_url('berita/') . $berita['berita_slug'] ?>" class="fb-xfbml-parse-ignore"><i class="fab fa-facebook-f"></i></a></a>
                                <!-- <a href="https://www.facebook.com/sharer/sharer.php?u=#<?= base_url('berita/') . $berita['berita_slug'] ?>" target="_blank"><i class="fab fa-facebook-f"></i></a> -->
                            </li>
                            <!-- <li><a href="#"><i class="fab fa-twitter"></i></a></li> -->
                            <li><a href="whatsapp://send?text=<?= $berita['berita_judul'] . ' ' . base_url('berita/') . $berita['berita_slug'] ?>" data-action="share/whatsapp/share"><i class="fab fa-whatsapp"></i></a></li>
                            <!-- <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li> -->
                        </ul>
                    </div>
                </div>
                <!-- <a href="https://web.whatsapp.com/send?text=www.google.com" data-action="share/whatsapp/share">Share via Whatsapp 1</a>
                <a href="whatsapp://send?text=<<HERE GOES THE URL ENCODED TEXT YOU WANT TO SHARE>>" data-action="share/whatsapp/share">Share via Whatsapp</a> -->
                <!-- post social share end -->

                <!-- comments section wrap start -->
                <!-- <div class="comments-section-wrap">
                    <div class="comments-heading">
                        <h4>03 Comments</h4>
                    </div>
                    <div class="comments-item-list">
                        <ul>
                            <li>
                                <div class="media">
                                    <img src="assets/images/blog/comment_man.png" alt="shipo saas">
                                    <div class="media-body">
                                        <h6 class="m-0">Jhon Deo</h6>
                                        <span>25 June, 19</span>
                                        <p>Proactively envisioned multimedia based expertise and cross-media growth strategies. Seamlessly ize quality intellectual capital without superior collaboration and idea-sharing. Holistically pontificate installed</p>
                                    </div>
                                </div>
                                <a href="#" class="btn-replay">Reply</a>
                            </li>
                        </ul>
                    </div>
                </div> -->
                <div class="comment-form-wrap">
                    <h4>Write Your Comment</h4>
                    <div class="contact-form-one comment-form">
                        <form action="#">
                            <div class="row">
                                <div class="form-group col-12 col-md-6 col-sm-6 col-xl-6">
                                    <input type="text" class="form-control" id="name" placeholder="Your Name">
                                </div>
                                <div class="form-group col-12 col-md-6 col-sm-6 col-xl-6">
                                    <input type="email" class="form-control" id="email" placeholder="Your Mail">
                                </div>
                                <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12 message-box">
                                    <textarea name="message" id="message" rows="6" placeholder="Your Comments"></textarea>
                                </div>
                            </div>
                            <div class="send-message">
                                <button type="submit" class="btn-send text-uppercase">submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php
            $this->load->view('sidemenu');
            ?>

        </div>
    </div>
</section>