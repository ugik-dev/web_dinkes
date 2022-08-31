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
                    <form class="contact-form" id="form_survey" method="POST" novalidate="novalidate">
                        <!-- <form action="mail.php" id="contact-form" method="POST"> -->
                        <div class="featured-boxes featured-boxes-style-3">
                            <div class="row">
                                <div class="col-sm-4" id="sangat_puas">
                                    <div class="text-center">
                                        <div class="box-content">
                                            <img class="icon-featured far fa-heart top-0" src="<?= base_url() ?>assets/images/sangat_puas.png">
                                            <!-- <i class="icon-featured far fa-heart top-0"></i> -->
                                            <h4 class="font-weight-normal text-5 mt-3"><strong class="font-weight-extra-bold">Sangat Puas</strong></h4>
                                            <!-- <p class="mb-0">Donec id elit non mi porta gravida at eget metus. Fusce dapibus.</p> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4" id="cukup_puas">
                                    <div class="text-center">
                                        <div class="box-content">
                                            <img class="icon-featured far fa-heart top-0" src="<?= base_url() ?>assets/images/cukup_puas.png">
                                            <!-- <i class="icon-featured far fa-file-alt top-0"></i> -->
                                            <h4 class="font-weight-normal text-5 mt-3"> <strong class="font-weight-extra-bold">Cukup</strong></h4>
                                            <!-- <p class="mb-0">Donec id elit non mi porta gravida at eget metus. Fusce dapibus.</p> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4" id="tidak_puas">
                                    <div class="text-center">
                                        <div class="box-content">
                                            <img class="icon-featured far fa-heart top-0" src="<?= base_url() ?>assets/images/tidak_puas.png">
                                            <h4 class="font-weight-normal text-5 mt-3"><strong class="font-weight-extra-bold">Tidak Puas</strong> </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <input type="hidden" id="respon" name="respon" id="respon">
                        <div class="row">
                            <div class="form-group col-12 col-md-6 col-sm-6 col-xl-6">
                                <!-- <input type="text" value="" data-msg-required="Masukkan nama anda." maxlength="100" class="form-control text-3 h-auto py-2" name="nama" id="name_survey" required=""> -->
                                <input type="text" class="form-control" name="nama" id="name_survey" required="" placeholder="Nama">
                                <span class="form-icon"><i class="fas fa-user"></i></span>
                            </div>
                            <div class="form-group col-12 col-md-6 col-sm-6 col-xl-6">
                                <input type="email" class="form-control" id="email" name="email" placeholder="E Mail">
                                <span class="form-icon"><i class="fas fa-envelope"></i></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12 col-md-6 col-sm-6 col-xl-6">
                                <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Nomor Telepon">
                                <span class="form-icon"><i class="fas fa-phone"></i></span>
                            </div>
                            <div class="form-group col-12 col-md-6 col-sm-6 col-xl-6">
                                <!-- <input type="text" value="" maxlength="200" class="form-control text-3 h-auto py-2" name="alamat" id="alamat"> -->
                                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat">
                                <span class="form-icon"><i class="fas fa-map"></i></span>
                            </div>
                            <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12 message-box">
                                <textarea id="message" rows="6" name="alasan" placeholder="Pendapat Anda"></textarea>
                                <span class="form-icon"><i class="fas fa-edit"></i></span>
                            </div>
                        </div>
                        <div class="send-message text-center">
                            <button id="sub_btn" type="button" class="btn-send">kirim</button>
                        </div>
                        <span class="form-message"></span>
                    </form>
                </div>
            </div>
            <div class="col-xl-6 col-12 col-md-12 col-sm-12 d-flex  justify-content-end">
                <div class="contact-form-image text-right">
                    <img src="assets/images/home-two/contact_us.png" alt="shipo">
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    sangat_puas = $('#sangat_puas');
    cukup_puas = $('#cukup_puas');
    tidak_puas = $('#tidak_puas');
    form_survey = $('#form_survey');
    respon = $('#respon');
    sub_btn = $('#sub_btn');

    function reset_select() {
        sangat_puas.removeClass('alert-success');
        cukup_puas.removeClass('alert-success');
        tidak_puas.removeClass('alert-success');
    }
    sangat_puas.on('click', () => {
        reset_select();
        sangat_puas.addClass('alert-success');
        respon.val(1)
    })

    cukup_puas.on('click', () => {
        reset_select();
        cukup_puas.addClass('alert-success');
        respon.val(2)

    })

    tidak_puas.on('click', () => {
        reset_select();
        tidak_puas.addClass('alert-success');
        respon.val(3)

    })
    sub_btn.on('click', () => {
        if (respon.val() == '' ||
            respon.val() == null) {
            Swal.fire({
                icon: 'warning',
                html: '<h5>Silahkan klik gambar icon tingkat kepuasan anda ...</h5>',
                // allowOutsideClick: false
            });
            return;
        }
        Swal.fire({
            html: '<h5>Loading ...</h5>',
            allowOutsideClick: false
        });
        Swal.showLoading()
        $.ajax({
            method: 'POST',
            url: '<?= base_url('main/submit_survey') ?>',
            data: form_survey.serialize(),
            success: function(data) {
                // alert(data);
                res = JSON.parse(data);
                if (res['error']) {
                    Swal.close();
                    Swal.fire({
                        icon: 'danger',
                        html: '<h5>Error ...</h5>',
                    });
                } else {
                    let timerInterval
                    Swal.fire({
                        icon: 'success',
                        html: 'Hasil survei berhasil disimpan',
                        timer: 3200,
                        timerProgressBar: true,
                    }).then((result) => {
                        location.reload();
                    })

                }
            }
        });
    })

    // })
</script>