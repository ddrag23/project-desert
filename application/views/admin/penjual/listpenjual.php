<section class="content container-fluid">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Data Penjual</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
				title="Collapse">
				<i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body">
			<div style="margin-bottom: 20px;">
				<!-- <a href="<?php echo base_url('datakelahiran/add'); ?>"><button type="button" class="btn btn-box btn-primary"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</button></a>
        <a href="<?php echo base_url('uploads/data_kelahiran.csv'); ?>"><button type="button" class="btn btn-box btn-primary"><i class="fa fa-download"></i>&nbsp;&nbsp;Download Format</button></a> -->
				<!-- <button type="button" data-toggle="modal" data-target="#import" class="btn btn-box btn-primary"><i class="fa fa-upload"></i>&nbsp;&nbsp;Upload</button> -->
				<div class="modal fade" id="import">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">Upload CSV</h4>
							</div>
							<form action="<?= base_url('datakelahiran/import'); ?>" method="POST" enctype="multipart/form-data">
								<div class="modal-body">
									<div class="" style="margin-bottom: 5px;">
										<label for="file">Upload CSV</label>
										<input id="file" type="file" name="file" placeholder="FILE" class="form-control">
									</div>
								</div>
								<div class="modal-footer">
									<input type="submit" class="btn btn-primary btn-box" name="upload" value="upload">
								</div>
							</form>
						</div>

					</div>
				</div>
                <!--  <a href="<?php echo base_url('users/useraddmulti'); ?>"><button type="button" class="btn btn-box btn-primary"><i class="fa fa-users"></i>&nbsp;&nbsp;Tambah Multiple</button></a> -->
			</div>
			<?php if(validation_errors()): ?>
			<div class="alert alert-danger" role="alert"><?php echo validation_errors('<p>', '</p>'); ?></div>
			<?php endif; ?>
			<?php if($message = $this->session->flashdata('message')): ?>
			<div class="alert alert-success" role="alert"><?php echo $message['message']; ?></div>
			<?php endif; ?>
			<div class="table-responsive">
				<table id="example1" class="table table-bordered">
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
              <td><?php echo $row->Alamat; ?></td>
              <td><?php echo $row->notelp; ?></td>

							<td>
								<a href="<?php echo base_url('datakelahiran/edit/' . $row->id); ?>"><button class="btn btn-warning"><i class="fa fa-pencil"></i></button></a>
								<a href="<?php echo base_url('datakelahiran/cetakSuratKelahiran/'. $row->id); ?>"><button class="btn btn-print"><i class="fa fa-print"></i></button></a>
								<a href="<?php echo base_url('datakelahiran/delete/'. $row->id); ?>"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
								<!-- <button class="btn btn-warning" data-toggle="modal" data-target="#edit<?php echo $row->id; ?>"><i class="fa fa-pencil"></i></button>
								<button class="btn btn-success" data-toggle="modal" data-target="#changespassword<?php echo $row->id; ?>"><i class="fa fa-key"></i></button>
								<button class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $row->id; ?>"><i class="fa fa-trash"></i></button> -->

								<!-- <div class="btn-group">
									<button type="button" class="btn btn-info">Konfigurasi</button>
									<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
									<span class="caret"></span>
									<span class="sr-only">Toggle Dropdown</span>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li><a data-toggle="modal" data-target="#import<?php echo $row->id; ?>">Import Database</a></li>
									</ul>
								</div> -->
								<!--  <a href="<?php echo base_url('users/config/'. $row->id); ?>"><button class="btn btn-success"><i class="fa fa-cogs">&nbsp;Edit Config</i></button></a> -->
								<!--  <a href="#"><button class="btn btn-success"><i class="fa fa-cogs">&nbsp;Edit Config</i></button></a> -->
								<!--  <a href="<?php echo base_url('users/dropdb/'. $row->id); ?>"><button class="btn btn-danger"><i class="fa fa-database">&nbsp;Drop DB</i></button></a> -->
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
