<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Data Kategori</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Data Bunga</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Data Kategori</li>
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
                                        <th>Nama Kategori</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($dataB as $kategori) { ?>
                                        <tr>
                                            <td><?= $kategori['nama_kategori'] ?></td>
                                            <td><?= substr($kategori['deskripsi'], 0, 45) ?>...</td>
                                            <td>
                                                <button type="button" data-toggle="modal" data-id="<?= $kategori['id_kategori'] ?>" data-target="#exampleModal" class="badge id btn btn-outline-danger"><i class="fas fa-trash"></i> Hapus</button>
                                                <button type="button" data-toggle="modal" data-target="#modaledit<?= $kategori['id_kategori'] ?>" class="badge id btn btn-outline-primary"><i class="fas fa-edit"></i> Edit</button>


                                                <!-- ModalHapus -->
                                                <!-- Modal -->
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
                                                            <form action="<?= base_url('Kategori/HapusKategori')?>" method="POST">
                                                                <div class="modal-footer">
                                                                    <input type="hidden" class="hapus" name="id">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                    <button type="submit" class="btn btn-primary">Hapus</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- Modal Edit -->
                                                <!-- Modal Edit-->
                                                <?php
                                                foreach ($dataB as $kategori) :
                                                    $id_kategori = $kategori['id_kategori'];
                                                    $nama_kategori = $kategori['nama_kategori'];
                                                    $deskripsi = $kategori['deskripsi'];
                                                    $gambar_kategori = $kategori['gambar_kategori']
                                                ?>
                                                <div class="modal fade" id="modaledit<?= $kategori['id_kategori'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="<?= base_url('Kategori/EditKategori'); ?>" method="POST" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                <input type="hidden" name="id_kategori" id="id_kategori" class="form-control"  value="<?= $id_kategori; ?>">
                                                                <?= form_error('id_kategori', '<small class="text-danger">', '</small>') ?>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label for="nama_kategori">Nama Kategori</label>
                                                                <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" placeholder="Nama  Kategori" value="<?= $nama_kategori; ?>">
                                                                <?= form_error('nama_kategori', '<small class="text-danger">', '</small>') ?>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label for="deskripsi">Deskripsi Kategori</label>
                                                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Deskripsi Kategori"><?= $deskripsi; ?></textarea>
                                                                <?= form_error('deskripsi', '<small class="text-danger">', '</small>') ?>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label for="">Foto Kategori</label>
                                                                    <div>
                                                                        <img src="<?= base_url('assets/img/fotokategori/') .$kategori['gambar_kategori']; ?>">
                                                                    </div>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                                                    </div>
                                                                    <div class="custom-file">
                                                                        <input type="file" name="gambar_kategori" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                                                        <label class="custom-file-label" for="inputGroupFile01">Pilih Gambar</label>
                                                                    </div>
                                                                </div>
                                                                <?= form_error('gambar_kategori', '<small class="text-danger">', '</small>') ?>
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

                                    <?php } ?>
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