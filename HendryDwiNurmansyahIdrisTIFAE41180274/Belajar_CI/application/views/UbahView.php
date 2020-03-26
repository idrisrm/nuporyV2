<h1>Ubah Artikel</h1>



<form method="POST">
    <div class="form-group">
        <label for="jduul">Judul</label>
        <input type="text" class="form-control" name="judul" id="judul" value="<?= $artikel[0]->judul?>" placeholder="Judul Artikel">
    </div>
    <div class="form-group">
        <label for="penulis">Penulis</label>
        <input type="text" class="form-control" name="penulis" id="penulis" value="<?= $artikel[0]->penulis?>" placeholder="Penulis Artikel">
    </div>
    <div class="form-group">
        <label for="isi">Isi</label>
        <textarea class="form-control" name="isi" id="isi" rows="3"><?= $artikel[0]->isi?></textarea>
    </div>
    <button class="btn btn-primary" type="submit">Ubah</button>
    <button class="btn btn-success" type="reset">Reset</button>
    <a href="<?= base_url() ?>"><button class="btn btn-danger" type="button">Kembali</button></a>
</form>