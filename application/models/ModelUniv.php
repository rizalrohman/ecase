<?php 
 
class ModelUniv extends CI_Model{

	public function create($value, $table)
	{
		$this->db->insert($table, $value);
	}

	public function read($table)
	{
		return $this->db->get($table)->result();
	}

	public function hitung_rows($table)
	{
		return $this->db->get($table)->num_rows();
	}

	public function hitung_rows_where($where, $table)
	{
		return $this->db->get_where($table, $where)->num_rows();
	}

	public function update($where, $value, $table)
	{
		$this->db->where($where);
		$this->db->update($table,$value);
	}

	public function delete($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function cek_login($table,$where)
	{		
		return $this->db->get_where($table,$where);
	}

	public function select_data($table, $where)
	{
		return $this->db->get_where($table,$where)->result_array();
	}

	public function hitung_data($table)
	{
		$query = $this->db->get($table);
		return $query->num_rows();
	}

	public function hitung_data_where($where, $table)
	{		
		return $this->db->get_where($table, $where)->num_rows();
	}

	public function data_terakhir($limit)
	{
		$this->db->select('*');
		$this->db->from('pendaftaran');
		$this->db->order_by('id_pendaftaran', 'DESC');
		$this->db->limit($limit);
		$query = $this->db->get();
		return $query->result();
		
	}

	public function data_feedback()
	{
		$this->db->select('*');
		$this->db->from('feedback');
		$this->db->order_by('timestamp', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function data_pengumuman()
	{
		$this->db->select('*');
		$this->db->from('pengumuman');
		$this->db->order_by('tanggal', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function generate_nama_foto()
	{
		$token = "";
		$karakter = "1234567890";
		$nama_foto = "";
		$index = 0;


		for ($i=0; $i < 5; $i++) { 
					$pos = rand(0, strlen($karakter)-1);
					$nama_foto .= $pos;
					

				}

		return $nama_foto;
	}

	public function _uploadImage()
	{
	    $config['upload_path']          = './public/foto_pengaduan/';
	    $config['allowed_types']        = 'gif|jpg|png';
	    $config['file_name']            = $this->generate_nama_foto();
	    $config['overwrite']			= true;
	    $config['max_size']             = 1024; // 1MB
	    // $config['max_width']            = 1024;
	    // $config['max_height']           = 768;

	    $this->load->library('upload', $config);

	    if ($this->upload->do_upload('image')) {
	        return $this->upload->data("file_name");
	    }
	    
	    
	}




}