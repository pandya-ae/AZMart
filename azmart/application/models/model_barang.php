<?php

class Model_barang extends CI_Model{
	
	// Untuk menampilkan semua database
	public function tampil_data()
	{
		return $this->db->get('tb_barang');
	}

	// Menambah barang melalui pihak admin
	public function tambah_barang($data,$table)
	{
		$this->db->insert($table, $data);
	}

	// Mengedit barang melalui pihak admin
	public function edit_barang($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	// Meng-update barang melalui pihak admin
	public function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	// Menghapus barang melalui pihak admin
	public function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	// Menambah barang  ke cart melalui pihak user

	public function find($id_brg)
	{
		$result = $this->db->where('id_brg', $id_brg)->limit(1)->get('tb_barang');

		if($result->num_rows() > 0)
		{
			return $result->row();
		}else{
			return array();
		}
	}

	public function detail_brg($id_brg)
	{
		$result = $this->db->where('id_brg',$id_brg)->get('tb_barang');
		if($result->num_rows() > 0){
			return $result->result();
		}else{
			return false;
		}
	}

 	public function update_counter($id_brg)
    {
         //return current article views
        $this->db->where('id_brg', urldecode($id_brg));
        $this->db->select('visit'); $count = $this->db->get('tb_barang')->row();
        // then increase by one
        /*if (empty($count)) {
           redirect();
        }*/
        $this->db->where('id_brg', urldecode($id_brg));
        $this->db->set('visit', ($count->visit + 1));
        $this->db->update('tb_barang');    
			return true;
    }
    
	public function ambil_id_invoice($id_invoice)
	{
		$result = $this->db->where('id',$id_invoice)->limit(1)->get('tb_invoice');
		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return false;
		}
	}

	public function ambil_id_pesanan($id_invoice)
	{
		$result = $this->db->where('id_invoice',$id_invoice)->get('tb_pesanan');
		if($result->num_rows() > 0){
			return $result->result();
		}else{
			return false;
		}
	}    

}