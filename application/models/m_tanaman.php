<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_tanaman extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function tampil_data()
	{
		return $this->db->get('tb_tanaman');
	}

	public function tambah_tanaman($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function edit_tanaman($where, $table)
	{
		return $this->db->get_where($table,$where);
	}

	public function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function delete_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function find($id)
	{
		$result = $this->db->where('id_tanam',$id)
							->limit(1)
							->get('tb_tanaman');
		if ($result->num_rows()>0) {
			return $result->row();
		}else{
			return array();
		}
	}

	public function detail_tanaman($id_tanam)
	{
		$result = $this->db->where('id_tanam', $id_tanam)->get('tb_tanaman');
		if($result->num_rows()>0){
			return $result->result();
		}else{
			return false;
		}
	}

	public function search($cari)
	{
		if ($cari == null) {
			echo "Error";
		}
		$this->db->select('*');
		$this->db->from('tb_tanaman');
		$this->db->like('nama_tanam', $cari);
		$this->db->or_like('kategori', $cari);
		return $this->db->get()->result();
	}

	public function validation()
	{
		return[
			[
				'field' => 'nama_tanaman',
				'label' => 'Nama_Tanaman',
				'rules' => 'required|max_length[32]'
			],
			[
				'field' => 'keterangan',
				'label' => 'Keterangan',
				'rules' => 'required|max_length[32]'
			],
			[
				'field' => 'kategori',
				'label' => 'Kategori',
				'rules' => 'required|max_length[32]'
			],
			[
				'field' => 'harga',
				'label' => 'Harga',
				'rules' => 'required|max_length[32]'
			],
			[
				'field' => 'stok',
				'label' => 'Stok',
				'rules' => 'required|max_length[32]'
			],
			[
				'field' => 'gambar',
				'label' => 'Gambar',
				'rules' => 'required|max_length[32]'
			],
		];
	}

}

/* End of file m_barang.php */
/* Location: ./application/models/m_barang.php */