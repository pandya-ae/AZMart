

<div class="container">
	<div class="row">
		<div class="col-md-2">
			
		</div>

		<div class="col-md-8">
		
				<?php 
				$grand_total = 0;
					if($keranjang = $this->cart->contents()) 
					{
					 	 foreach($keranjang as $item)
					 	 {	
					 	 	$grand_total = $grand_total + $item['subtotal'];
					 	 }
				  ?>

			

			<h3>Input Alamat Pengiriman dan Pembayaran</h3>

			<br>

			<form method="post" action="<?php echo base_url()?>home/proses_pesanan">
			
				<div class="form-group">
					<label>Nama Lengkap</label>
					<input type="text" name="nama" placeholder="Nama Lengkap Anda" class="form-control" autocomplete="off">
				</div>

				<div class="form-group">
					<label>Nomor Telepon</label>
					<input type="text" name="no_telpon" placeholder="Nomor Telepon Anda" class="form-control" autocomplete="off">
				</div>	
<!--
				<div class="form-group">
					<label>Provinsi Barang</label>
						<input type="text" name="provinsi_brg" id="provinsi_brg" value="<?php echo $items['city'] ?>" class="form-control" readonly>
				</div>	
			
				<div class="form-group">
					<label>Kota Barang</label>
						<input type="text" name="kota_brg" id="kota_brg" value="<?php echo $items['city'] ?>" class="form-control" readonly>
				</div>	
-->
				<div class="form-group">
					<label>Alamat Jalan</label>
					<input type="text" name="alamat" placeholder="Alamat Jalan Anda" class="form-control" autocomplete="off">
				</div>

				<div class="form-group">
					<label>Provinsi Penerima</label>
					<select class="form-control" id="provinsi" name="provinsi" >
						<option value="">Pilih Provinsi</option>
						<?php 

						?>
					</select>
				</div>				

				<div class="form-group">
					<label>Kota Penerima</label>
					<select class="form-control" id="kota_asal" name="kota_asal" >
						<option>Pilih Kota</option>
					</select>
				</div>	


				<div class="form-group">
					<label>Ekspedisi</label>
					<select class="form-control" id="kurir" name="kurir" >
						<option value="">Pilih Ekspedisi</option>
					</select>
				</div>	

				<div class="form-group">
					<label>Paket Ekspedisi</label>
					<select class="form-control" id="paket" name="paket">
						<option value="">Pilih Service Ekspedisi</option>
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

        <div class="row">
        <!-- accepted payments column -->
	        <div class="col-sm-6">
	          <p class="lead">Payment Methods:</p>
	          <img src="<?php echo base_url('assets/img/visa.png') ?> " alt="Visa">
	          <img src="<?php echo base_url('assets/img/mastercard.png') ?> " alt="Mastercard">
	          <img src="<?php echo base_url('assets/img/bca.png') ?> " alt="BCA" width="50" height="auto">
	          <img src="<?php echo base_url('assets/img/bni.png') ?> " alt="BNI" width="50" height="auto">

	          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
	           Hidup ini kadang tidak berjalan sesuai keinginan kita. Karena pengemudi hidup kita sejatinya bukan kita sendiri.
				Tidak mengapa. Sepanjang kita tetap jujur, kerja keras dan selalu konkret, Insya Allah, jalannya kembali lancar.
	          </p>
	         </div>
	        <div class="col-sm-6" >
	        		<br>
	          <div class="table-responsive">
	            <table class="table">
	              <tr>
	                <th style="width:50%">Subtotal:</th>
	                <td> Rp. <?php echo number_format($grand_total,0,',','.'); ?></td>
	              </tr>
	              <tr>
	                <th>Ongkir:</th>
	                <td><label id="ongkir"></label></td>
	              </tr>
	              <tr>
	                <th>Total: </th>
	                <td><label id="total_bayar"></label></td>
	              </tr>
	            </table>
	          </div>
	        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      	
				<button type="sumbit" class="btn btn-primary mb-3" style="float: right;"> Pesan </button>
				<a href="<?php echo base_url('welcome') ?>" class="btn btn-danger mr-2"style="float: right;">Kembali</a>
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