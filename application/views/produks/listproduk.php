<section class="content container-fluid">
	<button type="button" name="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah_penjual"><i class="fas fa-plus fa-sm"></i>&nbsp; Tambah Produk
</button>
			<?php if(validation_errors()): ?>
			<div class="alert alert-danger" role="alert"><?php echo validation_errors('<p>', '</p>'); ?></div>
			<?php endif; ?>
			<?php if($message = $this->session->flashdata('message')): ?>
			<div class="alert alert-success" role="alert"><?php echo $message['message']; ?></div>
			<?php endif; ?>

			<!-- DataTales Example -->

			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<a href=""></a>
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
						<tr>
							<th>No</th>
              <th>Nama Barang</th>
							<th>Kategori</th>
              <th>Harga</th>
							<th>Gambar</th>
							<th>Deskripsi</th>
							<th width="20%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php if ($this->session->userdata('level') == 'administrator'): ?>
							<?php $no=0; foreach ($produk as $key): ?>
							<tr>
								<td><?php echo ++$no; ?></td>
								<td><?php echo $key->nama; ?></td>
								<td><?php echo $key->kategori; ?></td>
								<td><?php echo $key->harga; ?></td>
	              <td><?php echo $key->gambar; ?></td>
	              <td><?php echo $key->deskripsi; ?></td>

								<td>
									<a href="<?php echo base_url('produk/edit/' . $key->id_produk); ?>"><button class="btn btn-info"><i class="fas fa-edit"></i></button></a>
									<a href="<?php echo base_url('produk/delete/' . $key->id_produk); ?>"> <button class="btn btn-danger" ><i class="fas fa-trash-alt"></i></button></i></
								</td>
							</tr>
						<?php endforeach; ?>

						<?php endif; ?>
						<?php if ($this->session->userdata('level') == 'penjual'): ?>
							<?php $no=0; foreach ($produkPenjual as $row): ?>
							<tr>
								<td><?php echo ++$no; ?></td>
								<td><?php echo $row->nama; ?></td>
								<td><?php echo $row->kategori; ?></td>
								<td><?php echo $row->harga; ?></td>
	              <td><?php echo $row->gambar; ?></td>
	              <td><?php echo $row->deskripsi; ?></td>

								<td>
									<a href="<?php echo base_url('produk/edit/' . $row->id_produk); ?>"><button class="btn btn-info"><i class="fas fa-edit"></i></button></a>
									<a href="<?php echo base_url('produk/delete/' . $row->id_produk); ?>"> <button class="btn btn-danger" ><i class="fas fa-trash-alt"></i></button></i></
								</td>
							</tr>
						<?php endforeach; ?>
						<?php endif; ?>

					</tbody>
				</table>

			</div>
		</div>
	</div>

</section>
<div class="modal fade" id="tambah_penjual" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<div class="modal-body">
	<?php if(validation_errors()): ?>
		<div class="alert alert-danger" role="alert"><?php echo validation_errors('<p>', '</p>'); ?></div>
	<?php endif; ?>
	<?php if($message = $this->session->flashdata('message')): ?>
		<div class="alert alert-success" role="alert"><?php echo $message['message']; ?></div>
	<?php endif; ?>
<form class="" action="<?php echo base_url('produk/add'); ?>" method="post" enctype="multipart/form-data">
	<div class="form-row mb-2">
		<div class="col">
			<input id="nama" class="form-control" name="nama" type="text" placeholder="Nama Barang">
		</div>
		<div class="col">
			<input id="kategori" class="form-control" name="kategori" type="text" placeholder="Kategori">
		</div>
	</div>
	<div class="form-row mb-2">
		<div class="col">
			<input id="harga" class="form-control" name="harga" type="text" placeholder="Harga">
		</div>
		<div class="col">
			<input id="deskripsi" class="form-control" name="deskripsi" type="text" placeholder="Deskripsi">
		</div>
	</div>
	<div class="form-group">
		<input id="gambar" class="form-control" name="gambar" type="file" placeholder="Upload Gambar">
	</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
	<input type="submit" name="submit" class="btn btn-primary" value="Simpan">

</div>
</div>
</div>
</div>
