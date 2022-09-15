<div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox ssection-container">
        <div class="ibox-content">
            <form class="form-inline" id="toolbar_form" onsubmit="return false;">
                <input type="hidden" id="is_not_self" name="is_not_self" value="1">
                <select class="form-control mr-sm-2" name="id_role" id="id_role"></select>
                <button type="button" class="btn btn-success my-1 mr-sm-2" id="new_btn" disabled="disabled"><i class="fal fa-plus"></i> Tambah Album Baru</button>
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
                                    <!-- <th style="width: 24%; text-align:center!important">Albumname</th> -->
                                    <th style="width: 24%; text-align:center!important">Nama</th>
                                    <!-- <th style="width: 16%; text-align:center!important">Role</th> -->
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

<div class="modal inmodal" id="album_modal" tabindex="-1" opd="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">ALbum</h4>
                <span class="info"></span>
            </div>
            <div class="modal-body" id="modal-body">
                <form opd="form" id="album_form" onsubmit="return false;" type="multipart" autocomplete="off">
                    <input type="hidden" id="album_id" name="album_id">
                    <div class="form-group">
                        <label for="nama_album">Nama Album</label>
                        <input type="text" placeholder="Nama Album" class="form-control" id="nama_album" name="nama_album" required="required">
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
        $('#kelola_album').addClass('active');

        var toolbar = {
            'form': $('#toolbar_form'),
            'id_role': $('#toolbar_form').find('#id_role'),
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

        var AlbumModal = {
            'self': $('#album_modal'),
            'info': $('#album_modal').find('.info'),
            'form': $('#album_modal').find('#album_form'),
            'addBtn': $('#album_modal').find('#add_btn'),
            'saveEditBtn': $('#album_modal').find('#save_edit_btn'),
            'idAlbum': $('#album_modal').find('#album_id'),
            'nama_album': $('#album_modal').find('#nama_album'),
            'nama': $('#album_modal').find('#nama'),
            'password': $('#album_modal').find('#password'),
            'id_role': $('#album_modal').find('#id_role'),
            'opd': $('#album_modal').find('#opd'),
        }

        var dataRole = {}
        var dataAlbum = {}

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

        $.when(
            // getAllRole(), 
            getAllAlbum()
        ).then((e) => {
            toolbar.newBtn.prop('disabled', false);
        }).fail((e) => {
            console.log(e)
        });

        function getAllRole() {
            return $.ajax({
                url: `<?php echo site_url('ParameterController/getAllRole/') ?>`,
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
            toolbar.id_role.empty();
            toolbar.id_role.append($('<option>', {
                value: "",
                text: "-- Semua Role --"
            }));
            Object.values(data).forEach((d) => {
                toolbar.id_role.append($('<option>', {
                    value: d['id_role'],
                    text: d['id_role'] + ' :: ' + d['title_role'],
                }));
            });
        }

        function renderRoleSelectionAdd(data) {
            AlbumModal.id_role.empty();
            AlbumModal.id_role.append($('<option>', {
                value: "",
                text: "-- Pilih Role --"
            }));
            Object.values(data).forEach((d) => {
                AlbumModal.id_role.append($('<option>', {
                    value: d['id_role'],
                    text: d['id_role'] + ' :: ' + d['title_role'],
                }));
            });
        }

        toolbar.id_role.on('change', (e) => {
            AlbumModal.id_role.attr('readonly', !empty(toolbar.id_role.val()));
            getAllAlbum();
        });

        function getAllAlbum() {
            swal({
                title: 'Loading album...',
                allowOutsideClick: false
            });
            swal.showLoading();
            return $.ajax({
                url: `<?php echo site_url('AlbumController/getAllAlbum/') ?>`,
                'type': 'POST',
                data: toolbar.form.serialize(),
                success: function(data) {
                    swal.close();
                    var json = JSON.parse(data);
                    if (json['error']) {
                        return;
                    }
                    dataAlbum = json['data'];
                    renderAlbum(dataAlbum);
                },
                error: function(e) {}
            });
        }

        function renderAlbum(data) {
            if (data == null || typeof data != "object") {
                console.log("Album::UNKNOWN DATA");
                return;
            }
            var i = 0;

            var renderData = [];
            Object.values(data).forEach((album) => {
                var editButton = `
        <a class="edit dropdown-item" data-id='${album['album_id']}'><i class='fa fa-pencil'></i> Edit Album</a>
      `;
                var deleteButton = `
        <a class="delete dropdown-item" data-id='${album['album_id']}'><i class='fa fa-trash'></i> Hapus Album</a>
      `;
                var button = `
        <div class="btn-group" opd="group">
          <button id="action" type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class='fa fa-bars'></i></button>
          <div class="dropdown-menu" aria-labelledby="action">
            ${editButton}
            ${deleteButton}
          </div>
        </div>
      `;
                renderData.push([album['album_id'], album['nama_album'], button]);
            });
            FDataTable.clear().rows.add(renderData).draw('full-hold');
        }

        function resetAlbumModal() {
            AlbumModal.form.trigger('reset');
            AlbumModal.id_role.val(toolbar.id_role.val());
            AlbumModal.opd.val(toolbar.id_opd.val() != -1 ? toolbar.id_opd.val() : "");
        }

        toolbar.newBtn.on('click', (e) => {
            resetAlbumModal();
            AlbumModal.self.modal('show');
            AlbumModal.addBtn.show();
            AlbumModal.saveEditBtn.hide();
            AlbumModal.password.prop('placeholder', 'Password');
            AlbumModal.password.prop('required', true);
        });

        FDataTable.on('click', '.edit', function() {
            resetAlbumModal();
            AlbumModal.self.modal('show');
            AlbumModal.addBtn.hide();
            AlbumModal.saveEditBtn.show();
            var currentData = dataAlbum[$(this).data('id')];
            // console.log(currentData)
            AlbumModal.idAlbum.val(currentData['album_id']);
            AlbumModal.nama_album.val(currentData['nama_album']);
        });

        AlbumModal.form.submit(function(event) {
            event.preventDefault();
            var isAdd = AlbumModal.addBtn.is(':visible');
            var url = "<?= site_url('AlbumController/') ?>";
            url += isAdd ? "addAlbum" : "editAlbum";
            var button = isAdd ? AlbumModal.addBtn : AlbumModal.saveEditBtn;

            swal(swalSaveConfigure).then((result) => {
                if (!result.value) {
                    return;
                }
                // buttonLoading(button);
                $.ajax({
                    url: url,
                    'type': 'POST',
                    data: AlbumModal.form.serialize(),
                    success: function(data) {
                        // buttonIdle(button);
                        var json = JSON.parse(data);
                        if (json['error']) {
                            swal("Simpan Gagal", json['message'], "error");
                            return;
                        }
                        var album = json['data']
                        dataAlbum[album['album_id']] = album;
                        swal("Simpan Berhasil", "", "success");
                        renderAlbum(dataAlbum);
                        AlbumModal.self.modal('hide');
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
                    url: "<?= site_url('AlbumController/deleteAlbum') ?>",
                    'type': 'POST',
                    data: {
                        'album_id': id
                    },
                    success: function(data) {
                        var json = JSON.parse(data);
                        if (json['error']) {
                            swal("Delete Gagal", json['message'], "error");
                            return;
                        }
                        delete dataAlbum[id];
                        swal("Delete Berhasil", "", "success");
                        renderAlbum(dataAlbum);
                    },
                    error: function(e) {}
                });
            });
        });
    });
</script>