
    <div class="container-fluid">
        <h2 style="margin-top:0px">Tbl_post List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('post/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('post/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('post'); ?>" class="btn btn-default">Reset</a>
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
		<th>Judul Post</th>
		<th>Jenis Post</th>
		<th>Tanggal Post</th>
		<th>Tag</th>
		<th>Penulis Post</th>
		<th>Foto Sampul</th>
		<th>Isi Post</th>
		<th>Dilihat</th>
		<th>Action</th>
            </tr><?php
            foreach ($post_data as $post)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $post->judul_post ?></td>
			<td><?php echo $post->jenis_post ?></td>
			<td><?php echo $post->tanggal_post ?></td>
			<td><?php echo $post->tag ?></td>
			<td><?php echo $post->penulis_post ?></td>
			<td><?php echo $post->foto_sampul ?></td>
			<td><?php echo $post->isi_post ?></td>
			<td><?php echo $post->dilihat ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('post/read/'.$post->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('post/update/'.$post->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('post/delete/'.$post->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('post/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </div>