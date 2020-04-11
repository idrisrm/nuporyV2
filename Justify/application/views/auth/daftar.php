<div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Daftar akun</h1>
                    </div>
                    <form method="POST" class="user">
                        <div class="form-group">
                            <input name="nama" type="text" class="form-control form-control-user" placeholder="Masukan nama anda" value="<?= set_value('nama')?>">
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>')?>
                        </div>
                        <div class="form-group">
                            <input name="email" type="text" value="<?= set_value('email')?>" class="form-control form-control-user" placeholder="Masukan email anda">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>')?>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="password1" value="<?= set_value('password1')?>" type="password" class="form-control form-control-user" placeholder="Password">
                                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>')?>
                            </div>
                            <div class="col-sm-6">
                                <input name="password2" value="<?= set_value('password2')?>" type="password" class="form-control form-control-user" placeholder="Konfirmasi password">
                                <?= form_error('password2', '<small class="text-danger pl-3">', '</small>')?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Daftar
                        </button>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="<?= base_url('auth/lupapassword')?>">Lupa password</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="<?= base_url('auth')?>">Sudah punya akun? Login!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>