<div class="container-fluid">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="btn btn-sm btn-success">
				<?php  
				$grand_total = 0;
				if ($keranjang = $this->cart->contents()) {
					foreach ($keranjang as $item)
					{
						$grand_total = $grand_total + $item['subtotal'];
					}
				echo "<h4>Total Belanja Anda: Rp. ".number_format($grand_total, 0,',','.');
			 ?>
			</div><br><br>
			<h3>Input Alamat Pengitiman dan Pembayaran</h3>

			<form method="post" action="<?php echo base_url('dashboard/proses_pesanan') ?>">
				
				<div class="form-group">
					<label>Nama Lengkap</label>
					<input type="text" name="nama" placeholder="Nama Lengkap Anda" class="form-control">
				</div>
				<div class="form-group">
					<label>Alamat Lengkap</label>
					<input type="text" name="alamat" placeholder="Alamat Lengkap Anda" class="form-control">
				</div>
				<div class="form-group">
					<label>Nomor Telepon</label>
					<input type="text" name="no_telp" placeholder="Nomor Telepon Anda" class="form-control">
				</div>
				<div class="form-group">
					<label>Jasa Pengiriman</label>
					<select class="form-control">
						<option>Mengambil Langsung</option>
						<option>TIKI</option>
						<option>JNT</option>
						<option>Gojek</option>
					</select>
				</div>
				<div class="form-group">
					<label>Pilih Pembayaran</label>
					<select class="form-control">
						<option>E-Banking</option>
						<option>Indomaret</option>
						<option>Transfer Bank</option>
						
					</select>
				</div>

				<button type="submit" class="btn btn-sm btn-primary mb-3">Pesan</button>

			</form>

			<?php 
		}else{
			echo "<h4>Keranjan Belanja Anda Masih Kosong";
		} ?>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>