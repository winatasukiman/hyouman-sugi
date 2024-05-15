<!--Main layout-->
<main>
<style>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;700&display=swap" rel="stylesheet">
	.judul,.pertanyaan,.jawaban,.jawaban2{
		font-family: 'Montserrat' , sans-serif;
	}
	.judul {
		color: #002448;
		font-size: 30px;
		font-weight: 700;
	}

	.pertanyaan {
		color: #002448;
		font-size: 16px;
		font-weight: 700;
	}

	.jawaban, .jawaban2 {
		color: #002448;
		font-size: 14px;
		font-weight: 400;
	}
	
	.jawaban2{
		margin-left: 10px;
	}
	#back-to-top {
	  display: none;
	  position: fixed;
	  bottom: 20px;
	  right: 30px;
	  z-index: 99;
	  font-size: 18px;
	  border: none;
	  outline: none;
	  color: white;
	  cursor: pointer;
	  padding: 15px;
	  border-radius: 4px;
	}
	/* medium screen - for MOBILE 767px or less  */
	@media screen and (max-width: 767px) {
		.search_bar{
			margin-left:5px;
			margin-bottom:20px;
		}
	}
	/* small screen - for MOBILE 414px or less  */
	@media screen and (max-width: 414px) {
		.judul {
			color: #002448;
			font-size: 28px;
			font-weight: 700;
		}
		.search_bar{
			margin-left:5px;
			margin-bottom:20px;
		}
	}
