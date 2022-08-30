<div class="modal inmodal" id="profile_modal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Edit Profile</h4>
        <span class="infox"></span>
      </div>
      <div class="modal-body" id="modal-body">              
        <form role="form" id="profile_form" onsubmit="return false;" type="multipart" autocomplete="off">
          <input type="hidden" id="id_userx" name="id_user">
          <div class="form-group">
            <label for="usernamex">Username</label> 
            <input type="text" placeholder="Username" class="form-control" id="usernamex" name="username" required="required" autocomplete="username">
          </div>
          <div class="form-group">
            <label for="namax">Nama</label> 
            <input type="text" placeholder="Nama" class="form-control" id="namax" name="nama" required="required">
          </div>
          <div class="form-group">
            <label for="passwordx">Password</label> 
            <input type="password" placeholder="Password" class="form-control" id="passwordx" name="password" autocomplete="new-password">
          </div>
          <div class="form-group">
            <label for="repasswordx">Konfirmasi Password</label> 
            <input type="password" placeholder="Konfirmasi Password" class="form-control" id="repasswordx" name="repassword" autocomplete="new-password">
          </div>
          <button class="btn btn-success my-1 mr-sm-2" type="submit" id="save_edit_btnx" data-loading-text="Loading..."><strong>Simpan Perubahan</strong></button>
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

  var profileButton = $('#profile_btn');
  
  var ProfileModal = {
    'self': $('#profile_modal'),
    'info': $('#profile_modal').find('.infox'),
    'form': $('#profile_modal').find('#profile_form'),
    'saveEditBtn': $('#profile_modal').find('#save_edit_btnx'),
    'idUser': $('#profile_modal').find('#id_userx'),
    'username': $('#profile_modal').find('#usernamex'),
    'nama': $('#profile_modal').find('#namax'),
    'password': $('#profile_modal').find('#passwordx'),
    'repassword': $('#profile_modal').find('#repasswordx'),
  }

  var swalSaveConfigure = {
    title: "Konfirmasi simpan",
    text: "Yakin akan menyimpan data ini?",
    type: "info",
    showCancelButton: true,
    confirmButtonColor: "#18a689",
    confirmButtonText: "Ya, Simpan!",
  };

  var user = JSON.parse(`<?=json_encode(DataStructure::slice($this->session->userdata(), ['id_user', 'username', 'nama', 'title_role', 'nama_opd']))?>`);
  var profile = {
    'username': $('#header_username'),
    'nama': $('#header_nama'),
    'title': $('#header_title'),
  }

  renderProfile(user);
  function renderProfile(user){
    profile.username.html(user['username']);
    profile.nama.html(user['nama']);
    var title = user['title_role'] + (user['nama_opd'] ? ' - ' + user['nama_opd'] : '')
    profile.title.html(title);
  }

  profileButton.on('click', () => {
    ProfileModal.form.trigger('reset');
    ProfileModal.self.modal('show');
    ProfileModal.self.modal('show');
    ProfileModal.password.prop('placeholder', '(Unchanged)')
    ProfileModal.password.prop('required', false);
    ProfileModal.repassword.prop('placeholder', '(Unchanged)')

    var currentData = user;
    ProfileModal.idUser.val(currentData['id_user']);
    ProfileModal.username.val(currentData['username']);
    ProfileModal.nama.val(currentData['nama']);
  });


  ProfileModal.password.on('change', () => {
    confirmPasswordRule(ProfileModal.password, ProfileModal.repassword);
  });

  ProfileModal.repassword.on('keyup', () => {
    confirmPasswordRule(ProfileModal.password, ProfileModal.repassword);
  });

  function confirmPasswordRule(password, rePassword){
    if(password.val() != rePassword.val()){
      rePassword[0].setCustomValidity('Password tidak sama');
    } else {
      rePassword[0].setCustomValidity('');
    }
  }

  ProfileModal.form.submit(function(event) {
    event.preventDefault();
    swal(swalSaveConfigure).then((result) => {
      if(!result.value){ return; }
      buttonLoading(ProfileModal.saveEditBtn);
      $.ajax({
        url: "<?=site_url('UserController/editUser')?>", 'type': 'POST',
        data: ProfileModal.form.serialize(),
        success: function (data){
          buttonIdle(ProfileModal.saveEditBtn);
          var json = JSON.parse(data);
          if(json['error']){
            swal("Simpan Gagal", json['message'], "error");
            return;
          }
          user = json['data']
          swal("Simpan Berhasil", "", "success");
          ProfileModal.self.modal('hide');
          renderProfile(user);
        },
        error: function(e) {}
      });
    });
  });
});
</script>