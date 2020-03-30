<div class="well well-lg">

    <div class="container">
        <h2>Daftar Kerja</h2>
        <span>Halaman untuk melakukan pendaftaran kerja.</span>
    </div>

</div>

<div class="container">

    <div class="alert alert-info">
        <i class="glyphicon glyphicon-info-sign"></i>Silakan isi data berikut dengan data diri untuk promosikan dalam mencari kerja.
    </div>

    <div class="panel panel-primary">

        <div class="panel-heading">
            Form Data Pekerja
        </div>

        <div class="panel-body">

            <?php
            if(isset($status))
            { ?>
                <div class="alert alert-<?= $status;?>">
                    <?= $message; ?>
                </div>
                <?php
            }
            ?>

            <form method="post">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap :</label>
                            <input class="form-control" id="nama" required type="text" name="nama">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email :</label>
                            <input class="form-control" id="email" required type="text" name="email">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan yang diinginkan :</label>
                            <input class="form-control" id="pekerjaan" required type="text" name="pekerjaan">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="alamat">Alamat :</label>
                            <input class="form-control" id="alamat" required type="text" name="alamat">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="resume">Resume/Tenttang Anda :</label>
                            <input class="form-control" id="resume" required type="text" name="resume">
                        </div>
                    </div>
                </div>

                <button type="submit" name="submit" class="btn btn-success btn-lg"><i class="glyphicon glyphicon-send"></i> Submit</button>
                <button type="reset" class="btn btn-danger btn-lg">Reset</button>

            </form>

        </div>

    </div>

</div>