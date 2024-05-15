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
	/* small screen - for MOBILE 414px or less  */
	@media screen and (max-width: 991px) { 
	}
	/* small screen - for MOBILE 414px or less  */
	@media screen and (max-width: 414px) {
		.judul {
			color: #002448;
			font-size: 28px;
			font-weight: 700;
		}
	}
</style>
<!--Section: Pernyataan-->
<section id="pernyataan">
<div class="main_tourn_tnc">
		<div class="row">
			<a id="back-to-top" href="#" class="back-to-top" role="button"><span class="rounded-circle button material-icons"><img src="<?= base_url() ?>assets/img/icon/arrow_up.png" class="mx-auto d-block"></span></a>
			<div class="row" style="margin-top:-15px;margin-left:22px;">
				<p class="judul">
					<?= $title ?>
				</p>
			</div> 
		</div>
		<div class="col-11 col-md-12 card isikebijakan mb-5">
			<p class="jawaban">Kebijakan privasi ini mengatur tentang kebijakan dan prosedur kami dalam mengumpulkan, menggunakan dan mengungkapkan informasi dan dengan menggunakan layanan ini pengguna menyetujui pengumpulan, pemindahan data, pemprosesan, penyimpanan, pengungkapan dan penggunaan lainnya yang dijelaskan dalam kebijakan privasi ini.<br><br>
			Varena menyadari bahwa informasi bersifat rahasia, oleh karena itu Varena dengan kemampuan terbaiknya akan berusaha untuk menjaga kerahasiaan data tersebut. 
			</p>
			<p class="pertanyaan">Informasi yang terdapat pada Varena terdiri dari beberapa kategori: </p>
			<p class="jawaban">
			1)	Data yang anda berikan secara sukarela ketika registrasi dan perubahan.<br>
			2)	Data hasil pengolahan, perhitungan dan agregasi.<br>
			3)	Data yang didapat dari pihak ketiga termasuk namun tidak terbatas pada Data dari Game Developer dan rekanan yang bekerjasama dengan Varena.<br>
			</p>
			<p class="pertanyaan">Penggunaan informasi </p>
			<p class="jawaban">Varena akan menggunakan informasi sebagaimana disebut diatas baik informasi individual maupun agregat untuk pelaksanaan layanan ini pada khususnya dan layanan lain Varena secara keseluruhan, seperti namun tidak terbatas pada perencanaan, penelitian, desain dan pemasaran jasa, memberikan bantuan kepada pihak penegak hukum, pemerintah atau badan hukum atau mematuhi hukum yang berlaku di Indonesia ataupun perintah pengadilan. Informasi yang disampaikan di area umum akan menjadi informasi publik. Varena menghimbau pengguna untuk memperhatikan informasi yang diberikan pada halaman publik.</p>
			<p class="pertanyaan">Berbagi informasi dengan pihak ketiga</p>
			<p class="jawaban">Varena hanya bekerjasama dengan rekanan yang berkomitmen untuk menjaga kerahasiaan data untuk memberikan berbagai layanan yang memperkaya pengalaman pengguna dalam menggunakan layanan. Rekan yang ditunjuk Varena dilarang keras untuk menyalahgunakan yang termasuk tetapi tidak terbatas pada menjual, menyewakan serta membagikan kembali data-data yang diberikan kecuali berkaitan dan atau memiliki kerjasama dengan Varena.</p>
			<p class="pertanyaan">Perlindungan dan keamanan informasi</p>
			<p class="jawaban">Untuk mencegah akses data oleh pihak yang tidak memiliki wewenang, menjaga keakuratan data dan memastikan penggunaan informasi yang semestinya, Varena berkomitmen untuk menjaga keamanan tersebut dengan menggunakan prosedur fisik, elektronik dan manajerial untuk melindungi informasi.</p>
			<p class="pertanyaan">Kepatuhan pada proses hukum</p>
			<p class="jawaban">
				Varena dapat menyampaikan informasi pribadi jika diperintahkan oleh hukum atau dianggap bahwa langkah tersebut adalah perlu dilakukan untuk <br>
				1) patuh pada hukum atau proses pengadilan; <br>
				2) melindungi dan mempertahankan hak cipta dan hak milik kami; <br>
				3) melindungi terhadap penyalahgunaan atau penggunaan tanpa ijin dari situs web kami; atau <br>
				4) melindungi keamanan pribadi atau property atas pengguna kami atau publik (di antara hal lainnya, hal ini berarti jika anda memberikan informasi palsu atau berpura-pura menjadi orang lain, informasi mengenai diri anda dapat kami sampaikan sebagai bagian dari penyelidikan atas tindakan anda).
			</p>
			<p class="pertanyaan">Informasi lainnya: </p>
			<p class="jawaban">kebijakan privasi ini dapat diubah atau ditambah sewaktu-waktu. Setiap perubahan akan ditampilkan di halaman ini. Oleh karenanya kami menghimbau pengguna untuk mengakses halaman ini secara berkala untuk mengetahui perubahannya (apabila ada). Kebijakan Privasi ini dibuat dalam beberapa Bahasa, dalam hal terjadi perbedaan penafsiran dan/atau adanya perselisihan, maka yang digunakan adalah Bahasa Indonesia.</p>
			<p class="jawaban">Dengan menggunakan layanan ini, pengguna dianggap telah menyetujui ketentuan kebijakan privasi ini. Apabila pengguna tidak setuju dengan Kebijakan Privasi ini, pengguna dipersilahkan untuk berhenti menggunakan layanan Varena.</p>
		</div>
<!-- </form> -->
</section>
<!--/.Section: Pernyataan-->
</main>
<!--Main layout -->