<section class="contact-form-wrap-two section-padding bg-light" id="contact">
    <div class="container">
        <div class="row text-center">
            <div class="col-xl-8 col-12 offset-xl-2 offset-md-1 col-md-10">
                <div class="section-title-two">
                    <h2>E-Survey Kepuasan Masyarakat</h2>
                    <span>Survey Kepuasan Masyarakat bertujuan untuk mengetahui tingkat kinerja Dinas Kesehatan Kabupaten Bangka secara berkala sebagai bahan untuk menetapkan kebijakan dalam rangka peningkatan kualitas pelayanan publik selanjutnya.</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-12 col-md-12 col-sm-12">
                <div class="contact-form-two wow animated fadeInUp" data-wow-duration="2s">
                    <form class="contact-form" id="form_survey">
                        <!-- <div class="featured-boxes featured-boxes-style-3">
                            <div class="row">
                                <div class="col-sm-4" id="sangat_puas">
                                    <div class="text-center">
                                        <div class="box-content">
                                            <img class="icon-featured far fa-heart top-0" src="<?= base_url() ?>assets/images/sangat_puas.png">
                                            <h4 class="font-weight-normal text-5 mt-3"><strong class="font-weight-extra-bold">Sangat Puas</strong></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4" id="cukup_puas">
                                    <div class="text-center">
                                        <div class="box-content">
                                            <img class="icon-featured far fa-heart top-0" src="<?= base_url() ?>assets/images/cukup_puas.png">
                                            <h4 class="font-weight-normal text-5 mt-3"> <strong class="font-weight-extra-bold">Cukup</strong></h4>
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
                        <br> -->
                        <!-- <input type="hidden" id="respon" name="respon" id="respon"> -->
                        <div class="row">
                            <div class="form-group col-12 col-md-6 col-sm-6 col-xl-6">
                                <!-- <input type="text" value="" data-msg-required="Masukkan nama anda." maxlength="100" class="form-control text-3 h-auto py-2" name="nama" id="name_survey" required=""> -->
                                <input type="text" class="form-control" name="nama" id="name_survey" required="true" placeholder="Nama" oninvalid="this.setCustomValidity('Masukkan nama anda')" oninput="this.setCustomValidity('')">
                                <span class="form-icon"><i class="fas fa-user"></i></span>
                            </div>
                            <div class="form-group col-12 col-md-6 col-sm-6 col-xl-6">
                                <input type="email" class="form-control" id="email" name="email" placeholder="E-Mail" required="required" oninvalid="this.setCustomValidity('Masukkan e-mail anda')" oninput="this.setCustomValidity('')">
                                <span class="form-icon"><i class="fas fa-envelope"></i></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12 col-md-6 col-sm-6 col-xl-6">
                                <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Nomor Telepon" required="required" oninvalid="this.setCustomValidity('Masukkan nomor telpon anda')" oninput="this.setCustomValidity('')">
                                <span class="form-icon"><i class="fas fa-phone"></i></span>
                            </div>
                            <div class="form-group col-12 col-md-6 col-sm-6 col-xl-6">
                                <!-- <input type="text" value="" maxlength="200" class="form-control text-3 h-auto py-2" name="alamat" id="alamat"> -->
                                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" required="required" oninvalid="this.setCustomValidity('Masukkan alamat anda')" oninput="this.setCustomValidity('')">
                                <span class="form-icon"><i class="fas fa-map"></i></span>
                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="form-group col-12 col-md-6 col-sm-6 col-xl-6">
                                <!-- <input type="text" value="" data-msg-required="Masukkan nama anda." maxlength="100" class="form-control text-3 h-auto py-2" name="nama" id="name_survey" required=""> -->
                                <label>Umur <small>(tahun)</small></label>
                                <input type="number" class="form-control" name="umur" id="umur" required="" placeholder="Umur (tahun)" required="required" oninvalid="this.setCustomValidity('Masukkan umur anda')" oninput="this.setCustomValidity('')">
                                <!-- <span class="form-icon"><i class="fas fa-user"></i></span> -->
                            </div>
                            <div class="form-group col-12 col-md-6 col-sm-6 col-xl-6">
                                <label>Jenis Kelamin</label>
                                <select class='form-control' name="jk" required="required" oninvalid="this.setCustomValidity('Pilih jenis kelamin anda')" oninput="this.setCustomValidity('')">
                                    <option value=""></option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group col-12 col-md-6 col-sm-6 col-xl-6">
                                <label>Pendidikan</label>
                                <select class='form-control' name="pendidikan" required="required" oninvalid="this.setCustomValidity('Masukkan pendidikan anda')" oninput="this.setCustomValidity('')">
                                    <option value=""></option>
                                    <option>SD / MI</option>
                                    <option>SMP / Mts / Sederajat</option>
                                    <option>SMA / SMK / MA / Sederajat</option>
                                    <option>D-1 / D-3</option>
                                    <option>D-4 / S-1</option>
                                    <option>S2 / S3</option>
                                    <option>Tidak Bersekolah</option>
                                </select>
                            </div>

                            <div class="form-group col-12 col-md-6 col-sm-6 col-xl-6">
                                <label>Pekerjaan</label>
                                <select class='form-control' name="pekerjaan" required="required" oninvalid="this.setCustomValidity('Masukkan pekerjaan anda')" oninput="this.setCustomValidity('')">
                                    <option value=""></option>
                                    <option>Wiraswasta / Usahawan</option>
                                    <option>Pelajar / Mahasiswa</option>
                                    <option>Pegawai Swasta</option>
                                    <option>TNI / POLRI</option>
                                    <option>PNS</option>
                                    <option>Lainnya</option>
                                </select>
                            </div>

                            <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12">
                                <label>Faskes / Layanan yang diterima</label>
                                <select class='form-control select2' name="layanan">
                                    <option value=""></option>
                                    <optgroup label="Rumah Sakit">
                                        <option>RSUD Eko Maulana Ali</option>
                                        <option>RSUD Depati Bahrin</option>
                                        <option>RSUD Sjafrie Rachman</option>
                                    </optgroup>
                                    <optgroup label="Puskesmas dan jaringan (Pustu & Poskesdes)">
                                        <option value="Puskesmas dan jaringan (Pustu & Poskesdes) Bakam">Bakam</option>
                                        <option value="Puskesmas dan jaringan (Pustu & Poskesdes) Baturusa">Baturusa</option>
                                        <option value="Puskesmas dan jaringan (Pustu & Poskesdes) Belinyu">Belinyu</option>
                                        <option value="Puskesmas dan jaringan (Pustu & Poskesdes) Gunung Muda">Gunung Muda</option>
                                        <option value="Puskesmas dan jaringan (Pustu & Poskesdes) Kenanga">Kenanga</option>
                                        <option value="Puskesmas dan jaringan (Pustu & Poskesdes) Pemali">Pemali</option>
                                        <option value="Puskesmas dan jaringan (Pustu & Poskesdes) Penagan">Penagan</option>
                                        <option value="Puskesmas dan jaringan (Pustu & Poskesdes) Petaling">Petaling</option>
                                        <option value="Puskesmas dan jaringan (Pustu & Poskesdes) Puding Besar">Puding Besar</option>
                                        <option value="Puskesmas dan jaringan (Pustu & Poskesdes) Riau Silip">Riau Silip</option>
                                        <option value="Puskesmas dan jaringan (Pustu & Poskesdes) Sinar Baru">Sinar Baru</option>
                                        <option value="Puskesmas dan jaringan (Pustu & Poskesdes) Sungailiat">Sungailiat</option>
                                    </optgroup>
                                    <optgroup label="Mall Sipandu">
                                        <option>Rekomandasi Perizinan Praktik Tenaga Kerja Kesehatan</option>
                                        <option>Sertifikat Laik Hygiene Sanitasi TPM dan TFU</option>
                                        <option>Rekomendasi Surat Tanda Daftar Pengobatan Tradisional</option>
                                        <option>Sertifikat Pangan Industri Rumah Tangga</option>
                                        <option>Pemeriksaan Sampel Air Minum</option>
                                        <option>Persetujuan Pelayanan Jaminan Kesehatan Masyarakat</option>
                                        <option>Persetujuan Pelayanan Jaminan Persalinan</option>
                                        <option>Rekomendasi SKTM</option>
                                    </optgroup>
                                    <optgroup label="Lainnya">
                                        <option>Pelayanan Vaksin</option>
                                        <option>Dinas Kesehatan Kabupaten Bangka</option>
                                        <option>Lainnya</option>
                                    </optgroup>
                                </select>
                            </div>
                            <!-- <div class="form-group col-12 col-md-6 col-sm-6 col-xl-6">
                                <label>Jenis Layanan yang diterima</label>
                                <select class='form-control' name="layanan" required>
                                    <option value=""></option>
                                    <option>PNS</option>
                                    <option>PNS</option>
                                    <option>PNS</option>
                                </select>
                            </div> -->
                        </div>
                        <label>Pesan / Kesan / Saran / Masukan</label>
                        <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12 message-box">
                            <textarea id="message" rows="6" name="alasan" placeholder="Pesan / Kesan / Saran / Masukan"></textarea>
                            <span class="form-icon"><i class="fas fa-edit"></i></span>
                        </div>
                        <hr>
                        <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12">
                            <label>Secara umum / keseluruhan, menurut anda bagaimana proses pelayanan yang diberikan oleh Dinas Kesehatan Kab. Bangka ?</label>
                            <div class="col-12">
                                <div class="form-check form-check-inline mr-4">
                                    <input class="form-check-input" type="radio" name="respon" id="respon4" value="4" required oninvalid="this.setCustomValidity('Pilih salahsatu jawaban')" onclick="clearValidity()">
                                    <label class=" form-check-label" for="respon4">
                                        Sangat Baik
                                    </label>
                                </div>
                                <div class="form-check form-check-inline mr-4">
                                    <input class="form-check-input" type="radio" name="respon" id="respon3" value="3" onclick="clearValidity()">
                                    <label class="form-check-label" for="respon3">
                                        Cukup Baik
                                    </label>
                                </div>
                                <div class="form-check form-check-inline mr-4">
                                    <input class="form-check-input" type="radio" name="respon" id="respon2" value="2" onclick="clearValidity()">
                                    <label class="form-check-label" for="respon2">
                                        Kurang Baik
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="respon" id="respon1" value="1" onclick="clearValidity()">
                                    <label class="form-check-label" for="respon1">
                                        Tidak Baik
                                    </label>
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12">
                            <label>1. Bagaimana pendapat anda tentang kesesuaian persyaratan pelayanan dengan jenis pelayanan ?</label>
                            <div class="col-12">
                                <div class="form-check form-check-inline mr-4">
                                    <input class="form-check-input" type="radio" name="kesesuaian" id="kesesuaian4" value="4">
                                    <label class="form-check-label" for="kesesuaian4">
                                        Sangat Baik
                                    </label>
                                </div>
                                <div class="form-check form-check-inline mr-4">
                                    <input class="form-check-input" type="radio" name="kesesuaian" id="kesesuaian3" value="3">
                                    <label class="form-check-label" for="kesesuaian3">
                                        Cukup Baik
                                    </label>
                                </div>
                                <div class="form-check form-check-inline mr-4">
                                    <input class="form-check-input" type="radio" name="kesesuaian" id="kesesuaian2" value="2">
                                    <label class="form-check-label" for="kesesuaian2">
                                        Kurang Baik
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="kesesuaian" id="kesesuaian1" value="1">
                                    <label class="form-check-label" for="kesesuaian1">
                                        Tidak Baik
                                    </label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12">
                            <label>2. Bagaimana pemahaman anda tentang kemudahan prosedur pelayanan di Dinas Kesehatan Kab. Bangka ?</label>
                            <div class="col-12">
                                <div class="form-check form-check-inline mr-4">
                                    <input class="form-check-input" type="radio" name="kemudahan" id="kemudahan4" value="4">
                                    <label class="form-check-label" for="kemudahan4">
                                        Sangat Mudah
                                    </label>
                                </div>
                                <div class="form-check form-check-inline mr-4">
                                    <input class="form-check-input" type="radio" name="kemudahan" id="kemudahan3" value="3">
                                    <label class="form-check-label" for="kemudahan3">
                                        Cukup Mudah
                                    </label>
                                </div>
                                <div class="form-check form-check-inline mr-4">
                                    <input class="form-check-input" type="radio" name="kemudahan" id="kemudahan2" value="2">
                                    <label class="form-check-label" for="kemudahan2">
                                        Kurang Mudah
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="kemudahan" id="kemudahan1" value="1">
                                    <label class="form-check-label" for="kemudahan1">
                                        Tidak Mudah
                                    </label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12">
                            <label>3. Bagaimana pendapat anda tentang kecepatan waktu dalam memberikan pelayanan ?</label>
                            <div class="col-12">
                                <div class="form-check form-check-inline mr-4">
                                    <input class="form-check-input" type="radio" name="kecepatan" id="kecepatan4" value="4">
                                    <label class="form-check-label" for="kecepatan4">
                                        Sangat Cepat
                                    </label>
                                </div>
                                <div class="form-check form-check-inline mr-4">
                                    <input class="form-check-input" type="radio" name="kecepatan" id="kecepatan3" value="3">
                                    <label class="form-check-label" for="kecepatan3">
                                        Cukup Cepat
                                    </label>
                                </div>
                                <div class="form-check form-check-inline mr-4">
                                    <input class="form-check-input" type="radio" name="kecepatan" id="kecepatan2" value="2">
                                    <label class="form-check-label" for="kecepatan2">
                                        Kurang Cepat
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="kecepatan" id="kecepatan1" value="1">
                                    <label class="form-check-label" for="kecepatan1">
                                        Tidak Cepat
                                    </label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12">
                            <label>4. Bagaimana pendapat anda tentang biaya / tarif dalam pelayanan ?</label>
                            <div class="col-12">
                                <div class="form-check form-check-inline mr-4">
                                    <input class="form-check-input" type="radio" name="tarif" id="tarif4" value="4">
                                    <label class="form-check-label" for="tarif4">
                                        Gratis Tampa Biaya
                                    </label>
                                </div>
                                <div class="form-check form-check-inline mr-4">
                                    <input class="form-check-input" type="radio" name="tarif" id="tarif3" value="3">
                                    <label class="form-check-label" for="tarif3">
                                        Murah
                                    </label>
                                </div>
                                <div class="form-check form-check-inline mr-4">
                                    <input class="form-check-input" type="radio" name="tarif" id="tarif2" value="2">
                                    <label class="form-check-label" for="tarif2">
                                        Lumayan Mahal
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tarif" id="tarif1" value="1">
                                    <label class="form-check-label" for="tarif1">
                                        Sangat Mahal
                                    </label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12">
                            <label>5. Bagaimana pendapat anda tentang kesesuaian produk pelayanan antara yang tercantum dalam standar pelayanan dengan yang diberikan ?</label>
                            <div class="col-12">
                                <div class="form-check form-check-inline mr-4">
                                    <input class="form-check-input" type="radio" name="sop" id="sop4" value="4">
                                    <label class="form-check-label" for="sop4">
                                        Sangat Sesuai
                                    </label>
                                </div>
                                <div class="form-check form-check-inline mr-4">
                                    <input class="form-check-input" type="radio" name="sop" id="sop3" value="3">
                                    <label class="form-check-label" for="sop3">
                                        Cukup Sesuai
                                    </label>
                                </div>
                                <div class="form-check form-check-inline mr-4">
                                    <input class="form-check-input" type="radio" name="sop" id="sop2" value="2">
                                    <label class="form-check-label" for="sop2">
                                        Kurang Sesuai
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sop" id="sop1" value="1">
                                    <label class="form-check-label" for="sop1">
                                        Tidak Sesuai
                                    </label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12">
                            <label>6. Bagaimana pendapat anda tentang kompetensi / kemampuan petugas dalam memberikan pelayanan ?</label>
                            <div class="col-12">
                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" name="kompetensi" id="kompetensi4" value="4">
                                    <label class="form-check-label" for="kompetensi4">
                                        Sangat Kompeten / Sangat Mampu
                                    </label>
                                </div>
                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" name="kompetensi" id="kompetensi3" value="3">
                                    <label class="form-check-label" for="kompetensi3">
                                        Cukup Kompeten / Sangat Mampu
                                    </label>
                                </div>
                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" name="kompetensi" id="kompetensi2" value="2">
                                    <label class="form-check-label" for="kompetensi2">
                                        Kurang Kompeten / Sangat Mampu
                                    </label>
                                </div>
                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" name="kompetensi" id="kompetensi1" value="1">
                                    <label class="form-check-label" for="kompetensi1">
                                        Tidak Kompeten / Sangat Mampu
                                    </label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12">
                            <label>7. Bagaimana pendapat anda terhadap perilaku terkait kesopanan dan keramahan petugas dalam memberikan pelayanan ?</label>
                            <div class="col-12">
                                <div class="form-check form-check-inline mr-4">
                                    <input class="form-check-input" type="radio" name="prilaku" id="prilaku4" value="4">
                                    <label class="form-check-label" for="prilaku4">
                                        Sangat Baik
                                    </label>
                                </div>
                                <div class="form-check form-check-inline mr-4">
                                    <input class="form-check-input" type="radio" name="prilaku" id="prilaku3" value="3">
                                    <label class="form-check-label" for="prilaku3">
                                        Cukup Baik
                                    </label>
                                </div>
                                <div class="form-check form-check-inline mr-4">
                                    <input class="form-check-input" type="radio" name="prilaku" id="prilaku2" value="2">
                                    <label class="form-check-label" for="prilaku2">
                                        Kurang Baik
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="prilaku" id="prilaku1" value="1">
                                    <label class="form-check-label" for="prilaku1">
                                        Tidak Baik
                                    </label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12">
                            <label>8. Bagaimana pendapat anda tentang kualitas sarana dan prasarana ?</label>
                            <div class="col-12">
                                <div class="form-check form-check-inline mr-4">
                                    <input class="form-check-input" type="radio" name="sarpras" id="sarpras4" value="4">
                                    <label class="form-check-label" for="sarpras4">
                                        Sangat Baik
                                    </label>
                                </div>
                                <div class="form-check form-check-inline mr-4">
                                    <input class="form-check-input" type="radio" name="sarpras" id="sarpras3" value="3">
                                    <label class="form-check-label" for="sarpras3">
                                        Cukup Baik
                                    </label>
                                </div>
                                <div class="form-check form-check-inline mr-4">
                                    <input class="form-check-input" type="radio" name="sarpras" id="sarpras2" value="2">
                                    <label class="form-check-label" for="sarpras2">
                                        Kurang Baik
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sarpras" id="sarpras1" value="1">
                                    <label class="form-check-label" for="sarpras1">
                                        Tidak Baik
                                    </label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12">
                            <label>9. Bagaimana pendapat anda tentang penanganan pengaduan, saran dan masukan pengguna layanan</label>
                            <div class="col-12">
                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" name="pengaduan" id="pengaduan4" value="4">
                                    <label class="form-check-label" for="pengaduan4">
                                        Sangat baik, cepat ditindak lanjuti
                                    </label>
                                </div>
                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" name="pengaduan" id="pengaduan3" value="3">
                                    <label class="form-check-label" for="pengaduan3">
                                        Bersungsi kurang maksimal, lambat ditindak lanjuti
                                    </label>
                                </div>
                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" name="pengaduan" id="pengaduan2" value="2">
                                    <label class="form-check-label" for="pengaduan2">
                                        Ada tetapi tidak berfungsi
                                    </label>
                                </div>
                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" name="pengaduan" id="pengaduan1" value="1">
                                    <label class="form-check-label" for="pengaduan1">
                                        Tidak Ada
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="send-message text-center">
                            <div class="form-inline">
                                <label class="mr-2" for="pengaduan1">
                                    Masukkan Captha
                                </label>
                                <?= $captcha ?><br> <input class="form-control ml-2 mr-2" style="width: 300px !important" type="text" name="captcha" id="captcha" value="">
                            </div>
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
        </div>
    </div>
