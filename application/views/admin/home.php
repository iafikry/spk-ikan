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
				}elseif($this->session->flashdata('login')){
					echo $this->session->flashdata('login');
					unset($_SESSION['login']);
				}?>
				<!-- akhir alert -->
			
				<div class="card shadow-sm  ps-3 pt-3 pe-3 pb-3">
					<table class="table table-striped table-hover align-middle">
					<thead>
						<tr style="border-top: 1px solid #000;">
							<th scope="col" style="border-bottom: 1px solid #000;" rowspan="2">Kode Alternatif</th>
							<th scope="col" style="border-bottom: 1px solid #000;" rowspan="2">Nama Alternatif</th>
							<th scope="col" style="border-bottom: none;" class="text-center" colspan="<?= $kriteria->num_rows() ?>">Kriteria</th> 
							<th scope="col" style="border-bottom: 1px solid #000;" rowspan="2">Opsi</th>
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

											<td>
												<a class="btn btn-sm btn-success m-2" href="<?= base_url('admin/ubahNilai/' . $a['kode']) ?>">Ubah</a>
												<a class="btn btn-sm btn-danger m-2" href="<?= base_url('admin/hapusNilai/' . $a['kode']) ?>" onclick="return confirm('Apakah data ini akan dihapus?')">Hapus</a>
											</td>

									<?php elseif( ($cekNilai[$a['kode']] < $kriteria->num_rows()) && ($cekNilai[$a['kode']] > 0) ): ?>
											<td colspan="<?= $kriteria->num_rows() + 1?>">
												<a class="btn btn-sm btn-success ps-2 pe-2" href="<?= base_url('admin/ubahNilai/' . $a['kode']) ?>">Ubah nilai</a>
											</td>

									<?php else: ?>
											<td colspan="<?= $kriteria->num_rows() + 1 ?>">
												<a class="btn btn-sm btn-primary ps-2 pe-2" href="<?= base_url('admin/tambahNilai/'.$a['kode'] ) ?>">Isi nilai</a>
											</td>
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
					<div class="col text-end">
						<a href="<?= base_url('admin/tambahBibitIkan') ?>" class="btn btn-primary">Tambah alternatif</a>
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
									<a href="<?= base_url('admin/ubahBibitIkan/' . $alt['kode']) ?>" class="btn btn-sm btn-success text-capitalize"> ubah </a>
									<a href="<?= base_url('admin/hapusBibitIkan/' . $alt['kode']) ?>" onclick="return confirm('Apakah data ini akan dihapus?')" class="btn btn-sm btn-danger text-capitalize ms-2"> hapus </a>
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
					<div class="col text-end">
						<a href="<?= base_url('admin/tambahKriteria') ?>" class="btn btn-md btn-primary">tambah kriteria</a>
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
							<th scope="col">Opsi</th>
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
							<td>
								<a href="<?= base_url('admin/ubahKriteria/' . $kriteria['kode']) ?>" class="btn btn-sm btn-success">Ubah</a>
								<a href="<?= base_url('admin/hapusKriteria/' . $kriteria['kode']) ?>" onclick="return confirm('Apakah data ini akan dihapus?')" class="btn btn-sm btn-danger">Hapus</a>
							</td>
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
