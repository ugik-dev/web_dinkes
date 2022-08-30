<style>
    .styled-table {
        border-collapse: collapse;
        margin: 25px 0;
        width: 100%;
        font-size: 0.9em;
        font-family: sans-serif;
        min-width: 400px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    .styled-table thead tr {
        background-color: #504be5;
        color: #ffffff;
        text-align: left;
    }

    .styled-table th,
    .styled-table td {
        padding: 12px 15px;
    }

    .styled-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }

    .styled-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }

    .styled-table tbody tr:last-of-type {
        border-bottom: 2px solid #504be5;
    }
</style>
<section class="blog-page-wrap blog-one left-sidebar-blog section-padding">
    <div class="container">

        <div class="row">
            <div class="col-xl-8 col-md-12 col-12 col-sm-12 col-lg-8  order-xl-2  order-lg-2 order-md-1 order-sm-1 order-1">
                <div class="blog-post-list">
                    <div class="comment-form-wrap">
                        <!-- <h4>Write Your Comment</h4> -->
                        <!-- <div class="contact-form-one comment-form"> -->
                        <form action="<?= base_url() ?>main/submit_tamu" method="post">
                            <div class="row">
                                <div class="form-group col-12 col-md-6 col-sm-6 col-xl-6">
                                    <input type="text" class="form-control" name="nama" placeholder="Nama">
                                </div>

                                <div class="form-group col-12 col-md-6 col-sm-6 col-xl-6">
                                    <input type="alamat" class="form-control" name="alamat" placeholder="Alamat">
                                </div>

                                <div class="form-group col-12 col-md-6 col-sm-6 col-xl-6">
                                    <input type="contact" class="form-control" name="contact" placeholder="E-mail / No HP">
                                </div>
                                <!-- <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12 message-box">
                                        <textarea name="message" id="message" rows="6" placeholder="Your Comments"></textarea>
                                    </div> -->
                            </div>
                            <div class="send-message">
                                <button type="submit" class="btn-send text-uppercase">Submit</button>
                            </div>
                        </form>
                        <!-- </div> -->
                    </div>
                    <table class="styled-table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No HP</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tamu as $t) {
                                echo ' <tr>
                                <td>' . $t['nama'] . '</td>
                                <td>' . $t['alamat'] . '</td>
                                <td>' . $t['contact'] . '</td>
                            </tr>';
                            } ?>

                            <!-- <tr class="active-row">
                                <td>Melissa</td>
                                <td>5150</td>
                            </tr> -->
                            <!-- and so on... -->
                        </tbody>
                    </table>
                </div>
            </div>
            <?php
            $this->load->view('sidemenu');
            ?>

        </div>
    </div>
</section>