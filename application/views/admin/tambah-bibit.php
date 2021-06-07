<!-- div konten utama -->
<div class="main-content for-content">
	<div class="container">
		<!-- section konten 1 -->
		<section class="body-content">
		<div class="row pb-2 align-items-center title-head">
			<div class="col-md-4 text-start fs-5 fw-bold">
				<p>Tambah bibit alternatif baru</p>
			</div>
		</div>
		<div class="card shadow-sm  ps-3 pt-3 pe-3 pb-3">
			<form action="" method="POST">
			<div class="mb-3">
				<label for="kodeAlternatif" class="form-label">Kode Alternatif</label>
				<input type="text" class="form-control" id="kode" name="kode" value="<?= $kodeAlt ?>" readonly>
			</div>
			<div class="mb-3">
				<label for="namaAlternatif" class="form-label">Nama Alternatif</label>
				<input type="text" class="form-control" id="nama" name="nama" autocomplete="off" value="<?= set_value('nama') ?>">
				<?= form_error('nama', '<div class="form-text text-danger">', '</div>') ?>
			</div>
			<button type="submit" class="btn btn-primary">Simpan</button>
			</form>
		</div>
		</section>
		<!-- akhir section konten  1 -->
	</div>
</div>
