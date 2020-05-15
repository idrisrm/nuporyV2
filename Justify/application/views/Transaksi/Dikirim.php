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
                        <h4 class="card-title">Bunga Dikirim</h4>
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
                                    <?php foreach($dikirim as $data){?>
                                    <tr>
                                        <td><?= $data["tanggal_transaksi"]?></td>
                                        <td><?= $data["jenis_pembayaran"]?></td>
                                        <td><?= $data["status_transaksi"]?></td>
                                        <td><?= $data["nama"]?></td>
                                        <td><?= substr($data["alamat"], 0, 20) ?>...</td>
                                        <td><?= $data["total"]?></td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                            SELESAI
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Peringatan !</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Bunga telah dikirim ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
                                                    <button type="button" class="btn btn-primary">SELESAI</button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
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