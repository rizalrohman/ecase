<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
		$this->load->view('auth/v-login');
	}

	public function register()
	{
		$this->load->view('auth/v-register');
	}

	public function postlogin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$where = [
					'username' => $username,
					'password' => $password
				 ];
		

		// Masyarakat

		$cek = $this->ModelUniv->cek_login('masyarakat',$where)->num_rows();				 


		if ($cek > 0) {

			$where = [ 'username' => $username ];
			$data_user = $this->ModelUniv->select_data('masyarakat', $where);

			$data_session = [
				'status' => "login",
				'display_name' => $data_user[0]['display_name'],
				'nik' => $data_user[0]['nik'],
				'username' => $data_user[0]['username'],
				'password' => $data_user[0]['password'],
				'telp' => $data_user[0]['telp'],
				
			];


			$this->session->set_userdata($data_session);
			return redirect(base_url('masyarakat/data_pengaduan'));
		}
		else{
		// User
		$cek = $this->ModelUniv->cek_login('user',$where)->num_rows();		

			if ($cek > 0) {
				$data_user = $this->ModelUniv->select_data('user', $where);
				$role = $data_user[0]['role'];

				// Pengecekan Hak Akses

				if ($role == 1) {
					// Admin

					$data_session = [
						'status' => "login",
						'display_name' => $data_user[0]['display_name'],
						'username' => $data_user[0]['username'],
						'password' => $data_user[0]['password'],
						'role' => $data_user[0]['role'],
						'id' => $data_user[0]['id'],
						'telp' => $data_user[0]['telp']
					];
					$this->session->set_userdata($data_session);
					return redirect(base_url('admin'));

				}
				elseif ($role == 2) {
					$data_session = [
						'status' => "login",
						'display_name' => $data_user[0]['display_name'],
						'username' => $data_user[0]['username'],
						'password' => $data_user[0]['password'],
						'role' => $data_user[0]['role'],
						'id' => $data_user[0]['id'],
						'telp' => $data_user[0]['telp']
					];
					$this->session->set_userdata($data_session);
					return redirect(base_url('petugas'));
				}


				
			}
			else{
				return redirect(base_url('auth/login'));
			}

			
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('auth/login'));
	}

	public function denied()
	{
		$this->load->view('auth/403');
	}

}