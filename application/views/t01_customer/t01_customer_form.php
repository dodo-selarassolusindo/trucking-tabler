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
        <h2 style="margin-top:0px">T01_customer <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
            <div class="form-group">
                <label for="varchar">Kode <?php echo form_error('kode') ?></label>
                <input type="text" class="form-control" name="kode" id="kode" placeholder="Kode" value="<?php echo $kode; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Nama <?php echo form_error('nama') ?></label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
            </div>
            <div class="form-group">
                <label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
                <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
            </div>
            <div class="form-group">
                <label for="int">Kota <?php echo form_error('kota') ?></label>
                <input type="text" class="form-control" name="kota" id="kota" placeholder="Kota" value="<?php echo $kota; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Contact Person <?php echo form_error('contact_person') ?></label>
                <input type="text" class="form-control" name="contact_person" id="contact_person" placeholder="Contact Person" value="<?php echo $contact_person; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Telepon <?php echo form_error('telepon') ?></label>
                <input type="text" class="form-control" name="telepon" id="telepon" placeholder="Telepon" value="<?php echo $telepon; ?>" />
            </div>
            <div class="form-group">
                <label for="tinyint">Rentang Waktu <?php echo form_error('rentang_waktu') ?></label>
                <input type="text" class="form-control" name="rentang_waktu" id="rentang_waktu" placeholder="Rentang Waktu" value="<?php echo $rentang_waktu; ?>" />
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            <a href="<?php echo site_url('t01_customer') ?>" class="btn btn-default">Cancel</a>
        </form>
    </body>
</html>