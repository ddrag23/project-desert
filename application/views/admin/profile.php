<section class="content container-fluid">



	  <div class="card shadow mb-4">
	    <div class="card-header py-3">
	      <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
	    </div>
	    <div class="card-body">
				<div class="">
					<?php if ($this->session->userdata('pasfoto') == null): ?>
						<img src="<?php echo base_url(); ?>assets/img/avatar04.png" alt="photo" class="thumbnail img-responsive" style="margin-right: auto;margin-left: auto;display: block; margin-top: 25px;">
					<?php endif ?>
					<?php if ($this->session->userdata('pasfoto') != null): ?>
						<div class="img">
							<img src="<?php echo base_url(); ?>uploads/<?php echo 'dir_' . $this->session->userdata('username') . '/' . $this->session->userdata('pasfoto'); ?>" alt="photo" class="thumbnail img-responsive img-square" style="margin-right:auto; height: 160px; width: 160px; margin-left: auto;display: block; margin-top: 25px;">
						</div>
					<?php endif ?>
				</div>
	            <form class="form-horizontal" method="post" enctype="multipart/form-data">
	            	<?php if(validation_errors()): ?>
					<div class="alert alert-danger" role="alert"><?php echo validation_errors('<p>', '</p>'); ?></div>
					<?php endif; ?>
					<?php if($message = $this->session->flashdata('message')): ?>
						<div class="alert alert-success" role="alert"><?php echo $message['message']; ?></div>
			        <?php endif; ?>
		            <div class="box-body">
		                <div class="container-fluid">
		                	<div class="form-group">
		                		<label for="namalengkap" class="control-label">Nama Lengkap</label>
			                	<input type="text" class="form-control" value="<?= $this->session->userdata('nama_lengkap'); ?>" id="namalengkap" name="namalengkap" placeholder="">
			                </div>
			                <div class="form-group">
		                		<label for="alamat">Alamat</label>
		                		<textarea class="form-control" id="alamat" name="alamat" rows="3"><?php echo $this->session->userdata('alamat'); ?></textarea>

			                </div>
			                <div class="form-group">
		                		<label for="email" class="control-label">Email</label>
			                	<input type="email" class="form-control" id="email" value="<?php echo $this->session->userdata('email'); ?>" name="email" placeholder="">
			                </div>
			                <div class="form-group">
		                		<label for="nohp" class="control-label">No HP</label>
			                	<input type="number" class="form-control" value="<?php echo $this->session->userdata('notelp'); ?>" id="notelp" name="notelp" placeholder="">
			                </div>
			                <div class="form-group">
		                		<label for="avatar" class="control-label">Avatar</label>
			                	<input type="file" class="form-control" id="avatar" name="avatar">
			                </div>
			                <div class="form-group" align="center" style="padding: 20px;">
		                		<input type="submit" class=" btn btn-info" id="save" name="simpan" value="Simpan">
			                </div>
		                </div>
		            </div>
		        </form>
	        </div>
		</div>

</section>
