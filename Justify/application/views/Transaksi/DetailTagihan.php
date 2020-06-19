<div class="page-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Detail Tagihan</h4>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                    <tr>
                                        <th>Nama Bunga</th>
                                        <th>Jumlah</th>
                                        <th>Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($DetailTagihan as $data) { ?>
                                        <tr>
                                            <td><?= $data["nama_bunga"] ?></td>
                                            <td><?= $data["jumlah"] ?></td>
                                            <td><?= $data["total_harga"] ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                            <div class="alert alert-success" role="alert">
                                <p>Nama Pembeli <B><?= $DetailTagihan[0]['nama'] ?></B></p>
                                <p>Alamat Pengiriman <B><?= $DetailTagihan[0]['alamat_pengiriman'] ?></B></p>
                                <p>Total tagihan <B><?= $DetailTagihan[0]['total'] ?></B></p>

                                <div class="row">
                                    <div class="col-md-3">

                                        <a class="btn btn-primary" href="<?= base_url('assets/img/fotobukti/') . $data['bukti'] ?>">Lihat Bukti Pembayaran</a>
                                    </div>
                                    <div class="col-md-9">
                                        <form method="POST" action="<?= base_url('Transaksi/TerimaPesanan') ?>">
                                            <input type="hidden" name="id_transaksi" id="id_transaksi" value="<?= $DetailTagihan[0]['id_transaksi'] ?>">
                                            <button type="submit" class="btn btn-success">Terima Pesanan</button>
                                        </form>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>