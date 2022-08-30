<div class="wrapper wrapper-content animated fadeInRight row" id="dbConfigContainer">
</div>


<div class="modal inmodal" id="dbconfig_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Kelola Konfigurasi DB</h4>
        <span class="info"></span>
      </div>
      <div class="modal-body" id="modal-body">
        <form role="form" id="dbconfig_form" onsubmit="return false;" type="multipart" autocomplete="off">
          <input type="hidden" id="id_db_config" name="id_db_config">
          <div class="form-group">
            <label for="Type">Type</label>
            <input type="text" placeholder="Type" class="form-control" id="type" name="type" required="required">
          </div>
          <div class="form-group">
            <label for="username">Email</label>
            <input type="text" placeholder="Email" class="form-control" id="username" name="username">
          </div>
          <div class="form-group">
            <label for="key">Key</label>
            <input type="text" placeholder="Key" class="form-control" id="key" name="key" required="required">
          </div>
          <div class="form-group">
            <label for="url_">Url</label>
            <input type="text" placeholder="Url" class="form-control" id="url_" name="url_">
          </div>
          <div class="form-group">
            <label for="port">Port</label>
            <input type="text" placeholder="Port" class="form-control" id="port" name="port">
          </div>
          <button class="btn btn-primary my-1 mr-sm-2" type="submit" id="test_btn" data-loading-text="Loading..." onclick="this.form.target='test'"><strong>Test Koneksi</strong></button>
          <button class="btn btn-success my-1 mr-sm-2" type="submit" id="save_edit_btn" data-loading-text="Loading..." onclick="this.form.target='save'"><strong>Simpan Perubahan</strong></button>
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
    $('#setting_parm').addClass('active');
    $('#kelola_email').addClass('active');
    var dbConfigContainer = $('#dbConfigContainer');
    var dataDBConfig = {}

    var swalSaveConfigure = {
      title: "Konfirmasi simpan",
      text: "Yakin akan menyimpan data ini?",
      type: "info",
      showCancelButton: true,
      confirmButtonColor: "#18a689",
      confirmButtonText: "Ya, Simpan!",
    };

    var DBConfigModal = {
      'self': $('#dbconfig_modal'),
      'info': $('#dbconfig_modal').find('.info'),
      'form': $('#dbconfig_modal').find('#dbconfig_form'),
      'testBtn': $('#dbconfig_modal').find('#test_btn'),
      'saveEditBtn': $('#dbconfig_modal').find('#save_edit_btn'),
      'idDBConfig': $('#dbconfig_modal').find('#id_db_config'),
      'type': $('#dbconfig_modal').find('#type'),
      'username': $('#dbconfig_modal').find('#username'),
      'key': $('#dbconfig_modal').find('#key'),
      'url_': $('#dbconfig_modal').find('#url_'),
      'port': $('#dbconfig_modal').find('#port'),
    }

    getAllDBConfig();

    function getAllDBConfig() {
      return $.ajax({
        url: `<?php echo site_url('AdminController/getAllDBConfig/') ?>`,
        type: 'POST',
        data: {},
        success: function(data) {
          var json = JSON.parse(data);
          if (json['error']) {
            return;
          }
          dataDBConfig = json['data'];
          renderDBConfig(dataDBConfig);
        },
        error: function(e) {},
      });
    }

    function renderDBConfig(data) {
      if (data == null || typeof data != "object") {
        console.log("User::UNKNOWN DATA");
        return;
      }
      var i = 0;

      var renderData = [];
      Object.values(data).forEach((config) => {
        renderData.push(`
        <div class="col-lg-4">
          <div class="panel panel-success">
            <div class="panel-heading">
              ${config['nama_db_config']}
            </div>
            <div class="panel-body">
              <div>Type: ${config['type']}</div>
              <div>Email: ${config['username']}</div>
              <div>Key: ${config['key']}</div>
              <div>Url: ${config['url_']}</div>
              <div>Port: ${config['port']}</div>
              <br>
              <button class="edit-config btn btn-success btn-block" data-id="${config['id_db_config']}"><i class='far fa-pencil'></i> Edit Config</button>
            </div>
          </div>
        </div>
      `);
      });
      dbConfigContainer.html(renderData.reduce((acc, curr) => acc + curr, ''));
      $('.edit-config').on('click', editConfig);
    }
    DBConfigModal.form.find(':input').change(function() {
      DBConfigModal.saveEditBtn.prop('disabled', true);
    });

    function editConfig() {
      DBConfigModal.self.modal('show');
      DBConfigModal.saveEditBtn.prop('disabled', true);
      var currentData = dataDBConfig[$(this).data('id')];
      DBConfigModal.idDBConfig.val(currentData['id_db_config']);
      DBConfigModal.type.val(currentData['type']);
      DBConfigModal.username.val(currentData['username']);
      DBConfigModal.key.val(currentData['key']);
      DBConfigModal.url_.val(currentData['url_']);
      DBConfigModal.port.val(currentData['port']);
    }

    DBConfigModal.form.submit(function(event) {
      event.preventDefault();
      switch (DBConfigModal.form[0].target) {
        case 'test':
          testKoneksi();
          break;
        case 'save':
          saveEdit();
          break;
      }
    });

    function testKoneksi() {
      buttonLoading(DBConfigModal.testBtn);
      $.ajax({
        url: "<?= site_url('AdminController/testDBConfig') ?>",
        'type': 'POST',
        data: DBConfigModal.form.serialize(),
        success: function(data) {
          buttonIdle(DBConfigModal.testBtn);
          json = [];
          try {
            var json = JSON.parse(data);
          } catch (e) {
            json['error'] = true;
            json['message'] = "Url tidak dapat dijangkau!";
          }

          if (json['error']) {
            swal("Test Gagal", json['message'], "error");
            return;
          }
          swal("Test Berhasil", "", "success");
          DBConfigModal.saveEditBtn.prop('disabled', false);
        },
        error: function(e) {}
      });
    }

    function saveEdit() {
      swal(swalSaveConfigure).then((result) => {
        if (!result.value) {
          return;
        }
        buttonLoading(DBConfigModal.saveEditBtn);
        $.ajax({
          url: "<?= site_url('AdminController/editDBConfig') ?>",
          'type': 'POST',
          data: DBConfigModal.form.serialize(),
          success: function(data) {
            buttonIdle(DBConfigModal.saveEditBtn);
            var json = JSON.parse(data);
            if (json['error']) {
              swal("Simpan Gagal", json['message'], "error");
              return;
            }
            var dbconfig = json['data']
            dataDBConfig[dbconfig['id_db_config']] = dbconfig;
            swal("Simpan Berhasil", "", "success");
            renderDBConfig(dataDBConfig);
            DBConfigModal.self.modal('hide');
          },
          error: function(e) {}
        });
      });
    }

  });
</script>