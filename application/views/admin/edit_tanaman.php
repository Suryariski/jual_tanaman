<div class="container-fluid">
	<h3><i class="fas fa-edit"></i>EDIT DATA BARANG</h3>

	<?php foreach($tanaman as $tnm) : ?>
		<form method="post" action="<?php echo base_url().'admin/data_tanaman/update' ?>">
			<div class="form-group">
				<label>Nama Barang</label>
				<input type="text" name="nama_tanam" class="form-control" value="<?php echo $tnm->nama_tanam ?>">
			</div>

			<div class="form-group">
				<label>Keterangan</label>
				<input type="hidden" name="id_tanam" class="form-control" value="<?php echo $tnm->id_tanam ?>">
				<input type="text" name="keterangan" class="form-control" value="<?php echo $tnm->keterangan ?>">
			</div>

			<div class="form-group">
				<label>Kategori</label>
				<input type="text" name="kategori" class="form-control" value="<?php echo $tnm->kategori ?>">
			</div>

			<div class="form-group">
				<label>Harga</label>
				<input type="text" name="harga" class="form-control" value="<?php echo $tnm->harga ?>">
			</div>

			<div class="form-group">
				<label>Stok</label>
				<input type="text" name="stok" class="form-control" value="<?php echo $tnm->stok ?>">
			</div>

			<button type="submit" class="btn btn-primary btn-sm">Simpan</button>

		</form>

	<?php endforeach; ?>
</div>