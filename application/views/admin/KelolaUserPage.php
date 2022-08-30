<div class="wrapper wrapper-content animated fadeInRight">
  <div class="ibox ssection-container">
    <div class="ibox-content">
      <form class="form-inline" id="toolbar_form" onsubmit="return false;">
        <input type="hidden" id="is_not_self" name="is_not_self" value="1">
        <select class="form-control mr-sm-2" name="id_role" id="id_role"></select>
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
                  <th style="width: 24%; text-align:center!important">Username</th>
                  <th style="width: 24%; text-align:center!important">Nama</th>
                  <th style="width: 16%; text-align:center!important">Role</th>
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

<div class="modal inmodal" id="user_modal" tabindex="-1" opd="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Kelola User</h4>
        <span class="info"></span>
      </div>
      <div class="modal-body" id="modal-body">
        <form opd="form" id="user_form" onsubmit="return false;" type="multipart" autocomplete="off">
          <input type="hidden" id="id_user" name="id_user">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" placeholder="Username" class="form-control" id="username" name="username" required="required">
          </div>
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" placeholder="Nama" class="form-control" id="nama" name="nama" required="required">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" placeholder="Password" class="form-control" id="password" name="password">
          </div>
          <div class="form-group">
            <label for="judul">Role</label>
            <select class="form-control mr-sm-2" name="id_role" id="id_role" required="required"></select>
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
    $('#kelola_user').addClass('active');

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

    var UserModal = {
      'self': $('#user_modal'),
      'info': $('#user_modal').find('.info'),
      'form': $('#user_modal').find('#user_form'),
      'addBtn': $('#user_modal').find('#add_btn'),
      'saveEditBtn': $('#user_modal').find('#save_edit_btn'),
      'idUser': $('#user_modal').find('#id_user'),
      'username': $('#user_modal').find('#username'),
      'nama': $('#user_modal').find('#nama'),
      'password': $('#user_modal').find('#password'),
      'id_role': $('#user_modal').find('#id_role'),
      'opd': $('#user_modal').find('#opd'),
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
      UserModal.id_role.empty();
      UserModal.id_role.append($('<option>', {
        value: "",
        text: "-- Pilih Role --"
      }));
      Object.values(data).forEach((d) => {
        UserModal.id_role.append($('<option>', {
          value: d['id_role'],
          text: d['id_role'] + ' :: ' + d['title_role'],
        }));
      });
    }

    toolbar.id_role.on('change', (e) => {
      UserModal.id_role.attr('readonly', !empty(toolbar.id_role.val()));
      getAllUser();
    });

    function getAllUser() {
      swal({
        title: 'Loading user...',
        allowOutsideClick: false
      });
      swal.showLoading();
      return $.ajax({
        url: `<?php echo site_url('UserController/getAllUser/') ?>`,
        'type': 'POST',
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
      Object.values(data).forEach((user) => {
        var editButton = `
        <a class="edit dropdown-item" data-id='${user['id_user']}'><i class='fa fa-pencil'></i> Edit User</a>
      `;
        var deleteButton = `
        <a class="delete dropdown-item" data-id='${user['id_user']}'><i class='fa fa-trash'></i> Hapus User</a>
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
        renderData.push([user['id_user'], user['username'], user['nama'], user['title_role'], button]);
      });
      FDataTable.clear().rows.add(renderData).draw('full-hold');
    }

    function resetUserModal() {
      UserModal.form.trigger('reset');
      UserModal.id_role.val(toolbar.id_role.val());
      UserModal.opd.val(toolbar.id_opd.val() != -1 ? toolbar.id_opd.val() : "");
    }

    toolbar.newBtn.on('click', (e) => {
      resetUserModal();
      UserModal.self.modal('show');
      UserModal.addBtn.show();
      UserModal.saveEditBtn.hide();
      UserModal.password.prop('placeholder', 'Password');
      UserModal.password.prop('required', true);
    });

    FDataTable.on('click', '.edit', function() {
      resetUserModal();
      UserModal.self.modal('show');
      UserModal.addBtn.hide();
      UserModal.saveEditBtn.show();
      UserModal.password.prop('placeholder', '(Unchanged)')
      UserModal.password.prop('required', false);

      var currentData = dataUser[$(this).data('id')];
      UserModal.idUser.val(currentData['id_user']);
      UserModal.username.val(currentData['username']);
      UserModal.nama.val(currentData['nama']);
      UserModal.opd.val(currentData['id_opd']);
    });

    UserModal.form.submit(function(event) {
      event.preventDefault();
      var isAdd = UserModal.addBtn.is(':visible');
      var url = "<?= site_url('UserController/') ?>";
      url += isAdd ? "addUser" : "editUser";
      var button = isAdd ? UserModal.addBtn : UserModal.saveEditBtn;

      swal(swalSaveConfigure).then((result) => {
        if (!result.value) {
          return;
        }
        buttonLoading(button);
        $.ajax({
          url: url,
          'type': 'POST',
          data: UserModal.form.serialize(),
          success: function(data) {
            buttonIdle(button);
            var json = JSON.parse(data);
            if (json['error']) {
              swal("Simpan Gagal", json['message'], "error");
              return;
            }
            var user = json['data']
            dataUser[user['id_user']] = user;
            swal("Simpan Berhasil", "", "success");
            renderUser(dataUser);
            UserModal.self.modal('hide');
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
          url: "<?= site_url('UserController/deleteUser') ?>",
          'type': 'POST',
          data: {
            'id_user': id
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