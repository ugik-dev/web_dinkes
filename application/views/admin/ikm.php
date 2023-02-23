<div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox ssection-container">
        <div class="ibox-content">
            <form class="form-inline col-lg-12" id="toolbar_form" onsubmit="return false;">
                <!-- <input type="hidden" id="is_not_self" name="is_not_self" value="1">
                <select class="form-control mr-sm-2" name="id_ref" id="id_ref"></select> -->
                <div class="form-group row mb-2">
                    <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
                    <div class="col-sm-10">
                        <select class="form-control mr-sm-2" name="tahun" id="tahun">
                            <option value="">Semua Tahun</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                            <option value="2021">2021</option>
                            <option value="2020">2020</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row mb-2">
                    <label for="layanan" class="col-sm-2 col-form-label">Layanan</label>
                    <div class="col-sm-10">
                        <select class='form-control select2' name="layanan" id="layanan">
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
                </div>
                <!-- <button type="button" class="btn btn-success my-1 mr-sm-2" id="new_btn" disabled="disabled"><i class="fal fa-plus"></i> Tambah User Baru</button> -->
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table id="FDataTable" class="table table-bordered table-hover" style="padding:0px">
                            <thead>
                                <tr>
                                    <th style="width: 2%; text-align:center!important">ID</th>
                                    <th style="width: 2%; text-align:center!important">Tanggal</th>
                                    <th style="width: 3%; text-align:center!important">SKM</th>
                                    <th style="width: 15%; text-align:center!important">Survey</th>
                                    <th style="width: 15%; text-align:center!important">Pesan</th>
                                    <th style="width: 5%; text-align:center!important">Nama</th>
                                    <th style="width: 5%; text-align:center!important">Layanan</th>
                                    <th style="width: 5%; text-align:center!important">Identitas</th>
                                    <th style="width: 5%; text-align:center!important">Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#ikm').addClass('active');

        var toolbar = {
            'form': $('#toolbar_form'),
            'id_ref': $('#toolbar_form').find('#id_ref'),
            'tahun': $('#toolbar_form').find('#tahun'),
            'layanan': $('#toolbar_form').find('#layanan'),
            'newBtn': $('#new_btn'),
        }

        var FDataTable = $('#FDataTable').DataTable({
            'columnDefs': [],
            deferRender: true,
            "order": [
                [0, "desc"]
            ]
        });



        var dataRole = {}
        var dataUser = {}

        var swalSaveConfigure = {
            title: "Konfirmasi simpan",
            text: "Yakin akan menyimpan data ini?",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#18a689",
            confirmButtonText: "Ya, Simpan!",
        };

        var swalDeleteConfigure = {
            title: "Konfirmasi hapus",
            text: "Yakin akan menghapus data ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, Hapus!",
        };

        $.when(getAllUser()).then((e) => {
            toolbar.newBtn.prop('disabled', false);
        }).fail((e) => {
            console.log(e)
        });


        toolbar.tahun.on('change', function() {
            getAllUser();
        })
        toolbar.layanan.on('change', function() {
            getAllUser();
        })

        function getAllUser() {
            swal({
                title: 'Loading bank_data...',
                allowOutsideClick: false
            });
            swal.showLoading();
            return $.ajax({
                url: `<?php echo base_url('ParameterController/getAllSurvey') ?>`,
                'type': 'get',
                data: toolbar.form.serialize(),
                success: function(data) {
                    swal.close();
                    var json = JSON.parse(data);
                    if (json['error']) {
                        return;
                    }
                    dataUser = json['data'];
                    renderUser(dataUser);
                },
                error: function(e) {}
            });
        }

        function renderUser(data) {
            if (data == null || typeof data != "object") {
                console.log("User::UNKNOWN DATA");
                return;
            }
            var i = 0;

            var renderData = [];
            Object.values(data).forEach((bank_data) => {
                var show = `
        <a class="show_survey dropdown-item" data-id='${bank_data['id']}'><i class='fa fa-eye'></i> Tampilkan</a>
      `;
                var hide = `
        <a class="hide_survey dropdown-item" data-id='${bank_data['id']}'><i class='fa fa-eye-slash'></i> Sembunyikan</a>
      `;
                infolain = `
                    Kesesuaian : ${statusRespon(bank_data['kesesuaian'])} <br>
                    Kemudahan : ${statusRespon(bank_data['kemudahan'])}<br>
                    Kecepatan : ${statusRespon(bank_data['kecepatan'])}<br>
                    Tarif : ${statusRespon(bank_data['tarif'])}<br>
                    SOP : ${statusRespon(bank_data['sop'])}<br>
                    Kompetensi : ${statusRespon(bank_data['kompetensi'])}<br>
                    Prilaku : ${statusRespon(bank_data['prilaku'])}<br>
                    Sarpras : ${statusRespon(bank_data['sarpras'])}<br>
                    Pengaduan : ${statusRespon(bank_data['pengaduan'])}`
                renderData.push([bank_data['id'], bank_data['tanggal'], statusRespon(bank_data['respon']), infolain, bank_data['alasan'], bank_data['nama'], bank_data['layanan'], 'Email : ' + bank_data['email'] + '<br>Telp : ' + bank_data['no_hp'] +
                    '<br>Alamat : ' + bank_data['alamat'], bank_data['show_survey'] == 1 ? hide : show
                ]);
            });
            FDataTable.clear().rows.add(renderData).draw('full-hold');
        }

        function statusRespon(realisasi) {
            var realisasi = parseFloat(realisasi);
            if (realisasi == 1)
                return `<span class="label label-danger">Tidak Baik</span>`;
            else if (realisasi == 2)
                return `<span class="label label-warning">Kurang Baik</span>`;
            else if (realisasi == 3)
                return `<span class="label label-info">Cukup Baik</span>`;
            else if (realisasi == 4)
                return `<span class="label label-success">Sangat Baik</span>`;
            else return `-`;
        }

        FDataTable.on('click', '.show_survey', function() {
            var currentData = $(this).data('id');
            edit_survey(currentData, 1)
            dataUser[$(this).data('id')]['show_survey'] = 1;
            renderUser(dataUser);

        });


        FDataTable.on('click', '.hide_survey', function() {
            var currentData = $(this).data('id');
            edit_survey(currentData, 2)
            dataUser[$(this).data('id')]['show_survey'] = 2;
            renderUser(dataUser);
        });

        function edit_survey(id, sh) {
            event.preventDefault();
            var url = "<?= site_url('Admin/edit_survey') ?>";

            swal(swalSaveConfigure).then((result) => {
                if (!result.value) {
                    return;
                }
                // buttonLoading(button);
                $.ajax({
                    url: url,
                    'type': 'POST',
                    data: {
                        'id': id,
                        'sh': sh
                    },
                    success: function(data) {
                        var json = JSON.parse(data);
                        if (json['error']) {
                            swal("Simpan Gagal", json['message'], "error");
                            return;
                        }
                        swal("Simpan Berhasil", "", "success");
                    },
                    error: function(e) {}
                });
            });
        };

        FDataTable.on('click', '.delete', function() {
            event.preventDefault();
            var id = $(this).data('id');
            swal(swalDeleteConfigure).then((result) => {
                if (!result.value) {
                    return;
                }
                $.ajax({
                    url: "<?= site_url('BankDataController/delete') ?>",
                    'type': 'POST',
                    data: {
                        'id_bank_data': id
                    },
                    success: function(data) {
                        var json = JSON.parse(data);
                        if (json['error']) {
                            swal("Delete Gagal", json['message'], "error");
                            return;
                        }
                        delete dataUser[id];
                        swal("Delete Berhasil", "", "success");
                        renderUser(dataUser);
                    },
                    error: function(e) {}
                });
            });
        });
    });
</script>