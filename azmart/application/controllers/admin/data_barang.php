<?php 

class Data_barang extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('role_id') != 'admin')
		{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  Anda Belum Login!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');

			redirect('auth/login');
		}
	}

	public function index()
	{
		$data['barang'] = $this->model_barang->tampil_data()->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_barang', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_aksi()
	{
		$nama_brg = $this->input->post('nama_brg');
		$keterangan = $this->input->post('keterangan');
		$kategori = $this->input->post('kategori');
		$provinsi_brg = $this->input->post('provinsi_brg');
		$kota_brg = $this->input->post('kota_brg');
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');
		$berat = $this->input->post('berat');
		$gambar = $_FILES['gambar']['name'];

		if($gambar = ''){}else{
			$config ['upload_path'] = './uploads';
			$config ['allowed_types'] = 'jpg|jpeg|png|gif|bmp';

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('gambar')){
				echo "Gambar gagal di upload!";
			}
			else{
				$gambar = $this->upload->data('file_name');
			}
		}

		$data = array(
			'nama_brg' 		=> $nama_brg,
			'keterangan' 	=> $keterangan,
			'kategori' 		=> $kategori,
			'provinsi_brg' 	=> $provinsi_brg,
			'kota_brg' 		=> $kota_brg,
			'harga' 		=> $harga,
			'stok' 			=> $stok,
			'berat' 		=> $berat,
			'gambar' 		=> $gambar
		);

		$this->model_barang->tambah_barang($data, 'tb_barang');
		redirect('admin/data_barang/index');
	}

	public function edit($id_brg)
	{
		$where = array('id_brg' =>$id_brg);
		$data['barang'] = $this->model_barang->edit_barang($where, 'tb_barang')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/edit_barang', $data);
		$this->load->view('templates_admin/footer');
	}

	public function update()
	{
		$id_brg = $this->input->post('id_brg');
		$nama_brg = $this->input->post('nama_brg');
		$keterangan = $this->input->post('keterangan');
		$kategori = $this->input->post('kategori');
		$provinsi_brg = $this->input->post('provinsi_brg');
		$kota_brg = $this->input->post('kota_brg');
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');
		$berat = $this->input->post('berat');

		$data = array(

			'nama_brg' 		=> $nama_brg,
			'keterangan' 	=> $keterangan,
			'kategori' 		=> $kategori,
			'provinsi_brg' 	=> $provinsi_brg,
			'kota_brg' 		=> $kota_brg,
			'harga' 		=> $harga,
			'stok' 			=> $stok,
			'berat' 		=> $berat
		);

		$where = array(
			'id_brg' => $id_brg
		);

		$this->model_barang->update_data($where, $data, 'tb_barang');
		redirect('admin/data_barang/index');
	}

	public function hapus($id_brg)
	{
		$where = array('id_brg' => $id_brg);
		$this->model_barang->hapus_data($where, 'tb_barang');
		redirect('admin/data_barang/index');
	}

	// API untuk kota dari RajaOngkir
	public function kota($provinsi_brg)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.rajaongkir.com/starter/city?&province=".$provinsi_brg,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "key:f438d5c8151258efe470d9aa65872dcb"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			$kota_brg = json_decode($response,true);

			if($kota_brg['rajaongkir']['status']['code'] == '200'){
				foreach($kota_brg['rajaongkir']['results'] as $kt){
					echo"<option value='$kt[type] $kt[city_name]'>$kt[type] $kt[city_name]</option>";
				}
			}
		}
	}

}