<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masyarakat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$status = $this->session->userdata('status');


		if($status != "login"){
			redirect(base_url("auth/login"));
		}
		elseif ($this->session->userdata('nik') == false) {
			return redirect(base_url('auth/denied'));
		}
		
	}


	public function index()
	{
		$this->load->view('komponen/komponen-website/kom-header');
		$this->load->view('komponen/komponen-website/kom-navbar-logged');
		$this->load->view('website/v-index');
		$this->load->view('komponen/komponen-website/kom-footer');
	}

	public function buat_pengaduan()
	{
		$this->load->view('komponen/komponen-website/kom-header');
		$this->load->view('komponen/komponen-website/kom-navbar-logged');
		$this->load->view('website/v-buat-pengaduan');
		$this->load->view('komponen/komponen-website/kom-footer');
	}

	public function data_pengaduan(){

		$where = [ 'nik' => $this->session->userdata('nik') ];

		$data['pengaduans'] = $this->ModelUniv->select_data('pengaduan', $where);
		$this->load->view('komponen/komponen-website/kom-header');
		$this->load->view('komponen/komponen-website/kom-navbar-logged');
		$this->load->view('website/v-data-pengaduan', $data);
		
	}

	public function tanggapan_pengaduan($id)
	{

		$where = [ 'id' => $id, ];
		$where_id = [ 'id_pengaduan' => $id, ];
		$data_user = $this->ModelUniv->select_data('pengaduan', $where);
		$nik = $data_user[0]['nik'];

		if ($this->session->userdata('nik') == $nik) {
			$data['pengaduan'] = $this->ModelUniv->select_data('pengaduan', $where);
			$data['tanggapan'] = $this->ModelUniv->select_data('tanggapan', $where_id);

			$this->load->view('komponen/komponen-website/kom-header');
			$this->load->view('komponen/komponen-website/kom-navbar-logged');
			$this->load->view('website/v-tanggapan-pengaduan', $data);
			$this->load->view('komponen/komponen-website/kom-footer');


			
		}
		else{
			return redirect(base_url('auth/denied'));
		}

		
	}

	

	public function postpengaduan()
	{

		$nik = $this->input->post('nik');
		$isi_laporan = $this->input->post('isi_pengaduan');
		$judul_pengaduan = $this->input->post('judul_pengaduan');
		$nik = $this->input->post('nik');
		// $this->foto = $this->ModelUniv->_uploadImage();


		$values = [
			'nik' => $nik,
			'judul_pengaduan' => $judul_pengaduan,
			'isi_laporan' => $isi_laporan,
			'status' => 0,
			'foto' => null
		];

		
		$this->ModelUniv->create($values, 'pengaduan');
		return redirect(base_url('masyarakat/data_pengaduan/'));    
		
	}

	public function delete_pengaduan($id)
	{
		$where = [ 'id' => $id, ];
		$data_user = $this->ModelUniv->select_data('pengaduan', $where);
		$nik = $data_user[0]['nik'];

		if ($this->session->userdata('nik') == $nik) {
			$this->ModelUniv->delete($where, 'pengaduan');
			return redirect(base_url('masyarakat/data_pengaduan'));
		}
		else{
			return redirect(base_url('auth/denied'));
		}
		
	}

	public function edit_data($id)
	{
		$where = [ 'id' => $id, ];
		$data_user = $this->ModelUniv->select_data('pengaduan', $where);
		$nik = $data_user[0]['nik'];

		if ($this->session->userdata('nik') == $nik) {
			$data['pengaduan'] = $this->ModelUniv->select_data('pengaduan', $where);

			$this->load->view('komponen/komponen-website/kom-header');
			$this->load->view('komponen/komponen-website/kom-navbar-logged');
			$this->load->view('website/v-edit-pengaduan', $data);
			$this->load->view('komponen/komponen-website/kom-footer');
			
		}
		else{
			return redirect(base_url('auth/denied'));
		}

	}

	public function postedit()
	{
		$id = $this->input->post('id');
		$judul_pengaduan = $this->input->post('judul_pengaduan');
		$isi_laporan = $this->input->post('isi_laporan');

		$values = [
			'judul_pengaduan' => $judul_pengaduan,
			'isi_laporan' => $isi_laporan
		];

		$where = [ 'id' => $id ];

		$this->ModelUniv->update($where, $values, 'pengaduan');

		return redirect(base_url('masyarakat/data_pengaduan'));

	}



}

