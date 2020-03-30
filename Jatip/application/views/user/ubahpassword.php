<div class="container">
    <div class="col-md-4">
        <form method="POST">
            <div class="form-group">
                <label for="password">Password sekarang</label>
                <input type="password" name="password" value="<?= set_value('password')?>" class="form-control" id="password" placeholder="Masukan password">
                <?= form_error('password', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group">
                <label for="passwordbaru">Password baru</label>
                <input type="password" name="passwordbaru" class="form-control" id="passwordbaru" placeholder="Masukan password baru">
                <?= form_error('passwordbaru', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group">
                <label for="konfirmasipassword">Konfirmasi password</label>
                <input type="password" name="konfirmasipassword" class="form-control" id="konfirmasipassword" placeholder="Masukan konfirmasi password">
                <?= form_error('konfirmasipassword', '<small class="text-danger">', '</small>') ?>
            </div>
            <?= $this->session->flashdata('pesan');?>
            <button class="btn btn-primary">Ubah</button>
        </form>
    </div>
</div>