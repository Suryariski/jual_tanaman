<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_kategori extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function data_obat()
	{
		return $this->db->get_where("tb_tanaman",array('kategori' => 'T.Obat'));
	}

	public function data_hias()
	{
		return $this->db->get_where("tb_tanaman",array('kategori' => 'T.Hias'));
	}

}

/* End of file m_kategori.php */
/* Location: ./application/models/m_kategori.php */