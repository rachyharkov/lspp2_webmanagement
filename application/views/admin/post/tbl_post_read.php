
    <div class="container-fluid">
        <h2 style="margin-top:0px">Tbl_post Read</h2>
        <table class="table">
	    <tr><td>Judul Post</td><td><?php echo $judul_post; ?></td></tr>
	    <tr><td>Jenis Post</td><td><?php echo $jenis_post; ?></td></tr>
	    <tr><td>Tanggal Post</td><td><?php echo $tanggal_post; ?></td></tr>
	    <tr><td>Tag</td><td><?php echo $tag; ?></td></tr>
	    <tr><td>Penulis Post</td><td><?php echo $penulis_post; ?></td></tr>
	    <tr><td>Foto Sampul</td><td><?php echo $foto_sampul; ?></td></tr>
	    <tr><td>Isi Post</td><td><?php echo $isi_post; ?></td></tr>
	    <tr><td>Dilihat</td><td><?php echo $dilihat; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('post') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div>
</html>