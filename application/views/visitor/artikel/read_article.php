<style>
	figure {
	  border: 1px #cccccc solid;
	  padding: 4px;
	  margin: auto;
	}

	figcaption {
	  background-color: black;
	  color: white;
	  font-style: italic;
	  padding: 2px;
	  text-align: center;
	}
</style>

<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-8 col-lg-8">
			<div class="header-article-section" style="position: relative;">
				<img src="<?php echo base_url().'assets/images/blog-asset/'.$isi_artikel->foto_sampul ?>" style="width: 100%;
		height: 260px;
		object-fit: cover;">
				<div style="position: absolute;
		bottom: 10%;
		left: 18px;
		background: #1e1e1ec4;
		color: white;">
					<h3><?php echo $isi_artikel->judul_artikel ?></h3>
				</div>
			</div>
			<div class="info-overview-article-section" style="margin-top: 1rem;">
				<p style="color: #7b7b7b;font-size: 14px;"><span><i class="fas fa-user fa-fw" style="margin-right: 5px;"></i><?php echo $isi_artikel->penulis_artikel ?></span> <span style="margin-right: 10px;"><i class="fas fa-comment fa-fw" style="margin-right: 5px;"></i>1</span> <span><i class="fas fa-eye fa-fw" style="margin-right: 5px;"></i><?php echo $isi_artikel->dilihat ?></span></p>
			</div>
			<div class="body-article-section">
				<?php

				echo $isi_artikel->isi_artikel;

				?>
			</div>
			<div class="footer-article-section">
				
			</div>	
		</div>
		<div class="col-sm-12 col-md-8 col-lg-8">
			
		</div>
	</div>
</div>