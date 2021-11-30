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
          $provinsi_brg = json_decode($response, true);
        }
    ?>


<div class="container-fluid">
	<h3><i class="fas fa-edit"></i>EDIT DATA BARANG</h3>

	<?php foreach($barang as $brg)  : ?>

		<form method="post" action="<?php echo base_url().'admin/data_barang/update' ?>">
			
			<div class="form-group">
				<label>Nama Barang</label>
				<input type="text" name="nama_brg" class="form-control" value="<?php echo $brg->nama_brg ?>">
			</div>

			<div class="form-group">
				<label>Keterangan</label>
				<input type="hidden" name="id_brg" class="form-control" value="<?php echo $brg->id_brg ?>">
				<input type="text" name="keterangan" class="form-control" value="<?php echo $brg->keterangan ?>">
			</div>

			<div class="form-group">
				<label>Kategori</label>
				<input type="text" name="kategori" class="form-control" value="<?php echo $brg->kategori ?>">
			</div>

			<div class="form-group">
				<label>Provinsi Barang</label>
					<select class="form-control" name="provinsi_brg" id="provinsi_brg">
						<option value="">Pilih Provinsi</option>
							<?php 
								if($provinsi_brg['rajaongkir']['status']['code'] == '200'){	
									foreach($provinsi_brg['rajaongkir']['results'] as $prv){
										echo "<option value='$prv[province_id]'> $prv[province] </option>";
									}	
								}
							?>
					</select>
			</div>	

			<div class="form-group">
				<label>Kota Barang</label>
					<select class="form-control" name="kota_brg" id="kota_brg">
						<option>Pilih Kota</option>
					</select>
			</div>	

			<div class="form-group">
				<label>Kota Barang</label>
				<input type="text" name="kategori" class="form-control" value="<?php echo $brg->kategori ?>">
			</div>

			<div class="form-group">
				<label>Harga</label>
				<input type="text" name="harga" class="form-control" value="<?php echo $brg->harga ?>">
			</div>

			<div class="form-group">
				<label>Stok</label>
				<input type="text" name="stok" class="form-control" value="<?php echo $brg->stok ?>">
			</div>	

			<div class="form-group">
				<label>Berat</label>
				<input type="text" name="berat" class="form-control" value="<?php echo $brg->berat ?>">
			</div>										
			<button type="submit" class="btn btn-primary btn-sm mt-3"> Simpan </button>	
		</form>

	<?php endforeach; ?>
</div>