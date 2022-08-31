<div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox ssection-container">
        <div class="ibox-content">
            <form class="form-inline" id="toolbar_form" onsubmit="return false;">
                <!-- <input type="hidden" id="is_not_self" name="is_not_self" value="1">
                <select class="form-control mr-sm-2" name="id_ref" id="id_ref"></select> -->
                <select class="form-control mr-sm-2" name="tahun" id="tahun">
                    <option value="">Semua Tahun</option>
                    <option value="2022">2022</option>
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>

                </select>
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
                                    <th style="width: 3%; text-align:center!important">Respon</th>
                                    <th style="width: 26%; text-align:center!important">Pesan</th>
                                    <th style="width: 5%; text-align:center!important">Nama</th>
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
            'id_opd': $('#toolbar_form').find('#id_opd'),
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

                renderData.push([bank_data['id'], bank_data['tanggal'], statusRespon(bank_data['respon']), bank_data['alasan'], bank_data['nama'], 'Email : ' + bank_data['email'] + '<br>Telp : ' + bank_data['no_hp'] +
                    '<br>Alamat : ' + bank_data['alamat'], bank_data['show_survey'] == 1 ? hide : show
                ]);
            });
            FDataTable.clear().rows.add(renderData).draw('full-hold');
        }

        function statusRespon(realisasi) {
            var realisasi = parseFloat(realisasi);
            if (realisasi == 1)
                return `<span class="label label-danger">Tidak Puas</span>`;
            else if (realisasi == 2)
                // return `<span class="label label-warning">Cukup</span>`;
                return `<span class="label label-info">Cukup</span>`;
            else if (realisasi == 3)
                return `<span class="label label-success">Sangat Puas</span>`;
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