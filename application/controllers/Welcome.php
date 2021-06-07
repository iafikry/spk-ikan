<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model', 'admin_model');
		$this->load->library('form_validation');
		
	}
	
	public function index(){
		$data['alternatif'] = $this->admin_model->ambilSemuaData('tb_alternatif');
		$data['kriteria'] = $this->admin_model->ambilSemuaData('tb_kriteria');
		$data['penilaian'] = $this->admin_model->ambilSemuaData('tb_penilaian');
		$data['cekNilai'] = $this->admin_model->cekNilai();
		// var_dump($this->session->userdata('username')); die;
		if ($this->session->userdata('username')) {
			$this->load->view('templates/header');
			$this->load->view('admin/home', $data);
			$this->load->view('templates/footer');
			
		} else {
			$this->load->view('welcome_message', $data);
		}
	}

	public function auth(){
		// $this->session->sess_destroy();
		$this->form_validation->set_rules('username', 'Username', 'trim|required', [
			'required' => 'Username harus diisi'
		]);
		$this->form_validation->set_rules('password', 'Password', 'trim|required', [
			'required' => 'Password harus diisi'
		]);
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/login');
		} else {
			$this->Login();
		}	
		
	}

	private function Login(){
		$username = $this->input->post('username');
		$pass = $this->input->post('password');

		$dataPengguna = $this->admin_model->ambilDataById('tb_pengguna', ['username' => $username]);
		if ($dataPengguna) {
			if ($dataPengguna['password'] == $pass) {
				// var_dump($dataPengguna); die;
				$user = [
					'username' => $dataPengguna['username'],
					'nama' => $dataPengguna['nama']
				];
				$this->session->set_userdata($user);
				// var_dump($this->session->userdata('username')); die;
				$this->session->set_flashdata('login', '<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong> Selamat datang!.</strong>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
				redirect('welcome');
			} else {
				$this->session->set_flashdata('login', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong> Password salah.</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
				redirect('welcome/auth');
			}
		} else {
			$this->session->set_flashdata('login', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong> Pengguna tidak ditemukan.</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
				redirect('welcome/auth');
		}
	}

	public function Logout(){
		// $this->session->sess_destroy();
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('nama');
		$this->session->set_flashdata('login', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				Anda <strong> berhasil keluar.</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
		redirect('welcome/auth');
		
	}

	public function tentang(){
		$data['alternatif'] = $this->admin_model->ambilSemuaData('tb_alternatif');
		$data['kriteria'] = $this->admin_model->ambilSemuaData('tb_kriteria');
		$this->load->view('tentang', $data);
		
	}

	public function panduan(){
		$this->load->view('panduan');
		
	}
}
