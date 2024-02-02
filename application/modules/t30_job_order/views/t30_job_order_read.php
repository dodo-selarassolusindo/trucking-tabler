
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><?= $judul_form ?></h3>
        </div>
        <div class="card-body">
            <table class="table">
                <tr><td>Tanggal Job Order</td><td><?php echo $tanggal_job_order; ?></td></tr>
                <tr><td>Nomor</td><td><?php echo $nomor; ?></td></tr>
                <tr><td>Customer</td><td><?php echo $customer; ?></td></tr>
                <tr><td>Shipper</td><td><?php echo $shipper; ?></td></tr>
                <tr><td>Tanggal Muat</td><td><?php echo $tanggal_muat; ?></td></tr>
                <tr><td>Lokasi</td><td><?php echo $lokasi; ?></td></tr>
            </table>
        </div>
        <div class="card-footer text-start">
            <a href="<?= site_url('t30_job_order') ?>" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
