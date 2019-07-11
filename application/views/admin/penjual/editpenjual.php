<section class="content container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
      <form class="" action="" method="post">
        <!-- pemberitahuan -->
				<?php if(validation_errors()): ?>
					<div class="alert alert-danger" role="alert"><?php echo validation_errors('<p>', '</p>'); ?></div>
					<?php endif; ?>
					<?php if($message = $this->session->flashdata('message')): ?>
						<div class="alert alert-success" role="alert"><?php echo $message['message']; ?></div>
							<?php endif; ?>
        <!-- pemeberitahuan end -->
        <!-- form isi  -->
        <?php echo form_hidden('id', $penjual->id); ?>
            <div class="for-group">
              <label for="username">username</label>
              <input id="username" class="form-control" type="text" name="username" value="<?php echo $penjual->username; ?>">
            </div>
            <div class="for-group">
              <label for="namalengkap">Nama Lengkap</label>
              <input id="namalengkap" class="form-control" type="text" name="namalengkap" value="<?php echo $penjual->nama_lengkap; ?>">
            </div>
            <div class="for-group">
              <label for="email">Email</label>
              <input id="email" class="form-control" type="email" name="email" value="<?php echo $penjual->email; ?>">
            </div>
            <div class="for-group">
              <label for="alamat">Alamat</label>
              <input id="alamat" class="form-control" type="text" name="alamat" value="<?php echo $penjual->alamat; ?>">
            </div>
            <div class="for-group">
              <label for="notelp">No Telepon</label>
              <input id="notelp" class="form-control" type="text" name="notelp" value="<?php echo $penjual->notelp; ?>">
            </div>
            <div class="for-group">
              <label for="jeniskelamin">Jenis Kelamin</label>
              <select id="jeniskelamin" name="jeniskelamin" class="form-control">
                <option value="L"<?php if($penjual->jenis_kelamin == "L") echo "selected"; ?>>Laki-Laki</option>
                <option value="P" <?php if($penjual->jenis_kelamin == "P") echo "selected"; ?> >perempuan</option>
              </select>
            </div>
            <input type="submit" name="update" value="Simpan" class="btn btn-primary">
        <!-- end form isi  -->
      </form>
    </div>
    </div>
</section>
