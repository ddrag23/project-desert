<section class="content container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
      <form class="" action="" method="post">
        <!-- pemberitahuan -->
        <?php if(validation_errors()): ?>
          <div class="col s12">
            <div class="card-panel red">
              <span class="white-text"><?php echo validation_errors('<p>', '</p>'); ?></span>
            </div>
          </div>
        <?php endif; ?>
        <?php if($message = $this->session->flashdata('message')): ?>
          <div class="col s12">
            <div class="card-panel <?php echo ($message['status']) ? 'green' : 'red'; ?>">
              <span class="white-text"><?php echo $message['message']; ?></span>
            </div>
          </div>
        <?php endif; ?>
        <!-- pemeberitahuan end -->
        <!-- form isi  -->
        <?php echo form_hidden('id', $user->id); ?>
            <div class="for-group">
              <label for="username">username</label>
              <input id="username" class="form-control" type="text" name="username" value="<?php echo $user->username; ?>">
            </div>
            <div class="for-group">
              <label for="password">Password</label>
              <input id="password" class="form-control" type="password" name="password">
            </div>
            <div class="for-group">
              <label for="namalengkap">Nama Lengkap</label>
              <input id="namalengkap" class="form-control" type="text" name="namalengkap" value="<?php echo $user->nama_lengkap; ?>">
            </div>
            <div class="for-group">
              <label for="email">Email</label>
              <input id="email" class="form-control" type="email" name="email" value="<?php echo $user->email; ?>">
            </div>
            <div class="for-group">
              <label for="alamat">Alamat</label>
              <input id="alamat" class="form-control" type="text" name="alamat" value="<?php echo $user->alamat; ?>">
            </div>
            <div class="for-group">
              <label for="notelp">No Telepon</label>
              <input id="notelp" class="form-control" type="text" name="notelp" value="<?php echo $user->notelp; ?>">
            </div>
            <div class="for-group">
              <label for="jeniskelamin">Jenis Kelamin</label>
              <select id="jeniskelamin" name="jeniskelamin" class="form-control">
                <option value="L"<?php if($user->jenis_kelamin == "L") echo "selected"; ?>>Laki-Laki</option>
                <option value="P" <?php if($user->jenis_kelamin == "P") echo "selected"; ?> >perempuan</option>
              </select>
            </div>
            <div class="for-group">
              <label for="level">Level</label>
              <select id="level" name="level" class="form-control">
                <option <?php echo ($user->level === 'administrator') ? 'selected' : ''; ?> value="administrator">Administrator</option>
                <option <?php echo ($user->level === 'penjual') ? 'selected' : ''; ?> value="penjual">Penjual</option>
              </select>
            </div>
            <div class="for-group">
              <label for="active">Status Aktif</label>
              <select id="active" name="active" class="form-control">
                <option <?php echo ($user->active === '0') ? 'selected' : ''; ?> value="0">Tidak Aktif</option>
                <option <?php echo ($user->active === '1') ? 'selected' : ''; ?> value="1">Aktif</option>
              </select>
            </div>
            <input type="submit" name="update" value="Simpan" class="btn btn-primary">
        <!-- end form isi  -->
      </form>
    </div>
    </div>
</section>
