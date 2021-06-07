<!-- div konten utama -->
<div class="main-content for-content">
	<div class="container">
		<section class="body-content">
			<div class="row justify-content-center">
				<div class="col-sm-7">
					<div class="row pb-2 align-items-center title-head">
						<div class="col text-start fs-5 fw-bold">
							<p>Nilai kecocokan alternatif dengan kriteria</p>
						</div>
						<!-- <div class="col-md-4 text-end">
							<button type="button" class="btn btn-success">Tombol</button>
						</div> -->
					</div>
				
					<div class="card shadow-sm  ps-3 pt-3 pe-3 pb-3">
						<div class="card-body">
						<form action="" method="POST">
							<div class="mb-3">
								<label for="kodeAlternatif" class="form-label">Kode Alternatif</label>
								<input type="text" class="form-control" id="kode" name="kode" value="<?= $alternatif['kode'] ?>" readonly>
							</div>
							<div class="mb-3">
								<label for="namaAlternatif" class="form-label">Nama Alternatif</label>
								<input type="text" class="form-control" id="nama" name="nama" autocomplete="off" value="<?= $alternatif['nama'] ?>" readonly>
								<?= form_error('nama', '<div class="form-text text-danger">', '</div>') ?>
							</div>
							<!-- kriteria -->
							<?php foreach($kriteria->result_array() as $ktr):?>
							<input type="hidden" name="<?= 'k_' . $ktr['kode'] ?>" value="<?= $ktr['kode'] ?>">
							<div class="mb-3">
								<label for="namaAlternatif" class="form-label"><?= $ktr['nama'] ?></label>
								<input type="text" class="form-control" id="<?= 'nilai' . $ktr['kode'] ?>" name="<?= 'nilai' . $ktr['kode'] ?>" autocomplete="off" value="<?= set_value('nilai'.$ktr['kode']) ?>">
								<?= form_error('nilai' . $ktr['kode'], '<div class="form-text text-danger">', '</div>') ?>
							</div>
							<?php endforeach; ?>
							<!-- akhir kriteria -->
							<button type="submit" class="btn btn-primary">Simpan</button>
						</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
