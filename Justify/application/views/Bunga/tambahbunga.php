<div class="page-wrapper">
    <div class="container-fluid">


        <div class="col-sm-12 col-md-6 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Form Tambah Bunga</h4>
                    <h6 class="card-subtitle text-center">Masukan Data Bunga dengan lengkap</h6>
                    <?= $this->session->flashdata('pesan'); ?>
                    <form class="mt-4" method="POST" action="<?= base_url('Bunga/tambahbunga') ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama">Nama Bunga</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama  Bunga" value="<?= set_value('nama') ?>">
                            <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori Bunga</label>
                            <select name="kategori" class="form-control" id="kategori">
                                <option value="">-- Pilih Kategori --</option>
                                <?php foreach ($kategori as $k) { ?>
                                    <option value="<?= $k['id_kategori']?>"><?= $k['nama_kategori']?></option>
                                <?php } ?>
                            </select>
                            <?= form_error('kategori', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" name="harga" class="form-control" placeholder="harga" value="<?= set_value('harga') ?>">
                            <?= form_error('harga', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok Bunga</label>
                            <input type="text" name="stok" class="form-control" placeholder="Stok Bunga" value="<?= set_value('stok') ?>">
                            <?= form_error('stok', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="">Foto Bunga</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="foto" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                            <?= form_error('foto', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <!-- <div class="form-group">
                            <label for="video_bunga">video Bunga</label>
                            <div class="custom-file">
                                <input type="file" name="video_bunga" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Pilih file</label>
                            </div>
                        </div> -->
                        <div class="form-group">
                            <label for="cara">Cara Perawatan</label>
                            <textarea class="form-control" id="cara" name="cara" rows="3" placeholder="Cara Perawatan Pada Bunga"><?= set_value('cara') ?></textarea>
                            <?= form_error('cara', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Bunga</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Deskripsi Bunga"><?= set_value('deskripsi') ?></textarea>
                            <?= form_error('deskripsi', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <button class="btn btn-primary" type="submit">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>