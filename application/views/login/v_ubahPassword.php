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
  						<h3>Reset Password ?</h3>
  					</div>

  					<br>
			 		<form action="<?php echo base_url('login/login/ubahPassword'); ?>" method="POST" >
					  <div class="form-group">
					    <h6><label for="password1">Password</label></h6>
					    <small><font color="red"><?php echo form_error('password1'); ?></font></small>
					    <input type="password" name="password1" class="form-control" id="password1" placeholder="****" >
					  </div>

					  <div class="form-group">
					    <h6><label for="password2">Konfirmasi Password</label></h6>
					    <small><font color="red"><?php echo form_error('password2'); ?></font></small>
					    <input type="password" name="password2" class="form-control" id="password2" placeholder="****" >
					  </div>

					  <button type="submit" class="btn btn-primary btn-sm btn-block"><h6>Ubah Password</h6></button>
					</form>
					
					<small><a href="<?php echo base_url('login/login/login'); ?>">Kembali ke Login</a></small>
				</div>
			</div>
		</div>
 	</div>
 	<div class="col col-lg-3.5"></div>
 </div>