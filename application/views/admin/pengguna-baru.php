<!-- div konten utama -->
<div class="main-content for-content">
	<div class="container">
		<section class="body-content">
			<div class="row justify-content-center">
				<div class="col-sm-7">
					<div class="row pb-2 align-items-center title-head">
						<div class="col text-start fs-5 fw-bold">
							<p>Tambah pengguna</p>
						</div>
					</div>
				
					<div class="card shadow-sm  ps-3 pt-3 pe-3 pb-3">
						<div class="card-body">
						<form action="" method="POST">
							<div class="mb-3">
								<label for="kodeAlternatif" class="form-label">Username</label>
								<input type="text" class="form-control" id="username" name="username" value="<?= set_value('username') ?>" autocomplete="off">
								<?= form_error('username', '<div class="form-text text-danger">', '</div>') ?>
							</div>
							<div class="mb-3">
								<label for="namaAlternatif" class="form-label">Nama</label>
								<input type="text" class="form-control" id="nama" name="nama" autocomplete="off" value="<?= set_value('nama')?>">
								<?= form_error('nama', '<div class="form-text text-danger">', '</div>') ?>
							</div>
							<div class="mb-3">
								<label for="namaAlternatif" class="form-label">Password</label>
								<input type="password" class="form-control" id="password1" name="password1" autocomplete="off">
								<?= form_error('password1', '<div class="form-text text-danger">', '</div>') ?>
							</div>
							<div class="mb-3">
								<label for="namaAlternatif" class="form-label">Masukan password kembali</label>
								<input type="password" class="form-control" id="password2" name="password2" autocomplete="off">
								<?= form_error('password2', '<div class="form-text text-danger">', '</div>') ?>
							</div>
							<button type="submit" class="btn btn-primary">Simpan</button>
							<a class="btn btn-danger" href="<?= base_url('admin/list') ?>">Kembali</a>
						</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
