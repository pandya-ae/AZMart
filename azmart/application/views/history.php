<div class="container">

	<h4> Invoice Pembelian Produk </h4>

	<table class="table table-bordered table-hover table-striped">
		
		<tr>
			<th>Id Invoice</th>
			<th>Nama Pemesan</th>
			<th>Alamat Pengiriman</th>
			<th>Provinsi</th>
			<th>Kota</th>
			<th>Jasa Kurir</th>
			<th>Paket Kurir</th>
			<th>Pilihan Bank</th>
			<th>Tanggal Pemesanan</th>
			<th>Batas Pembayaran</th>
			<th>Aksi</th>
		</tr>

		<?php foreach($tb_invoice as $inv) : ?>

		<tr>
			<td><?php echo $inv->id ?></td>
			<td><?php echo $inv->nama ?></td>
			<td><?php echo $inv->alamat ?></td>
			<td><?php echo $inv->provinsi ?></td>
			<td><?php echo $inv->kota_asal ?></td>
			<td><?php echo $inv->kurir ?></td>
			<td><?php echo $inv->paket ?></td>
			<td><?php echo $inv->bank ?></td>
			<td><?php echo $inv->tgl_pesan ?></td>
			<td><?php echo $inv->batas_bayar ?></td>
			<td><?php echo anchor('home/detail_history/'.$inv->id,'<div class="btn btn-sm btn-primary">Detail</div>') ?></td>
		</tr>

		<?php endforeach; ?>

	</table>
</div>