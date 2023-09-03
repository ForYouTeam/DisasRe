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
						<div class="col-2">
							<a href="index.html" class="logo m-0 float-start">Financing<span class="text-primary">.</span></a>
						</div>
						<div class="col-8 text-center ">
							<ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
								<li class="active"><a href="#home" >Home</a></li>
								<li><a href="#about">About</a></li>
								<li><a href="#contact">Contact Us</a></li>
							</ul>
						</div>
						<div class="col-2 text-end">
							<a href="#" class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
								<span></span>
							</a>

							<a href="#" class="call-us d-flex align-items-center">
								<span class="icon-phone"></span>
								<span>123-489-9381</span>
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
					<p class="text-white mb-5" data-aos="fade-up" data-aos-delay="100">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					<div class="align-items-center mb-5 mm" data-aos="fade-up" data-aos-delay="200">
						<a href="contact.html" class="btn btn-outline-white-reverse me-4">Contact us</a>
						<a href="https://www.youtube.com/watch?v=Mb1zrW_zra4" class="text-white glightbox">Watch the video</a>
					</div>
				</div>
				<div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
					<div class="img-wrap">
						<img src="{{asset('web/images/img-1.jpg')}}" alt="Image" class="img-fluid rounded">
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="section" id="about">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-7 mb-4 mb-lg-0">
					<img src="{{asset('web/banjir.jpg')}}" alt="Image" class="img-fluid rounded
					">
				</div>
				<div class="col-lg-4 ps-lg-2">
					<div class="mb-5">
						<h2 class="text-black h4">Make payment fast and smooth.</h2>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
					<div class="d-flex mb-3 service-alt">
						<div>
							<span class="bi-wallet-fill me-4"></span>
						</div>
						<div>
							<h3>Build financial</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
						</div>
					</div>

					<div class="d-flex mb-3 service-alt">
						<div>
							<span class="bi-pie-chart-fill me-4"></span>
						</div>
						<div>
							<h3>Invest for the future</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>

	<div class="section sec-features">
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
									<input type="text" name="reporter_name" class="form-control" id="" required>
								</div>
								<div class="form-group">
									<label for="">No Handpone <span class="text-danger">*</span></label>
									<input type="text" name="reporter_phone" class="form-control" id=""required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Alamat <span class="text-danger">*</span></label>
									<input type="text" name="reporter_address" class="form-control" id=""required>
								</div>
								<div class="form-group">
									<label for="">Selfie <span class="text-danger">*</span></label>
									<input type="file" name="selfie" class="form-control" id="" required>
								</div>
							</div>
							<div class="text-center mt-5">
								<h3>FORMULIR REPORT</h3><hr>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for=" " style="font-size: 13pt; font-weight: 400px">Tingkat Banjir <span class="text-danger">*</span></label>
									<select name="flood_id" id="flood_id" class="form-control" required>
										<option value="" selected disabled>-- Pilih --</option>
										@foreach ($data['data']  as $item)
											<option value="{{$item->id}}">{{$item->type}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<label for="">Level <span class="text-danger">*</span></label>
									<input type="text" name="level" class="form-control" id="" required>
								</div>
								<div class="form-group">
									<label for="">Priority <span class="text-danger">*</span></label>
									<input type="text" name="priority" class="form-control" id="" required>
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
											<label for="">Location <span class="text-danger">*</span></label>
											<input type="text" name="location" class="form-control" id="" required>
										</div>
										<div class="form-group">
											<label for="">Longtitude <span class="text-danger">*</span></label>
											<input type="text" name="longtitude" class="form-control" id="" required>
										</div>
										<div class="form-group">
											<label for="">Latitude <span class="text-danger">*</span></label>
											<input type="text" name="latitude" class="form-control" id="" required>
										</div>
										<div class="form-group">
											<label for="">Gambar <span class="text-danger">*</span></label>
											<div class="form-group mt-3">
												<label for="">File 1</label>
												<input type="file" class="form-control gmbr" name="image[]" id="" required>
											</div>
											<div class="form-group">
												<label for="">File 2</label>
												<input type="file" class="form-control gmbr" name="image[]" id="">
											</div>
											<div class="form-group">
												<label for="">File 3</label>
												<input type="file" class="form-control gmbr" name="image[]" id="">
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

	<div class="section" id="contact">
		<h2 class="text-center">CONTACT ME</h2>
	</div>

</div>

<div class="site-footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="widget">
					<h3>About</h3>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
				</div> <!-- /.widget -->
				<div class="widget">
					<address>43 Raymouth Rd. Baltemoer, <br> London 3910</address>
					<ul class="list-unstyled links">
						<li><a href="tel://11234567890">+1(123)-456-7890</a></li>
						<li><a href="tel://11234567890">+1(123)-456-7890</a></li>
						<li><a href="mailto:info@mydomain.com">info@mydomain.com</a></li>
					</ul>
				</div> <!-- /.widget -->
			</div> <!-- /.col-lg-4 -->
			<div class="col-lg-4">
				<div class="widget">
					<h3>Company</h3>
					<ul class="list-unstyled float-start links">
						<li><a href="#">About us</a></li>
						<li><a href="#">Services</a></li>
						<li><a href="#">Vision</a></li>
						<li><a href="#">Mission</a></li>
						<li><a href="#">Terms</a></li>
						<li><a href="#">Privacy</a></li>
					</ul>
					<ul class="list-unstyled float-start links">
						<li><a href="#">Partners</a></li>
						<li><a href="#">Business</a></li>
						<li><a href="#">Careers</a></li>
						<li><a href="#">Blog</a></li>
						<li><a href="#">FAQ</a></li>
						<li><a href="#">Creative</a></li>
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

            <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a> Distributed By <a href="https://themewagon.com">ThemeWagon</a> <!-- License information: https://untree.co/license/ -->
            </p>
          </div>
        </div>
      </div>
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
  </body>
  </html>
