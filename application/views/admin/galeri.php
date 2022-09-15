<div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox ssection-container">
        <div class="ibox-content">
            <form class="form-inline" id="toolbar_form" onsubmit="return false;">
                <input type="hidden" id="is_not_self" name="is_not_self" value="1">
                <select class="form-control mr-sm-2" name="album_id" id="album_id"></select>
                <button type="button" class="btn btn-success my-1 mr-sm-2" id="new_btn" disabled="disabled"><i class="fal fa-plus"></i> Tambah Galeri Baru</button>
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
                                    <!-- <th style="width: 24%; text-align:center!important">Galeriname</th> -->
                                    <th style="width: 24%; text-align:center!important">Nama Album</th>
                                    <th style="width: 24%; text-align:center!important">Nama</th>
                                    <th style="width: 24%; text-align:center!important">Deskripsi</th>
                                    <th style="width: 16%; text-align:center!important">Gambar</th>
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

<div class="modal inmodal" id="galeri_modal" tabindex="-1" opd="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">ALbum</h4>
                <span class="info"></span>
            </div>
            <div class="modal-body" id="modal-body">
                <form opd="form" id="galeri_form" onsubmit="return false;" type="multipart" autocomplete="off">
                    <input type="hidden" id="galeri_id" name="galeri_id">
                    <div class="form-group">
                        <label for="nama_galeri">Nama Galeri</label>
                        <input type="text" placeholder="Nama Galeri" class="form-control" id="nama_galeri" name="nama_galeri" required="required">
                    </div>
                    <div class="form-group">
                        <label for="album">Album</label>
                        <select type="text" placeholder="" class="form-control" id="album_id" name="album_id" required="required"></select>
                    </div>
                    <div class="form-group">
                        <label for="nama_galeri">Deskipsi</label>
                        <textarea rows="3" type="text" placeholder="Deskripsi" class="form-control" id="deskripsi_galeri" name="deskripsi_galeri"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="nama_galeri">Foto</label>
                        <input type="file" placeholder="Nama Galeri" class="form-control" id="filefoto" name="filefoto">
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
        $('#kelola_galeri').addClass('active');

        var toolbar = {
            'form': $('#toolbar_form'),
            'album_id': $('#toolbar_form').find('#album_id'),
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

        var GaleriModal = {
            'self': $('#galeri_modal'),
            'info': $('#galeri_modal').find('.info'),
            'form': $('#galeri_modal').find('#galeri_form'),
            'addBtn': $('#galeri_modal').find('#add_btn'),
            'saveEditBtn': $('#galeri_modal').find('#save_edit_btn'),
            'galeri_id': $('#galeri_modal').find('#galeri_id'),
            'nama_galeri': $('#galeri_modal').find('#nama_galeri'),
            'deskripsi_galeri': $('#galeri_modal').find('#deskripsi_galeri'),
            'filefoto': $('#galeri_modal').find('#filefoto'),
            // 'filefoto': new FileUploader($('#galeri_modal').find('#filefoto'), "", "filefoto", ".png , .jpg , .jpeg", false, false),
            'album_id': $('#galeri_modal').find('#album_id'),
            'opd': $('#galeri_modal').find('#opd'),
        }

        var dataRole = {}
        var dataGaleri = {}

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
            getAllAlbum(),
            getAllGaleri()
        ).then((e) => {
            toolbar.newBtn.prop('disabled', false);
        }).fail((e) => {
            console.log(e)
        });

        function getAllAlbum() {
            return $.ajax({
                url: `<?php echo site_url('AlbumController/getAllAlbum/') ?>`,
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
            toolbar.album_id.empty();
            toolbar.album_id.append($('<option>', {
                value: "",
                text: "-- Semua Album --"
            }));
            Object.values(data).forEach((d) => {
                toolbar.album_id.append($('<option>', {
                    value: d['album_id'],
                    text: d['album_id'] + ' :: ' + d['nama_album'],
                }));
            });
        }

        function renderRoleSelectionAdd(data) {
            GaleriModal.album_id.empty();
            GaleriModal.album_id.append($('<option>', {
                value: "",
                text: "-- Pilih Album --"
            }));
            Object.values(data).forEach((d) => {
                GaleriModal.album_id.append($('<option>', {
                    value: d['album_id'],
                    text: d['album_id'] + ' :: ' + d['nama_album'],
                }));
            });
        }

        toolbar.album_id.on('change', (e) => {
            GaleriModal.album_id.attr('readonly', !empty(toolbar.album_id.val()));
            getAllGaleri();
        });

        function getAllGaleri() {
            swal({
                title: 'Loading galeri...',
                allowOutsideClick: false
            });
            swal.showLoading();
            return $.ajax({
                url: `<?php echo site_url('GaleriController/getAllGaleri/') ?>`,
                'type': 'POST',
                data: toolbar.form.serialize(),
                success: function(data) {
                    swal.close();
                    var json = JSON.parse(data);
                    if (json['error']) {
                        return;
                    }
                    dataGaleri = json['data'];
                    renderGaleri(dataGaleri);
                },
                error: function(e) {}
            });
        }

        function renderGaleri(data) {
            if (data == null || typeof data != "object") {
                console.log("Galeri::UNKNOWN DATA");
                return;
            }
            var i = 0;

            var renderData = [];
            Object.values(data).forEach((galeri) => {
                var editButton = `
        <a class="edit dropdown-item" data-id='${galeri['galeri_id']}'><i class='fa fa-pencil'></i> Edit Galeri</a>
      `;
                var deleteButton = `
        <a class="delete dropdown-item" data-id='${galeri['galeri_id']}'><i class='fa fa-trash'></i> Hapus Galeri</a>
      `;
                var img = `
        <img class="w-100" src="<?= base_url('upload/galeri/') ?>${galeri['file_galeri']}">
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
                renderData.push([galeri['galeri_id'], galeri['nama_album'], galeri['nama_galeri'], galeri['deskripsi_galeri'], img, button]);
            });
            FDataTable.clear().rows.add(renderData).draw('full-hold');
        }

        function resetGaleriModal() {
            GaleriModal.form.trigger('reset');
            GaleriModal.album_id.val(toolbar.album_id.val());
            GaleriModal.galeri_id.val('');
            GaleriModal.nama_galeri.val('');
            GaleriModal.deskripsi_galeri.val('');
            // GaleriModal.opd.val(toolbar.id_opd.val() != -1 ? toolbar.id_opd.val() : "");
        }

        toolbar.newBtn.on('click', (e) => {
            resetGaleriModal();
            GaleriModal.self.modal('show');
            GaleriModal.addBtn.show();
            GaleriModal.saveEditBtn.hide();
            // GaleriModal.filefoto.prop('placeholder', 'Password');
            GaleriModal.filefoto.prop('required', true);
        });

        FDataTable.on('click', '.edit', function() {
            resetGaleriModal();
            GaleriModal.self.modal('show');
            GaleriModal.addBtn.hide();
            GaleriModal.saveEditBtn.show();
            var currentData = dataGaleri[$(this).data('id')];
            // console.log(currentData)
            GaleriModal.galeri_id.val(currentData['galeri_id']);
            GaleriModal.album_id.val(currentData['album_id']);
            GaleriModal.deskripsi_galeri.val(currentData['deskripsi_galeri']);
            GaleriModal.nama_galeri.val(currentData['nama_galeri']);
            GaleriModal.filefoto.prop('required', false);
        });

        GaleriModal.form.submit(function(event) {
            event.preventDefault();
            var isAdd = GaleriModal.addBtn.is(':visible');
            var url = "<?= site_url('GaleriController/') ?>";
            url += isAdd ? "addGaleri" : "editGaleri";
            var button = isAdd ? GaleriModal.addBtn : GaleriModal.saveEditBtn;

            swal(swalSaveConfigure).then((result) => {
                if (!result.value) {
                    return;
                }
                // buttonLoading(button);
                $.ajax({
                    url: url,
                    'type': 'POST',
                    data:

                        new FormData(GaleriModal.form[0]),
                    contentType: false,
                    processData: false,

                    success: function(data) {
                        // buttonIdle(button);
                        var json = JSON.parse(data);
                        if (json['error']) {
                            swal("Simpan Gagal", json['message'], "error");
                            return;
                        }
                        var galeri = json['data']
                        dataGaleri[galeri['galeri_id']] = galeri;
                        swal("Simpan Berhasil", "", "success");
                        renderGaleri(dataGaleri);
                        GaleriModal.self.modal('hide');
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
                    url: "<?= site_url('GaleriController/deleteGaleri') ?>",
                    'type': 'POST',
                    data: {
                        'galeri_id': id
                    },
                    success: function(data) {
                        var json = JSON.parse(data);
                        if (json['error']) {
                            swal("Delete Gagal", json['message'], "error");
                            return;
                        }
                        delete dataGaleri[id];
                        swal("Delete Berhasil", "", "success");
                        renderGaleri(dataGaleri);
                    },
                    error: function(e) {}
                });
            });
        });
    });
</script>