<!-- div konten utama -->
<div class="main-content for-content">
	<div class="container">
		<section class="body-content">
			<div class="row justify-content-center">
				<div class="col-sm-7">
					<div class="row pb-2 align-items-center title-head">
						<div class="col text-start fs-5 fw-bold">
							<p>Tambah kriteria baru</p>
						</div>
						<!-- <div class="col-md-4 text-end">
							<button type="button" class="btn btn-success">Tombol</button>
						</div> -->
					</div>
				
					<div class="card shadow-sm  ps-3 pt-3 pe-3 pb-3">
						<div class="card-body">
						<form action="" method="POST">
							<div class="mb-3">
								<label for="kodeAlternatif" class="form-label">Kode Kriteria</label>
								<input type="text" class="form-control" id="kode" name="kode" value="<?= $kode ?>" readonly>
							</div>
							<div class="mb-3">
								<label for="namaAlternatif" class="form-label">Nama Kriteria</label>
								<input type="text" class="form-control" id="nama" name="nama" autocomplete="off" value="<?= set_value('nama') ?>">
								<?= form_error('nama', '<div class="form-text text-danger">', '</div>') ?>
							</div>
							<div class="mb-3">
								<label for="namaAlternatif" class="form-label">Tipe Kriteria</label>
								<select class="form-select" name="tipe" id="tipe">
									<!-- <option selected>Pilih tipe kriteria...</option> -->
									<option value="benefit">Benefit</option>
									<option value="cost">Cost</option>
								</select>
								<?= form_error('tipe', '<div class="form-text text-danger">', '</div>') ?>
							</div>
							<div class="mb-3">
								<label for="namaAlternatif" class="form-label">Bobot Kriteria</label>
								<input type="text" class="form-control" id="bobot" name="bobot" autocomplete="off" value="<?= set_value('bobot') ?>">
								<?= form_error('bobot', '<div class="form-text text-danger">', '</div>') ?>
							</div>
							<button type="submit" class="btn btn-primary">Simpan</button>
						</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
