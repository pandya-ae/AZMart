<div class="container">
	<h4> Konfirmasi Pembayaran</h4>
	<table class="table table-bordered table-striped table-hover">
		
		<tr>
			<th>Id</th>
			<th>Id Invoice</th>
			<th>Id Barang </th>
			<th>Nama Barang</th>
			<th>Jumlah</th>
			<th>Jasa Pengiriman</th>
			<th>Pembayaran</th>
			<th>Harga</th>
			<th>Sub-Total</th>
		</tr>

		<?php  foreach( $tb_pesanan as $items) : ?>
			<tr>
				<td><?php echo $items['id'] ?></td>
				<td><?php echo $items['id_invoice'] ?></td>
				<td><?php echo $items['id_brg'] ?></td>
				<td><?php echo $items['name'] ?></td>
				<td><?php echo $items['qty'] ?></td>
				<td><?php echo $items['kurir'] ?></td>
				<td><?php echo $items['bank'] ?></td>
				<td align="right">Rp. <?php echo number_format($items['price'], 0,',','.')?></td>
				<td align="right">Rp. <?php echo number_format($items['subtotal'], 0,',','.')?></td>
			</tr>
		<?php endforeach; ?>

		<tr>
			<td colspan="4"> Total Harga </td>
			<td align="right">Rp. <?php echo number_format($this->cart->total(),0,',','.'); ?></td>
		</tr>
	
	</table>

	<div class="row">
	        <!-- accepted payments column -->
	        <div class="col-sm-6">
	          <p class="lead">Payment Methods:</p>
	          <img src="<?php echo base_url('assets/img/visa.png') ?> " alt="Visa">
	          <img src="<?php echo base_url('assets/img/mastercard.png') ?>" alt="Mastercard">
	          <img src="<?php echo base_url('assets/img/bca.png') ?> " alt="BCA" width="50" height="auto">
	          <img src="<?php echo base_url('assets/img/bni.png') ?> " alt="BNI" width="50" height="auto">

	          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
	           Hidup ini kadang tidak berjalan sesuai keinginan kita. Karena pengemudi hidup kita sejatinya bukan kita sendiri.
				Tidak mengapa. Sepanjang kita tetap jujur, kerja keras dan selalu konkret, Insya Allah, jalannya kembali lancar.
	          </p>
	    <!--        <div class="form-group">          	
					<label class="font-weight-bold"> Pengiriman </label>
					<input type="text" name="#"  class="form-control" readonly>
				</div> -->

				<table class="table table-striped">
	            	<?php 

	            		$tampil2 = mysqli_query($connection, "SELECT * FROM tb_pesanan order by id desc");

	            		if ($data2 = mysqli_fetch_array($tampil2)) {
	            	 ?>  				
					<tr>
						<th> Pengiriman : </th>
						<td> <?= $data2['kurir'] ?></td>
					</tr>
				<?php  } ?>
				</table>
	        </div>
	        <!-- /.col -->
	        <div class="col-sm-6" >
	        		<br>

	          <div class="table-responsive">
	            <table class="table">
	            	<?php 

	            		$price = mysqli_query($connection, "SELECT * FROM tb_pesanan order by id desc");
	            		if ($data3 = mysqli_fetch_array($price)) {

	            			$ongkir = $data3['kurir'];

	            			// membagi biaya masing-masing jenis kurir
	            			
	            			if ($ongkir == "JNE") {

	            				$harga = 12000;

		            			//menghitung pajak setiap pengiriman
		            			$tax = $harga * 0.08;

		            			//menghitung total
		            			$total = $tax + $harga;

	            			}else if ($ongkir == "TIKI") {
								$harga = 15000;

		            			//menghitung pajak setiap pengiriman
		            			$tax = $harga * 0.06;

		            			//menghitung total 
		            			$total = $tax + $harga;

	            			}else if ($ongkir == "POS Indonesia") {
								$harga = 9000;

		            			//menghitung pajak setiap pengiriman
		            			$tax = $harga * 0.02;

		            			//menghitung total 
		            			$total = $tax + $harga;

	            			}else if ($ongkir == "GOJEK") {
								$harga = 20000;

		            			//menghitung pajak setiap pengiriman
		            			$tax = $harga * 0.05;

		            			//menghitung total 
		            			$total = $subtotal + $tax;

	            			}else if ($ongkir == "Si Cepat") {
								$harga = 1700;

		            			//menghitung pajak setiap pengiriman
		            			$tax = $harga * 0.04;

		            			//menghitung total dari subtotal ditambahkan dengan pajak
		            			$total = $tax + $harga;
	            			}
	            	 ?>  
	              <tr>
	                <th style="width:50%">Ongkir</th>
	                <td> Rp. <?php echo number_format($total,0,".","."); ?> </td>
	              </tr>
	              <tr>
	                <th>Grand Total:</th>
	                <td>Rp. <?php echo number_format($total,0,".","."); ?></td>
	              </tr>
	          <?php } ?>
	            </table>
	          </div>
	        </div>
	        <!-- /.col -->
	      </div>

	<div align="right">
		<?php echo anchor('welcome', '<div class="btn btn-sm btn-primary"> Kembali </div>') ?>
		<?php echo anchor('home/pembayaran_selesai/', '<div class="btn btn-sm btn-success"> Pembayaran </div>') ?>
	</div>
</div>