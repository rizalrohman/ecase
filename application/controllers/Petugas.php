<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$status = $this->session->userdata('status');
		$role = $this->session->userdata('role');


		if($status != "login"){
			redirect(base_url("auth/login"));

		}
		elseif ($role != 2) {
			redirect(base_url("auth/denied"));
		}

		
	}

	public function index()
	{
		$total_tanggapan = $this->ModelUniv->hitung_rows('tanggapan');
		$total_pengaduan = $this->ModelUniv->hitung_rows('pengaduan');
		$total_masyarakat = $this->ModelUniv->hitung_rows('masyarakat');
		

		$persentase = $total_tanggapan / $total_pengaduan * 100;

		$data['total_masyarakat'] = $total_masyarakat;
		$data['persentase'] = $persentase;
		$data['total_pengaduan'] = $total_pengaduan;
		$this->load->view('komponen/komponen-admin/kom-header');
		$this->load->view('komponen/komponen-petugas/kom-sidebar');
		$this->load->view('komponen/komponen-admin/kom-navbar');
		$this->load->view('petugas/v-index', $data);
		$this->load->view('komponen/komponen-admin/kom-footer');
	}

	public function tanggapan()
	{
		$where = [ 'status' => 1 ];
		$data['pengaduans'] = $this->ModelUniv->select_data('pengaduan', $where);

		$this->load->view('komponen/komponen-admin/kom-header');
		$this->load->view('komponen/komponen-petugas/kom-sidebar');
		$this->load->view('komponen/komponen-admin/kom-navbar');
		$this->load->view('petugas/v-tanggapan', $data);
		$this->load->view('komponen/komponen-admin/kom-footer');
	}

	public function detail_tanggapan($id)
	{
		$where = [ 'id' => $id ];
		$data['pengaduan'] = $this->ModelUniv->select_data('pengaduan', $where);

		$this->load->view('komponen/komponen-admin/kom-header');
		$this->load->view('komponen/komponen-petugas/kom-sidebar');
		$this->load->view('komponen/komponen-admin/kom-navbar');
		$this->load->view('petugas/v-detail-tanggapan', $data);
		$this->load->view('komponen/komponen-admin/kom-footer');

	}

	public function posttanggapan()
	{
		$id_pengaduan = $this->input->post('id_pengaduan');
		$id_user = $this->input->post('id_user');
		$tanggapan = $this->input->post('tanggapan');

		$values = [
			'id_pengaduan' => $id_pengaduan,
			'id_user' => $id_user,
			'tanggapan' => $tanggapan
		];

		$this->ModelUniv->create($values, 'tanggapan');

		$where = [ 'id' => $id_pengaduan ];
		$values = [ 'status' => 2 ];

		$this->ModelUniv->update($where, $values, 'pengaduan');

		return redirect(base_url('petugas/tanggapan'));
	}

	public function verifikasi()
	{
		$where = [ 'status' => 0 ];
		$data['pengaduans'] = $this->ModelUniv->select_data('pengaduan', $where);

		$this->load->view('komponen/komponen-admin/kom-header');
		$this->load->view('komponen/komponen-petugas/kom-sidebar');
		$this->load->view('komponen/komponen-admin/kom-navbar');
		$this->load->view('petugas/v-verifikasi', $data);
		$this->load->view('komponen/komponen-admin/kom-footer');

	}

	public function verifikasi_detail($id)
	{
		$where = [ 'id' => $id ];
		$data['pengaduan'] = $this->ModelUniv->select_data('pengaduan', $where);

		$this->load->view('komponen/komponen-admin/kom-header');
		$this->load->view('komponen/komponen-petugas/kom-sidebar');
		$this->load->view('komponen/komponen-admin/kom-navbar');
		$this->load->view('petugas/v-verifikasi-detail', $data);
		$this->load->view('komponen/komponen-admin/kom-footer');

	}

	public function proses($id)
	{
		$where = [ 'id' => $id ];
		$values = [ 'status' => 1 ];

		$this->ModelUniv->update($where, $values, 'pengaduan');

		return redirect(base_url('petugas/verifikasi'));

	}
	public function proses_tanggapi($id)
	{
		$where = [ 'id' => $id ];
		$values = [ 'status' => 1 ];

		$this->ModelUniv->update($where, $values, 'pengaduan');

		return redirect(base_url('petugas/tanggapan/'.$id));

	}

	public function tolak($id)
	{
		$where = [ 'id' => $id ];
		$values = [ 'status' => 3 ];

		$this->ModelUniv->update($where, $values, 'pengaduan');

		return redirect(base_url('petugas/verifikasi'));

	}

	public function data_pengaduan($filter)
	{

		$where = [ 'status' => $filter ];
			$data['pengaduans'] = $this->ModelUniv->select_data('pengaduan', $where);

		if ($filter == 0) {
			# Belum Diproses
			$data['title_page'] = "Data Pengaduan belum Diproses";
		}
		elseif ($filter == 1) {
			# Diproses	
			$data['title_page'] = "Data sedang Diproses";

		}
		elseif ($filter == 2) {
			# Diterima
			$data['title_page'] = "Data Pengaduan sudah Diproses";
		}
		elseif ($filter == 3) {
			# Ditolak
			$data['title_page'] = "Data Pengaduan Ditolak";
		}

		$this->load->view('komponen/komponen-admin/kom-header');
		$this->load->view('komponen/komponen-petugas/kom-sidebar');
		$this->load->view('komponen/komponen-admin/kom-navbar');
		$this->load->view('petugas/v-data-pengaduan', $data);
		$this->load->view('komponen/komponen-admin/kom-footer');
		
	}

}