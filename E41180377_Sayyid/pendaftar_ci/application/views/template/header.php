<!DOCTYPE html>
<html lang="en">
<head>
    <title>Website Boostrap dengan CodeIgniter</title>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css");?>" type="text/css">
    <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-3.2.1.min.js");?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/js/bootstap.min.js")?>"></script>

    <style>
        #content-produk {
            position: relative;
            padding: 50px 0px 50px 0px;
            background: #f2f2f2;
        }

        #produk-buah.card h2 {
            margin: 0px 50px;
        }

        #produk-buah {
            text-align: justify;
            color: rgba(0, 0, 0, 0.6);
            font-size: 15px;
            align-items: center;
        }

        #produk-buah.card {
            display: inline-block;
            width: 2000px;
            height: 635px;
            /* margin: 0 auto; */
        }

        #content-produk .title p {
            color: rgba(0, 0, 0, 0.6);
            font-size: 15px;
            text-indent: 50px;
        }

        .box-red,
        .box-white,
        .box-blue {
            background-color: #ffffff;
            text-align: center;
            margin: 0px 0px 0px 50px;
            width: 384px;
            float: left;
            padding: 20px 20px;
            border: solid rgba(0, 0, 0, 0.2) 1px;
        }

        .box-red img,
        .box-white img,
        .box-blue img {
            width: 256px;
            height: 256px;
            align-content: center;
        }

        .box-red h3 p,
        .box-white h3 p,
        .box-blue h3 p {
            padding-top: 10px;
            text-indent: 0px;
            text-align: center;
        }

        .box-red .button-alt,
        .box-white .button-alt,
        .box-blue .button-alt {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="<?php echo site_url();?>">Pencari Kerja</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo site_url();?>">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url("daftar");?>">Daftar Kerja</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url("pendaftarkerja");?>">Pendaftar Kerja</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url("tentang");?>">Tentang</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url("contact");?>">Contact</a>
            </li>
            </ul>
        </div>
    </nav>
</body>
</html>
