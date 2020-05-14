<div class="page-wrapper">
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- basic table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tagihan User</h4>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                    <tr>
                                        <th>Tanggal Transaksi</th>
                                        <th>Pembayaran</th>
                                        <th>Status</th>
                                        <th>Nama Pembeli</th>
                                        <th>Alamat Pengiriman</th>
                                        <th>Total Tagihan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($tagihan as $data){?>
                                    <tr>
                                        <td><?= $data["tanggal_transaksi"]?></td>
                                        <td><?= $data["jenis_pembayaran"]?></td>
                                        <td><?= $data["status_transaksi"]?></td>
                                        <td><?= $data["nama"]?></td>
                                        <td><?= $data["alamat"]?></td>
                                        <td><?= $data["total"]?></td>
                                        <td>
                                            <button class="btn btn-primary">Lihat</button>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>