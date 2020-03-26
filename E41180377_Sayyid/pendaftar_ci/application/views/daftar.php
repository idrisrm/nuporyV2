<div class="well well-lg">
    <div class="container">
        <h2>Daftar kerja</h2>
        <span>Halaman untuk melakukan pendaftaran kerja.</span>
    </div>
</div>
<div class="container">
    <div class="alert alert-info">
        <i class="glyphicon glyphicon-info-sign"></i> Silakan isi data berikut dengan data diri untuk kami promosikan
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            Form Data Pekerja
        </div>
        <div class="panel-body">
        <?php
            if(isset($status))
            {
                ?>    
                <div class="alert alert-<?php echo $status;?>">
                    <?php echo $message;?>
                </div>
                <?php
            }
                ?>
            <form method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap :</label>
                            <input name="nama" class="form-control" id="nama" required type="text">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email :</label>
                            <input name="email" class="form-control" id="email" required type="email">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan yang diinginkan :</label>
                            <input name="pekerjaan" class="form-control" id="pekerjaan" required type="text">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="alamat">Alamat :</label>
                            <textarea name="alamat" rows="4" id="alamat" required class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="resume">Resume?Tentang Anda :</label>
                            <textarea name="resume" rows="8" id="resume" required class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-success btn-lg"><i class="glyphicon glyphicon-send"></i> Submit</button>
                <button type="reset" class="btn btn-danger btn-lg">Reset</button>
            </form>
        </div>
    </div>
</div>