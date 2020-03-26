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


<!-- <form action="" method="POST" enctype="multipart/form-data">
<input type="file" name="gambar" id="gambar"><br><br>
<button type="submit" name="submit">Kirim</button>
</form> -->

<!-- <div class="container">
    <h1>Upload Gambar</h1>
    <?php
    echo $error;
    if ($data) { ?>


        <div class="alert alert-success" role="alert">
            <h4>Gambar Berhasil Di Upload</h4>
        </div>
        <img src="../gambar/<?= $data["file_name"] ?>" width="200">
    <?php } ?>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleFormControlFile1">Upload Foto yang tampan</label>
            <input type="file" name="gambar" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <div class="alert alert-primary" role="alert">
            Upload foto dengan bertipe jpg, PNG, GIF. dengan maksimal ukuran 1MB dan dimensi 2160 X 1080.
        </div>
        <button class="btn btn-primary">Kirim</button>
    </form>
</div> -->
<div class="container">
    <h1>CRUD dengan CI</h1>
    <h3><a class="btn btn-primary" href="index.php/home/tambah">+ Tambah Artikel</a></h3>
</div>
<div class="col-md-4">
    <?php if ($this->session->flashdata('data')) { ?>
        <div class="">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data </strong>Berhasil <strong><?= $this->session->flashdata('data'); ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    <?php } elseif ($this->session->flashdata('data1')) { ?>
        <div class="">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data </strong>Berhasil <strong><?= $this->session->flashdata('data1'); ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    <?php } ?>
</div>
<div class="container">
    <table border="1" cellpadding="5">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Isi</th>
            <th>Aksi</th>
        </tr>
        <?php
        $i = 1;
        ?>
        <?php foreach ($artikel as $data) { ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $data->judul ?></td>
                <td><?= $data->penulis ?></td>
                <td><?= substr($data->isi, 0, 50) ?>.....</td>
                <td>
                    <a class="badge badge-primary" class="" href="<?= "index.php/Home/detail/" . $data->id ?>">Detail</a> ||
                    <a class="badge badge-success" href="<?= "index.php/Home/ubah/" . $data->id ?>">Ubah</a> ||
                    <a href="" class="badge badge-danger" data-toggle="modal" data-target="#exampleModal">Hapus</a>
                </td>
            </tr>
            <?php $i++ ?>
        <?php } ?>
    </table>


</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda Yakin Ingin Menghapus Data Ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>

                <a href="<?= "index.php/Home/hapus/" . $data->id ?>"><button type="button" class="btn btn-primary">Hapus</button></a>
            </div>
        </div>
    </div>
</div>