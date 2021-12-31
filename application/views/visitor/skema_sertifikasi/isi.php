<section class="section-element skema-sertifikasi-section">
	<h1 data-splitting class="title-section-text-hone text--zipping">SKEMA SERTIFIKASI</h1>
	<div class="sertifikasi-wrapper">
		<div class="sertifikasi-lists">

			<?php

			$x = 1;

			foreach ($list_sertifikasi as $value) {
				?>
					<div class="sertifikasi-item animate-element" style="--char-index: <?php echo $x ?>">
						<img class="lazyload" data-src="<?php echo base_url().'assets/images/skema_ic/'.$value->kode_sertifikasi.'.png' ?>" alt="" style="object-fit: contain;width: 100%;">	
						<div class="sertifikasi-title">
							<p><a href="<?php echo base_url().'skema_sertifikasi/'.$value->id ?>" style="color: white;"><?php echo $value->nama_sertifikasi ?></a></p>
						</div>
					</div>
				<?php
				$x++;
			}

			?>
		</div>
	</div>
</section>