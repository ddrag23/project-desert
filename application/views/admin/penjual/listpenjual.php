<section class="content container-fluid">
	<button type="button" name="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah_penjual"><i class="fas fa-plus fa-sm"></i>&nbsp; Tambah Penjual
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
					<h6 class="m-0 font-weight-bold text-primary">Daftar Penjual</h6>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<a href=""></a>
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
						<tr>
							<th>No</th>
              <th>Username</th>
							<th>Nama Lengkap</th>
              <th>Jenis Kelamin</th>
							<th>Alamat</th>
							<th>No Telepon</th>
							<th width="20%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=0; foreach ($penjual as $row): ?>
						<tr>
							<td><?php echo ++$no; ?></td>
							<td><?php echo $row->username; ?></td>
							<td><?php echo $row->nama_lengkap; ?></td>
							<td><?php echo $row->jenis_kelamin; ?></td>
              <td><?php echo $row->alamat; ?></td>
              <td><?php echo $row->notelp; ?></td>

							<td>
								<a href="<?php echo base_url('penjual/edit/' . $row->id); ?>"><button class="btn btn-info"><i class="fas fa-edit"></i></button></a>
								<a href="<?php echo base_url('penjual/delete/' . $row->id); ?>"> <button class="btn btn-danger" ><i class="fas fa-trash-alt"></i></button></i></
							</td>
						</tr>
					<?php endforeach; ?>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
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
<form class="" action="<?php echo base_url('penjual/add'); ?>" method="post" enctype="multipart/form-data">
	<div class="form-row mb-2">
		<div class="col-12">
			<input id="username" class="form-control" name="username" type="text" placeholder="Username">
		</div>

	</div>
	<div class="form-row mb-2">
		<div class="col">
			<input id="namalengkap" class="form-control" name="namalengkap" type="text" placeholder="Nama Lengkap">
		</div>
		<div class="col">
			<input id="notelp" class="form-control" name="notelp" type="text" placeholder="No Telepon">
		</div>
	</div>
	<div class="form-row mb-2">
		<div class="col">
			<select id="jeniskelamin" name="jeniskelamin" value="Jenis Kelamin" class="form-control">
					<option value="L">Laki-Laki</option>
					<option value="P">Perempuan</option>
			</select>
		</div>
		<div class="col">
			<input id="email" class="form-control" name="email" type="email" placeholder="Email">
		</div>
	</div>
	<div class="form-group">
		<input id="alamat" class="form-control" name="alamat" type="text" placeholder="Alamat">
	</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
	<input type="submit" name="submit" class="btn btn-primary" value="Simpan">

</div>
</div>
</div>
</div>
