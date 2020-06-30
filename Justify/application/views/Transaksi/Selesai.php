
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
                        <h4 class="card-title">Transaksi Selesai</h4>
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
                                    <?php foreach($selesai as $data){?>
                                    <tr>
                                        <td><?= date('d F Y', $data["tanggal_transaksi"]) ?></td>
                                        <td>Transfer</td>
                                        <td><?= $data["status_transaksi"]?></td>
                                        <td><?= $data["nama"]?></td>
                                        <td><?= substr($data["alamat"], 0, 20) ?>...</td>
                                        <td><?= $data["total"]?></td>
                                        <td>
                                                <a class="btn btn-primary" href="<?= base_url('Transaksi/DetailSelesai/') . $data['id_transaksi'] ?>">Lihat</a>
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