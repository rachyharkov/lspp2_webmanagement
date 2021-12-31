<div class="container" style="margin-top: 2rem;">
	<div class="row">
		<div class="col-lg-3 d-none d-lg-block" style="height: 50%;position: sticky;top: 7em;">
			<ul class="list-navigation">
				<li><a class="navigation-section" href="#title-section">INTRO</a></li>
				<?php
				$profil_info = ['latar_belakang','visi','misi','tujuan','sasaran','struktur_organisasi'];

				foreach ($profil_info as $v) {
					?>
					<li><a class="navigation-section" href="#<?= $v ?>"><?= strtoupper(str_replace('_', ' ', $v)) ?></a></li>	
					<?php
				}

				?>
			</ul>
		</div>
		<div class="col-md-12 col-lg-9 col-sm-12">
			<h1 id="title-section">LEMBAGA SERTIFIKASI PROFESI</h1>
			<!-- <img class="img-fluid mb-4" src="https://lspdigital.id/images/homepage/profil1.jpeg"/> -->
			<p class="text-justify">Sebagai Lembaga Sertifikasi Profesi Pihak kedua Pupuk Indonesia Goup yang melaksanakan proses assesmen dan sertifikasi kompetensi di lingkungan Pupuk Indonesia selanjutnya disebut LSP-P2-PI GROUP dibentuk sebagai perwujudan konsep dan komitmen</p>

			<h1 id="visi">VISI</h1>
			<p class="text-justify">Menjadi lembaga sertifikasi profesi yang kompeten, profesional, dan menjadi partner strategis dalam mengembangkan dan menyeiakan SDM yang unggul, kompeten, dan kompetitif untuk mendukung Visi, Misi dan keberlangsungan perusahaan</p>

			<h1 id="misi">MISI</h1>
			<ul>
				<li>Memastikan tersedianya tenaga kerja yang kompeten dan profesional di lingkungan Pupuk Indonesia Group</li>
				<li>Membangun dan melaksanakan sistem pengembangan SDM berbasis kompetensi melalui kegiatan sertifikasi kompetensi sesuai kebutuhan perusahaan</li>
				<li>Mengelola kegiatan sertifikasi profesi dengan mengutamakan mutu sesuai kebijakan dan sasaran mutu serta menjamin proses sertifikasi dilakukan dengan tata kelola yang baik</li>
			</ul>

			<h1 id="latar_belakang">LATAR BELAKANG</h1>
			<p class="text-justify">Sebagai <strong>Lembaga Sertifikasi Profesi Pihak Kedua Pupuk Indonesia Group</strong> yang melaksanakan  proses asesmen dan sertifikasi ompetensi di lingkungan Ppuk Indonesia selanjutnya disebut LSP-P2-PI GROUP dibentuk sebagai perwujudan konsep dan komitmen para pemangku kepetingan dalam rangka mendukung pengembangan Sumber Daya Manusia di lingkungan Pupuk Indonesia Holding Company.</p>
			<p class="text-justify">Perusahaan memiliki strategi untuk mengeksploitasi bisnis dan menghadapi tantangan strategis saat ini dan mengeksplorasi peluang masa depa melalui transformasi bisnis, perbahan dalam pengembangan produk, teknologi, ebijakan, pasar serta riset. Hal itu membutuhkan SDM yang kompeten sehingga LSP-P2-PI Group harus menjadi strategic partner dan turut berperan dalam menjalankan bisnis secaraomersial dengan prinsip tata kelola yang baik dan manajemen risiko yang efektif melalui SDM yang professional, pengukuran kompetensi karyawan untuk menjalankan bisnis perusahaan saat ini serta mengembangkan kompetensi yang diperlukan untuk mengeksplorasi masa depan perusahaan sangatlah diperlukan.</p>
			<p class="text-justify">Strategi perusahaan dalam mengembangkan profesionalisme karyawan menjadi basis yang sangat penting bagi program LSP-P2-PI Group yang memainan peran penting dalam menciptakan standar kompetensi dibidang produk maupun layanan</p>

			<h1 id="tujuan">TUJUAN</h1>
			<p class="text-justify">Melakukan sertifikasi kompetensi bagi karyawan serta mendukung kegiatan Diklat  dilingkungan PT Pupuk Indonesia (Persero) Group sehingga menjadi Strategic partner dalam mengembangkan dan menyediakan SDM yang profesional dan kompeten serta turut menjaga keberlanjutan perusahaan.</p>

			<h1 id="sasaran">SASARAN</h1>
			<p class="text-justify">
				<ol>
					<li>Membangun serta mengelola seluruh egiatan yang berkaitan dengan penyelenggaraan LSP-P2 PI Group sesuai ketentuan BNSP</li>
					<li>Menyelenggarakan kegiatan Uji Kompetensi bagi seluruh jabatan di Pupuk Indonesia Group</li>
				</ol>
			</p>

			<h1 id="struktur_organisasi">STRUKTUR ORGANISASI</h1>
			<img class="img-fluid mb-4" src="<?php echo base_url()?>assets/images/struktur_organisasi_lsp.png"/>
		</div>
	</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery.scrollto@2.1.3/jquery.scrollTo.min.js"></script>
<script>

	$(document).on('click', '.navigation-section', function() {
		var id = $(this).attr('href')

		$('body').scrollTo(id, 500, {offset: {top:-90} });
	})

</script>