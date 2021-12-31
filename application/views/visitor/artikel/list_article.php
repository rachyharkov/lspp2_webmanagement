<?php
$i = 0;
foreach ($articles as $v) {

	$artikelisi = strlen($v->isi_artikel) > 200 ? substr($v->isi_artikel,0,200)."..." : $v->isi_artikel;
	
	?>
	<div class="container mb-4" style="box-shadow: 0px 10px 15px -3px rgba(0,0,0,0.1);">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-6" style="position: relative;">
				<img class="lazyload sampul_artikel" data-src="<?php echo base_url().'assets/images/blog-asset/'.$v->foto_sampul ?>" alt="Sampul Artikel" style="width: 100%; height: 100%; object-fit: cover; object-position: center;">
			</div>
			<div class="col-sm-12 col-md-12 col-lg-6">
				<h2><a style="text-decoration: none;" href="<?php echo base_url().'artikel/'.$v->id.'/'.strtolower(str_replace(' ', '-', $v->judul_artikel)) ?>"><?php echo $v->judul_artikel ?></a></h2>
				<p style="font-size: 13px; color: gray;"><?php echo $v->penulis_artikel.' - '.longdate_indo(substr($v->tanggal_artikel, 0, 9)).' | '.substr($v->tanggal_artikel, 11, 18) ?></p>
				<p class="text-justify"><?php echo $artikelisi ?></p>
				<p style="color: #7b7b7b;font-size: 14px;"><span style="margin-right: 10px;"><i class="fas fa-comment fa-fw" style="margin-right: 5px;"></i>1</span> <span><i class="fas fa-eye fa-fw" style="margin-right: 5px;"></i><?php echo $v->dilihat ?></span></p>
			</div>
		</div>
	</div>
	<?php

}
?>
<div style="width: 100%; height:200px;">
	<div class="btn-group" role="group">
		<?php
		if ($offset >) {
			// code...
		}
		?>
		<button type="button" class="btn btn-primary"><i class="fas fa-chevron-left"></i></button>
	    <button type="button" class="btn btn-primary"><i class="fas fa-chevron-right"></i></button>
	</div>
</div>