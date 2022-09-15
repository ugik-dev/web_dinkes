<div class="mt-5 col-xl-8 col-md-8 col-12 col-sm-12 text-center offset-xl-2 offset-md-2">
    <div class="error-inner pt-10">
        <h1>404</h1>
        <h4>Page Not Found</h4>
        <p><?= !empty($message) ? $message : 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas expedita, repudiandae voluptate repellendus inventore ab et aspernatur doloremque.' ?></p>

        <div class="search-box-error-page">
            <form action="<?= base_url('search') ?>" method="get">
                <input type="text" name="s" placeholder="Mencari sesuatu .....">
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
</div>