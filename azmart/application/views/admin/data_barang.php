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
	<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i> Tambah Barang </button>

	<table class="table table-bordered">
		<tr>
			<th>NO</th>
			<th>NAMA BARANG</th>
			<th>KETERANGAN</th>
			<th>KATEGORI</th>
			<th>PROVINSI BRG</th>
			<th>KOTA BRG</th>
			<th>HARGA</th>
			<th>STOK</th>
			<th>BERAT</th>
			<th>VISITOR</th>
			<th colspan="2">AKSI</th>
		</tr>

		<?php 
		$no = 1;
		foreach($barang as $brg) : ?>

			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $brg->nama_brg ?></td>
				<td><?php echo $brg->keterangan ?></td>
				<td><?php echo $brg->kategori ?></td>
				<td><?php echo $brg->provinsi_brg ?></td>
				<td><?php echo $brg->kota_brg ?></td>
				<td><?php echo $brg->harga ?></td>
				<td><?php echo $brg->stok ?></td>
				<td><?php echo $brg->berat ?></td>
				<td><?php echo $brg->visit ?></td>
				<td><?php echo anchor('admin/data_barang/edit/' .$brg->id_brg, '<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>') ?></td>
				<td><?php echo anchor('admin/data_barang/hapus/' .$brg->id_brg, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>') ?></td>
			</tr>

		<?php endforeach; ?>
	</table>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_barang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORM INPUT PRODUK</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'admin/data_barang/tambah_aksi' ?>" method="post" enctype="multipart/form-data">
        	
        	<div class="form-group">
        		<label>Nama Barang</label>
        		<input type="text" name="nama_brg" class="form-control">
        	</div>

        	<div class="form-group">
        		<label>Keterangan</label>
        		<input type="text" name="keterangan" class="form-control">
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
        		<label>Kategori</label>
        		<select class="form-control" name="kategori">
        			<option>Flannel</option>
        			<option>Kaos</option>
        			<option>Jaket</option>
        			<option>Sepatu</option>
        			<option>Topi</option>
        			<option>Tas</option>
        		</select>
        	</div> 

        	<div class="form-group">
        		<label>Harga</label>
        		<input type="text" name="harga" class="form-control">
        	</div>   

        	<div class="form-group">
        		<label>Stok</label>
        		<input type="text" name="stok" class="form-control">
        	</div>        	    	        	

        	<div class="form-group">
        		<label>Berat</label>
        		<input type="text" name="berat" class="form-control">
        	</div>     

        	<div class="form-group">
        		<label>Gambar Produk</label><br>
        		<input type="file" name="gambar" class="form-control">
        	</div>  
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>

      </form>
    
    </div>
  </div>
</div>