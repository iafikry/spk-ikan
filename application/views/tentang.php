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
					<a class="nav-link" aria-current="page" href="<?= base_url('welcome#home') ?>">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('welcome#alternatif') ?>">Alternatif</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('welcome#kriteria') ?>">Kriteria</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" href="<?= base_url('welcome/tentang') ?>">Tentang</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('welcome/panduan') ?>">Panduan</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('welcome/auth') ?>">Login</a>
				</li>
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
					<p>Tentang</p>
				</div>
			</div>
			<div class="card shadow-sm  ps-3 pt-3 pe-3 pb-3">
				<p class="card-text">
					SEKITAR adalah Sistem pendukung keputusan ikan air tawar, sistem ini membantu untuk memutuskan jenis bibit ikan yang akan dibudidaya berdasarkan <?= $kriteria->num_rows(); ?> kriteria, yaitu  
					<?php 
					$i = 1;
					$total = $kriteria->num_rows(); 
					foreach ($kriteria->result_array() as $kt) :
						$kata = $kt['nama'];
							if ($i < ($total - 1)) :
								echo $kata .  ', ';
							elseif ($i == ($total - 1)) :
								echo $kata . ' dan ';
							else :
								echo $kata . '. ';
							endif;
						$i++;
					endforeach; ?>
					Serta terdapat <?= $alternatif->num_rows() ?> jenis bibit ikan sebagai alternatif, yaitu
					<?php 
					$i = 1;
					$total = $alternatif->num_rows(); 
					foreach ($alternatif->result_array() as $al) :
						$kata = $al['nama'];
							if ($i < ($total - 1)) :
								echo $kata .  ', ';
							elseif ($i == ($total - 1)) :
								echo $kata . ' dan ';
							else :
								echo $kata . '. ';
							endif;
						$i++;
					endforeach; ?>
				</p>
				<p class="card-text">
					Sistem pendukung keputusan adalah sistem yang dirancang untuk membantu pengambilan keputusan pada saat situasi dan kondisi yang semi terstruktur serta situasi atau kondisi yang tidak terstruktur (Turban dkk., 2005).
				</p>
				<p class="card-text">
					Aplikasi ini merupakan hasil dari penelitian skripsi mahasiswa STMIK Horizon Karawang tahun akademik 2020/2021:
					<table style="border: none !important; width: 80%;">
						<tr>
							<td>Nama</td>
							<td>:</td>
							<td>Amelia Putri</td>
						</tr>
						<tr>
							<td>NPM</td>
							<td>:</td>
							<td>43E57027175003</td>
						</tr>
						<tr>
							<td>Pembimbing 1</td>
							<td>:</td>
							<td>Dedih, M.Kom.</td>
						</tr>
						<tr>
							<td>Pembimbing 2</td>
							<td>:</td>
							<td>Yessy Yanitasari, M.Kom.</td>
						</tr>
						<tr>
							<td>Judul skripsi</td>
							<td>:</td>
							<td>Penerapan Metode Simple Multi Attribute Rating Technique Menentukan Jenis Bibit Budidaya Ikan Air Tawar</td>
						</tr>
					</table>
				</p>
			</div>
			</section>
			<!-- akhir section konten  1 -->
		</div>
	</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>
