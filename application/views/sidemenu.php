    <div class="col-xl-4 col-md-12 col-12 col-lg-4 col-sm-12  order-lg-1 order-xl-1 order-md-2 order-sm-2 order-2">
        <div class="blog-sidebar dynamic-left-sidebar">
            <!-- single sidebar item start -->
            <div class="single-sidebar-widget">
                <div class="search-box">
                    <form action="<?= base_url('search') ?>" method="get">
                        <input type="s" placeholder="Search">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
            <div class="single-sidebar-widget">
                <h4 class="sidebar_title">Berita Terikini</h4>
                <ul>
                    <?php
                    $berita_terkini = array();
                    $berita_terkini = BeritaTerikini();
                    foreach ($berita_terkini as $bt) {
                        if (!empty($bt['berita_image'])) {
                            $url = base_url('upload/berita_image/') . $bt['berita_image'];
                        } else {
                            $url = base_url('assets/images/pengumuman.png');
                        }
                        echo '    <li>
                        <div class="media">
                            <img class="mr-3 thumbnail-img" src="' . $url . '" alt="shipo">
                            <div class="media-body">
                                <h6 class="mt-0"><a href="' . base_url('berita/' . $bt['berita_slug']) . '">' . $bt['berita_judul'] . '</a></h6>
                                <span>' . $bt['berita_tanggal'] . '</span>
                            </div>
                        </div>
                    </li>
              ';
                    } ?>
                </ul>
            </div>
            <div class="single-sidebar-widget">
                <h4 class="sidebar_title">Pelayanan Kesehatan</h4>
                <ul>
                    <?php
                    $pelayanan = array();
                    $pelayanan = Pelayanan();
                    foreach ($pelayanan as $p) {
                        echo ' <li class="cat-item"><a href="' . base_url('pelayanan/' . $p['berita_slug']) . '">' . $p['berita_judul'] . '<i class="fas fa-angle-right"></i></a></li> ';
                    }
                    ?>
                </ul>
            </div>
            <div class="single-sidebar-widget">
                <h4 class="sidebar_title">Pengumuman</h4>
                <ul>
                    <?php
                    $pengumuman = array();
                    $pengumuman = Pengumuman();
                    foreach ($pengumuman as $p) {
                        echo ' <li class="cat-item"><a href="' . base_url('pengumuman/' . $p['berita_slug']) . '">' . $p['berita_judul'] . '<i class="fas fa-angle-right"></i></a></li> ';
                    }
                    ?>
                </ul>
            </div>
            <!-- berita terkini -->

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