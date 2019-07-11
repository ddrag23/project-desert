<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content light-blue lighten-1 white-text">
        <span class="card-title"><?php echo $pageTitle; ?></span>
      </div>
      <div class="card-content">
        <form class="row" id="add-user-form" method="post" action="">
          <?php if(validation_errors()): ?>
  					<div class="alert alert-danger" role="alert"><?php echo validation_errors('<p>', '</p>'); ?></div>
  					<?php endif; ?>
  					<?php if($message = $this->session->flashdata('message')): ?>
  						<div class="alert alert-success" role="alert"><?php echo $message['message']; ?></div>
  			        <?php endif; ?>
          <div class="form-group">
              <input id="username" name="username" type="text" value="<?php echo set_value('username'); ?>">
              <label for="username" class="">Username</label>
          </div>
          <div class="form-group">
              <input id="password" name="password" type="password" value="<?php echo set_value('password'); ?>">
              <label for="password" class="">Password</label>
          </div>
          <div class="form-group">
              <select id="level" name="level">
                  <option value="administrator">Administrator</option>
                  <option value="penjual">Penjual</option>
              </select>
              <label>Pilih Level</label>
          </div>
          <div class="form-group">
              <select id="active" name="active">
                  <option value="0">Tidak</option>
                  <option value="1">Ya</option>
              </select>
              <label>Active</label>
          </div>
          <div class="form-group ">
              <button type="submit" name="submit" value="add_user" class="btn amber waves-effect waves-green">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
