<?php 

class Home extends CI_Controller
{

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('role_id') != 'customer')
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
			'weight' => $barang->berat,
			'province' => $barang->provinsi_brg,
			'city' => $barang->kota_brg,
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

	// API untuk provinsi
	public function provinsi()
	{

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
          CURLOPT_SSL_VERIFYHOST => 0,
          CURLOPT_SSL_VERIFYPEER => 0,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "key: f438d5c8151258efe470d9aa65872dcb"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          $array_response = json_decode($response, true);
          $dataprovinsi = $array_response["rajaongkir"]["results"];
          		echo "<option value=''> -- Pilih Provinsi -- </option>";
			foreach($dataprovinsi as $key => $tiap_provinsi){
				echo "<option value='".$tiap_provinsi["province_id"]."' id_provinsi='".$tiap_provinsi["province_id"]."'>";
				echo $tiap_provinsi["province"];
				echo "</option>";
			}
        }
	}


	// API untuk kota dari RajaOngkir
	public function kota()
	{
		$id_provinsi_terpilih = $this->input->post('id_provinsi');
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.rajaongkir.com/starter/city?&province=".$id_provinsi_terpilih,
		  CURLOPT_SSL_VERIFYHOST => 0,
          CURLOPT_SSL_VERIFYPEER => 0,
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
			$array_response = json_decode($response, true);
			$data_kota = $array_response["rajaongkir"]["results"];
			echo "<option value=''> -- Pilih Kota -- </option>";
			foreach($data_kota as $key => $tiap_kota){
				echo "<option value='".$tiap_kota["city_id"]."' id_kota='".$tiap_kota["city_id"]."'
				>";
				echo $tiap_kota["type"]. " ";
				echo $tiap_kota["city_name"];
				echo "</option>";
			}
		}
	}

	public function ekspedisi()
	{
		echo "<option value=''> -- Pilih Ekspedisi -- </option>";
		echo "<option value='jne'> JNE </option>";
		echo "<option value='pos'> POS Indonesia </option>";
		echo "<option value='tiki'> TIKI </option>";
	}

	public function paket()
	{

		$kurir = $this->input->post("kurir");
		$id_kota = $this->input->post("id_kota");

		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
		  CURLOPT_SSL_VERIFYHOST => 0,
          CURLOPT_SSL_VERIFYPEER => 0,
		  CURLOPT_RETURNTRANSFER => true,
	      CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
	      CURLOPT_POSTFIELDS => "origin=501&destination=".$id_kota."&weight=1000&courier=".$kurir,
	      CURLOPT_HTTPHEADER => array(
			"content-type: application/x-www-form-urlencoded",
			"key: f438d5c8151258efe470d9aa65872dcb"
			  ),
			));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
        echo "cURL Error #:" . $err;
	    }else {
	    	echo $response;
	     	$array_response = json_decode($response,true);
	     	$data_paket = $array_response["rajaongkir"]["results"]["0"]["costs"];

	     	echo "<option value=''> -- Pilih Paket -- </option>";

	     	foreach($data_paket as $key => $tiap_paket){
	     		echo "<option value='".$tiap_paket["service"]."' ongkir='".$tiap_paket["cost"]["0"]["value"]."'
	     		>";
	     		echo $tiap_paket["description"]." | Rp.";
	     		echo number_format($tiap_paket["cost"]["0"]["value"],0,',','.')." | ";
	     		echo $tiap_paket["cost"]["0"]["etd"];
	     		echo "</option>";
	     	}
	    }
	}

}