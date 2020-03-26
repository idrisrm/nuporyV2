<div class="row">
    <div class="col-md-2">
        <h2>Judul</h2>
    </div>
    <div class="col-md">
        <h2> : <?= $artikel[0]->judul ?></h2>
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        <h2>Penulis</h2>
    </div>
    <div class="col-md">

        <h2> : <?= $artikel[0]->penulis ?></h2>
    </div>
</div>
<div class="alert alert-dark" role="alert">
    <?= $artikel[0]->isi ?>
</div>
<a class="btn btn-danger" href="<?= base_url() ?>">Kembali</a>