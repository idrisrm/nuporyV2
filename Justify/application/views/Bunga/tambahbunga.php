<div class="page-wrapper">
    <div class="container-fluid">


        <div class="col-sm-12 col-md-6 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Form Tambah Bunga</h4>
                    <h6 class="card-subtitle text-center">Masukan Data Bunga dengan lengkap</h6>
                    <?= $this->session->flashdata('pesan');?>
                    <form class="mt-4" method="POST">
                        <div class="form-group">
                            <label for="id_bunga">ID Bunga</label>
                            <input type="text" name="id_bunga" class="form-control" placeholder="Id Bunga" value="<?= set_value('id_bunga')?>">
                            <?= form_error('id_bunga', '<small class="text-danger">', '</small>')?>
                        </div>
                        <div class="form-group">
                            <label for="id_kategori">ID Kategori</label>
                            <input type="text" name="id_kategori" class="form-control" placeholder="Id Kategori" value="<?= set_value('id_kategori')?>">
                            <?= form_error('id_kategori', '<small class="text-danger">', '</small>')?>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Bunga</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama  Bunga" value="<?= set_value('nama_bunga')?>">
                            <?= form_error('nama', '<small class="text-danger">', '</small>')?>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" name="harga" class="form-control" placeholder="harga" value="<?= set_value('harga')?>">
                            <?= form_error('harga', '<small class="text-danger">', '</small>')?>
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok Bunga</label>
                            <input type="text" name="stok" class="form-control" placeholder="Stok Bunga" value="<?= set_value('stok')?>">
                            <?= form_error('stok', '<small class="text-danger">', '</small>')?>
                        </div>
                        <div class="form-group">
                            <label for="foto_bunga">Foto Bunga</label>
                            <div class="custom-file">
                                <input type="file" name="foto_bunga" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Pilih file</label>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label for="video_bunga">video Bunga</label>
                            <div class="custom-file">
                                <input type="file" name="video_bunga" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Pilih file</label>
                            </div>
                        </div> -->
                        <div class="form-group">
                            <label for="cara_perawatan">Cara Perawatan</label>
                            <input type="text" name="cara_perawatan" class="form-control" placeholder="Cara Perawatan Bunga" value="<?= set_value('cara_perawatan')?>">
                            <?= form_error('cara_perawatan', '<small class="text-danger">', '</small>')?>
                        </div>
                        <div class="form-group">
                            <label for="deskripsik">Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi Bunga" value="<?= set_value('deskripsi')?>">
                            <?= form_error('deskripsi', '<small class="text-danger">', '</small>')?>
                        </div>
                        <button class="btn btn-primary" type="submit">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>