<div class="col-12">
    <form action="<?php echo $action; ?>" method="post" class="card">
        <div class="card">
            <div class="card-body">
                <div class="col-md-6">

                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Kode </label>
                        <div class="col">
                            <input type="text" class="form-control" name="kode" id="kode" placeholder="Kode" value="<?php echo $kode; ?>" />
                            <small class="form-hint"><?php echo form_error('kode') ?></small>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Nama </label>
                        <div class="col">
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
                            <small class="form-hint"><?php echo form_error('nama') ?></small>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Alamat </label>
                        <div class="col">
                            <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
                            <small class="form-hint"><?php echo form_error('alamat') ?></small>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Kota </label>
                        <div class="col">
                            <input type="text" class="form-control" name="kota" id="kota" placeholder="Kota" value="<?php echo $kota; ?>" />
                            <small class="form-hint"><?php echo form_error('kota') ?></small>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Contact Person </label>
                        <div class="col">
                            <input type="text" class="form-control" name="contact_person" id="contact_person" placeholder="Contact Person" value="<?php echo $contact_person; ?>" />
                            <small class="form-hint"><?php echo form_error('contact_person') ?></small>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Telepon </label>
                        <div class="col">
                            <input type="text" class="form-control" name="telepon" id="telepon" placeholder="Telepon" value="<?php echo $telepon; ?>" />
                            <small class="form-hint"><?php echo form_error('telepon') ?></small>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-3 col-form-label required">Rentang Waktu </label>
                        <div class="col">
                            <input type="text" class="form-control" name="rentang_waktu" id="rentang_waktu" placeholder="Rentang Waktu" value="<?php echo $rentang_waktu; ?>" />
                            <small class="form-hint"><?php echo form_error('rentang_waktu') ?></small>
                        </div>
                    </div>

                    <input type="hidden" name="id" value="<?php echo $id; ?>" />

                </div>
            </div>
            <div class="card-footer text-end col-md-6">
                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                <a href="<?php echo site_url('t01_customer') ?>" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </form>
</div>
