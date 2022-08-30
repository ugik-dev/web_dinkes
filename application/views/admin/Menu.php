<div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox ssection-container">
        <div class="ibox-content">
            <form class="form-inline" id="toolbar_form" onsubmit="return false;">
                <input type="hidden" id="is_not_self" name="is_not_self" value="1">
                <input type="hidden" id="no_konten" name="no_konten" value="1">
                <select class="form-control mr-sm-2" name="id_role" id="id_role"></select>
                <a type="button" class="btn btn-success my-1 mr-sm-2" href="<?= base_url('admin/form_menu/') ?>"><i class="fal fa-plus"></i> Tambah Menu </a>
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
                                    <th style="width: 24%; text-align:center!important">Jenis</th>
                                    <th style="width: 24%; text-align:center!important">Judul</th>
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



<script>
    $(document).ready(function() {
        $('#kelolah_menu').addClass('active');

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

        var MenuModal = {
            'self': $('#user_modal'),
            'info': $('#user_modal').find('.info'),
            'form': $('#user_modal').find('#user_form'),
            'addBtn': $('#user_modal').find('#add_btn'),
            'saveEditBtn': $('#user_modal').find('#save_edit_btn'),
            'idMenu': $('#user_modal').find('#id_menu'),
            'username': $('#user_modal').find('#username'),
            'nama': $('#user_modal').find('#nama'),
            'password': $('#user_modal').find('#password'),
            'id_role': $('#user_modal').find('#id_role'),
            'opd': $('#user_modal').find('#opd'),
        }

        var dataRole = {}
        var dataMenu = {}

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

        $.when(getAllRole(), getAllMenu()).then((e) => {
            toolbar.newBtn.prop('disabled', false);
        }).fail((e) => {
            console.log(e)
        });

        function getAllRole() {
            return $.ajax({
                url: `<?php echo site_url('ParameterController/getAllJenisMenu/') ?>`,
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
                text: "-- Semua Menu --"
            }));
            Object.values(data).forEach((d) => {
                toolbar.id_role.append($('<option>', {
                    value: d['id_ref_menu'],
                    text: d['id_ref_menu'] + ' :: ' + d['label_menu'],
                }));
            });
        }



        toolbar.id_role.on('change', (e) => {
            MenuModal.id_role.attr('readonly', !empty(toolbar.id_role.val()));
            getAllMenu();
        });

        function getAllMenu() {
            swal({
                title: 'Loading user...',
                allowOutsideClick: false
            });
            swal.showLoading();
            return $.ajax({
                url: `<?php echo site_url('MenuController/getAllMenu/') ?>`,
                'type': 'POST',
                data: toolbar.form.serialize(),
                success: function(data) {
                    swal.close();
                    var json = JSON.parse(data);
                    if (json['error']) {
                        return;
                    }
                    dataMenu = json['data'];
                    renderMenu(dataMenu);
                },
                error: function(e) {}
            });
        }

        function renderMenu(data) {
            if (data == null || typeof data != "object") {
                console.log("Menu::UNKNOWN DATA");
                return;
            }
            var i = 0;

            var renderData = [];
            Object.values(data).forEach((user) => {
                var editButton = `
        <a class="dropdown-item" href='<?= base_url('admin/edit_menu/') ?>${user['id_menu']}'><i class='fa fa-pencil'></i> Edit Menu</a>
      `;
                var lihatButton = `
        <a class="dropdown-item" href='<?= base_url('') ?>${user['nama_menu']}/${user['id_menu']}'><i class='fa fa-pencil'></i> Lihat Menu</a>
      `;
                var deleteButton = `
        <a class="delete dropdown-item" data-id='${user['id_menu']}'><i class='fa fa-trash'></i> Hapus Menu</a>
      `;
                var button = `
        <div class="btn-group" opd="group">
          <button id="action" type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class='fa fa-bars'></i></button>
          <div class="dropdown-menu" aria-labelledby="action">
            ${lihatButton}
            ${editButton}
            ${deleteButton}
          </div>
        </div>
      `;
                renderData.push([user['id_menu'], user['label_menu'], user['menu_judul'], button]);
            });
            FDataTable.clear().rows.add(renderData).draw('full-hold');
        }

        function resetMenuModal() {
            MenuModal.form.trigger('reset');
            MenuModal.id_role.val(toolbar.id_role.val());
            MenuModal.opd.val(toolbar.id_opd.val() != -1 ? toolbar.id_opd.val() : "");
        }

        toolbar.newBtn.on('click', (e) => {
            resetMenuModal();
            MenuModal.self.modal('show');
            MenuModal.addBtn.show();
            MenuModal.saveEditBtn.hide();
            MenuModal.password.prop('placeholder', 'Password');
            MenuModal.password.prop('required', true);
        });

        FDataTable.on('click', '.edit', function() {
            resetMenuModal();
            MenuModal.self.modal('show');
            MenuModal.addBtn.hide();
            MenuModal.saveEditBtn.show();
            MenuModal.password.prop('placeholder', '(Unchanged)')
            MenuModal.password.prop('required', false);

            var currentData = dataMenu[$(this).data('id')];
            MenuModal.idMenu.val(currentData['id_menu']);
            MenuModal.username.val(currentData['username']);
            MenuModal.nama.val(currentData['nama']);
            MenuModal.opd.val(currentData['id_opd']);
        });

        MenuModal.form.submit(function(event) {
            event.preventDefault();
            var isAdd = MenuModal.addBtn.is(':visible');
            var url = "<?= site_url('MenuController/') ?>";
            url += isAdd ? "addMenu" : "editMenu";
            var button = isAdd ? MenuModal.addBtn : MenuModal.saveEditBtn;

            swal(swalSaveConfigure).then((result) => {
                if (!result.value) {
                    return;
                }
                buttonLoading(button);
                $.ajax({
                    url: url,
                    'type': 'POST',
                    data: MenuModal.form.serialize(),
                    success: function(data) {
                        buttonIdle(button);
                        var json = JSON.parse(data);
                        if (json['error']) {
                            swal("Simpan Gagal", json['message'], "error");
                            return;
                        }
                        var user = json['data']
                        dataMenu[user['id_menu']] = user;
                        swal("Simpan Berhasil", "", "success");
                        renderMenu(dataMenu);
                        MenuModal.self.modal('hide');
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
                    url: "<?= site_url('MenuController/deleteMenu') ?>",
                    'type': 'POST',
                    data: {
                        'id_menu': id
                    },
                    success: function(data) {
                        var json = JSON.parse(data);
                        if (json['error']) {
                            swal("Delete Gagal", json['message'], "error");
                            return;
                        }
                        delete dataMenu[id];
                        swal("Delete Berhasil", "", "success");
                        renderMenu(dataMenu);
                    },
                    error: function(e) {}
                });
            });
        });
    });
</script>