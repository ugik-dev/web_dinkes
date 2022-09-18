<div class="container">
  <div class="col-md-8 col-md-offset-2">
    <form id='editor_form' action="<?php echo base_url() . 'index.php/NewsController/simpan_new_post' ?>" method="post" enctype="multipart/form-data">
      <input type="text" name="berita_judul" id="judul" class="form-control" placeholder="Judul berita" required /><br />
      <input type="date" value="" name="berita_tanggal" id="berita_tanggal" class="form-control" placeholder="Judul Tanggal" required /><br />
      <select name="tipe" class="form-control">
        <option value="berita">Berita</option>
        <option value="artikel">Artikel</option>
        <option value="pengumuman">Pengumuman</option>
        <option value="pelayanan">Pelayanan</option>
      </select> <textarea id="ckeditor" name="berita_isi" class="form-control"></textarea><br />
      <div class="form-group">
        <label for="menu_pdf">Gambar thumbnail <span></span></label>
        <input type="file" name="filefoto"><br>
        <!-- <p class="no-margins"><span id="filefoto">-</span></p> -->
      </div>
      <div class="form-group">
        <label for="menu_pdf">File PDF <span></span></label>
        <input type="file" name="filepdf"><br>
        <!-- <p class="no-margins"><span id="filefoto">-</span></p> -->
      </div>
      <!-- <input type="file" name="filepdf"><br> -->
      <button class="btn btn-primary btn-lg" type="submit">Post Berita</button>
    </form>
  </div>

</div>

<!-- <script src="<?php echo base_url() . 'assets/admin/jquery/jquery-2.2.3.min.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . 'assets/admin/js/bootstrap.js' ?>"></script> -->

<!-- <script src="<?php echo base_url() . 'assets/admin/ckeditor/ckeditor.js' ?>"></script> -->
<!-- <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script> -->
<script type="text/javascript">
  $(function() {
    $('#news_post').addClass('active');

    var editor_form = {
      'form': $('#editor_form'),
      'judul': $('#editor_form').find('#judul'),
      'ckeditor': $('#editor_form').find('#ckeditor'),
      'filepdf': new FileUploader($('#editor_form').find('#filepdf'), "", "filepdf", ".pdf", false, false),
      'filefoto': new FileUploader($('#editor_form').find('#filefoto'), "", "filefoto", ".png , .jpg , .jpeg", false, false),

      'saveBtn': $('#save_btn'),
    }
    editor_form.form.submit(function(event) {
      event.preventDefault();
      console.log('s')
      swal(saveConfirmation("Konfirmasi tambah", "Yakin akan menambahakan berita ini ini?", "Ya, Tambah!")).then((result) => {
        if (!result.value) {
          return;
        }
        swal({
          title: 'Loading...',
          allowOutsideClick: false
        });
        swal.showLoading();
        $.ajax({
          url: "<?= base_url('NewsController/simpan_new_post') ?>",
          'type': 'POST',
          data: new FormData(editor_form.form[0]),
          contentType: false,
          processData: false,
          success: function(data) {
            buttonIdle(editor_form.saveBtn);
            var json = JSON.parse(data);
            if (json['error']) {
              swal("Simpan Gagal", json['message'], "error");
              return;
            }
            // location.reload();
            swal("Simpan Berhasil", "", "success");
            location.href = "<?= base_url('admin/berita') ?>";
          },
          error: function(e) {}
        });
      });
    });
    // CKEDITOR.replace('ckeditor', {
    //   filebrowserImageBrowseUrl: '<?php echo base_url('assets/kcfinder/browse.php'); ?>',
    //   height: '400px'
    // });

    ClassicEditor
      .create(document.querySelector('#ckeditor'), {
        ckfinder: {
          uploadUrl: '<?= base_url() ?>assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
        },
        toolbar: ['ckfinder', 'imageUpload', '|', 'heading', '|', 'bold', 'italic', '|', 'undo', 'redo']
      })
      .catch(function(error) {
        console.error(error);
      });

    // ClassicEditor
    //   .create(document.querySelector('#ckeditor'), {
    //     ckfinder: {
    //       uploadUrl: '<?= base_url() ?>assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
    //       // uploadUrl: '<?= base_url() ?>NewsController/uploadImage'
    //     },
    //     toolbar: {
    //       items: ['ckfinder', 'imageUpload', 'toggleImageCaption', 'imageTextAlternative', '|',
    //         'heading', '|',
    //         'fontfamily', 'fontsize', '|',
    //         'alignment', '|',
    //         'fontColor', 'fontBackgroundColor', '|',
    //         'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
    //         'link', '|',
    //         'outdent', 'indent', '|',
    //         'bulletedList', 'numberedList', 'todoList', '|',
    //         'code', 'codeBlock', '|',
    //         'insertTable', '|',
    //         'uploadImage', 'blockQuote', '|',
    //         'undo', 'redo'
    //       ],
    //       shouldNotGroupWhenFull: true
    //     }
    //     // toolbar: ['ckfinder', 'imageUpload', '|', 'heading', '|', 'bold', 'italic', '|', 'undo', 'redo', '-', 'numberedList', 'bulletedList'],
    //     // shouldNotGroupWhenFull: true
    //   })
    //   .catch(error => {
    //     console.error(error);
    //   });

  });
</script>