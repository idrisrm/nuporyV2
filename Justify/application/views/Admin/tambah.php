<div class="page-wrapper">
    <div class="container-fluid">


        <div class="col-sm-12 col-md-6 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Form tambah Admin</h4>
                    <h6 class="card-subtitle text-center">Masukan Data dengan lengkap dan benar</h6>
                    <?= $this->session->flashdata('pesan');?>
                    <form class="mt-4" method="POST">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?= set_value('nama')?>">
                            <?= form_error('nama', '<small class="text-danger">', '</small>')?>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Email" value="<?= set_value('email')?>">
                            <?= form_error('email', '<small class="text-danger">', '</small>')?>
                        </div>
                        <div class="form-group">
                            <label for="jeniskelamin">Jenis Kelamin</label>
                            <select name="jeniskelamin" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                <option value="">Pilih ...</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            <?= form_error('jeniskelamin', '<small class="text-danger">', '</small>')?>
                        </div>
                        <div class="form-group">
                            <label for="nohp">No HP</label>
                            <input type="text" name="nohp" class="form-control" placeholder="No Handphone" value="<?= set_value('nohp')?>">
                            <?= form_error('nohp', '<small class="text-danger">', '</small>')?>
                        </div>
                        <button class="btn btn-primary" type="submit">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>