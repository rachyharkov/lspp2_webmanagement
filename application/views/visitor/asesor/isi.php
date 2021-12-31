<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.3/b-2.1.1/r-2.2.9/sb-1.3.0/datatables.min.css"/>

<style>
	.dataTables_filter {
	   text-align: center !important;
	}
</style>

<div class="container mt-4">
	<table id="tabelAsesor" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Lengkap</th>
                <th>Nomor MET</th>
            </tr>
        </thead>
        <tbody>
        	<?php

        	$owo = 1;

        	foreach ($asesor_list as $al) {
        		?>
        		<tr>
	        		<td><?= $owo++ ?></td>
	        		<td><?= $al->nama_asesor ?></td>
	        		<td><?= $al->nomor_registrasi ?></td>
	        	</tr>
        		<?php
        	}
        	?>
        </tbody>
    </table>
</div>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/b-2.1.1/r-2.2.9/sb-1.3.0/datatables.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
	    $('#tabelAsesor').DataTable({
	    	search: {
	            return: true
	        },
	        "lengthChange": false,
	        "oLanguage": {
			   "sSearch": "Cari Asesor"
			 }

	    });
	} );
</script>