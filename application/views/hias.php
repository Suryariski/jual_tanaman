<div class="container-fluid">


	<div class="row text-center mt-4">
		
		<?php foreach ($Hias as $tnm) : ?>
			<div class="card ml-3 mb-3" style="width: 16rem;	">
			  <img src="<?php echo base_url().'uploads/'.$tnm->gambar ?>" class="card-img-top" alt="..." height="200px">
			  <div class="card-body">
			    <h5 class="card-title mb-1"><?php echo $tnm->nama_tanam ?></h5>
			    <small><?php echo $tnm->keterangan ?></small><br>
			    <span class="badge badge-pill badge-success mb-3">Rp. <?php echo number_format($tnm->harga, 0,',','.')  ?></span><br>
			    <?php echo anchor('dashboard/tambah_ke_keranjang/'.$tnm->id_tanam,'<div class="btn btn-sm btn-primary">Tambah ke Keranjang</div>') ?>
			    <?php echo anchor('dashboard/detail/'.$tnm->id_tanam,'<div class="btn btn-sm btn-success">Detail</div>') ?>
			  </div>
			</div>
		<?php endforeach; ?>
	</div>
</div>