<section class="blog-page-wrap blog-one left-sidebar-blog pt-3">
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-9">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <form class="contact-form" id="form_survey" method="POST" novalidate="novalidate">
                                    <!-- <div class="contact-form-success alert alert-success d-none mt-4">
											<strong>Success!</strong> Your message has been sent to us.
										</div>
										<div class="contact-form-error alert alert-danger d-none mt-4">
											<strong>Error!</strong> There was an error sending your message.
											<span class="mail-error-message text-1 d-block"></span>
										</div> -->
                                    <div class="featured-boxes featured-boxes-style-3">
                                        <div class="row">
                                            <div class="col-sm-4" id="sangat_puas">
                                                <div class="featured-box featured-box-primary featured-box-effect-3">
                                                    <div class="box-content">
                                                        <img class="icon-featured far fa-heart top-0" src="<?= base_url() ?>assets/images/sangat_puas.png">
                                                        <!-- <i class="icon-featured far fa-heart top-0"></i> -->
                                                        <h4 class="font-weight-normal text-5 mt-3"><strong class="font-weight-extra-bold">Sangat Puas</strong></h4>
                                                        <!-- <p class="mb-0">Donec id elit non mi porta gravida at eget metus. Fusce dapibus.</p> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4" id="cukup_puas">
                                                <div class="featured-box featured-box-tertiary featured-box-effect-3 ">
                                                    <div class="box-content">
                                                        <img class="icon-featured far fa-heart top-0" src="<?= base_url() ?>assets/images/cukup_puas.png">
                                                        <!-- <i class="icon-featured far fa-file-alt top-0"></i> -->
                                                        <h4 class="font-weight-normal text-5 mt-3"> <strong class="font-weight-extra-bold">Cukup</strong></h4>
                                                        <!-- <p class="mb-0">Donec id elit non mi porta gravida at eget metus. Fusce dapibus.</p> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4" id="tidak_puas">
                                                <div class="featured-box featured-box-secondary featured-box-effect-3">
                                                    <div class="box-content">
                                                        <img class="icon-featured far fa-heart top-0" src="<?= base_url() ?>assets/images/tidak_puas.png">
                                                        <h4 class="font-weight-normal text-5 mt-3"><strong class="font-weight-extra-bold">Tidak Puas</strong> </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="respon" name="respon" id="respon">
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label class="form-label mb-1 text-2">Nama</label>
                                            <input type="text" value="" data-msg-required="Masukkan nama anda." maxlength="100" class="form-control text-3 h-auto py-2" name="nama" id="name_survey" required="">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label class="form-label mb-1 text-2">Alamat</label>
                                            <input type="text" value="" maxlength="200" class="form-control text-3 h-auto py-2" name="alamat" id="alamat">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label class="form-label mb-1 text-2">Email</label>
                                            <input type="email" value="" data-msg-required="" data-msg-email="" maxlength="100" class="form-control text-3 h-auto py-2" id="email" name="email">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label class="form-label mb-1 text-2">No Handphone</label>
                                            <input type="text" value="" maxlength="100" class="form-control text-3 h-auto py-2" name="no_hp" id="no_hp">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col">
                                            <label class="form-label mb-1 text-2">Pesan Kesan</label>
                                            <textarea maxlength="5000" data-msg-required="Masukkan pesan kesan anda." rows="8" class="form-control text-3 h-auto py-2" name="alasan" required=""></textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col">
                                            <button type="button" id="sub_btn" class="btn btn-primary" data-loading-text="Loading...">Kirim</button>
                                            <!-- <input type="submit" value="Submit Form" class="btn btn-primary" data-loading-text="Loading..."> -->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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


            </div>
        </div>
    </div>

</section>