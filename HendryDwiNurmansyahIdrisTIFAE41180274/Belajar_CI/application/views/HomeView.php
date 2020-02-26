<!-- <h1>Masukan Data Anda</h1>

Nama : <?= $data["nama"] ?><br>
Status : <?= $data["Status"] ?><br>
Website : <?= $data["Website"] ?><br>

<form action="" method="POST">
    <label for="nama">Nama</label><br>
    <input type="text" name="nama" id="nama"><br>
    <label for="email" for="email">Email</label><br>
    <input type="text" name="email" id="email"><br><br>
    <button type="submit" name="submit">Kirim</button>

</form> -->
<h1>Upload Gambar</h1>
<?php
echo $error;
if ($data) { ?>

    <h3>Gambar Berhasil Di Upload</h3>
    <img src="../gambar/<?= $data["file_name"] ?>" width="200">
<?php } ?>

<form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="gambar" id="gambar"><br><br>
    <button type="submit" name="submit">Kirim</button>
</form>