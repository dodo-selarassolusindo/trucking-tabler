
<div class="col-12">
    <form action="<?php echo $action; ?>" method="post" class="card">
        <div class="card-header">
            <h3 class="card-title"><?= $button ?></h3>
        </div>
        <div class="card-body col-6">
            <div class="mb-3 row">
                <label class="col-3 col-form-label required">Job Order </label>
                <div class="col">
                    <input type="text" class="form-control" name="job_order" id="job_order" placeholder="Job Order" value="<?= $job_order ?>" />
                    <small class="form-hint"><?= form_error('job_order') ?></small>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-3 col-form-label required">Vendor </label>
                <div class="col">
                    <input type="text" class="form-control" name="vendor" id="vendor" placeholder="Vendor" value="<?= $vendor ?>" />
                    <small class="form-hint"><?= form_error('vendor') ?></small>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-3 col-form-label required">Cost </label>
                <div class="col">
                    <input type="text" class="form-control" name="cost" id="cost" placeholder="Cost" value="<?= $cost ?>" />
                    <small class="form-hint"><?= form_error('cost') ?></small>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-3 col-form-label required">Armada </label>
                <div class="col">
                    <input type="text" class="form-control" name="armada" id="armada" placeholder="Armada" value="<?= $armada ?>" />
                    <small class="form-hint"><?= form_error('armada') ?></small>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-3 col-form-label required">Keterangan </label>
                <div class="col">
                    <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?= $keterangan ?></textarea>
                    <small class="form-hint"><?= form_error('keterangan') ?></small>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-3 col-form-label required">Qty </label>
                <div class="col">
                    <input type="text" class="form-control" name="qty" id="qty" placeholder="Qty" value="<?= $qty ?>" />
                    <small class="form-hint"><?= form_error('qty') ?></small>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-3 col-form-label required">Nilai </label>
                <div class="col">
                    <input type="text" class="form-control" name="nilai" id="nilai" placeholder="Nilai" value="<?= $nilai ?>" />
                    <small class="form-hint"><?= form_error('nilai') ?></small>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-3 col-form-label required">Nominal </label>
                <div class="col">
                    <input type="text" class="form-control" name="nominal" id="nominal" placeholder="Nominal" value="<?= $nominal ?>" />
                    <small class="form-hint"><?= form_error('nominal') ?></small>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-3 col-form-label required">Nomor Ivr </label>
                <div class="col">
                    <input type="text" class="form-control" name="nomor_ivr" id="nomor_ivr" placeholder="Nomor Ivr" value="<?= $nomor_ivr ?>" />
                    <small class="form-hint"><?= form_error('nomor_ivr') ?></small>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-3 col-form-label required">Is Hapus </label>
                <div class="col">
                    <input type="text" class="form-control" name="is_hapus" id="is_hapus" placeholder="Is Hapus" value="<?= $is_hapus ?>" />
                    <small class="form-hint"><?= form_error('is_hapus') ?></small>
                </div>
            </div>
            <input type="hidden" name="id" value="<?= $id ?>" />
        </div>
        <div class="card-footer text-start">
            <button type="submit" class="btn btn-primary"><?= $button ?></button>
            <a href="<?= site_url('t32_cost_sheet_detail') ?>" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>