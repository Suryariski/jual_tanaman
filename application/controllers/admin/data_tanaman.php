<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class data_tanaman extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('m_tanaman');

		if($this->session->userdata('role_id') != '1'){
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
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/tampilan_tanaman',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_aksi()
	{
		$nama_tanam = $this->input->post('nama_tanam');
		$keterangan = $this->input->post('keterangan');
		$kategori = $this->input->post('kategori');
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');
		$gambar = $_FILES['gambar']['name'];
		if ($gambar =''){}else {
			$config ['upload_path'] = './uploads';
			$config ['allowed_types'] = 'jpg|jpeg|png|gif';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('gambar')) {
				echo "Gambar gagal diUpload";
			}else{
				$gambar = $this->upload->data('file_name');
			}
		}
		$data = array(
			'nama_tanam' =>$nama_tanam,
			'keterangan' =>$keterangan,
			'kategori' =>$kategori,
			'harga' =>$harga,
			'stok' =>$stok,
			'gambar' =>$gambar
		);

		$this->m_tanaman->tambah_tanaman($data,'tb_tanaman');
		redirect('admin/data_tanaman/index');

	}

	public function edit($id)
	{
		$where = array(
			'id_tanam' =>$id
		);
		
		$data['tanaman'] = $this->m_tanaman->edit_tanaman($where, 'tb_tanaman')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/edit_tanaman',$data);
		$this->load->view('templates_admin/footer');
	}

	public function update()
	{
		$id = $this->input->post('id_tanam');
		$nama_tanam = $this->input->post('nama_tanam');
		$keterangan = $this->input->post('keterangan');
		$kategori = $this->input->post('kategori');
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');

		$data = array(
			'nama_tanam' =>$nama_tanam,
			'keterangan' =>$keterangan,
			'kategori' =>$kategori,
			'harga' =>$harga,
			'stok' =>$stok
		);

		$where = array(
			'id_tanam' => $id
		);

		$this->m_tanaman->update_data($where,$data, 'tb_tanaman');
		redirect('admin/data_tanaman/index');
	}

	public function delete($id)
	{
		$where = array(
			'id_tanam' => $id
		);

		$this->m_tanaman->delete_data($where, 'tb_tanaman');
		redirect('admin/data_tanaman/index');
	}

	public function detail($id_tanam)
	{
		$data['tanaman'] = $this->m_tanaman->detail_tanaman($id_tanam);
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/detail_tanaman',$data);
		$this->load->view('templates_admin/footer');
	}

	public function add()
	{
		$rules = $this->m_tanaman->validation();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/tampilan_tanaman');
		} else {
			$this->m_tanaman->tambah_tanaman();
			redirect('admin');
		}
	}	

}

/* End of file data_barang.php */
/* Location: ./application/controllers/data_barang.php */