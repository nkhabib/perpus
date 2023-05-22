<br>
<br>
 <div class="row align-items-center">
 	<div class="col col-lg-2"></div>
 	<div class="col col-lg-8">
 		<div class="card border-dark mb-3" >
 			<div class="card-body text-dark">
 				<div class="text-center">
  					<div class="card-header">
  						<img class="rounded-circle" height="30" width="30" src="<?php echo base_url().'assets/images/apple-touch-icon.png' ?>">
  						<h3>Daftar Member</h3>
  						<small>Login Untuk Mengakses Perpustakaan</small>
  					</div>
  				</div>

  				<form action="<?php echo base_url('login/login/proses'); ?>" method="POST" >

  					<div class="form-row">
  						
	  					<div class="form-group col-md-6">
						    <label for="id_member">NO_ID</label>
						    <small><font color="red"><?php echo form_error('id_member'); ?></font></small>
						    <input type="number" class="form-control" id="id_member" placeholder="1234" name="id_member" value="<?php echo set_value('id_member'); ?>" >
					  	</div>

					  	<div class="form-group col-md-6">
					  		<label for="email">Email</label>
					  		<small><font color="red"><?php echo form_error('email'); ?></font></small>
						    <input type="email" class="form-control" id="email" placeholder="ex: yourname@mail.com" name="email" value="<?php echo set_value('email'); ?>" >
						</div>

  					</div>

  					<div class="form-row">
  						
						<div class="form-group col-md-6">
						    <label for="nama">Nama</label>
						    <small><font color="red"><?php echo form_error('nama'); ?></font></small>
						    <input type="text" class="form-control" id="nama" placeholder="yourname" name="nama" value="<?php echo set_value('nama'); ?>" >
						</div>

						<div class="form-group col-md-6">
						    <label for="provesi">Provesi</label>
						    <small><font color="red"><?php echo form_error('provesi'); ?></font></small>
						    <select class="form-control" name="provesi" id="provesi">
						    	<?php if (isset($_POST['daftar'])):?>
						    		<option value="<?php echo set_value('provesi'); ?>"><?php echo set_value('provesi'); ?></option>
						    	<?php endif ?>
						    	<option value="">---</option>
						    	<option>Pelajar / Mahasiswa</option>
						    	<option>Guru / Dosen</option>
						    	<option>Pengusaha</option>
						    	<option value="lain">Lainya</option>
						    </select>
						</div>
						
  					</div>

  					<div class="form-row">
						<div class="form-group col-md-10">
							<label for="alamat">Alamat</label>
							<small><font color="red"><?php echo form_error('alamat'); ?></font></small>
							<textarea class="form-control" name="alamat" id="summernote" >
								<?php 
								if (isset($_POST['daftar'])) 
								{
									echo set_value('alamat');
								} 
								?>
								
							</textarea>
						</div>

						<div class="form-group col-md-2">
							<label for="kodepos">Kode Pos</label>
							<small><font color="red"><?php echo form_error('kodepos'); ?></font></small>
							<input class="form-control" type="number" name="kodepos" id="kodepos" value="<?php echo set_value('kodepos'); ?>">
						</div>
  					</div>

					<div class="form-row">
						<div class="form-group col-md-6">
					      <label for="password">Password</label>
					      <small> <font color="red"><?php echo form_error('password'); ?></font></small>
					      <input type="password" class="form-control" id="password" name="password" placeholder="****" >
					    </div>
					    <div class="form-group col-md-6">
					      <label for="password2">Confirm Password</label>
					      <small><font color="red"><?php echo form_error('password2'); ?></font></small>
					      <input type="password" class="form-control" id="password2" name="password2" placeholder="****">
					    </div>
					</div>

					  
					<div class="form-group">
					  	<small><font color="red"><?php echo form_error('g-recaptcha-response'); ?></font></small>
						  <?php echo $script; ?>
						  <?php echo $widget; ?>
					</div>

				  	<button type="submit" class="btn btn-primary btn-block " name="daftar" >Daftar</button>
				</form>
					
					<small>Sudah Jadi Member ? <a href="<?php echo base_url('Pengguna'); ?>">Login</a></small>
			</div>
		</div>
 	</div>
 	<div class="col col-lg-2"></div>
 </div>