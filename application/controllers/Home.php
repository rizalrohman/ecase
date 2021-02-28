<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('komponen/komponen-website/kom-header');
		$this->load->view('komponen/komponen-website/kom-navbar');
		$this->load->view('website/v-index');
		$this->load->view('komponen/komponen-website/kom-footer');
	}


}
