<h1> Upload Gambar </h1>
<?php
echo $error;
if($data){
    ?>
    <h3>Gambar Berhasil di Upload</h3>
    <img src="../gambar/<?php echo $data ["file_name"];?>"
    width="200">
    <?php
}
?>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="gambar" id="gambar"/>
    <button type="submit">Upload</button>
</form>