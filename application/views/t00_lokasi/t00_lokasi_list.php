<link rel="stylesheet" href="<?php echo base_url('assets/datatables/jquery.dataTables.min.css') ?>\"/>
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <div class="row" style="margin-bottom: 10px">
                <div class="col-md-4">
                    <?php echo anchor(site_url('t00_lokasi/create'),'Create', 'class="btn btn-primary"'); ?>
                </div>
                <div class="col-md-4 text-center">
                    <div style="margin-top: 8px" id="message">
                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                    </div>
                </div>
                <div class="col-md-1 text-right">
                </div>
                <div class="col-md-3 text-right">
                    <form action="<?php echo site_url('t00_lokasi/index'); ?>" class="form-inline" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                            <span class="input-group-btn">
                                <?php
                                    if ($q <> '')
                                    {
                                        ?>
                                        <a href="<?php echo site_url('t00_lokasi'); ?>" class="btn btn-default">Reset</a>
                                        <?php
                                    }
                                ?>
                              <button class="btn btn-primary" type="submit">Search</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-bordered" style="margin-bottom: 10px" id="example">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($t00_lokasi_data as $t00_lokasi) { ?>
                <tr>
                    <td width="80px"><?php echo ++$start ?></td>
                    <td><?php echo $t00_lokasi->nama ?></td>
                    <td style="text-align:center" width="200px">
                    <?php
                        echo anchor(site_url('t00_lokasi/read/'.$t00_lokasi->id),'Read');
                        echo ' | ';
                        echo anchor(site_url('t00_lokasi/update/'.$t00_lokasi->id),'Update');
                        echo ' | ';
                        echo anchor(site_url('t00_lokasi/delete/'.$t00_lokasi->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                    ?>
                    </td>
                </tr>
                <?php } ?>
            </table>
            <div class="row">
                <div class="col-md-6">
                    <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
                    <?php echo anchor(site_url('t00_lokasi/excel'), 'Excel', 'class="btn btn-primary"'); ?>
                </div>
                <div class="col-md-6 text-right">
                    <?php echo $pagination ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery-3.7.0.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        new DataTable('#example');
    }
</script>
