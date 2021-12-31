<div class="container-md mt-4">
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-8">

			<?php
			$i = 0;
			foreach ($articles as $v) {

				$artikelisi = strlen($v->isi_artikel) > 200 ? substr($v->isi_artikel,0,200)."..." : $v->isi_artikel;
				
				?>
				<div class="container mb-4">
					<div class="row" style="box-shadow: 7px 1px 15px -3px rgba(0,0,0,0.1),0px 10px 15px -3px rgba(0,0,0,0.1),0px 10px 15px -3px rgba(0,0,0,0.1); border-radius: 1rem; border-color: transparent; overflow: hidden;">
						<div class="col-sm-12 col-md-12 col-lg-6" style="position: relative; padding: 0;">
							<img class="lazyload sampul_artikel" data-src="<?php echo base_url().'assets/images/blog-asset/'.$v->foto_sampul ?>" alt="Sampul Artikel" style="width: 100%; height: 100%; object-fit: cover; object-position: center;">
						</div>
						<div class="col-sm-12 col-md-12 col-lg-6" style="padding-right: calc(var(--bs-gutter-x) * .5);
    padding-left: calc(var(--bs-gutter-x) * .5); padding-top: calc(var(--bs-gutter-x) * .5)">
							<h2 style="font-size: calc(1rem + .9vw);"><a style="text-decoration: none;" href="<?php echo base_url().'artikel/'.$v->id.'/'.strtolower(str_replace(' ', '-', $v->judul_artikel)) ?>"><?php echo $v->judul_artikel ?></a></h2>
							<p style="font-size: 13px; color: gray;"><?php echo $v->penulis_artikel.' - '.longdate_indo(substr($v->tanggal_artikel, 0, 9)).' | '.substr($v->tanggal_artikel, 11, 18) ?></p>
							<div class="text-justify" style="font-size: 13px;"><?php echo $artikelisi ?></div>
							<p style="color: #7b7b7b;font-size: 14px;"><span style="margin-right: 10px;"><i class="fas fa-comment fa-fw" style="margin-right: 5px;"></i>1</span> <span><i class="fas fa-eye fa-fw" style="margin-right: 5px;"></i><?php echo $v->dilihat ?></span></p>
						</div>
					</div>
				</div>
				<?php

			}
			?>
			<div>
				
			</div>
		</div>
		<div class="col-sm-12 col-md-12 col-lg-4">
			<h4>Rekomendasi</h4>

			<div class="container">

				<?php
				foreach ($recommendation_article as $rc) {
				?>
				<div class="small_article_overview" style="width: 100%;">
					<div class="row">
						<div class="col-6">
							<img src="<?php echo base_url().'assets/images/blog-asset/'.$rc->foto_sampul ?>" style="width: 100%; height: 80%; object-fit: cover; object-position: center;">
						</div>
						<div class="col-6">
							<p style="font-size: 13px; font-weight: bold"><?php echo $rc->judul_artikel ?></p>
							<p style="color: #7b7b7b;font-size: 14px;"><span style="margin-right: 10px;"><i class="fas fa-comment fa-fw" style="margin-right: 5px;"></i>0</span> <span><i class="fas fa-eye fa-fw" style="margin-right: 5px;"></i><?php echo $v->dilihat ?></span></p>
						</div>
					</div>
				</div>
				<?php
				}
				?>

			</div>
		</div>
	</div>
</div>