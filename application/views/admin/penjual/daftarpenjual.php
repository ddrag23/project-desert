<section class="content container-fluid">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Tambah Data Kelahiran</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
					title="Collapse">
					<i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body">
				<?php if(validation_errors()): ?>
					<div class="alert alert-danger" role="alert"><?php echo validation_errors('<p>', '</p>'); ?></div>
					<?php endif; ?>
					<?php if($message = $this->session->flashdata('message')): ?>
						<div class="alert alert-success" role="alert"><?php echo $message['message']; ?></div>
			        <?php endif; ?>
				<div class="row">
					<form action="" method="post">
						<div class="col-md-6 form-group">
							<label for="nosurat">No Surat Kelahiran</label>
							<input id="nosurat" type="text" name="nosurat" class="form-control" placeholder="No Surat" autocomplete="off">
						</div>
						<div class="col-md-6 form-group">
							<label for="nik">NIK Ayah</label>
							<input id="nik" type="text" name="nik" class="form-control" placeholder="NIK">
						</div>
            <div class="col-md-6 form-group">
							<label for="namabayi">Nama Bayi</label>
							<input id="namabayi" type="text" name="namabayi" class="form-control" placeholder="Nama Bayi">
						</div>
            <div class="col-md-6 form-group">
							<label for="jeniskelamin">Jenis Kelamin</label>
							<select class="form-control" name="jeniskelamin">
								<option selected="selected" value="">pilih jenis kelamin</option>
								<option  value="L">Laki-Laki</option>
								<option  value="P">perempuan</option>
							</select>
						</div>
						<div class="col-md-6 form-group">
							<label for="harilahir">Hari Lahir</label>
							<input id="harilahir" type="text" name="harilahir" placeholder="Hari Lahir" class="form-control">
						</div>
            <div class="col-md-6 form-group">
							<label for="tempatlahir">Tempat Lahir</label>
							<input id="tempatlahir" type="text" name="tempatlahir" placeholder="Tempat Lahir" class="form-control">
						</div>
            <div class="col-md-6 form-group">
							<label for="tanggallahir">Tanggal Lahir</label>
							<input id="tanggallahir" type="date" name="tanggallahir" placeholder="Tanggal Lahir" class="form-control">
						</div>
            <div class="col-md-6 form-group">
							<label for="jamlahir">Jam Lahir</label>
							<input id="jamlahir" type="time" name="jamlahir" placeholder="Jam Lahir" class="form-control">
						</div>
						<div class="col-md-6 form-group">
							<label for="tanggalpengajuan">Tanggal Pengajuan</label>
							<input id="tanggalpengajuan" type="date" name="tanggalpengajuan" class="form-control" placeholder="Tanggal Pengajuan">
						</div>
            <div class="col-md-6 form-group">
							<label for="ayah">Nama Ayah</label>
							<input id="ayah" type="text" name="ayah" placeholder="Ayah" class="form-control">
						</div>
            <div class="col-md-6 form-group">
							<label for="ibu">Nama Ibu</label>
							<input id="ibu" type="text" name="ibu" placeholder="Ibu" class="form-control">
						</div>
            <div class="col-md-6 form-group">
							<label for="kepaladesa">Nama Kepala Desa</label>
							<input id="kepaladesa" type="text" name="kepaladesa" placeholder="Kepala Desa" class="form-control">
						</div>
            <div class="col-md-6 form-group">
							<label for="nip">NIP Kepala Desa</label>
							<input id="nip" type="text" name="nip" placeholder="NIP" class="form-control">
						</div>
						<div align="center" class="col-md-12">
							<input type="submit" style="" name="submit" class="btn btn-primary" value="Simpan">
						</div>

					</form>
				</div>
			</div>
		</div>
	</section>
