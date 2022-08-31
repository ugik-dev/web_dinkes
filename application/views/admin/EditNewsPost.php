<div class="container">
  <div class="col-md-12 col-md-offset-2">
    <form id='editor_form' action="<?php echo base_url() . 'index.php/NewsController/simpan_post' ?>" method="post" enctype="multipart/form-data">
      <input type="text" id="judul" name="berita_judul" class="form-control" placeholder="Judul berita" value="<?= $dataContent['berita_judul'] ?>" required /><br />
      <input type="hidden" id="" name="berita_id" class="form-control" value="<?= $dataContent['berita_id'] ?>" placeholder="" required /><br />
      <select name="tipe">
        <option <?= $dataContent['tipe'] == 'berita' ? 'selected' : '' ?> value="berita">Berita</option>
        <option <?= $dataContent['tipe'] == 'pengumuman' ? 'selected' : '' ?> value="pengumuman">Pengumuman</option>
        <option <?= $dataContent['tipe'] == 'pelayanan' ? 'selected' : '' ?> value="pelayanan">Pelayanan</option>
      </select>
      <textarea id="ckeditor" name="berita_isi" class="form-control" required><?= $dataContent['berita_isi'] ?></textarea><br />
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
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
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
      swal(saveConfirmation("Konfirmasi tambah", "Yakin akan menambahakan dokumen ini?", "Ya, Tambah!")).then((result) => {
        if (!result.value) {
          return;
        }
        buttonLoading(editor_form.saveBtn);
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
            location.reload();
            swal("Simpan Berhasil", "", "success");
          },
          error: function(e) {}
        });
      });
    });

    // });

    CKEDITOR.replace('ckeditor', {
      filebrowserImageBrowseUrl: '<?php echo base_url('assets/kcfinder/browse.php'); ?>',
      height: '400px'
    });

  });
</script>