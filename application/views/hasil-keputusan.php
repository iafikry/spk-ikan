<!-- div konten utama -->
<div class="main-content for-content">
	<div class="container">
		<!-- section konten 1 -->
		<section class="body-content">
		<div class="row pb-2 align-items-center title-head">
			<div class="col-md-4 text-start fs-5 fw-bold">
				<p>Hasil keputusan</p>
			</div>
		</div>
		<div class="card shadow-sm  ps-3 pt-3 pe-3 pb-3">
		<h5 class="card-title">Kesimpulan:</h5>
		<p class="card-text">Keputusan yang dihasilkan oleh metode perhitungan Simple Multi Attribute Rating Technique (SMART) adalah <b><?= $smart['nama'] ?></b>.</p>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th scope="col">Kode alternatif</th>
						<th scope="col">Nama alternatif</th>
						<th scope="col">Nilai akhir</th>
						<th scope="col">Ranking</th>
					</tr>
				</thead>
				<tbody>
					<?php rsort($hasil['nilai akhir']); ?>
					<?php //var_dump($hasil['nilai akhir']); die; ?>
					<?php $i=0; ?>
					<?php foreach($alternatif->result_array() as $alt): ?>
						<?php foreach($alternatif->result_array() as $a): ?>
							<?php if($a['kode'] == $hasil['nilai akhir'][$i]['kode']): ?>
								<tr>
									<td><?= $hasil['nilai akhir'][$i]['kode'] ?></td>
									<td><?= $a['nama'] ?></td>
									<td><?= $hasil['nilai akhir'][$i]['nilai'] ?></td>
									<td><?= $no = $i + 1 ?></td>
								</tr>
							<?php endif; ?>
						<?php endforeach; 
						++$i; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		</section>
		<!-- akhir section konten  1 -->
		
		<!-- section 2 -->
		<section class="body-content mt-5">
			<div class="row">
				<div class="col text-start fw-bold fs-5">
					<p>Nilai normalisasi </p>
				</div>
			</div>

			<div class="card shadow-sm ps-3 pt-3 pe-3 pb-3">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th scope="col">Kode kriteria</th>
							<th scope="col">Nama kriteria</th>
							<th scope="col">Bobot</th>
							<th scope="col">Nilai normalisasi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($kriteria->result_array() as $k): ?>
						<tr>
							<td><?= $k['kode'] ?></td>
							<td><?= $k['nama'] ?></td>
							<td><?= $k['bobot'] ?></td>
							<td><?= $hasil['normalisasi'][$k['kode']] ?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</section>
		<!-- akhir section 2 -->

		<!-- section 3 -->
		<section class="body-content mt-5">
			<div class="row">
				<div class="col text-start fw-bold fs-5">
					<p>Nilai utility</p>
				</div>
			</div>

			<div class="card shadow-sm ps-3 pt-3 pe-3 pb-3">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th scope="col" rowspan="2">Kode alternatif</th>
							<th scope="col" rowspan="2">Nama alternatif</th>
							<th scope="col" colspan="<?= $kriteria->num_rows() ?>">Kriteria</th>
						</tr>
						<tr>
							<?php foreach($kriteria->result_array() as $kt): ?>
							<td><?= $kt['nama'] ?></td>
							<?php endforeach; ?>
						</tr>
					</thead>
					<tbody>
						<?php foreach($alternatif->result_array() as $al): ?>
						<tr>
							<td><?= $al['kode'] ?></td>
							<td><?= $al['nama'] ?></td>
							<?php foreach($kriteria->result_array() as $ktr): ?>
								<td><?= $hasil['nilai utility'][$al['kode']][$ktr['kode']] ?></td>
							<?php endforeach; ?>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</section>
		<!-- akhir section 3 -->
	</div>
</div>
