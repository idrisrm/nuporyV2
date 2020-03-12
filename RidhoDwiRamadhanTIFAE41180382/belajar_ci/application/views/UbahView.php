<h1>Ubah Artikel</h1>
<form method="post">
    <div>
        <label for="judul">judul :</label><br>
        <input type="text" id="judul" name="judul" value="<?= $artikel[0]->judul?>"><br>
    </div>
    <div>
        <label for="penulis">penulis :</label><br>
        <input type="text" id="penulis" name="penulis" value="<?= $artikel[0]->penulis?>"><br>
    </div>
    <div>
        <label for="isi">isi :</label><br>
        <textarea name="isi" id="isi" cols="50" rows="8" ><?= $artikel[0]->isi?>"
        </textarea><br>
    </div>
    <button type="submit">submit</button>
    <button type="reset">reset</button>
    <a href="<?php echo base_url() ?>"><button type="button"> Kembali </button></a>
</form>