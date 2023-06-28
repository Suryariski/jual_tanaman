<div class="container-fluid">
	<div class="card">
	  <div class="card-header">Detail Produk</div>
	  <div class="card-body">
	    <?php foreach($tanaman as $tnm): ?>
	    <div class="row">	    	
	    	<div class="col-md-4">
	    		<img src="<?php echo base_url().'/uploads/'.$tnm->gambar ?>" class="card-img-top">
	    	</div>
	    	<div class="col-md-8">
	    		<table class="table">
	    			<tr>
	    				<td>Nama Produk</td>
	    				<td><strong><?php echo $tnm->nama_tanam ?></strong></td> 
	    			</tr>
	    			<tr>
	    				<td>Keterangan</td>
	    				<td><strong><?php echo $tnm->keterangan ?></strong></td> 
	    			</tr>
	    			<tr>
	    				<td>Kategori</td>
	    				<td><strong><?php echo $tnm->kategori ?></strong></td> 
	    			</tr>
	    			<tr>
	    				<td>Stok</td>
	    				<td><strong><?php echo $tnm->stok ?></strong></td> 
	    			</tr>
	    			<tr>
	    				<td>Harga</td>
	    				<td><strong><div class="btn btn-sm btn-success"><?php echo "Rp.	".number_format($tnm->harga, 0,',','.') ?></div></strong></td> 
	    			</tr>
	    		</table>
	    		<?php echo anchor('dashboard/tambah_ke_keranjang/'.$tnm->id_tanam,'<div class="btn btn-sm btn-primary">Tambah ke Keranjang</div>') ?>
			    <?php echo anchor('dashboard/index/','<div class="btn btn-sm btn-danger">Kembali</div>') ?>
	    	</div>
	    </div>
		<?php endforeach; ?>
	  </div>
	</div>
</div>