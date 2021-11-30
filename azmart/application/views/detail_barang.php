<div class="container">
	<div class="card" style="border: none;">
	  <div class="card-header" style="border:none; font-weight: 600;">
	    Detail Produk
	  </div>
	  <div class="card-body">
	  	
	  	<?php foreach($barang as $brg): ?>
	  	<div class="row">
	  		<div class="col-md-4">
	  			<img src="<?php echo base_url().'/uploads/'.$brg->gambar ?>" class="card-img-top">
	  		</div>
	  		<div class="col-md-8">
	  			<table class="table">
	  				<tr>
	  					<td>Nama Produk</td>
	  					<td><strong><?php echo $brg->nama_brg ?></strong></td>
	  				</tr>  	

	  				<tr>
	  					<td>Keterangan</td>
	  					<td><?php echo $brg->keterangan ?></td>
	  				</tr>

	  				<tr>
	  					<td>Kategori</td>
	  					<td><?php echo $brg->kategori ?></td>
	  				</tr>

	  				<tr>
	  					<td>Kota Barang</td>
	  					<td><?php echo $brg->kota_brg ?></td>
	  				</tr>

	  				<tr>
	  					<td>Berat</td>
	  					<td><?php echo $brg->berat ?> (gram)</td>
	  				</tr>

	  				<tr>
	  					<td>Stok</td>
	  					<td><?php echo $brg->stok ?> pcs</td>
	  				</tr>

	  				<tr>
	  					<td>Harga</td>
	  					<td><strong><div class="btn btn-sm btn-success">Rp. <?php echo number_format($brg->harga,0,',','.')?></div></strong></td>
	  				</tr>	  
	  								  		
	  			</table>
	  				<?php echo anchor('home/tambah_ke_keranjang/' .$brg->id_brg, '<div class="btn btn-sm btn-dark"> Tambah ke Keranjang </div>') ?>
	  				<?php echo anchor('welcome/index/', '<div class="btn btn-sm btn-danger"> Kembali </div>') ?>
	  				<a href="#" class="ml-4"><i class="fa fa-eye text-dark ml-2 mr-2" aria-hidden="true"></i><?php echo $brg->visit ?></a>
	  		</div>
	  	</div>
	  	<?php endforeach; ?>
	  </div>
	</div>
</div>