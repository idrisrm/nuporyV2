<h1> CRUD dengan Codeigniter </h1>
<h3><a href="index.php/home/tambah">+ Tambah Artikel</a></h3>
<table border="1" cellpadding="5">
    <tr>
        <th>judul</th>
        <th>penulis</th>
        <th>isi</th>
        <th></th>
    </tr>
    <?php
        foreach ($artikel as $row){
    ?>
    <tr>
        <td><?php echo $row->judul;?></td>
        <td><?php echo $row->penulis;?></td>
        <td><?php echo substr ($row->isi, 0, 70);
        ?>...</td>
        <td>
            <a href="<?php echo "index.php/home/detail/"
            . $row->id; ?>">detail</a>
            <a href="<?php echo "index.php/home/ubah/"
            . $row->id; ?>">ubah</a>
            <a href="<?php echo "index.php/home/hapus/"
            . $row->id; ?>">hapus</a>
        </td>
    </tr>
    <?php
        }
    ?>
</table>
