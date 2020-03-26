<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-lg-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Reset password anda</h1>
                            </div>
                            <?= $this->session->flashdata('pesan'); ?>
                            <form method="POST" class="user">
                                <div class="form-group">
                                    <input name="password" type="password" class="form-control form-control-user" id="password" aria-describedby="emailHelp" placeholder="Password" value="<?= set_value('email') ?>">
                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <input name="konfirmasipassword" type="password" class="form-control form-control-user" id="konfirmasipassword" aria-describedby="emailHelp" placeholder="Konfirmasi password" value="<?= set_value('email') ?>">
                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Reset password
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('auth') ?>">Kembali ke halaman login!</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('auth/daftar') ?>">Buat Akun!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>