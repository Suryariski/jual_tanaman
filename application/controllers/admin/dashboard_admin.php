<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if($this->session->userdata('role_id') != '1'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert"> Anda Belum Login!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('auth/login');
		}
	}

	public function index()
	{
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/dashboard');
		$this->load->view('templates_admin/footer');
	}

	public function cari()
	{
		$cari = $this->input->get('cari');
		$data['tanam'] = $this->m_tanaman->search($cari);
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_tanaman',$data);
		$this->load->view('templates_admin/footer');
	}

}

/* End of file dashboard_admin.php */
/* Location: ./application/controllers/dashboard_admin.php */