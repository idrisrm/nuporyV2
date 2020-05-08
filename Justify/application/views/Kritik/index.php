<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Data Kritik</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Data Kritik</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Data Kritik</li>
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
                                        <th>Nama</th>
                                        <th>Kritik dan Saran</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($dataK as $kritik) { ?>
                                        <tr>
                                            <td><?= $kritik['nama'] ?></td>
                                            <td><?= $kritik['isi_kritik'] ?></td>
                                            <td>     
                                                    <?php foreach ($status as $s) { ?>
                                                     <?= $s['status_kritik'] ?>
                                                    <?php } ?>
                                            </td>
                                            <td>
                                                <button type="button" data-toggle="modal" data-id="<?= $kritik['id_kritik'] ?>" data-target="#exampleModal" class="badge id btn btn-outline-danger"><i class="fas fa-trash"></i> Hapus</button>
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
                                                            <form action="<?= base_url('kritik/HapusKritik')?>" method="POST">
                                                                <div class="modal-footer">
                                                                    <input type="hidden" class="hapus" name="id">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                    <button type="submit" class="btn btn-primary">Hapus</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
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