<!DOCTYPE html>
<html lang="en">
<head>
    <title>Website Bootsrap dengan CodeIgniter</title>
    <link href="<?php echo base_url("bootstrap/css/bootstrap.min.css");?>" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php echo base_url("bootstrap/js/bootstrap.min.js");?>"></script>
</head>
<body>
    
    <nav class="navbar navbar-fixed-top navbar-inverse">

        <div class="containter">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle Navigation<span>
                    <span class="icon-bar"><span>
                    <span class="icon-bar"><span>
                    <span class="icon-bar"><span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url();?>">Pencari Kerja</a>
            </div>

            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="<?php echo site_url(); ?>">Home</a></li>
                    <li><a href="<?php echo site_url("daftar");?>">Daftar Kerja</a></li>
                    <li><a href="<?php echo site_url("pendaftarkerja");?>">Pendaftar Kerja</a></li>
                    <li><a href="<?php echo site_url("tentang");?>">Tentang</a></li>
                    <li><a href="<?php echo site_url("contact");?>">contact</a></li>
                </ul>
            </div>

        </div>

    </nav>

</body>
</html>