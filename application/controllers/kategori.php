<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function T_Obat()
	{
		$data['Obat'] = $this->m_kategori->data_obat()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('obat',$data);
		$this->load->view('templates/footer');
	}

	public function T_Hias()
	{
		$data['Hias'] = $this->m_kategori->data_hias()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('hias',$data);
		$this->load->view('templates/footer');
	}

}

/* End of file kategori.php */
/* Location: ./application/controllers/kategori.php */