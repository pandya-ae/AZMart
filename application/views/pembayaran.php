    <?php

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
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
          $provinsi = json_decode($response, true);
        }
    ?>

<div class="container">
	<div class="row">
		<div class="col-md-2">
			
		</div>
		<div class="col-md-8">
			<div class="btn btn-sm btn-success">
				<?php 
				$grand_total = 0;
				if($keranjang = $this->cart->contents()) 
				{
				 	 foreach($keranjang as $item)
				 	 {	
				 	 	$grand_total = $grand_total + $item['subtotal'];
				 	 }

				echo "<h5> Total Belanja, Sebelum Ongkir: Rp. ".number_format($grand_total,0,',','.');
				  ?>
			</div><br><br>

			<h3>Input Alamat Pengiriman dan Pembayaran</h3>
			<form method="post" action="<?php echo base_url()?>home/proses_pesanan">
				
				<div class="form-group">
					<label>Nama Lengkap</label>
					<input type="text" name="nama" placeholder="Nama Lengkap Anda" class="form-control" autocomplete="off">
				</div>

				<div class="form-group">
					<label>Alamat Jalan</label>
					<input type="text" name="alamat" placeholder="Alamat Jalan Anda" class="form-control" autocomplete="off">
				</div>

				<div class="form-group">
					<label>Provinsi Asal</label>
					<select class="form-control" name="provinsi" id="provinsi">
						<option value="">Pilih Provinsi</option>
						<?php 
							if($provinsi['rajaongkir']['status']['code'] == '200'){	
								foreach($provinsi['rajaongkir']['results'] as $prv){
									echo "<option value='$prv[province_id]'> $prv[province] </option>";
								}	
							}
						?>
					</select>
				</div>				

				<div class="form-group">
					<label>Kota Asal</label>
					<select class="form-control" name="kota_asal" id="kota_asal">
						<option>Pilih Kota</option>
					</select>
				</div>	

				<div class="form-group">
					<label>Nomor Telepon</label>
					<input type="text" name="no_telpon" placeholder="Nomor Telepon Anda" class="form-control" autocomplete="off">
				</div>				

				<div class="form-group">
					<label>Jasa Pengiriman</label>
					<select class="form-control" name="kurir">
						<option>JNE</option>
						<option>TIKI</option>
						<option>POS Indonesia</option>
						<option>GOJEK</option>
						<option>Si Cepat</option>
					</select>
				</div>

				<div class="form-group">
					<label>Pilih Bank</label>
					<select class="form-control" name="bank">
						<option>BCA - XXXXXXXXX</option>
						<option>BNI - XXXXXXXXX</option>
						<option>BRI - XXXXXXXXX</option>
						<option>MANDIRI - XXXXXXXXX</option>
					</select>
				</div>

				<!--<div class="form-group">
        			<label>Bukti Pembayaran</label><br>
        			<input type="file" name="bukti_pembayaran" class="form-control">
        		</div> --> 

				<button type="sumbit" class="btn btn-sm btn-primary mb-3"> Pesan </button>
			</form>

			<?php 

			}else{
				echo " <h4> Keranjang Belanja Anda Masih Kosong!";
			}
			?>

		</div>


		<div class="col-md-2">
			
		</div>

	</div>
</div>
<br>