</section>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    // sangat_puas = $('#sangat_puas');
    // cukup_puas = $('#cukup_puas');
    // tidak_puas = $('#tidak_puas');
    form_survey = $('#form_survey');
    // respon = $('#respon');
    sub_btn = $('#sub_btn');
    $('.select2').select2();

    // function reset_select() {
    //     sangat_puas.removeClass('alert-success');
    //     cukup_puas.removeClass('alert-success');
    //     tidak_puas.removeClass('alert-success');
    // }
    // sangat_puas.on('click', () => {
    //     reset_select();
    //     sangat_puas.addClass('alert-success');
    //     respon.val(3)
    // })

    // cukup_puas.on('click', () => {
    //     reset_select();
    //     cukup_puas.addClass('alert-success');
    //     respon.val(2)

    // })

    // tidak_puas.on('click', () => {
    //     reset_select();
    //     tidak_puas.addClass('alert-success');
    //     respon.val(1)

    // })
    function clearValidity() {
        document.getElementById('respon4').setCustomValidity('');
    }

    form_survey.submit(function(ev) {
        event.preventDefault();
        // if (respon.val() == '' ||
        //     respon.val() == null) {
        //     Swal.fire({
        //         icon: 'warning',
        //         html: '<h5>Lengkapi form ...</h5>',
        //         // allowOutsideClick: false
        //     });
        //     return;
        // }
        // Swal.fire({
        //     html: '<h5>Loading ...</h5>',
        //     allowOutsideClick: false
        // });
        // Swal.showLoading()



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
                        icon: 'error',
                        title: 'Oops...',
                        text: res['message'],
                    });
                } else {
                    let timerInterval
                    Swal.fire({
                        icon: 'success',
                        html: 'Hasil survei berhasil disimpan',
                        timer: 9200,
                        timerProgressBar: true,
                    }).then((result) => {
                        // location.href = "<?= base_url() ?>#review";
                        // location.reload();
                    })
                }
            }
        });
    })

    // })
</script>