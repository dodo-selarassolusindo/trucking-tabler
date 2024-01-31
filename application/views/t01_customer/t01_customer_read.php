<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">T01_customer Read</h2>
        <table class="table">
            <tr><td>Kode</td><td><?php echo $kode; ?></td></tr>
            <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
            <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
            <tr><td>Kota</td><td><?php echo $kota; ?></td></tr>
            <tr><td>Contact Person</td><td><?php echo $contact_person; ?></td></tr>
            <tr><td>Telepon</td><td><?php echo $telepon; ?></td></tr>
            <tr><td>Rentang Waktu</td><td><?php echo $rentang_waktu; ?></td></tr>
            <tr><td></td><td><a href="<?php echo site_url('t01_customer') ?>" class="btn btn-default">Cancel</a></td></tr>
        </table>
    </body>
</html>