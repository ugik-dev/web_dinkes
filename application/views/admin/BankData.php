<div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox ssection-container">
        <div class="ibox-content">
            <form class="form-inline" id="toolbar_form" onsubmit="return false;">
                <input type="hidden" id="is_not_self" name="is_not_self" value="1">
                <select class="form-control mr-sm-2" name="id_ref" id="id_ref"></select>
                <select class="form-control mr-sm-2" name="tahun" id="tahun">
                    <option value="">Semua Tahun</option>
                    <option value="2022">2022</option>
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>

                </select>
                <button type="button" class="btn btn-success my-1 mr-sm-2" id="new_btn" disabled="disabled"><i class="fal fa-plus"></i> Tambah User Baru</button>
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
                                    <th style="width: 7%; text-align:center!important">ID</th>
                                    <th style="width: 24%; text-align:center!important">Nama</th>
                                    <th style="width: 24%; text-align:center!important">Jenis</th>
                                    <th style="width: 1%; text-align:center!important">Tahun</th>
                                    <th style="width: 5%; text-align:center!important">Kategori</th>
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

<div class="modal inmodal" id="bank_data_modal" tabindex="-1" opd="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Kelola User</h4>
                <span class="info"></span>
            </div>
            <div class="modal-body" id="modal-body">
                <form opd="form" id="bank_data_form" onsubmit="return false;" type="multipart" autocomplete="off">
                    <input type="hidden" id="id_bank_data" name="id_bank_data">

                    <div class="form-group">
                        <label for="nama_bank_data">Nama Bank Data</label>
                        <input type="text" placeholder="Nama" class="form-control" id="nama_bank_data" name="nama_bank_data" required="required">
                    </div>
                    <div class="form-group">
                        <label for="path_bank_data">File Upload</label>
                        <input type="file" placeholder="" class="form-control" id="path_bank_data" name="path_bank_data" required="required">
                    </div>
                    <select class="form-control mr-sm-2" name="tahun" id="tahun">
                        <option value="">Semua Tahun</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>

                    </select>
                    <div class="form-group">
                        <label for="url">Link</label>
                        <input type="text" placeholder="contoh: https://docs.google.com/spreadsheets/d/1oEE9meckUSLzKJXKkB9K5gUDg709lFtelq6bFcxJnMo/edit?usp=sharing" class="form-control" id="bank_url" name="bank_url">
                    </div>
                    <div class="form-group">
                        <label for="bank_jenis">Jenis</label>
                        <select class="form-control mr-sm-2" name="bank_jenis" id="bank_jenis" required="required">
                            <option value="1">File Upload</option>
                            <option value="2">Url / Link Google Drive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="judul">Kategori</label>
                        <select class="form-control mr-sm-2" name="id_ref" id="id_ref" required="required"></select>
                    </div>
                    <button class="btn btn-success my-1 mr-sm-2" type="submit" id="add_btn" data-loading-text="Loading..."><strong>Tambah Data</strong></button>
                    <button class="btn btn-success my-1 mr-sm-2" type="submit" id="save_edit_btn" data-loading-text="Loading..."><strong>Simpan Perubahan</strong></button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#bank_data').addClass('active');

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

        var UserModal = {
            'self': $('#bank_data_modal'),
            'info': $('#bank_data_modal').find('.info'),
            'form': $('#bank_data_modal').find('#bank_data_form'),
            'addBtn': $('#bank_data_modal').find('#add_btn'),
            'saveEditBtn': $('#bank_data_modal').find('#save_edit_btn'),
            'idUser': $('#bank_data_modal').find('#id_bank_data'),
            'nama_bank_data': $('#bank_data_modal').find('#nama_bank_data'),
            'path_bank_data': $('#bank_data_modal').find('#path_bank_data'),
            'bank_url': $('#bank_data_modal').find('#bank_url'),
            'id_ref': $('#bank_data_modal').find('#id_ref'),
            'bank_jenis': $('#bank_data_modal').find('#bank_jenis'),
            'opd': $('#bank_data_modal').find('#opd'),
        }

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

        $.when(getAllRole(), getAllUser()).then((e) => {
            toolbar.newBtn.prop('disabled', false);
        }).fail((e) => {
            console.log(e)
        });

        function getAllRole() {
            return $.ajax({
                url: `<?php echo site_url('ParameterController/getAllRefBankData/') ?>`,
                'type': 'POST',
                data: {},
                success: function(data) {
                    var json = JSON.parse(data);
                    if (json['error']) {
                        return;
                    }
                    dataRole = json['data'];
                    renderRoleSelectionFilter(dataRole);
                    renderRoleSelectionAdd(dataRole);
                },
                error: function(e) {}
            });
        }

        function renderRoleSelectionFilter(data) {
            toolbar.id_ref.empty();
            toolbar.id_ref.append($('<option>', {
                value: "",
                text: "-- Semua Kategori --"
            }));
            Object.values(data).forEach((d) => {
                toolbar.id_ref.append($('<option>', {
                    value: d['id_ref_bank_data'],
                    text: d['id_ref_bank_data'] + ' :: ' + d['nama_ref'],
                }));
            });
        }

        function renderRoleSelectionAdd(data) {
            UserModal.id_ref.empty();
            UserModal.id_ref.append($('<option>', {
                value: "",
                text: "-- Pilih Kategori --"
            }));
            Object.values(data).forEach((d) => {
                UserModal.id_ref.append($('<option>', {
                    value: d['id_ref_bank_data'],
                    text: d['id_ref_bank_data'] + ' :: ' + d['nama_ref'],
                }));
            });
        }

        UserModal.bank_jenis.on('change', (e) => {
            if (UserModal.bank_jenis.val() == 1) {
                UserModal.bank_url.attr('disabled', true);
                UserModal.path_bank_data.attr('disabled', false);
                // }
            } else {
                UserModal.bank_url.attr('disabled', false);
                UserModal.path_bank_data.attr('disabled', true);
            }
            // getAllUser();
        });
        toolbar.id_ref.on('change', (e) => {
            UserModal.id_ref.attr('readonly', !empty(toolbar.id_ref.val()));
            getAllUser();
        });

        function getAllUser() {
            swal({
                title: 'Loading bank_data...',
                allowOutsideClick: false
            });
            swal.showLoading();
            return $.ajax({
                url: `<?php echo site_url('BankDataController/getAllBankData/') ?>`,
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
                var lihat = `
        <a class="dropdown-item" target="_blank" href='<?= base_url('bank-data/download/') ?>${bank_data['id_bank_data']}'><i class='fa fa-eye'></i> Lihat</a>
      `;
                var editButton = `
        <a class="edit dropdown-item" data-id='${bank_data['id_bank_data']}'><i class='fa fa-pencil'></i> Edit User</a>
      `;
                var deleteButton = `
        <a class="delete dropdown-item" data-id='${bank_data['id_bank_data']}'><i class='fa fa-trash'></i> Hapus User</a>
      `;
                var button = `
        <div class="btn-group" opd="group">
          <button id="action" type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class='fa fa-bars'></i></button>
          <div class="dropdown-menu" aria-labelledby="action">
          ${lihat}
          ${editButton}
            ${deleteButton}
          </div>
        </div>
      `;
                renderData.push([bank_data['id_bank_data'], bank_data['nama_bank_data'], bank_data['bank_jenis'] == 1 ? "file " + bank_data['path_bank_data'].split('.').pop() : 'Url', bank_data['tahun'], bank_data['nama_ref'], button]);
            });
            FDataTable.clear().rows.add(renderData).draw('full-hold');
        }

        function resetUserModal() {
            UserModal.form.trigger('reset');
            UserModal.bank_jenis.trigger('change');

            UserModal.id_ref.val(toolbar.id_ref.val());
            UserModal.opd.val(toolbar.id_opd.val() != -1 ? toolbar.id_opd.val() : "");
        }

        toolbar.newBtn.on('click', (e) => {
            resetUserModal();
            UserModal.self.modal('show');
            UserModal.addBtn.show();
            UserModal.saveEditBtn.hide();
        });

        FDataTable.on('click', '.edit', function() {
            resetUserModal();
            UserModal.self.modal('show');
            UserModal.addBtn.hide();
            UserModal.saveEditBtn.show();


            var currentData = dataUser[$(this).data('id')];
            UserModal.idUser.val(currentData['id_bank_data']);
            UserModal.path_bank_data.val(currentData['path_bank_data']);
            UserModal.path_bank_data.val(currentData['path_bank_data']);
            UserModal.opd.val(currentData['id_opd']);
        });

        UserModal.form.submit(function(event) {
            event.preventDefault();
            var isAdd = UserModal.addBtn.is(':visible');
            var url = "<?= site_url('BankDataController/') ?>";
            url += isAdd ? "add" : "edit";
            var button = isAdd ? UserModal.addBtn : UserModal.saveEditBtn;

            swal(swalSaveConfigure).then((result) => {
                if (!result.value) {
                    return;
                }
                // buttonLoading(button);
                $.ajax({
                    url: url,
                    'type': 'POST',
                    data: new FormData(UserModal.form[0]),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        buttonIdle(button);
                        var json = JSON.parse(data);
                        if (json['error']) {
                            swal("Simpan Gagal", json['message'], "error");
                            return;
                        }
                        var bank_data = json['data']
                        // dataUser[bank_data['id_bank_data']] = bank_data;
                        // swal("Simpan Berhasil", "", "success");
                        // renderUser(dataUser);
                        // UserModal.self.modal('hide');
                    },
                    error: function(e) {}
                });
            });
        });

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