<?php

class Admin_model extends MY_Model
{
	public function kodeAlternatif(){
		$data = $this->db->select_max('kode')->get('tb_alternatif')->row_array();
		if (is_null($data['kode'])) {
			$kode = "A01";
		} else {
			$id = substr($data['kode'], 1);
			$nomor = (int)$id;
			$nomor += 1;
			$kode = "A" . str_pad($nomor, 2, "0", STR_PAD_LEFT);
		}
		return $kode;
	}

	public function kodeKriteria(){
		$data = $this->db->select_max('kode')->get('tb_kriteria')->row_array();
		if (is_null($data['kode'])) {
			$kode = "K01";
		} else {
			$id = substr($data['kode'], 1);
			$nomor = (int)$id;
			$nomor += 1;
			$kode = "K" . str_pad($nomor, 2, "0", STR_PAD_LEFT);
		}
		return $kode;
	}

	public function nilaiAlternatif(){
		// var_dump($_POST); die;
		$kriteria = $this->ambilSemuaData('tb_kriteria')->result_array();
		foreach ($kriteria as $ktr) {
			$data = [
				'id' => '',
				'kodeAlt' => $this->input->post('kode'),
				'kodeKtr' => $this->input->post('k_'. $ktr['kode']),
				'nilai' => $this->input->post('nilai'. $ktr['kode'], true)
			];
			// var_dump($data); die;
			$this->tambahData('tb_penilaian', $data);
		}
	}

	public function cekNilai(){	
		$row['inisial'] = (int)0;
		$data['alternatif'] = $this->admin_model->ambilSemuaData('tb_alternatif')->result_array();
		foreach ($data['alternatif'] as $alternatif) {
			$row[$alternatif['kode']] = $this->db->get_where('tb_penilaian', ['kodeAlt' => $alternatif['kode']])->num_rows();
		}
		// var_dump($row); die;
		// return $value = $row;
		return $row;
	}

	public function ubahNilaiAlternatif($kode){
		$kriteria = $this->ambilSemuaData('tb_kriteria');
		$jmNilai = $this->db->get_where('tb_penilaian', ['kodeAlt' => $kode])->num_rows();
		// *jika kriteria bertambah
		if ($kriteria->num_rows() >  $jmNilai) {
			foreach ($kriteria->result_array() as $k) {
				$ambilNilai  = $this->db->get_where('tb_penilaian', ['kodeAlt' => $kode, 'kodeKtr' => $k['kode']])->row_array();
				if (!$ambilNilai) {
					$data = [
						'id' => '',
						'kodeAlt' => $kode,
						'kodeKtr' => $this->input->post('k_'. $k['kode']),
						'nilai' => $this->input->post('nilai'. $k['kode'], true)
					];
					$this->tambahData('tb_penilaian', $data);
				}
			}
		}
		// *jika kriteria tidak bertambah
		else{
			foreach ($kriteria->result_array() as $ktr) {
				$data = [
					'nilai' => $this->input->post('nilai'. $ktr['kode'], true)
				];
				$this->updateData('tb_penilaian', $data, ['kodeAlt' => $kode, 'kodeKtr' => $ktr['kode']]);
			}
		}
	}

	public function keputusan(){
		$kriteria = $this->ambilSemuaData('tb_kriteria');
		$alternatif = $this->ambilSemuaData('tb_alternatif');
		//normalisasi
		$total = $this->db->select_sum('bobot')->get('tb_kriteria')->row_array();
		foreach ($kriteria->result_array() as $k ) {
			$nilai = $this->ambilDataById('tb_kriteria', ['kode' => $k['kode']]);
			$normalisasi[$k['kode']] = (float)$nilai['bobot'] / (float)$total['bobot'];
		}
		$value['normalisasi'] = $normalisasi;
		// var_dump($value); die;

		//hitung nilai utility
		foreach ($alternatif->result_array() as $a) {
			foreach ($kriteria->result_array() as $kt) {
				$nilaiCOut =  $this->ambilDataById('tb_penilaian', ['kodeAlt' => $a['kode'], 'kodeKtr' => $kt['kode']]);
				$nilaiCMax = $this->db->select_max('nilai')->get_where('tb_penilaian', ['kodeKtr' => $kt['kode']])->row_array();
				$nilaiCMin = $this->db->select_min('nilai')->get_where('tb_penilaian', ['kodeKtr' => $kt['kode']])->row_array();

				//cek tipe kriteria
				if ($kt['tipe'] == 'cost') {
					$utility[$a['kode']][$kt['kode']] = ((float)$nilaiCMax['nilai'] - (float)$nilaiCOut['nilai']) / ((float)$nilaiCMax['nilai'] - (float)$nilaiCMin['nilai']);
				} else {
					$utility[$a['kode']][$kt['kode']] = ((float)$nilaiCOut['nilai'] - (float)$nilaiCMin['nilai']) / ((float)$nilaiCMax['nilai'] - (float)$nilaiCMin['nilai']);
				}
			}
		}

		$value['nilai utility'] = $utility;
		// var_dump($value); die;

		//hitung nilai akhir
		foreach ($alternatif->result_array() as $alt) {
			$temp = 0;
			foreach ($kriteria->result_array() as $ktr) {
				$temp += ( $utility[$alt['kode']][$ktr['kode']] * $normalisasi[$ktr['kode']]) ;
			}
			$nilaiAkhir[$alt['kode']]['nilai'] = $temp;
			$nilaiAkhir[$alt['kode']]['kode'] = $alt['kode'];
		}
		$value['nilai akhir'] = $nilaiAkhir;
		// var_dump($value['nilai akhir']); die;
		return $value;

	}
}
