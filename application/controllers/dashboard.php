<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if($this->session->userdata('role_id') != '2'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert"> Anda Belum Login!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('auth/login');
		}
		$this->load->model('m_tanaman');
	}

public function index()
	{
		$data['tanaman'] = $this->m_tanaman->tampil_data()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('dashboard',$data);
		$this->load->view('templates/footer');
	}

	public function tambah_ke_keranjang($id)
	{
		$tanaman = $this->m_tanaman->find($id);

		$data = array(
			'id'      => $tanaman->id_tanam,
			'qty'     => 1,
			'price'   => $tanaman->harga,
			'name'    => $tanaman->nama_tanam
		);
		
		$this->cart->insert($data);
		redirect('dashboard');
	}

	public function detail_keranjang()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('keranjang');
		$this->load->view('templates/footer');
	}

	public function hapus_keranjang()
	{
		$this->cart->destroy();
		redirect('dashboard');
	}

	public function pembayaran()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('pembayaran');
		$this->load->view('templates/footer');	
	}

	public function proses_pesanan()
	{
		$is_processed = $this->m_invoice->index();
		if ($is_processed) {
			$this->cart->destroy();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('proses_pesanan');
		$this->load->view('templates/footer');
		}else{
			echo "Maaf Pesanan Anda Gagal Diproses";
		}
	}

	public function detail($id_tanam)
	{
		$data['tanaman'] = $this->m_tanaman->detail_tanaman($id_tanam);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('detail_tanaman',$data);
		$this->load->view('templates/footer');
	}

	public function cari()
	{
		$cari = $this->input->get('cari');
		$data['tanaman'] = $this->m_tanaman->search($cari);
		//die(var_dump($data['barang']));
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('dashboard',$data);
		$this->load->view('templates/footer');
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */