<div class="page-wrapper mt-3">
    <div class="container-fuild">
        <div class="col-lg">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title mb-3 text-center">My Profile</h4>

                    <?= $this->session->flashdata('pesan'); ?>
                    <ul class="nav nav-tabs nav-justified nav-bordered mb-3">
                        <li class="nav-item">
                            <a href="#home-b2" data-toggle="tab" aria-expanded="false" class="nav-link">
                                <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                                <span class="d-none d-lg-block">Ubah Password</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#profile-b2" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                                <span class="d-none d-lg-block">Profile</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#settings-b2" data-toggle="tab" aria-expanded="false" class="nav-link">
                                <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
                                <span class="d-none d-lg-block">Ubah Profile</span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane" id="home-b2">
                            <div class="col-sm-12 col-md-6 col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title text-center">Ubah Password</h4>
                                        <h6 class="card-subtitle text-center">Password minimal 5 karakter</h6>
                                        <form class="mt-4" action="<?= base_url('profile/ubahpassword') ?>" method="POST">
                                            <div class="form-group">
                                                <label for="passwordlama">Password Lama</label>
                                                <input type="password" name="passwordlama" class="form-control" placeholder="Masukan Password lama anda" value="<?= set_value('passwordlama') ?>">
                                                <?= form_error('passwordlama', '<small class="text-danger">', '</small>') ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="passwordbaru">Password Baru</label>
                                                <input type="password" name="passwordbaru" class="form-control" placeholder="Masukan Password Baru" value="<?= set_value('passwordbaru') ?>">
                                                <?= form_error('passwordbaru', '<small class="text-danger">', '</small>') ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="konfirmasipassword">Konfirmasi Password</label>
                                                <input type="password" name="konfirmasipassword" class="form-control" placeholder="Konfirmasi Password Baru" value="<?= set_value('konfirmasipassword') ?>">
                                                <?= form_error('konfirmasipassword', '<small class="text-danger">', '</small>') ?>
                                            </div>
                                            <button class="btn btn-primary" type="submit">Ubah</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane show active" id="profile-b2">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="<?= base_url('assets/img/foto/') . $user['foto'] ?>" class="card-img">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $user['nama'] ?></h5>
                                            <p class="card-text"><?= $user['email'] ?></p>
                                            <p class="card-text"><small class="text-muted">Bergabung sejak <?= date('d F Y', $user['waktu_pembuatan']) ?></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="settings-b2">
                            <div class="col-lg text-center mb-4">
                                <img src="<?= base_url('assets/img/foto/') . $user['foto'] ?>" alt="image" class="rounded-circle" width="290">
                                <p class="mt-3 mb-0">
                                    <h4 class="card-title"><?= $user['email'] ?></h4>
                            </div>
                            <div class="col-lg">
                                <form enctype="multipart/form-data" class="mt-4" action="<?= base_url('profile/ubahprofile') ?>" method="POST">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" class="form-control" value="<?= $user['nama'] ?>">
                                        <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="nohp">No Hp</label>
                                        <input type="text" name="nohp" class="form-control" value="<?= $user['no_telepon'] ?>">
                                        <?= form_error('nohp', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                    <label for="foto">Ubah Foto</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupFileAddon01">Ubah Foto</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" name="foto" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Ubah</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
</div>