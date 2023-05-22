<br>
<br>
 <div class="row align-items-center">
 	<div class="col col-lg-3.5"></div>
 	<div class="col col-lg-5">
 		<div class="card border-dark mb-3" >
 			<div class="card-body text-dark">
 				<?php $msg = $this->session->flashdata('msg');
 				$gagal = $this->session->flashdata('gagal'); 
 				if ($msg):?>
 				<div class="alert alert-primary" role="alert">
				  <?php echo $this->session->flashdata('msg'); ?>
				</div>
				<?php elseif ($gagal): ?>
					<div class="alert alert-danger" role="alert">
					  <?php echo $this->session->flashdata('gagal'); ?>
					</div>
				<?php endif;?>
 				<div class="text-center">
  					<div class="card-header">
  						<img class="rounded-circle" height="30" width="30" src="<?php echo base_url().'assets/images/apple-touch-icon.png' ?>">
  						<h3>Login</h3>
  						<small>Login Untuk Mengakses Perpustakaan</small>
  					</div>

			 		<form action="<?php echo base_url('login/login/cek'); ?>" method="POST" >
					  <div class="form-group">
					    <h6><label for="email">Email</label></h6>
					    <small><font color="red"><?php echo form_error('email'); ?></font></small>
					    <input type="email" name="email" class="form-control" id="email" placeholder="ex: yourname@mail.com" value="<?php echo set_value('email'); ?>" >
					  </div>
					  <div class="form-group">
					    <h6><label for="password">Password</label></h6>
					    <small><font color="red"><?php echo form_error('password'); ?></font></small>
					    <input type="password" name="password" class="form-control" id="password" placeholder="****">
					  </div>

					  <div class="form-group">
					  	<small><font color="red"><?php echo form_error('g-recaptcha-response'); ?></font></small>
						  <?php echo $script; ?>
						  <?php echo $widget; ?>
					  </div>

					  <!-- <div class="form-group form-check">
					    <input type="checkbox" class="form-check-input" id="ingat">
					    <label class="form-check-label" for="ingat" style="margin-right: 300px;" >Ingat Saya</label>
					  </div> -->

					  <!-- <div class="g-recaptcha" data-sitekey="6LfdcW4eAAAAADZHcS22wIW18uU9hDHTMK4QRRZT"></div> -->
					  <button type="submit" class="btn btn-primary btn-sm btn-block"><h6>Login</h6></button>
					</form>
					
					<small> <a href="<?php echo base_url('login/login/forget'); ?>"> Lupa Password ? </a></small><br>
					<small>Belum Jadi Member ? <a href="<?php echo base_url('login/login/daftar'); ?>">Daftar Jadi Member</a></small>
				</div>
			</div>
		</div>
 	</div>
 	<div class="col col-lg-3.5"></div>
 </div>