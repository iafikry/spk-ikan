<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

	<link rel="stylesheet" href="<?= base_url('assets/css/my_style.css') ?>">

    <title>Sekitar | SPK Ikan Air Tawar</title>
  </head>
  <body id="home">
  <!-- Sistem Pendukung Keputusan Ikan Air Tawar (SEKITAR) -->
  <!-- navbar menu -->
	<nav class="navbar navbar-expand-lg navbar-dark">
	<div class="container">
		<a class="navbar-brand" href="<?= base_url()?>">Logo</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav ms-auto text-center text-capitalize">
				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="<?= base_url('welcome#home') ?>">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('welcome#alternatif') ?>">Alternatif</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('welcome#kriteria') ?>">Kriteria</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('welcome/tentang') ?>">Tentang</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('welcome/panduan') ?>">Panduan</a>
				</li>
				<?php if( $this->session->userdata('username') ): ?>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<?= $this->session->userdata('username'); ?>
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="<?= base_url('admin/profilSaya/'. $this->session->userdata('username')) ?>">Profil saya</a></li>
							<li><a class="dropdown-item" href="<?= base_url('admin/list') ?>">List pengguna</a></li>
							<li><a class="dropdown-item" href="<?= base_url('welcome/Logout') ?>">Logout</a></li>
						</ul>
					</li>
				<?php else: ?>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('welcome/auth') ?>">Login</a>
					</li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
	</nav>
	<!-- akhir navbar menu -->
	
	<!-- garis biru tambahan (biar tebel) -->
	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 160"><path fill="#0A58CA" fill-opacity="1" d="M0,256L0,128L1440,128L1440,0L0,0L0,0Z"></path></svg>
	<!-- akhir garis biru -->
	<!-- div konten utama -->
	<div class="main-content for-content">
		<div class="container">
			<!-- section konten 1 -->
			<section class="body-content">
			<div class="row pb-2 align-items-center title-head">
				<div class="col-md-4 text-start fs-5 fw-bold">
					<p>Panduan</p>
				</div>
			</div>
			<div class="card shadow-sm  ps-3 pt-3 pe-3 pb-3">
			<h5 class="card-title">Petunjuk Penggunaan</h5>
			<div class="row  justify-content-center">
				<div class="col-md-7">
					<img src="<?= base_url('assets/img/1-user.png') ?>" alt="menu user">
				</div>
			</div>
			<p class="fs-5 fw-bold">Home</p>
			<ul>
				<li> <strong>Home</strong>  untuk melihat nilai kecocokan antara alternatif jenis bibit ikan dengan kriteria</li>
				<li> <strong>Ambil Keputusan</strong>  untuk melihat hasil keputusan berdasarkan metode perhitungan Simple Multi Attribute Rating Technique.</li>
			</ul>
			<p class="fs-5 fw-bold">Alternatif</p>
			<ul>
				<li> <strong>Alternatif</strong>  untuk melihat jenis-jenis bibit ikan yang digunakan sebagai alternatif.</li>
			</ul>
			<p class="fs-5 fw-bold">Kriteria</p>
			<ul>
				<li> <strong>Kriteria</strong>  untuk melihat kriteria-kriteria yang digunakan berserta bobot dan jenis kriterianya.</li>
			</ul>
			<p class="fs-5 fw-bold">Tentang</p>
			<ul>
				<li> <strong>Tentang</strong>  untuk mengetahui sistem yang sedang digunakan.</li>
			</ul>
			<p class="fs-5 fw-bold">Panduan</p>
			<ul>
				<li> <strong>Panduan</strong>  untuk melihat cara penggunaan sistem.</li>
			</ul>
			<p class="fs-5 fw-bold">Login</p>
			<ul>
				<li> 
					<strong>Login</strong>  untuk masuk ke dalam sistem, jika ada penambahan/pengurangan alternatif dan kriteria. <br>
					<small>*hanya admin yang dapat masuk ke dalam sistem.</small>
				</li>
			</ul>
			</section>
			<!-- akhir section konten  1 -->
		</div>
	</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>
