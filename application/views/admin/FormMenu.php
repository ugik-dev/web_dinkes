<div class="container">
    <div class="col-md-12 col-md-offset-2">
        <form id='editor_form' action="<?php echo base_url() . 'index.php/MenuController/simpan_post' ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-3">
                    <input type="hidden" id="id_menu" name="id_menu" class="form-control" value="<?= !empty($dataContent['edit']['id_menu']) ? $dataContent['edit']['id_menu'] : '' ?>" placeholder="" required />
                    <select class="form-control" id="id_ref_menu" name="id_ref_menu" required="required">
                        <?php
                        echo "<option value=''> Pilih Kategori Menu </option>";
                        foreach ($dataContent['ref_menu'] as $d) {
                            if (!empty($dataContent['edit']['id_ref_menu'])) {
                                if ($dataContent['edit']['id_ref_menu'] == $d['id_ref_menu']) {
                                    echo "<option selected value='" . $d['id_ref_menu'] . "'>" . $d['label_menu'] . " </option>";
                                } else {
                                    echo "<option value='" . $d['id_ref_menu'] . "'>" . $d['label_menu'] . " </option>";
                                }
                            } else
                                echo "<option value='" . $d['id_ref_menu'] . "'>" . $d['label_menu'] . " </option>";
                        }
                        // ? !empty($dataContent['edit']['id_menu']) : '' 
                        ?>
                    </select>
                </div>
                <div class=" col-md-1">
                    <input type="number" id="urut" name="urut" value="<?= !empty($dataContent['edit']['urut']) ? $dataContent['edit']['urut'] : '' ?>" class="form-control" placeholder="Nomor Urut" required /><br />
                </div>
                <div class=" col-md-9">
                    <input type="text" id="judul" name="menu_judul" value="<?= !empty($dataContent['edit']['menu_judul']) ? $dataContent['edit']['menu_judul'] : '' ?>" class="form-control" placeholder="Judul Menu" required /><br />
                </div>
            </div>

            <textarea id="ckeditor" name="menu_isi" rows="5"><?= !empty($dataContent['edit']['menu_isi']) ? $dataContent['edit']['menu_isi'] : '' ?></textarea><br />
            <!-- <input id="ckeditor" type="file" name="filefoto" required><br> -->
            <div class="row">
                <div class="col-lg-6">

                    <?php if (!empty($dataContent['edit']['menu_pdf'])) {
                    ?>
                        <object style="width : 100%s" data="<?= base_url('upload/menu_pdf/') . $dataContent['edit']['menu_pdf'] ?>" type="application/pdf">
                            <iframe src="<?= base_url('upload/menu_pdf/') . $dataContent['edit']['menu_pdf'] ?>"></iframe>
                            <div>No online PDF viewer installed</div>
                        </object>
                        <a href="<?= base_url('upload/menu_pdf/') . $dataContent['edit']['menu_pdf'] ?>">Download PDF <?= !empty($dataContent['edit']['pdf_name']) ? $dataContent['edit']['pdf_name'] : '' ?></a>
                        <!-- <div class="form-group">
                    <img style="max-width: 300px" src='<?= base_url('upload/menu_pdf/') . $dataContent['menu_pdf'] ?>' />
                </div> -->
                    <?php
                    } ?>
                </div>
                <div class="col-md-6">
                    <input type="text" id="pdf_name" name="pdf_name" value="<?= !empty($dataContent['edit']['pdf_name']) ? $dataContent['edit']['pdf_name'] : '' ?>" class="form-control" placeholder="Nama File PDF, contoh : example.pdf" /><br />
                </div>
            </div>
            <div class="form-group">
                <label for="menu_pdf">File PDF <span>*jika tidak berubah tidak usah diisi</span></label>
                <p class="no-margins"><span id="menu_pdf">-</span></p>
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
            'menu_pdf': new FileUploader($('#editor_form').find('#menu_pdf'), "", "menu_pdf", ".pdf", false, false),

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
                    url: "<?= $dataContent['form_url'] ?>",
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
                    },
                    error: function(e) {}
                });
            });
        });

        // });

        // CKEDITOR.replace('ckeditor', {
        //     filebrowserImageBrowseUrl: '<?php echo base_url('assets/kcfinder/browse.php'); ?>',
        //     height: '400px'
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