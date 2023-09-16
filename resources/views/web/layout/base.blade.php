<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="{{asset('web/favicon.png')}}">
	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap5" />

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('web/fonts/icomoon/style.css')}}">
	<link rel="stylesheet" href="{{asset('web/fonts/flaticon/font/flaticon.css')}}">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<link rel="stylesheet" href="{{asset('web/css/tiny-slider.css')}}">
	<link rel="stylesheet" href="{{asset('web/css/aos.css')}}">
	<link rel="stylesheet" href="{{asset('web/css/glightbox.min.css')}}">
	<link rel="stylesheet" href="{{asset('web/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('web/css/flatpickr.min.css')}}">
	<title>Sistem Informasi Report</title>
</head>
<style>
</style>
<body>
	@include('sweetalert::alert')
	<div class="site-mobile-menu site-navbar-target">
		<div class="site-mobile-menu-header">
			<div class="site-mobile-menu-close">
				<span class="icofont-close js-menu-toggle"></span>
			</div>
		</div>
		<div class="site-mobile-menu-body"></div>
	</div>

	<nav class="site-nav">
		<div class="container">
			<div class="menu-bg-wrap">
				<div class="site-navigation">
					<div class="row g-0 align-items-center">
						<div class="col-6">
							<a href="index.html" class="logo m-0 float-start" style="font-size: 14pt">
								<img src="{{asset('Logo.png')}}" alt="" style="max-width: 50px;">&nbsp;BPBD SIGI 
								<span class="text-primary">
								</span>
							</a>
						</div>
						<div class="col-5 text-center ">
							<ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
								<li class="active"><a href="#home" >Home</a></li>
								<li><a href="#about">Tentang</a></li>
								<li><a href="#form">Lapor</a></li>
								<li><a href="#kontak-kami">Kontak Kami</a></li>
							</ul>
						</div>
						<div class="col-1 text-end">
							<a href="#" class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
								<span></span>
							</a>

							<a href="#" class="call-us d-flex align-items-center">
								<span class="icon-phone"></span>
								<span>+6282334317534</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</nav>

	<div class="hero overlay" id="home">
		<img src="{{asset('web/images/blob.svg')}}" alt="" class="img-fluid blob">
		<div class="container">
			<div class="row align-items-center justify-content-between pt-5">
				<div class="col-lg-6 text-center text-lg-start pe-lg-5">
					<h1 class="heading text-white mb-3" data-aos="fade-up">Selamat Datang di Aplikasi Pelaporan Banjir.</h1>
					<p class="text-white mb-5" data-aos="fade-up" data-aos-delay="100">
						Memantau, mengidentifikasi, dan merespons banjir yang terjadi di suatu daerah. Ini adalah langkah kunci dalam upaya mitigasi risiko banjir dan penyelamatan kehidupan serta properti. 
					</p>
					<div class="align-items-center mb-5 mm" data-aos="fade-up" data-aos-delay="200">
						<a href="#form" class="btn btn-outline-white-reverse me-4">Lapor</a>
						<a href="#kontak-kami" class="text-white">Kontak Kami</a>
					</div>
				</div>
				<div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
					<div class="img-wrap">
						<img src="{{asset('web/banjir.jpg')}}" alt="Image" class="img-fluid rounded">
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="section" id="about">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-7 mb-4 mb-lg-0">
					<img src="{{asset('dashboard.png')}}" alt="Image" class="img-fluid rounded
					">
				</div>
				<div class="col-lg-4 ps-lg-2">
					<div class="mb-5">
						<h2 class="text-black h4">Informasi Banjir.</h2>
						<p>
							Banjir Sulawesi Tengah, mengingatkan kita akan kekuatan alam yang tidak terduga. Namun, di tengah bencana ini, kita juga melihat kekuatan solidaritas dan kepedulian manusia yang tumbuh lebih kuat.
						</p>
					</div>
					<div class="d-flex mb-3 service-alt">
						<div>
							<span class="bi-pie-chart-fill me-4"></span>
						</div>
						<div>
							<h3>Laporan</h3>
							<p>Mengumpulkan data dan informasi tentang tingkat air, dampak, dan pola banjir untuk analisis jangka panjang.</p>
						</div>
					</div>

					<div class="d-flex mb-3 service-alt">
						<div>
							<span class="bi-pie-chart-fill me-4"></span>
						</div>
						<div>
							<h3>Pelapor</h3>
							<p>Memungkinkan masyarakat untuk mendapatkan informasi tentang situasi banjir yang dapat memengaruhi mereka.</p>
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>

	<div class="section sec-features" id="form">
		<div class="container">
			<form action="{{ route('home') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="text-center">
								<h3>PELAPOR</h3><hr>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Nama <span class="text-danger">*</span></label>
									<input type="text" name="reporter_name" class="form-control" id="" placeholder="Input disini" required>
								</div>
								<div class="form-group">
									<label for="">No Handpone <span class="text-danger">*</span></label>
									<input type="number" name="reporter_phone" class="form-control" id="phone" placeholder="Input disini" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Alamat <span class="text-danger">*</span></label>
									<input type="text" name="reporter_address" class="form-control" id="" placeholder="Input disini" required>
								</div>
								<div class="form-group">
									<label for="">Selfie <span class="text-danger">*</span></label>
									<input type="file" class="form-control" onchange="compressImage(this, 'selfie_file')" accept="image/*" required>
									<input type="hidden" name="selfie_file" id="selfie_file">
								</div>
							</div>
							<div class="text-center mt-5">
								<h3>FORMULIR REPORT</h3><hr>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for=" " style="font-size: 13pt; font-weight: 400px">Tingkat Banjir <span class="text-danger">*</span></label>
									<select name="flood_id" id="flood_id" class="form-control" required>
										<option value="" selected disabled>-- Pilih Banjir--</option>
										@foreach ($data['data']  as $item)
											<option value="{{$item->id}}">{{$item->type}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<label for="">Level <span class="text-danger">*</span></label>
									<select name="level" id="level" class="form-control">
										<option value="" selected disabled>-- Pilih Level --</option>
										<option value="kecil">Kecil</option>
										<option value="sedang">Sedang</option>
										<option value="besar">Besar</option>
									</select>
								</div>
								<div class="form-group">
									<label for="">Priority <span class="text-danger">*</span></label>
									<select name="priority" id="priority" class="form-control">
										<option value="" selected disabled>-- Pilih Priority --</option>
										<option value="aman">Aman</option>
										<option value="segera">Segera</option>
									</select>
								</div>
								<div class="form-group">
									<label for="">Deskripsi <span class="text-danger">*</span></label>
									<textarea name="desc" class="form-control" id="" cols="30" rows="10" required></textarea>
								</div>
							</div>
							<div class="col-md-6">
								<div class="sparkline13-list">
									<div class="sparkline13-graph">
										<div class="form-group">
											<label for="">Alamat <span class="text-danger">*</span></label>
											<input type="text" name="location" class="form-control" id="" required>
										</div>
										<input type="hidden" name="longtitude" id="longitude" class="form-control">
										<input type="hidden" name="latitude" id="latitude" class="form-control">
										<div class="form-group">
											<label for="">Gambar <span class="text-danger">*</span></label>
											<div class="form-group mt-3">
												<label for="">File 1</label>
												<input type="file" class="form-control gmbr" onchange="compressImage(this, 'image-1')" accept="image/*" required>
												<input type="hidden" id="image-1" name="image[]">
											</div>
											<div class="form-group">
												<label for="">File 2</label>
												<input type="file" class="form-control gmbr" onchange="compressImage(this, 'image-2')" accept="image/*" required>
												<input type="hidden" id="image-2" name="image[]">
											</div>
											<div class="form-group">
												<label for="">File 3</label>
												<input type="file" class="form-control gmbr" onchange="compressImage(this, 'image-3')" accept="image/*" required>
												<input type="hidden" id="image-3" name="image[]">
											</div>
										</div>
									</div>
								</div>
							</div> 
							<button type="submit" class="btn btn-primary col-md-12 col-12 mt-3">SIMPAN</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="section sec-portfolio bg-light pb-5	">
		<div class="container">
			<div class="row mb-5">
				<div class="col-lg-5 mx-auto text-center ">
					<h2 class="heading text-primary mb-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">PENANGANAN</h2>
					<p class="mb-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">Penanganan Darurat Bencana banjir dan Tanah Longsor DI beberapa Desa dan Kecamatan Palolo Kabupaten Sigi Provinsi Sulawei Tengah Tahun 2022 </p>
	
					<div id="post-slider-nav" data-aos="fade-up" data-aos-delay="200" aria-label="Carousel Navigation" tabindex="0" class="aos-init aos-animate">
						<button class="btn btn-primary py-2" data-controls="prev" aria-controls="post-slider" tabindex="-1">Prev</button>
						<button class="btn btn-primary py-2" data-controls="next" aria-controls="post-slider" tabindex="-1">Next</button>
					</div>
	
				</div>
			</div>
		</div>
	
		<div class="post-slider-wrap aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
			<div class="tns-outer" id="post-slider-ow"><div class="tns-liveregion tns-visually-hidden" aria-live="polite" aria-atomic="true">slide <span class="current">14 to 16</span>  of 5</div><div id="post-slider-mw" class="tns-ovh"><div class="tns-inner" id="post-slider-iw"><div id="post-slider" class="post-slider  tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal" style="transform: translate3d(-82.3529%, 0px, 0px);"><div class="item tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
					<a href="case-study.html" class="card">
						<center><img src="{{asset('sintuwu.png')}}" class="card-img-top" alt="Image" style="max-width: 35rem;"></center>
						<div class="card-body">
							<h5 class="card-title">DESA SINTUWU</h5>
							<p>
								<ol>
									<li>
										<p>Penyelamatan dan Evakuasi Korban Bencana</p>
									</li>
									<li>
										<p>Penetapan Status Keadaan Darurat Bencana</p>
									</li>
									<li>
										<p>Aktivitas Sistem Komando Penanganan Darurat Bencana</p>
									</li>
									<li>
										<p>Perbaikan Darurat
											Lingkungan yang rusak
											akiibat bencana</p>
									</li>
									<li>
										<p>Pemulihan Darurat Sarana
											Prasarana Vital</p>
									</li>
								</ol>
							</p>
						</div>
					</a>
				</div>
				<div class="item tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
					<a href="case-study.html" class="card">
						<center><img src="{{asset('eununi.png')}}" class="card-img-top" alt="Image" style="max-width: 35rem;"></center>
						<div class="card-body">
							<h5 class="card-title">DESA UENUNI</h5>
							<ol>
								<li>
									<p>Penyelamatan dan Evakuasi Korban Bencana</p>
								</li>
								<li>
									<p>Penetapan Status Keadaan Darurat Bencana</p>
								</li>
								<li>
									<p>Aktivitas Sistem Komando Penanganan Darurat Bencana</p>
								</li>
								<li>
									<p>Perbaikan Darurat
										Lingkungan yang rusak
										akiibat bencana</p>
								</li>
								<li>
									<p>Pemulihan Darurat Sarana
										Prasarana Vital</p>
								</li>
							</ol>
						</div>
					</a>
				</div>
				<div class="item tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
					<a href="case-study.html" class="card">
						<center><img src="{{asset('sungku.png')}}" class="card-img-top" alt="Image" style="max-width: 35rem;"></center>
						<div class="card-body">
							<h5 class="card-title">DESA SUNGKU</h5>
							<p>
								<ol>
									<li>
										<p>Penyelamatan dan Evakuasi Korban Bencana</p>
									</li>
									<li>
										<p>Penetapan Status Keadaan Darurat Bencana</p>
									</li>
									<li>
										<p>Aktivitas Sistem Komando Penanganan Darurat Bencana</p>
									</li>
									<li>
										<p>Perbaikan Darurat
											Lingkungan yang rusak
											akiibat bencana</p>
									</li>
									<li>
										<p>Pemulihan Darurat Sarana
											Prasarana Vital</p>
									</li>
								</ol>
							</p>
						</div>
					</a>
				</div>
				<div class="item tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
					<a href="case-study.html" class="card">
						<center><img src="{{asset('pakuli.png')}}" class="card-img-top" alt="Image" style="max-width: 35rem;"></center>
						<div class="card-body">
							<h5 class="card-title">DESA PAKULI</h5>
							<p>
								<ol>
									<li>
										<p>Penyelamatan dan Evakuasi Korban Bencana</p>
									</li>
									<li>
										<p>Penetapan Status Keadaan Darurat Bencana</p>
									</li>
									<li>
										<p>Aktivitas Sistem Komando Penanganan Darurat Bencana</p>
									</li>
									<li>
										<p>Perbaikan Darurat
											Lingkungan yang rusak
											akiibat bencana</p>
									</li>
									<li>
										<p>Pemulihan Darurat Sarana
											Prasarana Vital</p>
									</li>
								</ol>
							</p>
						</div>
					</a>
				</div>
			</div>
		</div>
</div>

<div class="site-footer" id="kontak-kami">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="widget">
					<h3>About</h3>
					<p>Banjir Sulawesi Tengah, mengingatkan kita akan kekuatan alam yang tidak terduga. Namun, di tengah bencana ini, kita juga melihat kekuatan solidaritas dan kepedulian manusia yang tumbuh lebih kuat.</p>
				</div> <!-- /.widget -->
				<div class="widget">
					<address> <br> </address>
					<ul class="list-unstyled links">
						<li><a href="tel://11234567890">+6282334317534</a></li>
						<li><a href="mailto:info@mydomain.com">bpbdsulteng@gmail.com</a></li>
					</ul>
				</div> <!-- /.widget -->
			</div> <!-- /.col-lg-4 -->
			<div class="col-lg-4">
				<div class="widget">
					<h3>Dashboard</h3>
					<ul class="list-unstyled float-start links">
						<li><a href="#">Home</a></li>
						<li><a href="#">Tentang</a></li>
						<li><a href="#">Lapor</a></li>
						<li><a href="#">Kontak Kami</a></li>
					</ul>
					<ul class="list-unstyled float-start links">
						<li><a href="#">Partners</a></li>
						<li><a href="#">Business</a></li>
						<li><a href="#">Careers</a></li>
					</ul>
				</div> <!-- /.widget -->
			</div> <!-- /.col-lg-4 -->
			<div class="col-lg-4">
				<div class="widget">
					<h3>Navigation</h3>
					<ul class="list-unstyled links mb-4">
						<li><a href="#">Our Vision</a></li>
						<li><a href="#">About us</a></li>
						<li><a href="#">Contact us</a></li>
					</ul>

					<h3>Social</h3>
					<ul class="list-unstyled social">
						<li><a href="#"><span class="icon-instagram"></span></a></li>
						<li><a href="#"><span class="icon-twitter"></span></a></li>
						<li><a href="#"><span class="icon-facebook"></span></a></li>
						<li><a href="#"><span class="icon-linkedin"></span></a></li>
						<li><a href="#"><span class="icon-pinterest"></span></a></li>
						<li><a href="#"><span class="icon-dribbble"></span></a></li>
					</ul>
				</div> <!-- /.widget -->
			</div> <!-- /.col-lg-4 -->
		</div> <!-- /.row -->

		<div class="row mt-5">
			<div class="col-12 text-center">
            <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by Nanda Lenak
    </div> 

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
    	<div class="spinner-border text-primary" role="status">
    		<span class="visually-hidden">Loading...</span>
    	</div>
    </div>


    <script src="{{asset('web/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('web/js/tiny-slider.js')}}"></script>

    <script src="{{asset('web/js/flatpickr.min.js')}}"></script>


    <script src="{{asset('web/js/aos.js')}}"></script>
    <script src="{{asset('web/js/glightbox.min.js')}}"></script>
    <script src="{{asset('web/js/navbar.js')}}"></script>
    <script src="{{asset('web/js/counter.js')}}"></script>
    <script src="{{asset('web/js/custom.js')}}"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/compressorjs/1.0.5/compressor.min.js"></script>
		<script>
		$(document).ready(function() {
			navigator.geolocation.getCurrentPosition(function(position) {
				$('#latitude').val(position.coords.latitude);
				$('#longitude').val(position.coords.longitude);
			});

			const inputNumber = $('#phone');

            inputNumber.on('input', function() {
                const inputValue = inputNumber.val();
                if (inputValue.length > 13) {
                    inputNumber.val(inputValue.slice(0, 13)); // Menghapus karakter
                }
            });
		});

		function compressImage(inputElement, outputElementId) {
			const outputElement = document.getElementById(outputElementId);
			
			if (!outputElement) {
				console.error('Element output dengan ID ' + outputElementId + ' tidak ditemukan.');
				return;
			}

			const file = inputElement.files[0];
			if (file) {
				const fileName = file.name;

				// Mendapatkan ekstensi file dari nama file
				const fileExtension = fileName.split('.').pop().toLowerCase();

				// Compressor.js options
				const options = {
					quality: 0.6,
					maxWidth: 800,
					maxHeight: 600,
					mimeType: 'image/jpeg', // Default mimeType
					success(result) {
						// Hasil kompresi dalam bentuk objek blob
						const reader = new FileReader();
						reader.onload = function () {
							const base64Image = reader.result.split(',')[1]; // Ambil bagian base64 dari hasil kompresi
							outputElement.value = `data:${fileExtension};base64,${base64Image}`;
							// console.log(outputElement.value);
						};
						reader.readAsDataURL(result);
					},
					error(err) {
						console.error(err.message);
					},
				};
				new Compressor(file, options);
			}
		}

		</script>

  </body>
  </html>
