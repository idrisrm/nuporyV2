<div class="jumbotron">
    <div class="container">
        <h2>Selamat datang di Website Job Placement Center Politeknik Negeri Jember</h2>
        <p>Kami siap membantu Anda mendapatkan pekerjaan dengan mudah, cukup klik tombol Daftar Kerja,
            maka data Anda akan kami promosikan untuk mendapatkan pekerjaan sesuai dengan yang Anda inginkan.</p>
        <p>
            <a class="btn btn-success btn-lg" href="<?php echo site_url("daftar");?>" role="button"><i class="glyphicon glyphicon-briefcase"></i>Daftar Kerja</a>
            <a class="btn btn-primary btn-lg" href="<?php echo site_url("pendaftarkerja"); ?>" role="button"><i class="glyphicon glyphicon-briefcase"></i>Lihat Pendaftar</a>
        </p>
    </div>
</div>

<div class="container">
    <h3>Random Pendaftar Kerja</h3>
    <hr>

    <div class="row">

        <?php
        foreach($pendaftar as $pencari)
        {
        ?>
            <div class="col-md-6">
                <table class="well table table-bordered">
                    <tr>
                        <td rowspan="4" width="1">
                            <img class="img-circle" src="people.png" alt="Generic placeholder image" width="140" height="140">
                        </td>
                        <td width="100">
                            Nama
                        </td>
                        <td width="1">:</td>
                        <td>
                            <?php echo $pencari->nama;?>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Email
                        </td>
                        <td width="1">:</td>
                        <td>
                            <?php echo $pencari->email;?>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Pekerjaan
                        </td>
                        <td width="1">:</td>
                        <td>
                            <?php echo $pencari->pekerjaan;?>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3">
                            <a href="<?php echo site_url("pendaftarkerja/detail/".$pencari->id);?>" class="btn btn-danger btn-sm">
                            <i class="glyphicon glyphicon-search"></i>Detail Pekerja</a>
                        </td>
                    </tr>
                </table>
            </div>
        <?php

        }
        ?>
    </div>
    <a class="btn btn-primary" href="<?php echo site_url("pendaftarkerja");?>"><i class="glymphicon glymphicon-task"></i>Tampilkan Semua</a>
</div>