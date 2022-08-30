<div class="container">
  <div class="col-md-8 col-md-offset-2">
    <form action="<?php echo base_url() . 'index.php/NewsController/simpan_new_post' ?>" method="post" enctype="multipart/form-data">
      <input type="text" name="berita_judul" class="form-control" placeholder="Judul berita" required /><br />
      <select name="tipe" class="form-control">
        <option value="berita">Berita</option>
        <option value="pengumuman">Pengumuman</option>
        <option value="pelayanan">Pelayanan</option>
      </select> <textarea id="ckeditor" name="berita_isi" class="form-control" required></textarea><br />
      <input type="file" name="filefoto"><br>
      <button class="btn btn-primary btn-lg" type="submit">Post Berita</button>
    </form>
  </div>

</div>

<script src="<?php echo base_url() . 'assets/admin/jquery/jquery-2.2.3.min.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . 'assets/admin/js/bootstrap.js' ?>"></script>
<!-- <script src="<?php echo base_url() . 'assets/admin/ckeditor/ckeditor.js' ?>"></script> -->
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
  $(function() {
    $('#news_post').addClass('active');

    CKEDITOR.replace('ckeditor', {
      filebrowserImageBrowseUrl: '<?php echo base_url('assets/kcfinder/browse.php'); ?>',
      height: '400px'
    });
  });
</script>