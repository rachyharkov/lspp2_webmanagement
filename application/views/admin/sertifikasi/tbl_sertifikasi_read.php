
    <div class="container-fluid">
        <h2 style="margin-top:0px">Tbl_sertifikasi Read</h2>
        <table class="table">
	    <tr><td>Nama Sertifikasi</td><td><?php echo $nama_sertifikasi; ?></td></tr>
	    <tr><td>Kode Sertifikasi</td><td><?php echo $kode_sertifikasi; ?></td></tr>
	    <tr><td>Deskripsi</td><td><?php echo $deskripsi; ?></td></tr>
	    <tr><td>Logo</td><td><?php echo $logo; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('sertifikasi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div>
</html>