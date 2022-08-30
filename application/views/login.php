<section class="contact-us-wrap section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-12 col-md-12">
                <div class="section-title-one text-center">
                    <h2>Login</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-md-12 col-12">
                <div class="contact-form-one wow  fadeInUp animated" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s; animation-name: fadeInUp;">
                    <form id="form-login">
                        <div class="form-group col-6 col-md-6 col-sm-6 col-xl-6 mx-auto">
                            <input type="text" class="form-control" name="username" id="name" placeholder="Username">
                            <span class="form-icon"><i class="fas fa-user"></i></span>
                        </div>
                        <div class="form-group col-6 col-md-6 col-sm-6 col-xl-6 mx-auto">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                            <span class="form-icon"><i class="fas fa-key"></i></span>
                        </div>
                        <div class="send-message text-center">
                            <button type="submit" class="btn-send">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {

        var form = $('#form-login');
        form.on('submit', (ev) => {
            ev.preventDefault();
            Swal.fire({
                title: 'Login..',
                html: 'please wait',
                timerProgressBar: true,
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                },
            })

            $.ajax({
                url: '<?= base_url() ?>/user/loginProcess',
                type: 'POST',
                data: form.serialize(),
                success: (data) => {
                    json = JSON.parse(data);
                    if (json['error']) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: json['message'],
                        })
                        return;
                    }
                    $(location).attr('href', '<?= base_url() ?>' + json['user']['nama_controller']);
                },
                error: () => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href="">Why do I have this issue?</a>'
                    })
                }
            })
            console.log('s')
        })
    })
</script>