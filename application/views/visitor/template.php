<!DOCTYPE html>
<html lang="id">
	<head>
		<meta charset="utf-8" />
		<title><?php echo $title_page ?></title>

		<!-- third-generation iPad with high-resolution Retina display: -->
		<link rel="apple-touch-icon-precomposed" sizes="256x256" href="<?php echo base_url().'assets/images/icons/favicon256.png' ?>">
		<!-- iPhone with high-resolution Retina display: -->
		<link rel="apple-touch-icon-precomposed" sizes="128x128" href="<?php echo base_url().'assets/images/icons/favicon128.png' ?>">
		<!-- first- and second-generation iPad: -->
		<link rel="apple-touch-icon-precomposed" sizes="64x64" href="<?php echo base_url().'assets/images/icons/favicon64.png' ?>">
		<!-- non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
		<link rel="apple-touch-icon-precomposed" href="<?php echo base_url().'assets/images/icons/favicon64.png' ?>">
		<!-- basic favicon -->
		<link rel="icon" href="<?php echo base_url().'assets/images/icons/favicon32.png' ?>">


		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
		<meta content="Lembaga Sertifikasi Profesi Pihak kedua Pupuk Indonesia Group adalah lembaga yang melaksanakan proses assesmen dan sertifikasi kompetensi sebagai perwujudan konsep dan komitmen dalam pengembangan Sumber Daya Manusia di lingkungan Pupuk Indonesia Holding Company." name="description" />
		<meta content="Rachmad Nur Hayat" name="author" />


		<meta property="og:title" content="<?php echo $title_page ?>">
		<meta property="og:description" content="Lembaga yang melaksanakan proses assesmen dan sertifikasi kompetensi di lingkungan Pupuk Indonesia Holding Company.">
		<meta property="og:url" content="<?php echo current_url() ?>">
		<meta property="og:image" content="<?php echo base_url().'assets/images/logo-about-bg-white256.png' ?>">
		<meta property="og:type" content="website" />
		<meta property="og:locale" content="id_ID" />
		<meta name="twitter:title" content="LSP P2 Pupuk Indonesia">



		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/styles/style.css'; ?>">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	</head>
	<body>
		<div class="loading-element" id="loading-element">
			<?php echo $preloader ?>
		</div>

		<div class="header-first-highlight-landing" style="background-color: #373737;
padding: 12px 12px;
color: #fff;">
			<div class="wrap" style="max-width: 920px;
margin: auto;
font-size: 12px;
position: relative;
display: flex;
justify-content: space-between;">
				<div class="left-wrapper">
					<div>
						<p style="margin: 0;"><span style="margin-right: 7px;"><img class="lazyload" data-src="<?php echo base_url().'assets/images/logos_google-maps.png' ?>"></span> Menara Kadin Lt. 25</p>
					</div>
				</div>
				<div class="right-wrapper" style="display: flex;">
					<div style="margin-right: 2vw;">
						<a href="tel:0215484057" style="text-decoration: none;
color: white;"><span style="margin-right: 5px;"><i class="fas fa-phone"></i></span> (021) 5484057</a>
					</div>
					<div>
						<a style="text-decoration: none;
color: white;" href="mailto:lspp2-pigroup@pupuk-indonesia.com">lspp2-pigroup@pupuk-indonesia.com</a>
					</div>
				</div>
			</div>
		</div>

		<header style="position: sticky;top:0;z-index: 10;box-shadow: 0 0px 2px #cecece; background-color: #fff;">
			<div class="navbar-desktop">
				<div class="navbar-brand" style="height: 70px;
