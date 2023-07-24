<section class="contact-form-wrap-two section-padding bg-light" id="contact">
    <div class="container">
        <div class="row text-center">
            <div class="col-xl-8 col-12 offset-xl-2 offset-md-1 col-md-10">
                <div class="section-title-two">
                    <h2>Layanan Pengaduan</h2>
                    <span>Data diri atau identitas anda dijamin akan dirahasiakan. anda dapat mengisi form bagian bawah ini atau dapat menggunakan sarana lainnya seperti :</span>
                    <ul>
                        <li><a href="tel:+62717-92102"><b>Telp:</b> 0717-92102</a></li>
                        <li><a target="_blank" href="https://wa.me/6282311448289?text=Nama%20%3A%0AAlamat%20%3A%0APengaduan%20%3A"><b>WA:</b> 082311448289</a></li>
                        <li><a href="mailto:dinkesbangka@gmail.com"><b>Email:</b> dinkesbangka@gmail.com</a></li>
                        <li><a href="https://lapor.go.id"><b>Sp4n Lapor!:</b> lapor.go.id</a></li>
                        <li><a href="https://www.facebook.com/Dinas-Kesehatan-Kabupaten-Bangka-102114102652620"><b>Facebook:</b> Dinas Kesehatan Kabupaten Bangka</a></li>
                        <!-- <li><a href="https://www.facebook.com/profile.php?id=100085086978044"><b>Facebook:</b> Mall Sipandu Bangka</a></li> -->
                        <li><a href="https://dinkes.bangka.go.id/pengaduan"><b>e-Pengaduan</b></a></li>
                    </ul>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-12 col-md-12 col-sm-12">
                <div class="contact-form-two wow animated fadeInUp" data-wow-duration="2s">
                    <form class="contact-form" id="form_survey">
                        <!-- <form action="mail.php" id="contact-form" method="POST"> -->
                        <div class="row">
                            <div class="form-group col-12 col-md-6 col-sm-6 col-xl-6">
                                <!-- <input type="text" value="" data-msg-required="required"="Masukkan nama anda." maxlength="100" class="form-control text-3 h-auto py-2" name="nama" id="name_survey" required="required"=""> -->
                                <input type="text" class="form-control" name="nama" id="name_survey" required="required" placeholder="Nama">
                                <span class="form-icon"><i class="fas fa-user"></i></span>
                            </div>
                            <div class="form-group col-12 col-md-6 col-sm-6 col-xl-6">
                                <input type="email" class="form-control" id="email" name="email" required="required" placeholder="E Mail">
                                <span class="form-icon"><i class="fas fa-envelope"></i></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12 col-md-6 col-sm-6 col-xl-6">
                                <input type="text" class="form-control" name="no_hp" id="no_hp" required="required" placeholder="Nomor Telepon">
                                <span class="form-icon"><i class="fas fa-phone"></i></span>
                            </div>
                            <div class="form-group col-12 col-md-6 col-sm-6 col-xl-6">
                                <!-- <input type="text" value="" maxlength="200" class="form-control text-3 h-auto py-2" name="alamat" id="alamat"> -->
                                <input type="text" class="form-control" name="alamat" id="alamat" required="required" placeholder="Alamat">
                                <span class="form-icon"><i class="fas fa-map"></i></span>
                            </div>
                            <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12 message-box">
                                <textarea id="message" rows="6" name="alasan" placeholder="Detail Pengaduan" required="required"></textarea>
                                <span class="form-icon"><i class="fas fa-edit"></i></span>
                            </div>
                        </div>
                        <div class="send-message text-center">
                            <button id="sub_btn" type="submit" class="btn-send">kirim</button>
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
            <!-- <div class="col-xl-12 col-md-12 col-12 col-sm-12">
                <div class="single-widgets-two wow animated fadeInUp">
                    <h4 class="widgets-title">Sarana pengaduan</h4>
                    <ul>
                        <li><a href="#"><b>Telp:</b> 0717-92102</a></li>
                        <li><a target="_blank" href="https://wa.me/6282311448289?text=Nama%20%3A%0AAlamat%20%3A%0APengaduan%20%3A"><b>WA:</b> 082311448289</a></li>
                        <li><a href="#"><b>Email:</b> dinkesbangka@gmail.com</a></li>
                        <li><a href="https://lapor.go.id"><b>Sp4n Lapor!:</b> lapor.go.id</a></li>
                        <li><a href="https://www.facebook.com/Dinas-Kesehatan-Kabupaten-Bangka-102114102652620"><b>Facebook:</b> Dinas Kesehatan Kabupaten Bangka</a></li>
                        <li><a href="https://www.facebook.com/profile.php?id=100085086978044"><b>Facebook:</b> Mall Sipandu Bangka</a></li>
                        <li><a href="https://dinkes.bangka.go.id/pengaduan"><b>e-Pengaduan</b></a></li>
                    </ul>
                </div>
            </div> -->
            <!-- Sarana pengaduan :
            1. Telp 0717-92102/ wa 082311448289
            2. Email dinkes: dinkesbangka@gmail.com
            3. Website dinkes: dinkes.bangka.go.id
            4. Sp4n Lapor! : Lapor.go.id
            5. Facebook : www.facebook.com/ Mall Sipandu Bangka -->
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
    form_survey.on('submit', function(ev) {
        ev.preventDefault();

        Swal.fire({
            html: '<h5>Loading ...</h5>',
            allowOutsideClick: false
        });
        Swal.showLoading()
        $.ajax({
            method: 'POST',
            url: '<?= base_url('main/submit_pengaduan') ?>',
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
                    // Swal.fire({
                    //     icon: 'success',
                    //     html: 'Pengaduan berhasil dikirim',
                    //     timer: 3200,
                    //     timerProgressBar: true,
                    // }).then((result) => {
                    //     location.reload();
                    // })

                }
            }
        });
    })

    // })
</script>