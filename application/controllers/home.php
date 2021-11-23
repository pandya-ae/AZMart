<?php 

class Home extends CI_Controller
{

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('role_id') != '2')
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

	public function detail($id_brg)
	{
		$data['barang'] = $this->model_barang->detail_brg($id_brg);
		$this->load->view('templates/header');
		$this->load->view('detail_barang', $data);
		$this->load->view('templates/footer');

		$this->model_barang->update_counter($id_brg);
	}

	//public function add_count($id_brg)
	//{
	        // load cookie helper
	        //$this->load->helper('cookie');

	        // this line will return the cookie which has slug name
	        //$check_visitor = $this->input->cookie(urldecode($id_brg), FALSE);

	        // this line will return the visitor id 
	        //$id = $this->input->id_user();
	       
	      // if ($check_visitor == false) {
	            //$cookie = array("name" => urldecode($id), "value" => "$id", "expire" => time() + 300, "secure" => false);
	            //$this->input->set_cookie($cookie);
	            //$this->model_barang->update_counter(urldecode($id));
	        //}
	//}

	public function tambah_ke_keranjang($id_brg)
	{
		$barang = $this->model_barang->find($id_brg);

		$data = array(

			'id' => $barang->id_brg,
			'qty' => 1,
			'price' => $barang->harga,
			'name' => $barang->nama_brg
		);

	$this->cart->insert($data);
	redirect('welcome');
	}

	public function detail_keranjang()
	{
		$this->load->view('templates/header');
		$this->load->view('keranjang');
		$this->load->view('templates/footer');
	}

	public function hapus_keranjang()
	{
		$this->cart->destroy();
		redirect('welcome/index');
	}

	public function pembayaran()
	{
		$this->load->view('templates/header');
		$this->load->view('pembayaran');
		$this->load->view('templates/footer');
	}

	public function proses_pesanan()
	{
		$is_processed = $this->model_invoice->index();
		if($is_processed)
		{
			$this->cart->destroy();
			$this->load->view('templates/header');
			$this->load->view('proses_pesanan');
			$this->load->view('templates/footer');
		}else{
			echo "Maaf, Pesanan Anda Gagal diproses!";
		}
	}

	public function history()
	{
		$data['tb_invoice'] = $this->model_invoice->tampil_data();
		$this->load->view('templates/header');
		$this->load->view('history', $data);
		$this->load->view('templates/footer');
	}

	public function detail_history($id_invoice)
	{
		$data['tb_invoice'] = $this->model_invoice->ambil_id_invoice($id_invoice);
		$data['tb_pesanan'] = $this->model_invoice->ambil_id_pesanan($id_invoice);

		$this->load->view('templates/header');
		$this->load->view('detail_history', $data);
		$this->load->view('templates/footer');		
	}		

	// API untuk kota dari RajaOngkir
	public function kota($provinsi)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.rajaongkir.com/starter/city?&province=".$provinsi,
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
			$kota = json_decode($response,true);

			if($kota['rajaongkir']['status']['code'] == '200'){
				foreach($kota['rajaongkir']['results'] as $kt){
					echo"<option value='$kt[city_id]'>$kt[type] $kt[city_name]</option>";
				}
			}
		}
	}
}