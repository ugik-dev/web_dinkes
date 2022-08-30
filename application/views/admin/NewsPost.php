<div class="wrapper wrapper-content animated fadeInRight">
  <div class="ibox ssection-container">
    <div class="ibox-content">
      <form class="form-inline" id="toolbar_form" onsubmit="return false;">
        <input type="hidden" id="is_not_self" name="is_not_self" value="1">
        <a type="button" class="btn btn-success my-1 mr-sm-2" id="new_btn" href="<?php echo base_url() . 'admin/new_news_post'; ?>"><i class="fal fa-plus"></i> Tambah Berita Baru</a>
      </form>
    </div>
  </div>

  <div class="container">
    <div class="col-lg-12" id="news-list"></div>
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

        news_list.empty();
        Object.values(data).forEach((news) => {

          var panjang = news['berita_isi'];
          // var p = panjang.substring(0, 1200);
          var index_p = panjang.lastIndexOf("</p>", 1200);
          p = panjang.substring(0, index_p);
          if (news['berita_id'] < 0) {
            btn_del = ``
          } else {
            btn_del = `<a type="button" class="delete btn btn-danger my-1 mr-sm-3" href='' data-id='${news['berita_id']}' ><i class="fal fa-trash"></i>  Hapus </a>`
          }
          news_list.append(`
      <div class="col-sm-12">
          <div class="ibox product-box" style="cursor:pointer" >
            <div class="ibox-title text-center">
              <h5>${news['berita_judul']}</h5>
            </div>
            <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-5 ibox-content  text-center">
              <div class="product-item" style="background-image:url('<?= base_url('assets/img/news/') ?>${news['berita_image']}')"></div>
            
              </div>
              <div class="col-sm-7 ibox-content">
                <p>${p}</p>
              </div>
              <div class="col-sm-12 ibox-content">
                
             ${btn_del}
              <a type="button" class="btn btn-primary my-1 mr-sm-3" href="<?php echo base_url() . 'index.php/newsx?id_news='; ?>${news['berita_id']}"><i class="fal fa-eye"></i>  Lihat Post </a>
              <a type="button" class="btn btn-primary my-1 mr-sm-3" href="<?php echo base_url() . 'index.php/NewsController/edit_post?berita_id='; ?>${news['berita_id']}"><i class="fal fa-pencil"></i>  Edit</a>
            
              Tanggal Post : ${news['berita_tanggal']}
              </div>
              </div>
            </div>
          </div>
        </div>
      `);
        });
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