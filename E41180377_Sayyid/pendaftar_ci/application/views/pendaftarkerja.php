<div class="well well-lg">
    <div class="container">
        <h2>Daftar Pencari kerja</h2>
        <span>Halaman untuk melakukan pendaftaran kerja.</span>
    </div>
</div>
<div class="container">
    <table class="table">
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Pekerjaan</th>
            <th width="1">Detail</th>
        </tr>
        <?php
            foreach ($pendaftar as $pencari)
            {
        ?>
            <tr>
                <td>
                    <b><?php echo $pencari->nama;?></b>
                </td>
                <td><?php echo $pencari->email;?></td>
                <td><?php echo $pencari->pekerjaan;?></td>
                <td>
                    <a href="<?php echo site_url("pendaftarkerja/detail/". $pencari->id);?>" class="btn btn-block btn-primary btn-sm">
                    <i class="glyphicon glyphicon-search"></i>Detail</a>
                </td>
            </tr>
            <?php
            }
            ?>
    </table>
</div>