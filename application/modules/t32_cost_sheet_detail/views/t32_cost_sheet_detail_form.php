<script type="text/javascript">
    var i = 0;
    var update = '<?= $this->uri->segment(2) ?>';
</script>
<div class="col-12">
    <form action="<?php echo $action; ?>" method="post" class="card">
        <div class="card-header">
            <h3 class="card-title"><?= $button ?></h3>
        </div>
        <div class="card-body col-6">
            <div class="row">
                <label class="col-4 col-form-label required">Nomor Job Order </label>
                <div class="col">
                    <!-- <input type="text" class="form-control" name="nomor" id="nomor" placeholder="Nomor" value="<?= $nomor ?>" /> -->
                    <select class="form-control select2" name="job_order" id="job_order">
                        <option value="">-</option>
                        <?php foreach($all_job_order as $row) { ?>
                        <option value="<?= $row->id ?>"><?= $row->nomor ?></option>
                        <?php } ?>
                    </select>
                    <small class="form-hint"><?= form_error('job_order') ?></small>
                </div>
            </div>
            <div class="row">
                <label class="col-4 col-form-label">Tanggal Job Order </label>
                <label class="col col-form-label"><div id="tanggal_job_order"></div> </label>
            </div>
            <div class="row">
                <label class="col-4 col-form-label">Customer </label>
                <label class="col col-form-label"><div id="customer"></div> </label>
            </div>
            <div class="row">
                <label class="col-4 col-form-label">Shipper </label>
                <label class="col col-form-label"><div id="shipper"></div> </label>
            </div>
            <div class="row">
                <label class="col-4 col-form-label">Tanggal Muat </label>
                <label class="col col-form-label"><div id="tanggal_muat"></div> </label>
            </div>
            <div class="mb-3 row">
                <label class="col-4 col-form-label">Lokasi </label>
                <label class="col col-form-label"><div id="lokasi"></div> </label>
            </div>
            <input type="hidden" name="id" value="<?= $id ?>" />

            <!-- detail job order -->
            <div class="row">
                <label class="col-4 col-form-label">Detail Armada</label>
                <div class="col">
                    <!-- <input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Lokasi" value="<?= $lokasi ?>" /> -->
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Armada</th>
                                <th>Nomor Container</th>
                            </tr>
                        </thead>
                        <tbody id="table_detail">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- detail cost sheet -->
        <div class="card-body col" id="bookmark_table_detail">
            <div class="mb-3 row">
                <label class="col-2 col-form-label required">Detail Cost Sheet</label>
                <div class="col">
                    <!-- <input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Lokasi" value="<?= $lokasi ?>" /> -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Armada</th>
                                <th>Nomor Container</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="table_detail">

                            <?php if ($this->uri->segment(2) == 'create') { ?>

                            <!-- create -->
                            <tr id="table_row_0">
                                <td>
                                    <select class="form-control select2" name="armada[]">
                                        <option value="">-</option>
                                        <!-- <?php foreach($all_armada as $row) { ?>
                                            <option value="<?php echo $row->id ?>"><?= $row->merk . ' - ' . $row->nomor_polisi ?></option>
                                        <?php } ?> -->
                                    </select>
                                </td>
                                <td><input type="text" class="form-control" name="nomor_container[]"></td>
                                <td>&nbsp;</td>
                            </tr>
                            <?php } else { ?>

                            <!-- update -->
                            <?php foreach($all_job_order_detail as $key => $detail) { ?>
                                <script type="text/javascript">
                                    ++i
                                </script>
                                <tr id="table_row_<?= $key ?>">
                                    <td>
                                        <select class="form-control select2" name="armada[]">
                                            <option value="">-</option>
                                            <!-- <?php foreach($all_armada as $row) { ?>
                                                <option value="<?php echo $row->id ?>" <?= $row->id == $detail->armada ? 'selected' : '' ?>><?= $row->merk . ' - ' . $row->nomor_polisi ?></option>
                                            <?php } ?> -->
                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control" name="nomor_container[]" value="<?= $detail->nomor_container ?>"></td>
                                    <td><?= $key == 0 ? '&nbsp;' : '<a href="#bookmark_table_detail" onclick="hapus_detail('.$key.')" class="text-danger">Hapus</a>' ?></td>
                                </tr>
                            <?php } ?>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td><a href="#bookmark_table_detail" onclick="tambah_detail()" class="btn btn-primary mb-2 btn-sm">Tambah Armada</a></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <div class="card-footer text-start">
            <button type="submit" class="btn btn-primary"><?= $button ?></button>
            <a href="<?= site_url('t32_cost_sheet_detail') ?>" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function() {

        $('#job_order').on('change', function () {
            $.ajax({
                type: "POST", //we are using POST method to submit the data to the server side
                url: '<?= site_url() ?>t30_job_order/get_by_id_json_', // get the route value
                data: {id: $(this).val()}, // our serialized array data for server side
                success: function (response) {//once the request successfully process to the server side it will return result here
                    var date = response[0].tanggal_job_order
                    $('#tanggal_job_order').html(date.split("-").reverse().join("-"))
                	$('#customer').html(response[0].customer_nama)
                	$('#shipper').html(response[0].shipper_nama)
                    var date = response[0].tanggal_muat
                    $('#tanggal_muat').html(date.split("-").reverse().join("-"))
                    $('#lokasi').html(response[0].lokasi_nama)
                    $('#table_detail').empty()
                    var no = 0
                    $.each(response, function(index, value) {
                        // console.log(value.armada + ' - ' + value.nomor_container)
                        $('#table_detail').append(
                            `
                            <tr>
                                <td>`+ ++no +`</td>
                                <td>`+value.merk+' - '+value.nomor_polisi+`</td>
                                <td>`+value.nomor_container+`</td>
                            </tr>
                            `
                        )
                    })
                },
    	    })
        })

    })

    function tambah_detail()
    {
        ++i;
        $('#table_detail').append(
            `
            <tr id="table_row_`+i+`">
                <td>
                    <select class="form-control select2" name="armada[]">
                        <option value="">-</option>
                        <?php //foreach($all_armada as $row) { ?>
                            <option value="<?= '' //$row->id ?>"><?= '' //$row->merk . ' - ' . $row->nomor_polisi ?></option>
                        <?php //} ?>
                    </select>
                </td>
                <td>
                    <input type="text" class="form-control" name="nomor_container[]">
                </td>
                <td>
                    <a href="#bookmark_table_detail" onclick="hapus_detail(`+i+`)" class="text-danger">Hapus</a>
                </td>
            </tr>
            `
        );
        $('.select2').select2();
    }

    function hapus_detail(index)
    {
		$('#table_row_'+index).remove();
	}
</script>
