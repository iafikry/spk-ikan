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
					<a class="nav-link active" aria-current="page" href="#home">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#alternatif">Alternatif</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#kriteria">Kriteria</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('welcome/tentang') ?>">Tentang</a>
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
					<div class="col-md-4 text-start fs-5 text-capitalize fw-bold">
						<p>kecocokan kriteria dengan alternatif</p>
					</div>
					<!-- <div class="col-md-4 text-end">
						<button type="button" class="btn btn-success">Tombol</button>
					</div> -->
				</div>
				<!-- alert -->
				<?php if ($this->session->flashdata('nilai')) {
					echo $this->session->flashdata('nilai');
					unset($_SESSION['nilai']);
				}?>
				<!-- akhir alert -->
			
				<div class="card shadow-sm  ps-3 pt-3 pe-3 pb-3">
					<table class="table table-striped table-hover align-middle">
					<thead>
						<tr>
							<th style="border-bottom: 1px solid #000; border-top: 1px solid #000;" scope="col" rowspan="2">Kode Alternatif</th>
							<th style="border-bottom: 1px solid #000; border-top: 1px solid #000;" scope="col" rowspan="2">Nama Alternatif</th>
							<th style="border-bottom:none; border-top: 1px solid #000;" class="text-center" scope="col" colspan="<?= $kriteria->num_rows() ?>">Kriteria</th>
						</tr>
						<tr>
							<?php foreach($kriteria->result_array() as $ktr): ?>
								<th scope="col"><?= $ktr['nama'] ?></th>
							<?php endforeach; ?>
						</tr>
					</thead>
					<tbody>
						<?php if($alternatif->num_rows() > 0): ?>
							<?php foreach($alternatif->result_array() as $a): ?>
								<tr>
									<th scope="row"><?= $a['kode'] ?></td>
									<td><?= $a['nama'] ?></td>
									<?php if( ($cekNilai[$a['kode']] == 0) && ($kriteria->num_rows() == 0)): ?>
										<td colspan="<?= $kriteria->num_rows() + 2?>">
											Tidak ada nilai yang tersimpan
										</td>

									<?php elseif($cekNilai[$a['kode']] == $kriteria->num_rows()): 
											foreach($penilaian->result_array() as $nilai):
												if($a['kode'] == $nilai['kodeAlt']): ?>
													<td><?= $nilai['nilai'] ?></td>
												<?php endif;
											endforeach; ?>
									<?php endif; ?>
								</tr>
							<?php endforeach; ?>
						<?php else: ?>
							<tr>
								<td colspan="<?= $kriteria->num_rows() + 3 ?>"> Tidak ada data yang tersimpan </td>
							</tr>
						<?php endif; ?>
					</tbody>
					</table>
					<div class="row align-items-center">
						<div class="col">
							<a href="<?= base_url('admin/ambilKeputusan') ?>" class="btn btn-primary" > Ambil keputusan </a>
						</div>
					</div>
				</div>
			</section>
			<!-- akhir section konten  1 -->

			<!-- section konten 2 (list alternatif) -->
			<section id="alternatif" class="body-content pt-5">
				<!-- alert  -->
				<?php if ($this->session->flashdata('alternatif')) {
					echo $this->session->flashdata('alternatif');
					unset($_SESSION['alternatif']);
				}?>
				<!-- akhir alert -->
				<div class="row pb-2 align-items-center text-dark">
					<div class="col text-start fs-5 fw-bold text-capitalize">
						<p>alternatif bibit ikan</p>
					</div>
				</div>

				<div class="row justify-content-center">
				<?php if($alternatif->num_rows() > 0): ?>
					<?php foreach($alternatif->result_array() as $alt): ?>
						<div class="col-md-4">
						<div class="card shadow-sm mb-3" style="max-width: 540px;">
							<div class="row g-0">
								<!-- <div class="col-md-4">
								<img src="..." alt="image 1">
								</div> -->
								<div class="col-md-8">
								<div class="card-body">
									<h5 class="card-title"><?= $alt['nama'] ?></h5>
									<p class="card-text"> <?= $alt['kode'] ?> <p>
								</div>
								</div>
							</div>
						</div>
						</div>
					<?php endforeach; ?>
				<?php else: ?>
					<div class="col-md-5">
						<div class="card shadow-sm text-center">
							<div class="card-body">
							 <h5 class="card-title">Tidak ada data yang tersimpan.</h5>
							</div>
						</div>
					</div>
				<?php endif; ?>
				</div>
			</section>
			<!-- akhir section konten 2 -->

			<!-- section konten 3 (list kriteria) -->
			<section id="kriteria" class="body-content mt-5">
				<!-- alert  -->
				<?php if ($this->session->flashdata('kriteria')) {
					echo $this->session->flashdata('kriteria');
					unset($_SESSION['kriteria']);
				}?>
				<!-- akhir alert -->
				<div class="row pb-2 align-items-center text-dark text-capitalize">
					<div class="col text-start fs-5 fw-bold">
						<p>kriteria</p>
					</div>
				</div>

				<div class="card shadow-sm ps-3 pt-3 pe-3 pb-3">
					<table class="table table-striped table-hover">
					<thead>
						<tr style="border-top: 1px solid #000;">
							<th scope="col">Kode kriteria</th>
							<th scope="col">Nama kriteria</th>
							<th scope="col">Tipe kriteria</th>
							<th scope="col">Bobot</th>
						</tr>
					</thead>
					<tbody>
					<?php if($kriteria->num_rows() > 0): ?>
						<?php foreach($kriteria->result_array() as $kriteria): ?>
						<tr>
							<th scope="row"><?= $kriteria['kode'] ?></th>
							<td><?= $kriteria['nama'] ?></td>
							<td><?= $kriteria['tipe'] ?></td>
							<td><?= $kriteria['bobot'] ?></td>
						</tr>
						<?php endforeach; ?>
					<?php else: ?>
						<tr align="center">
							<td colspan="5">Tidak ada data yang tersimpan</td>
						</tr>
					<?php endif; ?>
					</tbody>
					</table>
				</div>
			</section>
			<!-- akhir section 3 -->
		</div>
	</div>
	<!-- akhir div konten utama -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>
