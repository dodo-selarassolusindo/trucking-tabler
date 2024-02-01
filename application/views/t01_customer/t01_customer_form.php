<!-- <!doctype html>
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
        <h2 style="margin-top:0px">T01_customer <?php echo $button ?></h2> -->
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <div class="col-md-6">
                <form action="<?php echo $action; ?>" method="post">
                    <!-- <div class="card-header">
                        <h3 class="card-title">Horizontal form</h3>
                    </div> -->
                    <!-- <div class="card-body"> -->

                    <!-- <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Email address</label>
                        <div class="col">
                            <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
                            <small class="form-hint">We'll never share your email with anyone else.</small>
                        </div>
                    </div> -->

                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Kode <?php echo form_error('kode') ?></label>
                        <div class="col">
                            <input type="text" class="form-control" name="kode" id="kode" placeholder="Kode" value="<?php echo $kode; ?>" />
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Nama <?php echo form_error('nama') ?></label>
                        <div class="col">
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Alamat <?php echo form_error('alamat') ?></label>
                        <div class="col">
                            <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Kota <?php echo form_error('kota') ?></label>
                        <div class="col">
                            <input type="text" class="form-control" name="kota" id="kota" placeholder="Kota" value="<?php echo $kota; ?>" />
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Contact Person <?php echo form_error('contact_person') ?></label>
                        <div class="col">
                            <input type="text" class="form-control" name="contact_person" id="contact_person" placeholder="Contact Person" value="<?php echo $contact_person; ?>" />
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Telepon <?php echo form_error('telepon') ?></label>
                        <div class="col">
                            <input type="text" class="form-control" name="telepon" id="telepon" placeholder="Telepon" value="<?php echo $telepon; ?>" />
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Rentang Waktu <?php echo form_error('rentang_waktu') ?></label>
                        <div class="col">
                            <input type="text" class="form-control" name="rentang_waktu" id="rentang_waktu" placeholder="Rentang Waktu" value="<?php echo $rentang_waktu; ?>" />
                        </div>
                    </div>

                    <input type="hidden" name="id" value="<?php echo $id; ?>" />



                        <!-- <div class="mb-3 row">
                            <label class="col-3 col-form-label required">Email address</label>
                            <div class="col">
                                <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
                                <small class="form-hint">We'll never share your email with anyone else.</small>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-3 col-form-label required">Password</label>
                            <div class="col">
                                <input type="password" class="form-control" placeholder="Password">
                                <small class="form-hint">
                                    Your password must be 8-20 characters long, contain letters and numbers, and must not contain
                                    spaces, special characters, or emoji.
                                </small>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-3 col-form-label">Select</label>
                            <div class="col">
                                <select class="form-select">
                                    <option>Option 1</option>
                                    <optgroup label="Optgroup 1">
                                        <option>Option 1</option>
                                        <option>Option 2</option>
                                    </optgroup>
                                    <option>Option 2</option>
                                    <optgroup label="Optgroup 2">
                                        <option>Option 1</option>
                                        <option>Option 2</option>
                                    </optgroup>
                                    <optgroup label="Optgroup 3">
                                        <option>Option 1</option>
                                        <option>Option 2</option>
                                    </optgroup>
                                    <option>Option 3</option>
                                    <option>Option 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-3 col-form-label pt-0">Checkboxes</label>
                            <div class="col">
                                <label class="form-check">
                                    <input class="form-check-input" type="checkbox" checked>
                                    <span class="form-check-label">Option 1</span>
                                </label>
                                <label class="form-check">
                                    <input class="form-check-input" type="checkbox">
                                    <span class="form-check-label">Option 2</span>
                                </label>
                                <label class="form-check">
                                    <input class="form-check-input" type="checkbox" disabled>
                                    <span class="form-check-label">Option 3</span>
                                </label>
                            </div>
                        </div> -->
                    <!-- </div> -->
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                        <a href="<?php echo site_url('t01_customer') ?>" class="btn btn-default">Cancel</a>
                    </div>
                </form>
            </div>

        <!-- <form action="<?php echo $action; ?>" method="post">
            <div class="form-group">
                <label class="col-3 col-form-label required">Kode <?php echo form_error('kode') ?></label>
                <input type="text" class="form-control" name="kode" id="kode" placeholder="Kode" value="<?php echo $kode; ?>" />
            </div>
            <div class="form-group">
                <label class="col-3 col-form-label required">Nama <?php echo form_error('nama') ?></label>
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
                <label class="col-3 col-form-label required">Contact Person <?php echo form_error('contact_person') ?></label>
                <input type="text" class="form-control" name="contact_person" id="contact_person" placeholder="Contact Person" value="<?php echo $contact_person; ?>" />
            </div>
            <div class="form-group">
                <label class="col-3 col-form-label required">Telepon <?php echo form_error('telepon') ?></label>
                <input type="text" class="form-control" name="telepon" id="telepon" placeholder="Telepon" value="<?php echo $telepon; ?>" />
            </div>
            <div class="form-group">
                <label for="tinyint">Rentang Waktu <?php echo form_error('rentang_waktu') ?></label>
                <input type="text" class="form-control" name="rentang_waktu" id="rentang_waktu" placeholder="Rentang Waktu" value="<?php echo $rentang_waktu; ?>" />
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
            <a href="<?php echo site_url('t01_customer') ?>" class="btn btn-default">Cancel</a>
        </form> -->
        </div>
    </div>
</div>
    <!-- </body>
</html> -->
