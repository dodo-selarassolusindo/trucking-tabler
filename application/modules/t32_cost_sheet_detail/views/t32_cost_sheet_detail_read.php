
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><?= $judul_form ?></h3>
        </div>
        <div class="card-body">
            <table class="table">
                <tr><td>Job Order</td><td><?php echo $job_order; ?></td></tr>
                <tr><td>Vendor</td><td><?php echo $vendor; ?></td></tr>
                <tr><td>Cost</td><td><?php echo $cost; ?></td></tr>
                <tr><td>Armada</td><td><?php echo $armada; ?></td></tr>
                <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
                <tr><td>Qty</td><td><?php echo $qty; ?></td></tr>
                <tr><td>Nilai</td><td><?php echo $nilai; ?></td></tr>
                <tr><td>Nominal</td><td><?php echo $nominal; ?></td></tr>
                <tr><td>Nomor Ivr</td><td><?php echo $nomor_ivr; ?></td></tr>
                <tr><td>Is Hapus</td><td><?php echo $is_hapus; ?></td></tr>
            </table>
        </div>
        <div class="card-footer text-start">
            <a href="<?= site_url('t32_cost_sheet_detail') ?>" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
