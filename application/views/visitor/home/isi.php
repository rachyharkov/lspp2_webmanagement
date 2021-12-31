<link rel="stylesheet" href="https://unpkg.com/splitting/dist/splitting.css" />
<link rel="stylesheet" href="https://unpkg.com/splitting/dist/splitting-cells.css" />

<link
  rel="stylesheet"
  href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
/>

<style type="text/css">
	.swiper {
		max-width: 1220px;
		width: 100%;
		height: 480px;
		margin: 40px auto;
	}

	.swiper-wrapper .swiper-slide {
		padding: 0px 3rem;
		position: relative;
	}

	.carousel-top .swiper-wrapper .swiper-slide div:nth-child(2) {
		position: absolute;
		bottom: 55px;
		color: white;
		left: 90px;
		font-size: 1.8rem;
		font-weight: bold;
	}

	.carousel-top .swiper-wrapper .swiper-slide div:nth-child(3) {
		position: absolute;
		color: white;
		bottom: 22px;
		left: 90px;
		font-size: 1.8rem;
		font-weight: bold;
	}

	.swiper-wrapper .swiper-slide img {
		object-fit: cover;
		width: 100%;
		height: 100%;
		object-position: center;
	}

</style>

<section class="section-element landing-section" style="margin-top: -3rem;margin-bottom: -3rem;">
	<div class="container-fluid" style="padding: 0;">
		<!-- Slider main container -->
		<div class="carousel-top swiper">
		  <!-- Additional required wrapper -->
		  	<div class="swiper-wrapper">
		    <!-- Slides -->
			    <div class="swiper-slide">
			    	<img class="lazyload" data-src="<?php echo base_url().'assets/images/show-up-landing/' ?>images1.jpeg">
			    	<div data-splitting class="first-header">Lembaga Sertifikasi Profesi</div>
			    	<div data-splitting class="second-header">Pihak 2 Pupuk Indonesia Group</div>
			    </div>
			    <div class="swiper-slide">
			    	<img class="lazyload" data-src="<?php echo base_url().'assets/images/show-up-landing/' ?>images2.jpeg">
			    	<div data-splitting class="first-header">Buktikan Kompetensi</div>
			    	<div data-splitting class="second-header">Dengan Sertifikasi</div>
			    </div>
			    <div class="swiper-slide">
			    	<img class="lazyload" data-src="<?php echo base_url().'assets/images/show-up-landing/' ?>images4.jpeg">
			    	<div data-splitting class="first-header">Sertifikat Kompetensi</div>
			    	<div data-splitting class="second-header">Amunisi Pekerja dan Industri</div>
			    </div>
		  	</div>
	  		<!-- If we need pagination -->
	  		<div class="swiper-pagination"></div>

			<!-- If we need navigation buttons -->
			<div class="swiper-button-prev"></div>
			<div class="swiper-button-next"></div>
		</div>
	</div>
</section>

<section class="section-element about-section secondary-style-section">
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-5 col-xs-12" style="text-align: center;">
				<img class="lazyload" data-src="<?php echo base_url().'assets/images/logo-about.png' ?>" style="width: 300px;
margin: auto;">
			</div>
			<div class="col-md-7 col-sm-7 col-xs-12 custom-right-side-about">
				<div class="container" style="display: flex; flex-direction: column;justify-content: center;height: 100%;">
					<h3 data-splitting class="title-section-text title-about text--slide">TENTANG KAMI</h3>
					<p>Sebagai Lembaga Sertifikasi Profesi Pihak kedua Pupuk Indonesia Goup yang melaksanakan proses assesmen dan sertifikasi kompetensi di lingkungan Pupuk Indonesia selanjutnya disebut LSP-P2-PI GROUP dibentuk sebagai perwujudan konsep dan komitmen </p>
					<p></p>
					<a class="button-round-outline" href="profil">Read More . .</a>
				</div>
			</div>
		</div>
	</div>
</section>
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

<section class="section-element gallery-section secondary-style-section">
	<h1 data-splitting class="title-section-text-hone text--zipping">GALERI</h1>
	<div class="gallery-wrapper">

		<div class="container-fluid">
			<!-- Slider main container -->
			<div class="carousel-gallery swiper">
			  <!-- Additional required wrapper -->
			  	<div class="swiper-wrapper">
			    <!-- Slides -->
			    	<?php
			    	$i = 1;
			    	foreach ($list_gambar as $g) {
			    		?>
			    		<div class="swiper-slide gallery-item" style="--char-index: <?php echo $i++ ?>">
					    	<a class="gallery-pic" href="#">
					    		<img class="lazyload" data-src="<?php echo base_url().'assets/images/gallery/'.$g->gambar ?>" alt="judul gambarnya">
					    	</a>
					    	<div class="gallery-caption-wrapper">
					    		<h2 class="caption-title"><a href="#"><?php echo $g->judul_gambar ?></a></h2>
					    		<p class="caption-text"><?php echo $g->caption_gambar ?></p>
					    	</div>
					    </div>
			    		<?php
			    	}
			    	?>
			  	</div>
		  		<!-- If we need pagination -->
		  		<div class="swiper-pagination"></div>

				<!-- If we need navigation buttons -->
				<div class="swiper-button-prev"></div>
				<div class="swiper-button-next"></div>
			</div>
		</div>
		
	</div>
</section>


<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/splitting/dist/splitting.min.js"></script>
<script src="https://unpkg.com/scroll-out/dist/scroll-out.min.js"></script>
<script>


	Splitting();
	ScrollOut({
		targets: '.title-section-text'
	})

	ScrollOut({
		targets: '.title-section-text-hone'
	})

	ScrollOut({
		targets: '.animate-element'
	})
  	
  var swipercarouselatas = new Swiper(".carousel-top", {
  	loop: true,
  	slidesPerView: 1,
  	preloadImages: false,
  	updateOnImagesReady: true,
  	lazy: true,
    pagination: {
			el: '.swiper-pagination',
		},
		autoplay: {
		   delay: 6000,
		},
		// Navigation arrows
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
  })

  swipercarouselatas.on('slideChange', function() {
  	console.log('swipped horizontally')

  	const position = swipercarouselatas.realIndex

  	const currentSlide = swipercarouselatas.slides[position]

  	// console.log(currentSlide)

  	$('.carousel-top').find('.swiper-wrapper').find('.swiper-slide').find('.chars').removeClass('splitting')
  	setTimeout(function() {
  		$('.carousel-top').find('.swiper-wrapper').find('.swiper-slide-active').find('.chars').addClass('splitting')
  	},100)
  })
    

  var swiper = new Swiper(".carousel-gallery", {
		// Navigation arrows
		slidesPerView: 1,
    spaceBetween: 10,
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		breakpoints: {
      640: {
        slidesPerView: 2,
        spaceBetween: 20
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 20
      },
      1024: {
        slidesPerView: 3,
        spaceBetween: 25
      },
    },
  });
    

</script>