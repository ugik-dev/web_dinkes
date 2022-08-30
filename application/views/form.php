<a href="javascript:history.back()">Back</a>
<hr>
<form id="data_form">
    <div>
        <label>Nama</label>
        <input type="hidden" name="id" value="<?= !empty($return['id']) ? $return['id'] : '' ?>">
        <input type="text" name="nama" value="<?= !empty($return['nama']) ? $return['nama'] : '' ?>">
    </div>
    <br>
    <div>
        <label>Formasi</label>
        <input type="text" name="formasi" value="<?= !empty($return['formasi']) ? $return['formasi'] : '' ?>">
    </div>
    <button type="submit">Submit</button>
</form>
<script>
    fm = $('#data_form');
    fm.on('submit', (ev) => {
        ev.preventDefault();
        console.log('s')
        $.ajax({
            url: '<?= $form_url ?>',
            type: "POST",
            data: fm.serialize(),
            success: function(data) {
                var json = JSON.parse(data);
                if (json['error']) {
                    alert('error');
                    return;
                }
                alert('success')
                window.location.href = '<?= base_url() ?>main';
            }
        })
    })
</script>