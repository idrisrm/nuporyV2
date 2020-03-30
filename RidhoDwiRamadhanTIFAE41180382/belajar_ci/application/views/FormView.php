<h1>Tambah Artikel</h1>
<form method="post">
    <div>
        <label for="judul">judul :</label><br>
        <input type="text" id="judul" name="judul"><br>
    </div>
    <div>
        <label for="penulis">penulis :</label><br>
        <input type="text" id="penulis" name="penulis"><br>
    </div>
    <div>
        <label for="isi">isi :</label><br>
        <textarea name="isi" id="isi" cols="50" rows="8">
        </textarea>
    </div>
    <button type="submit">submit</button>
    <button type="reset">reset</button>
    <a href="<?= base_url()?>"><button type="button">Kembali</button></a>
</form>