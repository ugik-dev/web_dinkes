<div class="container">
  <div class="col-md-12 col-md-offset-2">
    <form id='editor_form' action="<?php echo base_url() . 'index.php/NewsController/simpan_post' ?>" method="post" enctype="multipart/form-data">
      <input type="text" id="judul" name="berita_judul" class="form-control" placeholder="Judul berita" value="<?= $dataContent['berita_judul'] ?>" required /><br />
      <div class="col-lg-12">
        <div class="row">

          <input type="date" id="berita_tanggal" name="berita_tanggal" class="form-control col-lg-6" placeholder="Judul berita" value="<?= $dataContent['berita_tanggal'] ?>" required /><br />
          <input type="hidden" id="" name="berita_id" class="form-control" value="<?= $dataContent['berita_id'] ?>" placeholder="" required /><br />
          <select class="form-control col-lg-6" name="tipe">
            <option <?= $dataContent['tipe'] == 'berita' ? 'selected' : '' ?> value="berita">Berita</option>
            <option <?= $dataContent['tipe'] == 'pengumuman' ? 'selected' : '' ?> value="pengumuman">Pengumuman</option>
            <option <?= $dataContent['tipe'] == 'pelayanan' ? 'selected' : '' ?> value="pelayanan">Pelayanan</option>
            <option <?= $dataContent['tipe'] == 'pelayanan' ? 'selected' : '' ?> value="pelayanan">Pelayanan</option>
          </select>
        </div>
      </div>
      <textarea id="ckeditor" name="berita_isi" class="form-control"><?= $dataContent['berita_isi'] ?></textarea><br />
      <!-- <input id="ckeditor" type="file" name="filefoto" required><br> -->
      <?php if (!empty($dataContent['berita_image'])) {
      ?>
        <div class="form-group">
          <img style="max-width: 300px" src='<?= base_url('upload/berita_image/') . $dataContent['berita_image'] ?>' />
        </div>
      <?php
      } ?>
      <div class="form-group">
        <label for="menu_pdf">Gambar thumbnail <span>*jika tidak berubah tidak usah diisi</span></label>
        <p class="no-margins"><span id="filefoto">-</span></p>
      </div>
      <?php if (!empty($dataContent['berita_pdf'])) {
      ?>
        <object style="width : 100%s" data="<?= base_url('upload/berita_pdf/') . $dataContent['berita_pdf'] ?>" type="application/pdf">
          <iframe src="<?= base_url('upload/menu_pdf/') . $dataContent['berita_pdf'] ?>"></iframe>
          <div>No online PDF viewer installed</div>
        </object>
        <a href="<?= base_url('upload/berita_pdf/') . $dataContent['berita_pdf'] ?>">Download PDF</a>
      <?php
      } ?>
      <div class="form-group">
        <label for="menu_pdf">File PDF <span>*jika tidak berubah tidak usah diisi</span></label>
        <p class="no-margins"><span id="filepdf">-</span></p>
      </div>
      <button class="btn btn-primary btn-lg" type="submit">Save</button>
    </form>
  </div>

</div>

<!-- <script src="<?php echo base_url() . 'assets/admin/jquery/jquery-2.2.3.min.js' ?>"></script> -->
<script type="text/javascript" src="<?php echo base_url() . 'assets/admin/js/bootstrap.js' ?>"></script>
<!-- <script src="<?php echo base_url() . 'assets/admin/ckeditor/ckeditor.js' ?>"></script> -->
<!-- <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script> -->
<script type="text/javascript">
  $(function() {

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
          url: "<?= site_url('NewsController/simpan_post') ?>",
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

    // });

    // CKEDITOR.replace('ckeditor', {
    //   filebrowserImageBrowseUrl: '<?php echo base_url('assets/kcfinder/browse.php'); ?>',
    //   height: '400px'
    // });
    ClassicEditor
      .create(document.querySelector('#ckeditor'), {
        ckfinder: {
          uploadUrl: '<?= base_url() ?>assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
        },
        toolbar: {
          items: ['ckfinder', 'imageUpload', 'toggleImageCaption', 'imageTextAlternative', '|',
            'heading', '|',
            'fontfamily', 'fontsize', '|',
            'alignment', '|',
            'fontColor', 'fontBackgroundColor', '|',
            'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
            'link', '|',
            'outdent', 'indent', '|',
            'bulletedList', 'numberedList', 'todoList', '|',
            'code', 'codeBlock', '|',
            'insertTable', '|',
            'uploadImage', 'blockQuote', '|',
            'undo', 'redo'
          ],
          shouldNotGroupWhenFull: true
        }
        // toolbar: ['ckfinder', 'imageUpload', '|', 'heading', '|', 'bold', 'italic', '|', 'undo', 'redo', '-', 'numberedList', 'bulletedList'],
        // shouldNotGroupWhenFull: true
      })
      .catch(error => {
        console.error(error);
      });
  });
</script>