<div class="well well-lg">
    <div class="container">
        <h2>Detail Pencari Kerja</h2>
        <span>Detail untuk <b><?= $pendaftar->nama;?></b>.</span>
    </div>
</div>
<div class="container">

    <table class="well table table-bordered">
        <tr>
            <td width="200">
                Nama
            </td>
            <td width="1">:</td>
            <td>
                <?= $pendaftar->nama;?>
            </td>
        </tr>
        <tr>
            <td>
                Email
            </td>
            <td width="1">:</td>
            <td>
                <?= $pendaftar->email;?>
            </td>
        </tr>
        <tr>
            <td>
                Pekerjaan yang dicari
            </td>
            <td width="1">:</td>
            <td>
                <?= $pendaftar->pekerjaan;?>
            </td>
        </tr>
        <tr>
            <td>
                Alamat
            </td>
            <td width="1">:</td>
            <td>
                <?= $pendaftar->alamat;?>
            </td>
        </tr>
        <tr>
            <td>
                Resume/Tentang
            </td>
            <td width="1">:</td>
            <td>
                <?= $pendaftar->resume;?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>
                <a href="maito:<?= $pendaftar->email;?>" class="btn btn-danger"><i class="glyphicon glyphicon-envelope"></i>Kirim Email</a>
            </td>
        </tr>
    </table>

</div>