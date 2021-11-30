<?php 

class Model_invoice extends CI_Model
{
	public function index()
	{
		date_default_timezone_set('Asia/Jakarta');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$provinsi = $this->input->post('provinsi');
		$kota_asal = $this->input->post('kota_asal');
		$kurir = $this->input->post('kurir');
		//$berat = $this->input->post('berat');
		$paket = $this->input->post('paket');
		$bank = $this->input->post('bank');

		$tb_invoice = array(

			'nama' 			=> $nama,
			'alamat' 		=> $alamat,
			'provinsi'		=> $provinsi,
			'kota_asal'		=> $kota_asal,
			'kurir'			=> $kurir,
			//'berat'			=> $berat,
			'paket'			=> $paket,
			'bank'			=> $bank,
			'tgl_pesan' 	=> date('Y-m-d H:i:s'),
			'batas_bayar' 	=> date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s'), date('m'),date('d') + 1, date('Y')))
		);
		$this->db->insert('tb_invoice', $tb_invoice);
		
		$id_invoice = $this->db->insert_id();
		$kurir = $this->input->post('kurir');
		//$berat = $this->input->post('berat');
		//$service = $this->input->post('service');
		$bank = $this->input->post('bank');
		
		//$bukti_pembayaran = $_FILES['bukti_pembayaran'];

		//if($bukti_pembayaran = ''){}else{
			//$config ['upload_path'] = './uploads';
			//$config ['allowed_types'] = 'jpg|jpeg|png|gif|bmp';

			//$this->load->library('upload', $config);
			//if(!$this->upload->do_upload('bukti_pembayaran')){
				//echo "Gambar gagal di upload!";
			//}
			//else{
				//@$bukti_pembayaran = $this->upload->data('file_name');
			//}
		//}

		foreach($this->cart->contents() as $item)
		{
			$data = array(
				'id_invoice' 	=> $id_invoice,
				'id_brg' 		=> $item['id'],
				'nama_brg'	 	=> $item['name'],
				'jumlah' 		=> $item['qty'],
				'harga' 		=> $item['price'],
				'provinsi'		=> $provinsi,
				'kota_asal'		=> $kota_asal,
				'kurir'			=> $kurir,
				//'paket'			=> $paket,
				//'berat'			=> $berat,
				//'service'		=> $service,
				'bank'			=> $bank
				//'bukti_pembayaran' => @$bukti_pembayaran
			);
			$this->db->insert('tb_pesanan', $data);
		}

		return true;
	}

	public function tampil_data()
	{
		$result = $this->db->get('tb_invoice');
		if($result->num_rows() > 0)
		{
			return $result->result();
		}else{
			return false;
		}
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