<div class="container mt-4">
	<div class="row" style="justify-content: center;">
		<?php

		foreach ($tuk_list as $p) {
			?>
			<div class="col-sm-12 col-md-4 col-lg-3">
				<div class="card" style="margin: 0.3rem;">
					<div class="card-body">
						<div class="image-tuk-wrapper" style="width: 100%;
	height: 128px;">
							<img src="<?php echo base_url().'assets/images/tuk/'.$p->gambar ?>" style="width: 100%; height: 100%; object-fit: cover;">
						</div>
						<div class="tuk-title" style="text-align: center;">
							<a href="#detailTUK" id="<?php echo $p->id ?>" class="link-href-detail-tuk" data-bs-toggle="modal" role="button" style="text-decoration: none; color: black;"><?php echo $p->nama_tuk ?></a>
						</div>
					</div>
				</div>
			</div>
			<?php
		}

		?>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="detailTUK" tabindex="-1" aria-labelledby="detailTUKLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailTUKLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>
	
	$(document).on('click','.link-href-detail-tuk', function() {

		var idtuk = $(this).attr('id')

		$.ajax({
	        type: "GET",
	        url: "<?php echo base_url() ?>Menu/getdetailtuk/" + idtuk,
	        success: function(data){
	          var dt = JSON.parse(data)
	          var string = `
	            <table class="table table-borderless text-dark">
	              <tr>
	                <td>Tempat</td>
	                <td>:</td>
	                <td>${dt.nama_tuk}</td>
	              </tr>
	              <tr>
	                <td>Alamat</td>
	                <td>:</td>
	                <td>${dt.alamat_tuk} - ${dt.tanggal_akhir}</td>
	              </tr>
	              <tr>
	                <td>Kota</td>
	                <td>:</td>
	                <td>${dt.kota_tuk}</td>
	              </tr>
	              <tr>
	                <td>Nomor Telepon</td>
	                <td>:</td>
	                <td>${dt.nomor_telepon_tuk}</td>
	              </tr>
	            </table>
	            `;

	            $('.modal-body').html(string)
	        },
	        error: function(error) {
	          alert('Error occured!')
	        }
      	});
	})

</script>