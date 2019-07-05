<section class="content container-fluid">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Edit Data Kelahiran</h3>
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
							<?php echo form_hidden('id', $kelahiran->id);?>
							<label for="nosurat">No Surat Kelahiran</label>
							<input id="nosurat" type="text" name="nosurat" value="<?php echo $kelahiran->nosurat; ?>" class="form-control" placeholder="No Surat" autocomplete="off">
						</div>
						<div class="col-md-6 form-group">
							<label for="nik">NIK Ayah</label>
							<input id="nik" type="text" name="nik" value="<?php echo $kelahiran->nik; ?>" class="form-control" placeholder="NIK">
						</div>
            <div class="col-md-6 form-group">
							<label for="namabayi">Nama Bayi</label>
							<input id="namabayi" type="text" value="<?php echo $kelahiran->nama_bayi; ?>" name="namabayi" class="form-control" placeholder="Nama Bayi">
						</div>
            <div class="col-md-6 form-group">
							<label for="jeniskelamin">Pilih Kelurahan</label>
							<select name="jeniskelamin" id="jeniskelamin" class="form-control">
                <option value="L" <?php if($kelahiran->jenis_kelamin == "L") echo "selected"; ?>>Laki-laki</option>
								<option value="P" <?php if($kelahiran->jenis_kelamin == "P") echo "selected"; ?>>Perempuan</option>
							</select>
						</div>
						<div class="col-md-6 form-group">
							<label for="harilahir">Hari Lahir</label>
							<input id="harilahir" type="text" name="harilahir" placeholder="Hari Lahir" value="<?php echo $kelahiran->hari_lahir; ?>" class="form-control">
						</div>
            <div class="col-md-6 form-group">
							<label for="tempatlahir">Tempat Lahir</label>
							<input id="tempatlahir" type="text" name="tempatlahir" placeholder="Tempat Lahir" value="<?php echo $kelahiran->tempat_lahir; ?>" class="form-control">
						</div>
            <div class="col-md-6 form-group">
							<label for="tanggallahir">Tanggal Lahir</label>
							<input id="tanggallahir" type="text" name="tanggallahir" placeholder="Tanggal Lahir" value="<?php echo $kelahiran->tanggal_lahir; ?>" class="form-control">
						</div>
            <div class="col-md-6 form-group">
							<label for="jamlahir">Jam Lahir</label>
							<input id="jamlahir" type="time" name="jamlahir" placeholder="Jam Lahir" value="<?php echo $kelahiran->jam_lahir; ?>" class="form-control">
						</div>
						<div class="col-md-6 form-group">
							<label for="tanggalpengajuan">Tanggal Pengajuan</label>
							<input id="tanggalpengajuan" type="text" name="tanggalpengajuan" class="form-control" value="<?php echo $kelahiran->tanggal_pengajuan; ?>" placeholder="Tanggal Pengajuan">
						</div>
            <div class="col-md-6 form-group">
							<label for="ayah">Nama Ayah</label>
							<input id="ayah" type="text" name="ayah" placeholder="Ayah" value="<?php echo $kelahiran->ayah; ?>" class="form-control">
						</div>
            <div class="col-md-6 form-group">
							<label for="ibu">Nama Ibu</label>
							<input id="ibu" type="text" name="ibu" placeholder="Ibu" value="<?php echo $kelahiran->ibu; ?>" class="form-control">
						</div>
            <div class="col-md-6 form-group">
							<label for="kepaladesa">Nama Kepala Desa</label>
							<input id="kepaladesa" type="text" name="kepaladesa" value="<?php echo $kelahiran->kepala_desa; ?>" placeholder="Kepala Desa" class="form-control">
						</div>
            <div class="col-md-6 form-group">
							<label for="nip">NIP Kepala Desa</label>
							<input id="nip" type="text" name="nip" placeholder="NIP" value="<?php echo $kelahiran->nip; ?>" class="form-control">
						</div>
						<div align="center" class="col-md-12">
							<input type="submit" style="" name="update" class="btn btn-primary" value="Simpan">
						</div>

					</form>
				</div>
			</div>
		</div>
	</section>
