<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('Admin_model', 'admin_model');
		$this->load->library('form_validation');
		
	}

	public function index(){
		redirect('welcome');
	}

	public function tambahBibitIkan(){
		$data['kodeAlt'] = $this->admin_model->kodeAlternatif();
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
			'required' => 'Nama harus diisi'
		]);
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header');
			$this->load->view('admin/tambah-bibit', $data);
			$this->load->view('templates/footer');
			
		} else {
			$this->admin_model->tambahData($table='tb_alternatif', $data = [
				'kode' => $this->input->post('kode'),
				'nama' => $this->input->post('nama', true)
			]);
			$this->session->set_flashdata('alternatif', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  				Data baru <strong> berhasil ditambahkan.</strong>
  				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			
			redirect('welcome#alternatif');
		}
	}

	public function ubahBibitIkan($kode){
		$data['alternatif'] = $this->admin_model->ambilDataById('tb_alternatif', ['kode' => $kode]);
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
			'required' => 'Nama harus diisi'
		]);

		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header');
			$this->load->view('admin/ubah-bibit', $data);
			$this->load->view('templates/footer');
			
		} else {
			$this->admin_model->updateData($table='tb_alternatif', $data = ['nama' => $this->input->post('nama', true)], $where = ['kode' => $kode]);
			$this->session->set_flashdata('alternatif', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  				Data baru <strong> berhasil diubah.</strong>
  				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('welcome#alternatif');
		}
	}

	public function hapusBibitIkan($kode){
		$this->admin_model->hapusData('tb_alternatif', ['kode' => $kode]);
		$this->session->set_flashdata('alternatif', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  				Data <strong> berhasil dihapus.</strong>
  				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
		redirect('Welcome');
	}

	public function tambahKriteria(){
		$data['kode'] = $this->admin_model->kodeKriteria();

		$this->form_validation->set_rules('nama' , 'Nama', 'required|trim|max_length[35]', [
			'required' => 'Nama harus diisi',
			'max_length' => 'Makismal 35 karakter'
		]);
		$this->form_validation->set_rules('tipe', 'Tipe', 'required', [
			'required' => 'Tipe kriteria harus dipilih'
		]);
		$this->form_validation->set_rules('bobot', 'Bobot', 'required|numeric|less_than_equal_to[100]', [
			'required' => 'Bobot kriteria tidak boleh kosong',
			'numeric' => 'Bobot hanya boleh diisikan oleh angka',
			'less_than_equal_to' => 'Maksimal bobot kriteria adalah 100'
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header');
			$this->load->view('admin/tambah-kriteria', $data);
			$this->load->view('templates/footer');
			
		} else {
			$this->admin_model->tambahData($table = 'tb_kriteria', $data = [
				'kode' => $this->input->post('kode'),
				'nama' => $this->input->post('nama', true),
				'tipe' => $this->input->post('tipe'),
				'bobot' => $this->input->post('bobot', true)
			]);
			$this->session->set_flashdata('kriteria', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  				Data baru <strong> berhasil ditambahkan.</strong>
  				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('welcome#kriteria');
		}
		
	}

	public function ubahKriteria($kode){
		$data['kriteria'] = $this->admin_model->ambilDataById($table='tb_kriteria', $where = ['kode' => $kode]);
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim|max_length[35]', [
			'required' => 'Nama harus diisi',
			'max_length' => 'Maksimal 35 karakter'
		]);
		$this->form_validation->set_rules('tipe', 'Tipe', 'required', ['required' => 'Tipe bobot harus dipilih']);
		$this->form_validation->set_rules('bobot', 'Bobot', 'required|numeric|less_than_equal_to[100]', [
			'required' => 'Bobot kriteria harus diisi',
			'numeric' => 'Bobot harus diisikan angka',
			'less_than_equal_to' => 'Maksimal bobot kriteria adalah 100'
		]);

		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header');
			$this->load->view('admin/ubah-kriteria', $data);
			$this->load->view('templates/footer');
			
		} else {
			$this->admin_model->updateData($table = 'tb_kriteria', $data = [
				'nama' => $this->input->post('nama', true),
				'tipe' => $this->input->post('tipe', true),
				'bobot' => $this->input->post('bobot', true)
				], $where = ['kode' => $kode]);
			$this->session->set_flashdata('kriteria', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  				Data <strong> berhasil diubah.</strong>
  				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('welcome#kriteria');
		}
		
	}

	public function hapusKriteria($kode){
		$this->admin_model->hapusData($table = 'tb_kriteria', $where = ['kode' => $kode]);
		$this->session->set_flashdata('kriteria', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  				Data <strong> berhasil dihapus.</strong>
  				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
		redirect('welcome#kriteria');
	}

	public function tambahNilai($kode){
		$data['kriteria'] = $this->admin_model->ambilSemuaData('tb_kriteria');
		$data['alternatif'] = $this->admin_model->ambilDataById('tb_alternatif', ['kode' => $kode]);
		foreach($data['kriteria']->result_array() as $k){
			$this->form_validation->set_rules('nilai'.$k['kode'], 'Nilai'.$k['kode'], 'required|numeric', [
				'required' => 'Kolom ini harus diisi',
				'numeric' => 'Kolom ini harus diisi oleh angka'
			]);
		}
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header');
			$this->load->view('admin/tambah-penilaian', $data);
			$this->load->view('templates/footer');
			
		} else {
			$this->admin_model->nilaiAlternatif();
			$this->session->set_flashdata('nilai', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  				Data baru <strong> berhasil ditambahkan.</strong>
  				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('welcome');
		}
	}

	public function ubahNilai($kode){
		$data['nilai'] = $this->db->get_where('tb_penilaian', ['kodeAlt' => $kode])->result_array();
		$data['kriteria'] = $this->admin_model->ambilSemuaData('tb_kriteria');
		$data['alternatif'] = $this->admin_model->ambilDataById('tb_alternatif', ['kode' => $kode]);
		$data['cekNilai'] = $this->db->get_where('tb_penilaian', ['kodeAlt' => $kode])->num_rows();
		// var_dump($data['nilai']); die;
		foreach($data['kriteria']->result_array() as $k){
			$this->form_validation->set_rules('nilai'.$k['kode'], 'Nilai'.$k['kode'], 'required|numeric', [
				'required' => 'Kolom ini harus diisi',
				'numeric' => 'Kolom ini harus diisi oleh angka'
			]);
		}
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header');
			$this->load->view('admin/ubah-nilai', $data);
			$this->load->view('templates/footer');
			
		} else {
			$this->admin_model->ubahNilaiAlternatif($kode);
			$this->session->set_flashdata('nilai', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  				Data <strong> berhasil diubah.</strong>
  				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('welcome');
		}
	}

	public function hapusNilai($kode){
		$this->admin_model->hapusData('tb_penilaian', ['kodeAlt' => $kode]);
		$this->session->set_flashdata('nilai', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  				Data <strong> berhasil dihapus.</strong>
  				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('welcome');
	}

	public function ambilKeputusan(){
		$data['hasil'] = $this->admin_model->keputusan();
		$data['alternatif'] = $this->admin_model->ambilSemuaData('tb_alternatif');
		$data['kriteria'] = $this->admin_model->ambilSemuaData('tb_kriteria');
		rsort($data['hasil']['nilai akhir']);
		$data['smart'] = $this->admin_model->ambilDataById('tb_alternatif', ['kode' => $data['hasil']['nilai akhir'][0]['kode']]);
		$this->load->view('templates/header');
		$this->load->view('hasil-keputusan', $data);
		$this->load->view('templates/footer');
	
	}

	public function profilSaya($username){
		$data['profil'] = $this->admin_model->ambilDataById('tb_pengguna', ['username' => $username]);

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required', ['required' => 'Nama harus diisi']);
		$this->form_validation->set_rules('password', 'Password', 'trim|required', ['required' => 'Password harus diisi']);
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header');
			$this->load->view('admin/profil', $data);
			$this->load->view('templates/footer');
			
		} else {
			$this->admin_model->updateData('tb_pengguna', [
				'nama' => $this->input->post('nama', true),
				'password' => $this->input->post('password')
			], ['username' => $username]);
			$this->session->set_flashdata('pengguna', '<div class="alert alert-success alert-dismissible fade show" role="alert">
					  Data <strong> berhasil diubah.</strong>
					  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
			redirect('admin/list');
		}
		
	}

	public function list(){
		$data['pengguna'] = $this->admin_model->ambilSemuaData('tb_pengguna');
			$this->load->view('templates/header');
			$this->load->view('admin/list', $data);
			$this->load->view('templates/footer');
	}

	public function hapusPengguna($username){
		if ($username == '00user') {
			$this->session->set_flashdata('pengguna', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  Data<strong> tidak dapat dihapus.</strong>
					  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
			
		} else {
			$this->admin_model->hapusData('tb_pengguna', ['username' => $username]);
			$this->session->set_flashdata('pengguna', '<div class="alert alert-success alert-dismissible fade show" role="alert">
					  Data <strong> berhasil dihapus.</strong>
					  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
		}
		
			redirect('admin/list');
	}

	public function tambahPengguna(){
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[8]|is_unique[tb_pengguna.username]', [
			'required' => 'Username harus diisi',
			'is_unique' => 'Username telah digunakan',
			'min_length' => 'Username minimal 5 karakter',
			'max_length' => 'Username maksimal 8 karakter',
		]);
		
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
			'required' => 'Nama harus diisi'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]|matches[password2]', [
			'min_length' => 'Password minimal 6 karakter',
			'required' => 'Password harus diisi',
			'matches' => 'Password tidak sama'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'trim|required|min_length[6]', [
			'min_length' => 'Password minimal 6 karakter',
			'required' => 'Password harus diisi'
		]);
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header');
			$this->load->view('admin/pengguna-baru');
			$this->load->view('templates/footer');
			
		} else {
			$this->admin_model->tambahData('tb_pengguna', [
				'username' => $this->input->post('username'),
				'nama' => $this->input->post('nama', true),
				'password' => $this->input->post('password1')
			]);
			$this->session->set_flashdata('pengguna', '<div class="alert alert-success alert-dismissible fade show" role="alert">
					  Data <strong> berhasil ditambahkan.</strong>
					  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
			redirect('admin/list');
		}
		
	}

}