width: 130px;
float: left;">
					<img class="lazyload" data-src="<?php echo base_url().'assets/images/logo-brand.png' ?>" style="height: 100%;">
				</div>
				<div class="navbar-links">

					<?php

					$arrmenu = ['home','profil','skema_sertifikasi','informasi','artikel','galeri','kontak'];

					foreach ($arrmenu as $m) {

						if ($m == 'informasi') {
						?>
							<li>
								<a class="navigation-link navigation-link-desktop <?php echo $classnyak->ceknavactive($m) ?>" href="#"><?php echo strtoupper(str_replace('_', ' ', $m)) ?></a>							
								<ul class="sub-menu">
									<li><a href="<?php echo base_url().'jadwal_kegiatan' ?>">Jadwal Kegiatan</a></li>
									<li><a href="<?php echo base_url().'asesor' ?>">Asesor Kompetensi</a></li>
									<li><a href="<?php echo base_url().'tuk' ?>">Tempat Uji Kompetensi</a></li>
								</ul>
							</li>
							<?php
						} else {
							?>
							<li>
								<a class="navigation-link navigation-link-desktop <?php echo $classnyak->ceknavactive($m) ?>" href="<?php echo base_url().$m ?>"><?php echo strtoupper(str_replace('_', ' ', $m)) ?></a>
							</li>
							<?php
						}
					}
					?>
				</div>
			</div>

			<div class="navbar-mobile">
				<div class="navbar-brand" style="height: 100%;float: left;padding: 0.7rem;">
					<img class="lazyload" data-src="<?php echo base_url().'assets/images/logo-brand.png' ?>" style="height: 100%;">
				</div>
				<button id="burger" class="open-main-nav">
					<span class="burger"></span>
					<span class="burger-text">Menu</span>
				</button>
				<nav class="main-nav" id="main-nav">
					<div class="navbar-brand" style="height: 70px;width: 130px;position: absolute;top: 20px;left: 5px;">
						<a class="navigation-link-mobile" href="home" style="display: inline-block; height: 100%; width: 100%;">
							<img class="lazyload" data-src="<?php echo base_url().'assets/images/logo-brand.png' ?>" style="height: 100%;">
						</a>
					</div>
					<ul>
						<?php

						foreach ($arrmenu as $m) {
							?>
							<li>
								<a class="navigation-link navigation-link-mobile" href="<?php echo base_url().$m ?>"><?php echo strtoupper(str_replace('_', ' ', $m)) ?></a>
							</li>
							<?php
						}

						?>
					</ul>
				</nav>
			</div>
		</header>
		<div class="cntr" style="min-height: 90vh;">
			<div class="page-wrapper">
				<?php echo $contentnya ?>
			</div>
		</div>
		<footer>
			<div class="anper-list">
				<div class="row">
					<a href="https://megaeltra.com" target="_blank" rel="noopener noreferrer" class="warna-pi-4">
						<span class="me"></span>
					</a>
					<a href="https://pi-logistik.com" class="warna-pi-2" target="_blank" rel="noopener noreferrer">
						<span class="pil"></span>
					</a>
					<a href="https://pim.co.id" class="warna-pi-1" target="_blank" rel="noopener noreferrer">
						<span class="pim"></span>
					</a>
					<a href="https://pi-pangan.com" class="warna-pi-1" target="_blank" rel="noopener noreferrer">
						<span class="pip"></span>
					</a>
					<a href="https://www.pupuk-indonesia.com/holding/pupuk-indonesia-energi/profil" class="warna-pi-2" target="_blank" rel="noopener noreferrer">
						<span class="piu"></span>
					</a>
					<a href="http://www.rekayasa.com/index.php/en/home-rekind/" class="warna-pi-3" target="_blank" rel="noopener noreferrer">
						<span class="rekind"></span>
					</a>
					<a href="https://pupuk-kujang.co.id" class="warna-pi-2" target="_blank" rel="noopener noreferrer">
						<span class="pkc"></span>
					</a>
					<a href="https://petrokimia-gresik.com" class="warna-pi-3" target="_blank" rel="noopener noreferrer">
						<span class="pkg"></span>
					</a>
					<a href="https://pupukkaltim.com" class="warna-pi-4" target="_blank" rel="noopener noreferrer">
						<span class="pkt"></span>
					</a>
					<a href="https://pusri.co.id" class="warna-pi-1" target="_blank" rel="noopener noreferrer">
						<span class="pusri"></span>
					</a>
					
				</div>
			</div>
			<div class="footer" style="background-color: #343434; padding: 5rem 0 1rem 0;">
				<div class="container" style="max-width: 920px;">
					<div class="row">
						<div class="col-md" style="color: white;">
							<h3 style="margin-bottom: 1rem;">KONTAK</h3>
							<ul class="fa-ul">
							  <li style="margin: 6px 0; font-size: 13px;"><span class="fa-li"><i class="fas fa-map-marker-alt"></i></span><b>Menara Kadin Indonesia, Lantai 25</b><br>Jl. HR. Rasuna Said X-5 Kav. 2-3, Jakarta 12950</li>
							  <li style="margin: 6px 0; font-size: 13px;"><span class="fa-li"><i class="fas fa-phone"></i></span>(021) 5484057, 5484079</li>
							  <li style="margin: 6px 0; font-size: 13px;"><span class="fa-li"><i class="fas fa-fax"></i></span>(021) 5483313</li>
							  <li style="margin: 6px 0; font-size: 13px;"><span class="fa-li"><i class="far fa-envelope"></i></span>lspp2-pigroup@pupuk-indonesia.com</li>
							</ul>
						</div>
						<div class="col-md" style="color: white;">
							<h3 style="margin-bottom: 1rem;">LOKASI</h3>
							<div>
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2394760166385!2d106.82956881427265!3d-6.232129095488738!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e8cbb9e497%3A0xc9b90fc0ac3963bc!2sMenara%20Kadin%20Indonesia%2C%20Jl.%20H.%20R.%20Rasuna%20Said%20Blok%20X-5%20No.Kav.%202-3%2C%20RT.1%2FRW.2%2C%20Kuningan%2C%20Kuningan%20Tim.%2C%20Kecamatan%20Setiabudi%2C%20Kota%20Jakarta%20Selatan%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2012950!5e0!3m2!1sid!2sid!4v1639124612109!5m2!1sid!2sid" width="100%" height="auto" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
							</div>

						</div>
						<div class="col-md" style="color: white;">
							<h3 style="margin-bottom: 1rem;">TEMUKAN KAMI</h3>
							<ul class="fa-ul">
							  <li style="margin: 6px 0; font-size: 13px;"><span class="fa-li"><i class="fab fa-instagram-square"></i></span><a href="#" style="text-decoration: none; font-size: 13px; color: white;">@lspp2.pi</a></li>
							  <li style="margin: 6px 0; font-size: 13px;"><span class="fa-li"><i class="fab fa-facebook-square"></i></span><a href="#" style="text-decoration: none; font-size: 13px; color: white;">LSPP2 Pupuk Indonesia</a></li>
							</ul>
						</div>
						<div class="col-md" style="color: white;">
							<h3 style="margin-bottom: 1rem;">QUICK LINKS</h3>
							<ul class="quick-links">
								<li><a href="#">Beranda</a></li>
								<li><a href="#">Profil</a></li>
								<li><a href="#">Skema Sertifikasi</a></li>
								<li><a href="#">Informasi</a></li>
								<li><a href="#">Galeri</a></li>
								<li><a href="#">Kontak</a></li>
							</ul>
						</div>
					</div>

				</div>
				<p style="width: 100%; text-align: center; color: white; font-size: 12px;">
					Hak Cipta © 2021 LSP P2 Pupuk Indonesia | Create with 💖 by <a href="http://rach-nh.xyz" style="color: skyblue;">RNH</a>
				</p>
			</div>
		</footer>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" integrity="sha512-Tn2m0TIpgVyTzzvmxLNuqbSJH3JP8jm+Cy3hvHrW7ndTDcJ1w5mBiksqDBb8GpE2ksktFvDB/ykZ0mDpsZj20w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js" integrity="sha512-0QbL0ph8Tc8g5bLhfVzSqxe9GERORsKhIn1IrpxDAgUsbBGz/V7iSav2zzW325XGd1OMLdL4UiqRJj702IeqnQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script type="text/javascript" src="https://afarkas.github.io/lazysizes/lazysizes.min.js"></script>
		
		<script>

			// const lazy = function lazy() {
			//  	document.addEventListener('lazyloaded', function (e)  {
			//  		$('.clock-loader').css('display', '')
			//   	})
			// }

			// lazy()

			$('#burger').on('click', function() {
				$(this).toggleClass('is-open')
				$('#main-nav').toggleClass('is-open')
				$('body').toggleClass('disable-overflow')
			})

			$(window).on('load',function() {
				$('#loading-element').fadeOut();
			})


		</script>
	</body>

</html>