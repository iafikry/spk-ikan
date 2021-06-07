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
  <body>
  <!-- Sistem Pendukung Keputusan Ikan Air Tawar (SEKITAR) -->
  <!-- navbar menu -->
	<nav class="navbar navbar-expand-lg navbar-dark">
	<div class="container">
		<a class="navbar-brand" href="<?= base_url() ?>">Logo</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav ms-auto text-center text-capitalize">
				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="<?= base_url()?>">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('#alternatif') ?>">Alternatif</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('#kriteria') ?>">Kriteria</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('welcome/tentang') ?>">Tentang</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('welcome/panduan') ?>">Panduan</a>
				</li>
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
			</ul>
		</div>
	</div>
	</nav>
	<!-- akhir navbar menu -->

	<!-- garis biru tambahan (biar tebel) -->
	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 160"><path fill="#0A58CA" fill-opacity="1" d="M0,256L0,128L1440,128L1440,0L0,0L0,0Z"></path></svg>
	<!-- akhir garis biru -->
