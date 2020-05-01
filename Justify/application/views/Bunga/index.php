<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Data Bunga</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Data Bunga</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Data Bunga</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- multi-column ordering -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <?= $this->session->userdata('pesan'); ?>
                        <div class="table-responsive">
                            <table id="multi_col_order" class="table table-striped table-bordered display no-wrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Bunga</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>cara Perawatan</th>
                                        <th>Foto Bunga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($dataB as $bunga) { ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $bunga['nama_bunga'] ?></td>
                                            <td><?= $bunga['harga'] ?></td>
                                            <td><?= $bunga['stok'] ?></td>
                                            <td><?= substr($bunga['cara_perawatan'], 0, 45) ?>...</td>
                                            <td>
                                            <img width="200px" height="100px" src="<?= base_url('assets/img/fotobunga/') . $bunga['foto_bunga']; ?>">
                                            </td>
                                            <td>
                                                <button type="button" data-toggle="modal" data-id="<?= $bunga['id_bunga'] ?>" data-target="#exampleModal" class="badge id btn btn-outline-danger"><i class="fas fa-trash"></i> Hapus</button>
                                                <button type="button" data-toggle="modal" data-target="#modaledit<?= $bunga['id_bunga'] ?>" class="badge id btn btn-outline-primary"><i class="fas fa-edit"></i> Edit</button>

                                                <!-- Modal Hapus -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah anda yakin ingin menghapus data ini?
                                                            </div>
                                                            <form action="<?= base_url('Bunga/HapusBunga') ?>" method="POST">
                                                                <div class="modal-footer">
                                                                    <input type="hidden" class="hapus" name="id">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                    <button type="submit" class="btn btn-primary">Hapus</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- Modal Edit-->
                                                <?php
                                                foreach ($dataB as $bunga) :?>
                                                    <div class="modal fade" id="modaledit<?= $bunga['id_bunga'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Bunga</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="<?= base_url('Bunga/EditBunga'); ?>" method="POST" enctype="multipart/form-data">
                                                                    <div class="modal-body">
                                                                        <input type="hidden" name="id_bunga" id="id_bunga" class="form-control" value="<?= $bunga['id_bunga']; ?>">
                                                                        <?= form_error('id_bunga', '<small class="text-danger">', '</small>') ?>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <label for="nama_bunga">Nama Bunga</label>
                                                                        <input type="text" name="nama_bunga" id="nama_bunga" class="form-control" placeholder="Nama  Bunga" value="<?= $bunga['nama_bunga']; ?>">
                                                                        <?= form_error('nama_bunga', '<small class="text-danger">', '</small>') ?>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <label for="kategori">Kategori Bunga</label>
                                                                        <select name="kategori" class="form-control" id="kategori">
                                                                            <?php foreach($kategori as $q){?>
                                                                                <option value="<?= $q['id_kategori']?>" <?= ($bunga['id_kategori'] == $q['id_kategori']? 'selected' : '')?>><?= $q['nama_kategori']?></option>
                                                                            <?php }?>
                                                                        </select>
                                                                        <?= form_error('kategori', '<small class="text-danger">', '</small>') ?>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <label for="harga">Harga</label>
                                                                        <input type="text" name="harga" class="form-control" placeholder="harga" value="<?= $bunga['harga']; ?>">
                                                                        <?= form_error('harga', '<small class="text-danger">', '</small>') ?>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <label for="stok">Stok Bunga</label>
                                                                        <input type="text" name="stok" class="form-control" placeholder="Stok Bunga" value="<?= $bunga['stok']; ?>">
                                                                        <?= form_error('stok', '<small class="text-danger">', '</small>') ?>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <label for="">Foto Bunga</label>
                                                                        <div>
                                                                            <img width="400" height="500" src="<?= base_url('assets/img/fotobunga/') . $bunga['foto_bunga']; ?>">
                                                                        </div>
                                                                        <div class="input-group mb-3">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                                                            </div>
                                                                            <div class="custom-file">
                                                                                <input type="file" name="foto_bunga" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                                            </div>
                                                                        </div>
                                                                        <?= form_error('foto_bunga', '<small class="text-danger">', '</small>') ?>
                                                                    </div>
                                                                    <!-- <div class="modal-body">
                                                                <label for="video_bunga">video Bunga</label>
                                                                <div class="custom-file">
                                                                    <input type="file" name="video_bunga" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                                                    <label class="custom-file-label" for="inputGroupFile01">Pilih file</label>
                                                                </div>
                                                            </div> -->
                                                                    <div class="modal-body">
                                                                        <label for="cara_perawatan">Cara Perawatan</label>
                                                                        <textarea class="form-control" id="cara_perawatan" name="cara_perawatan" rows="3" placeholder="Cara Perawatan Pada Bunga"><?= $bunga['cara_perawatan']; ?></textarea>
                                                                        <?= form_error('cara_perawatan', '<small class="text-danger">', '</small>') ?>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <label for="deskripsi">Deskripsi Bunga</label>
                                                                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Deskripsi Bunga"><?= $bunga['deskripsi']; ?></textarea>
                                                                        <?= form_error('deskripsi', '<small class="text-danger">', '</small>') ?>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                        <button type="submit" class="btn btn-success">Simpan</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </td>

                                        </tr>

                                    <?php $i++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>


    <script src="<?= base_url('assets') ?>/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <!-- <script src="<?= base_url('assets') ?>/assets/libs/popper.js/dist/umd/popper.min.js"></script> -->
    <!-- <script src="<?= base_url('assets') ?>/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script> -->
    <!-- apps -->
    <!-- apps -->
    <script src="<?= base_url('assets') ?>/dist/js/app-style-switcher.js"></script>
    <script src="<?= base_url('assets') ?>/dist/js/feather.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <!-- <script src="<?= base_url('assets') ?>/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script> -->
    <script src="<?= base_url('assets') ?>/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <!-- themejs -->
    <!--Menu sidebar -->
    <!-- <script src="<?= base_url('assets') ?>/dist/js/sidebarmenu.js"></script> -->
    <!--Custom JavaScript -->
    <script src="<?= base_url('assets') ?>/dist/js/custom.min.js"></script>
    <!--This page plugins -->
    <script src="<?= base_url('assets') ?>/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets') ?>/dist/js/pages/datatable/datatable-basic.init.js"></script>
    <script>
        $('.id').on('click', function() {
            var id = $(this).data('id');
            console.log(id)
            $('.hapus').val(id);
        })
    </script>