</style>
<!--Section: Pernyataan-->
<section id="pernyataan">
<div class="main_tourn_tnc">
		<a id="back-to-top" href="#" class="back-to-top" role="button"><span class="rounded-circle button material-icons"><img src="<?= base_url() ?>assets/img/icon/arrow_up.png" class="mx-auto d-block"></span></a>
		<div class="row" style="margin-top:-25px;">
			<div class="col-md-6 col-10">
				<p class="judul" style="margin-left:5px;">
					<?= $title ?>
				</p>
			</div>
			<div class="col-md-6 col-11 search_bar">
				<div class="input-group">
					<input 
						type="text" 
						class="form-control py-2 border-right-0 border remove_outline" 
						id="search"
						name="search"
						placeholder="Cari Pertanyaan" >

					<span class="input-group-append">
						<div class="input-group-text border-left-0 border bg-white" style="height:38px;">
							<img src="<?= base_url() ?>assets/img/turnamen/iconsearch.svg" height="18px">
						</div>
					</span>
				</div>
			</div>
		</div>
		
		<div class="col-11 col-md-12 card isikebijakan mb-5">
			<div class='content'>
				<p class="pertanyaan">Apakah Varena itu?</p>
				<p class="jawaban">Varena adalah platform teknologi yang aman & mudah untuk dipakai semua orang dan memberikan kesempatan untuk terlibat secara profesional dan menjadi JUARA di dunia esports sesuai dengan talenta setiap Varenation.</p>
			</div>
			<div class='content'>
				<p class="pertanyaan">Siapa saja yang bisa menjadi Varenation?</p>
				<p class="jawaban">Varena berpedoman esports untuk semua karena percaya bahwa setiap orang diberikan talenta dan dengan karakter dan usaha maka Varenation bisa bertumbuh secara bertahap dan menjadi professional (menghasilkan uang sesuai dengan spesialisasi keahlian) di dunia esports.</p>
			</div>
			<div class='content'>
				<p class="pertanyaan">Bagaimana cara membuat akun dan menjadi Varenation?</p>
				<p class="jawaban">Untuk menjadi Varenation, kamu tinggal membuat akun personal dengan info nomor telepon seluler dan profil spesifik sesuai game favoritmu. Pastikan nomer telepon dan game id yang kamu daftarkan benar karena untuk data duplikat akan ditolak secara sistem.</p>
			</div>
			<div class='content'>
				<p class="pertanyaan">Fitur apa saja yang dimiliki varena?</p>
				<p class="jawaban">Varena memiliki fitur untuk bikin & atur kompetisi, ikut kompetisi, jual dan beli produk dan jasa di dunia esports. Semua fitur ini dilengkapi dengan teknologi untuk memastikan kemudahan, kenyamanan dan kemanan untuk Varenation.</p>
			</div>
			<div class='content'>
				<p class="pertanyaan">Game apa saja yang didukung di platform Varena?</p>
				<p class="jawaban">Varena mendukung berbagai game untuk Mobile, PC & Console yang akan berkembang sesuai tren terbaru. Saat ini Varena mendukung Mobile Legends, FreeFire, PUBG Mobile, Dota2 dan Valorant.</p>
			</div>
			<div class='content'>
				<p class="pertanyaan">Jenis kompetisi apa saja yang didukung?</p>
				<p class="jawaban">Varena menudukung format kompetisi yang disesuaikan dengan kebutuhan setiap game. Seperti individual, duo dan tim.</p>
			</div>
			<div class='content'>
				<p class="pertanyaan">Apakah ada biaya untuk mendaftar kompetisi di Varena?</p>
				<p class="jawaban">Varena Points diperlukan untuk mengikuti kompetisi. Varena Points bisa didapatkan secara GRATIS cukup dengan memasukkan Kode Referral dari Varena Community Leaders.</p>
			</div>
			<div class='content'>
				<p class="pertanyaan">Apa keuntungan mengikuti kompetisi di Varena?</p>
				<p class="jawaban">Dengan memenangkan kompetisi di Varena maka Varenation akan mendapatkan Varena Points yang dapat ditukarkan dengan Hadiah-Hadiah yang sangat menarik SETIAP HARI.</p>
				<p class="jawaban">Varena Points diperlukan untuk mengikuti kompetisi. Varena Points bisa didapatkan secara GRATIS cukup dengan daftarkan diri kamu di Varena.</p>
			</div>
			<div class='content'>
				<p class="pertanyaan">Siapakah Varena Community Leaders dan bagaimana cara mendaftarnya?</p>
				<p class="jawaban">Varena Community Leaders terbuka bagi semua orang baik individu maupun komunitas yang berkomitmen untuk membangun dunia esports di Indonesia. Kamu bisa daftar untuk menjadi Varena Community Leaders dengan mengirimkan email ke varenaleaders@varena.id</p>
			</div>
			<div class='content'>
				<p class="pertanyaan">Apa saja tanggung jawab dan keuntungan menjadi Varena Community Leader?</p>
				<p class="jawaban">Di tahap ini Varena Community Leaders bertanggung jawab untuk menjadi ambassador varena di komunitanya dengan  mengajak teman temannya bergabung diikuti dengan mengadakan dan memantau berjalannya kompetisi dalam ekosistem Varena.</p>
			<p class="jawaban">Dengan menjadi Varena Community Leader kamu bisa mendapatkan bonus hingga PULUHAN JUTA RUPIAH.</p>
			</div>
			<div class='content'>
				<p class="pertanyaan">Apakah kompetisi hanya dapat dibuat oleh Varena Community Leader?</p>
				<p class="jawaban">Tidak, semua Varenation dapat membuat kompetisi sendiri dan mengajak teman-temannya untuk bertanding dan menjadi JUARA.</p>
			</div>
			<div class='content'>
				<p class="pertanyaan">Apa keuntungan membuat kompetisi di Varena?</p>
				<p class="jawaban">Dengan membuat kompetisi di Varena maka Varenation akan mendapatkan Varena Points yang dapat ditukarkan dengan Hadiah-Hadiah yang sangat menarik SETIAP HARI.</p>
			</div>
			<div class='content'>
				<p class="pertanyaan">Bagaimana reporting hasil kompetisi dan cara menentukan pemenang?</p>
				<p class="jawaban">Syarat dan ketentuan serta detil kompetisi akan ditentukan Kreator Turnamen.</p>
				<p class="jawaban">Varena beserta dengan Varena Community Leaders akan bekerjasama untuk menggunakan teknologi terbaru dan terbaik dalam penetuan hasil kompetisi.</p>
			</div>
			<div class='content'>
				<p class="pertanyaan">Bagaimana cara pelaporan indikasi kecurangan?</p>
				<p class="jawaban">Untuk adanya kecurangan pada sebuah kompetisi, Varenation dapat bekerjasama dengan Customercare@varena.id untuk mendapatkan jawaban dan resolusi.</p>
			</div>
			<div class='content'>
				<p class="pertanyaan">Kapan Varena Points hasil kompetisi dapat diterima?</p>
				<p class="jawaban">Bilamana tidak ada komplain dari kompetisi maka Varena Points akan secara otomatis dengan system dikirimkan ke akun Varenation pemenang kompetisi.</p>
			</div>
		</div>
<script src="<?= base_url(); ?>assets/js/pertanyaan.js"></script>
</section>
<!--/.Section: Pernyataan-->
</main>
<!--Main layout -->