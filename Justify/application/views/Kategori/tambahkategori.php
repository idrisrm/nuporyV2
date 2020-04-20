<div class="page-wrapper">
    <div class="container-fluid">


        <div class="col-sm-12 col-md-6 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Form Tambah Kategori</h4>
                    <h6 class="card-subtitle text-center">Masukan data kategori baru</h6>
                    <?= $this->session->flashdata('pesan'); ?>
                    <form class="mt-4" method="POST" action="<?= base_url('Kategori/tambah') ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama">Nama Kategori</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama Kategori" value="<?= set_value('nama') ?>">
                            <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi" value="<?= set_value('deskripsi') ?>">
                            <?= form_error('deskripsi', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="">Gambar Kategori</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="gambar_kategori" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                            <?= form_error('gambar_kategori', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <button class="btn btn-primary" type="submit">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>