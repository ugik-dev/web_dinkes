<div class="wrapper wrapper-content animated fadeInRight">
  <div class="ibox ssection-container">
    <div class="ibox-content">
      <form class="form-inline" id="toolbar_form" onsubmit="return false;">
        <input type="hidden" id="is_not_self" name="no_isi_no_img" value="1">
        <a type="button" class="btn btn-success my-1 mr-sm-2" id="new_btn" href="<?php echo base_url() . 'admin/new_news_post'; ?>"><i class="fal fa-plus"></i> Tambah Berita Baru</a>
      </form>
    </div>

  </div>

  <!-- <div class="container"> -->
  <!-- <div class="col-lg-12" id="news-list"></div> -->
  <!-- <div class="row"> -->
  <!-- <div class="col-lg-12"> -->
  <div class="ibox ssection-container">
    <div class="ibox-content">
      <div class="table-responsive">
        <table id="FDataTable" class="table table-bordered table-hover" style="padding:0px">
          <thead>
            <tr>
              <th style="width: 7%; text-align:center!important">ID</th>
              <th style="width: 7%; text-align:center!important">Tanggal</th>
              <th style="width: 7%; text-align:center!important">Jenis</th>
              <th style="width: 25%; text-align:center!important">Judul</th>
              <th style="width: 5%; text-align:center!important">Action</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
      <!-- </div> -->
    </div>
    <!-- </div> -->
    <!-- </div> -->
  </div>
</div>
<script>
  $(document).ready(function() {
    $('#news_post').addClass('active');
    var news_list = $('#news-list');

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

    $.when(getAllNews()).then((e) => {
      // toolbar.newBtn.prop('disabled', false);
    }).fail((e) => {
      console.log(e)
    });


    // toolbar.newBtn.on('click', (e) => {
    //   resetUserModal();
    //   UserModal.self.modal('show');
    //   UserModal.addBtn.show();
    //   UserModal.saveEditBtn.hide();
    //   UserModal.password.prop('placeholder', 'Password');
    //   UserModal.password.prop('required', true);
    // });


    function getAllNews() {
      swal({
        title: 'Loading news...',
        allowOutsideClick: false
      });
      swal.showLoading();
      return $.ajax({
        url: `<?php echo site_url('NewsController/getAll/') ?>`,
        'type': 'GET',
        data: {
          'sort': true
        },
        success: function(data) {
          swal.close();
          var json = JSON.parse(data);
          if (json['error']) {
            return;
          }
          dataNews = json['data'];
          renderNews(dataNews);
        },
        error: function(e) {}
      });
    }

    function renderNews(data) {
      if (data == null || typeof data != "object") {
        console.log("News::UNKNOWN DATA");
        return;
      }

      // news_list.empty();
      renderData = []
      Object.values(data).forEach((news) => {

        var panjang = news['berita_isi'];
        var button = `
        <div class="btn-group" opd="group">
          <button id="action" type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class='fa fa-bars'></i></button>
          <div class="dropdown-menu" aria-labelledby="action">
          <a type="button" class="dropdown-item" href='' data-id='${news['berita_id']}' ><i class="fal fa-trash"></i>  Hapus </a>
             <a type="button" class="dropdown-item"  href="<?= base_url() ?>${news['tipe']}/${news['berita_slug']}"><i class="fal fa-eye"></i>  Lihat Post </a>
              <a type="button" class="dropdown-item"  href="<?php echo base_url() . 'index.php/NewsController/edit_post?berita_id='; ?>${news['berita_id']}"><i class="fal fa-pencil"></i>  Edit</a>
          
          </div>
        </div>
      `;
        renderData.push([news['berita_id'], news['berita_tanggal'], news['tipe'], news['berita_judul'], button]);
      });
      FDataTable.clear().rows.add(renderData).draw('full-hold');
    }
    //  <a type="button" class="edit btn btn-success my-1 mr-sm-3"  href="<?php echo base_url() . 'index.php/NewsController/edit_post?id_news='; ?>${news['berita_id']}"><i class="fal fa-pencil"></i>  Edit </a>


    news_list.on('click', '.delete', function() {

      event.preventDefault();
      var id = $(this).data('id');
      swal(swalDeleteConfigure).then((result) => {
        // console.log('delete'+ id);
        if (!result.value) {
          return;
        }
        $.ajax({
          url: "<?= site_url('NewsController/delete') ?>",
          'type': 'POST',
          data: {
            'berita_id': id
          },
          success: function(data) {
            var json = JSON.parse(data);
            if (json['error']) {
              swal("Delete Gagal", json['message'], "error");
              return;
            }
            // delete dataUser;
            swal("Delete Berhasil", "", "success");
            getAllNews();
          },
          error: function(e) {}
        });
      });
    });

  });
</script>