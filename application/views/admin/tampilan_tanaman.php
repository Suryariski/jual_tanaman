<div class="container-fluid">
	<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i> Tambah Barang</button>
	<table class="table table-bordered">
		<tr>
			<th>NO</th>
			<th>NAMA Tanaman</th>
			<th>KETERANGAN</th>
			<th>KATEGORI</th>
			<th>HARGA</th>
			<th>STOK</th>
			<th colspan="3">AKSI</th>
		</tr>

		<?php 
		$no = 1;
		foreach($tanaman as $tnm) : ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $tnm->nama_tanam ?></td>
				<td><?php echo $tnm->keterangan ?></td>
				<td><?php echo $tnm->kategori ?></td>
				<td><?php echo $tnm->harga ?></td>
				<td><?php echo $tnm->stok ?></td>
				<td><?php echo anchor('admin/data_tanaman/detail/' .$tnm->id_tanam, '<div class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></div>') ?></td>
				<td><?php echo anchor('admin/data_tanaman/edit/' .$tnm->id_tanam, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
				<td><?php echo anchor('admin/data_tanaman/delete/' .$tnm->id_tanam, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'admin/data_tanaman/tambah_aksi'; ?>" method="post"	enctype="multipart/form-data">
        	<div class="form-group">
        		<label>Nama Tanaman</label>
        		<input type="text" name="nama_tanam" class="form-control" autocomplete="off">
        	</div>
        	<div class="form-group">
        		<label>Keterangan</label>
        		<input type="text" name="keterangan" class="form-control">
        	</div>
        	<div class="form-group">
        		<label>Kategori</label>
        		<select class="form-control" name="kategori">
        			<option>T.Obat</option>
        			<option>T.Hias</option>
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
        		<label>Gambar</label>
        		<input type="file" name="gambar" class="form-control">
        	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>