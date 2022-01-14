
    <div class="container-fluid">
        <h2 style="margin-top:0px">Skema Sertifikasi</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('sertifikasi/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div class="flash-data" data-flashdata="<?= $this->session->userdata('message'); ?>">
                                        
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('sertifikasi/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('sertifikasi'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Sertifikasi</th>
		<th>Kode Sertifikasi</th>
		<th>Action</th>
            </tr><?php
            foreach ($sertifikasi_data as $sertifikasi)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $sertifikasi->nama_sertifikasi ?></td>
			<td><?php echo $sertifikasi->kode_sertifikasi ?></td>
			<td style="text-align:center" width="200px">
                <div class="btn-group mr-2" role="group" aria-label="First group">
                    <a href="<?php echo site_url('skema_sertifikasi/'.$sertifikasi->id) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                    <a href="<?php echo site_url('sertifikasi/update/'.$sertifikasi->id) ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                    <button href="<?php echo site_url('sertifikasi/delete/'.$sertifikasi->id) ?>" id="<?php echo $sertifikasi->id ?>" class="btn btn-danger btn-delete"><i class="fas fa-trash-alt"></i></button>
                </div>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('sertifikasi/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </div>

    <script>
        $('.btn-delete').on('click', function() {

            const id_skema = $(this).attr('id')

            Swal.fire({
                title: 'Yakin ingin menghapus postingan?',
                text: "Tindakan ini tidak dapat dibatalkan jika sudah terhapus",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = '<?php echo base_url().'post/delete/'?>' + id_skema
                }
            })
        })
    </script>