<!-- div konten utama -->
<div class="main-content for-content">
	<div class="container">
		<section class="body-content">
			<div class="row justify-content-center">
				<div class="col-sm-7">
					<div class="row pb-2 align-items-center title-head">
						<div class="col text-start fs-5 fw-bold">
							<p>List pengguna</p>
						</div>
						<!-- <div class="col-md-4 text-end">
							<a href="<?= base_url('admin/tambahPengguna') ?>" class="btn btn-success">Tambah admin baru</a>
						</div> -->
					</div>
					<!-- alert -->
					<?php if ($this->session->flashdata('pengguna')) {
						echo $this->session->flashdata('pengguna');
						unset($_SESSION['pengguna']);
					}?>
				
					<div class="card shadow-sm  ps-3 pt-3 pe-3 pb-3">
					<div class="row text-end">
						<div class="col">
							<a href="<?= base_url('admin/tambahPengguna') ?>" class="btn btn-primary">Tambah admin baru</a>
						</div>
					</div>
						<div class="card-body">
						<table class="table table-striped table-hover">
							<thead>
								<tr style="border-top: 1px solid #000;">
									<th scope="col">#</th>
									<th scope="col">Username</th>
									<th scope="col">Nama</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; ?>
								<?php foreach($pengguna->result_array() as $pr): ?>
								<tr>
									<th scope="row"><?= $no++ ?></th>
									<td><?= $pr['username']?></td>
									<td>
										<?= $pr['nama']?>
										<?php if($this->session->userdata('username') == '00user'): ?>

											<a href="<?= base_url('admin/hapusPengguna/' . $pr['username']) ?>" onclick="return confirm('Apakah data ini akan dihapus?')" class="btn btn-sm btn-danger float-end">Hapus</a>
											<a href="<?= base_url('admin/profilSaya/' . $pr['username']) ?>" class="btn btn-sm btn-success float-end me-2 px-3">Ubah</a>

										<?php elseif( ($pr['username'] == $this->session->userdata('username')) && ($pr['nama'] != '00user') ): ?>

											<a href="<?= base_url('admin/profilSaya/' . $pr['username']) ?>" class="btn btn-sm btn-success float-end">Ubah</a>
										<?php endif; ?>
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
