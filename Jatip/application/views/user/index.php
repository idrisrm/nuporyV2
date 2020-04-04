<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Selamat Datang <?= $user['nama'] ?></h1>

    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/foto/'). $user['foto']?>"  class="card-img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['nama']?></h5>
                    <p class="card-text"><?= $user['email']?></p>
                    <p class="card-text"><small class="text-muted">Bergabung sejak <?= date('d F Y', $user['waktubuat'])?></small></p>
                </div>
            </div>
        </div>
    </div>
<a href="<?= base_url('user/editprofile')?>" class="btn btn-primary">Ubah Profile</a>
<a href="<?= base_url('user/ubahpassword')?>" class="btn btn-primary">Ubah Pasword</a>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->