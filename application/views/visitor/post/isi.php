<div class="container-md mt-4">
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-8">

			<?php
			$i = 0;
			foreach ($posts as $v) {

				
				$content = $v->isi_post;
			    $content = preg_replace('/<(\s*)img[^<>]*>/i', '', $content); 
				
				$postisibefore = strip_tags($content);
				$postisi = strlen($postisibefore) > 200 ? substr($postisibefore,0,200)."..." : $postisibefore;

				?>
				<div class="container mb-4">
					<div class="row" style="box-shadow: 7px 1px 15px -3px rgba(0,0,0,0.1),0px 10px 15px -3px rgba(0,0,0,0.1),0px 10px 15px -3px rgba(0,0,0,0.1); border-radius: 1rem; border-color: transparent; overflow: hidden;">
						<div class="col-sm-12 col-md-12 col-lg-6" style="position: relative; padding: 0;">
							<img class="lazyload sampul_post" data-src="<?php echo base_url().'assets/images/blog-asset/'.$v->foto_sampul ?>" alt="Sampul post" style="width: 100%; height: 100%; object-fit: cover; object-position: center;">
						</div>
						<div class="col-sm-12 col-md-12 col-lg-6" style="padding-right: calc(var(--bs-gutter-x) * .5);
    padding-left: calc(var(--bs-gutter-x) * .5); padding-top: calc(var(--bs-gutter-x) * .5)">
							<h2 style="font-size: calc(1rem + .9vw);"><a style="text-decoration: none;" href="<?php echo base_url().strtolower($laman).'/'.$v->id.'/'.strtolower(str_replace(' ', '-', $v->judul_post)) ?>"><?php echo $v->judul_post ?></a></h2>
							<p style="font-size: 13px; color: gray;"><?php echo $v->penulis_post.' - '.longdate_indo(substr($v->tanggal_post, 0, 9)).' | '.substr($v->tanggal_post, 11, 18) ?></p>
							<div class="text-justify" style="font-size: 13px;"><?php echo $postisi ?></div>
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
				foreach ($recommendation_post as $rc) {
				?>
				<div class="small_post_overview" style="width: 100%;">
					<div class="row">
						<div class="col-6">
							<img src="<?php echo base_url().'assets/images/blog-asset/'.$rc->foto_sampul ?>" style="width: 100%; height: 80%; object-fit: cover; object-position: center;">
						</div>
						<div class="col-6">
							<p style="font-size: 13px; font-weight: bold"><?php echo $rc->judul_post ?></p>
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