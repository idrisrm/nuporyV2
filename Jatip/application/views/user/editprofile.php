<div class="container col-lg">
    <form method="post" action="<?= base_url('user/editprofile') ?>" enctype="multipart/form-data">
        <div class="row mb-3">
            <div class="col-lg-3">
                <img class="img-thumnail" style="height: 250px; width:250px;" src="<?= base_url('assets/img/foto/') . $user['foto'] ?>">
            </div>
        </div>
        <div class="col-sm-5">
            <?= $this->session->flashdata('pesan') ?>
        </div>
        <div class="form-group row mt-1">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="email" name="email" value="<?= $user['email'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama'] ?>">
                <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="foto" class="col-sm-2 col-form-label">Ubah Foto</label>
            <div class="col-sm-10">
                <div class="custom-file">
                    <input type="file" name="image" id="foto" aria-describedby="inputGroupFileAddon01">
                    <!-- <label class="custom-file-label" for="foto">Choose file</label> -->
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Ubah</button>
    </form>
</div>