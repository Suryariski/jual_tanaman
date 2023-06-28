<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_auth extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function cek_login()
	{
		$username	= set_value('username');
		$password   = set_value('password');

		$result		= $this->db->where('username', $username)
							   ->where('password', $password)
							   ->limit(1)
							   ->get('tb_user');
		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return array();
		}

	}

}

/* End of file m_auth.php */
/* Location: ./application/models/m_auth.php */