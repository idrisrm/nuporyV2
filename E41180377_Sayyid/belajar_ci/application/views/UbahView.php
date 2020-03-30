
<h3>Ubah Artikel</h3>
<form action="" method="post">
<div>
    <label for="judul">Judul</label><br>
    <input type="text" name="judul" id="judul" value="<?php echo $artikel[0]->judul?>"><br>
</div>
<div>
    <label for="penulis">Penulis</label><br>
    <input type="text" name="penulis" id="penulis" value="<?php echo $artikel[0]->penulis?>"><br>
</div>
<div>
    <label for="isi">Isi</label><br>
    <textarea name="isi" id="isi" cols="50" rows="8"><?php echo $artikel[0]->isi ?></textarea>
</div>
<button type="submit"> Submit </button>
<button type="reset"> Reset </button>
<a href="<?php echo base_url()?>"><button type="button">Kembali</button></a>

</form>
