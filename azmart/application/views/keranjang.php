<div class="container">
	<h4> Keranjang Belanja </h4>
	<table class="table table-bordered table-striped table-hover">
		
		<tr>
			<th>NO</th>
			<th>Nama Produk</th>
			<th>Provinsi Barang</th>
			<th>Kota Barang</th>
			<th>Jumlah</th>
			<th>Harga</th>
			<th>Sub-Total</th>
		</tr>

		<?php $no=1; foreach($this->cart->contents() as $items) : ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $items['name'] ?></td>
				<td><?php echo $items['province'] ?></td>
				<td><?php echo $items['city'] ?></td>
				<td><?php echo $items['qty'] ?></td>
				<td align="right">Rp. <?php echo number_format($items['price'], 0,',','.')?></td>
				<td align="right">Rp. <?php echo number_format($items['subtotal'], 0,',','.')?></td>
			</tr>
		<?php endforeach; ?>

		<tr>
			<td colspan="6"> Total Harga </td>
			<td align="right">Rp. <?php echo number_format($this->cart->total(),0,',','.'); ?></td>
		</tr>
	
	</table>

	<div align="right">
		<?php echo anchor('home/hapus_keranjang/', '<div class="btn btn-sm btn-danger"> Hapus Keranjang </div>') ?>
		<?php echo anchor('welcome', '<div class="btn btn-sm btn-primary"> Lanjutkan Belanja </div>') ?>
		<?php echo anchor('home/pembayaran/', '<div class="btn btn-sm btn-success"> Pembayaran </div>') ?>
	</div>
</div>