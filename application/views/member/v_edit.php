
                
                        <div class="container-fluid page__container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                    
                                        <form class="m-4" action="<?php echo base_url('UpdateMember'); ?>" method="POST">
                                          <div class="form-row">
                                            <div class="form-group col-md-6">
                                              <label for="id">Nomor ID</label>
                                              <small><font color="red"><?php echo form_error('id_number'); ?></font></small>
                                              <input type="hidden" name="id_member" value="<?php echo $member['id']; ?>">
                                              <input type="number" name="id_number" class="form-control" id="id" required oninvalid="this.setCustomValidity('Masukan ID Number')" oninput="setCustomValidity('')"  value="<?php echo $member['id_number']; ?>" >
                                            </div>
                                            <div class="form-group col-md-6">
                                              <label for="nama">Nama</label>
                                              <small><font color="red"><?php echo form_error('nama'); ?></font></small>
                                              <input type="text" name="nama" class="form-control" id="nama" required oninvalid="this.setCustomValidity('Masukan Nama Anda')" oninput="setCustomValidity('')"  value="<?php echo $member['nama'];?>">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <small><font color="red"><?php echo form_error('alamat'); ?></font></small>
                                            <input type="text" name="alamat" class="form-control" id="alamat" required oninvalid="this.setCustomValidity('Masukan Alamat Anda')" oninput="setCustomValidity('')"  value="<?php echo $member['alamat'];?>">
                                          </div>

                                          <div class="form-row">
                                            <div class="form-group col-md-6">
                                              <label for="provesi">Provesi</label>
                                              <small><font color="red"><?php echo form_error('provesi'); ?></font></small>
                                              <input type="text" name="provesi" class="form-control" id="provesi" required oninvalid="this.setCustomValidity('Masukan Provesi Anda')" oninput="setCustomValidity('')"  value="<?php echo $member['provesi']; ?>" >
                                            </div>
                                            <div class="form-group col-md-6">
                                              <label for="kodepos">Kode Pos</label>
                                              <small><font color="red"><?php echo form_error('kodepos'); ?></font></small>
                                              <input type="number" name="kodepos" class="form-control" id="kodepos" required oninvalid="this.setCustomValidity('Masukan Kode Pos Anda')" oninput="setCustomValidity('')" value="<?php echo $member['kodepos']; ?>">
                                            </div>
                                          </div>

                                          <div class="form-row">
	                                          <div class="form-group col-md-6">
	                                            <label for="email">Email</label>
	                                            <small><font color="red"><?php echo form_error('email'); ?></font></small>
	                                            <input type="email" name="email" class="form-control" id="email" required oninvalid="this.setCustomValidity('Masukan Email Anda')" oninput="setCustomValidity('')"  value="<?php echo $member['email']; ?>">
	                                          </div>

	                                          <div class="form-group col-md-6">
	                                            <label for="telepon">No Telepon</label>
	                                            <small><font color="red"><?php echo form_error('telepon'); ?></font></small>
	                                            <input type="number" name="telepon" class="form-control" id="telepon" required oninvalid="this.setCustomValidity('Masukan Nomor Telepon Anda')" oninput="setCustomValidity('')"  value="<?php echo $member['no_telepon']; ?>">
	                                          </div>
                                          </div>

                                          <?php if ($this->session->userdata('role_id') == 1):?>
                                          <div class="form-row">
                                            <div class="form-group col-md-6">
                                              <label for="password1">Password</label>
                                              <small><font color="red">* Kosongkan Jika Tidak Diubah *</font></small>
                                              <small><font color="red"><?php echo form_error('password1'); ?></font></small>
                                              <input type="password" name="password1" class="form-control" id="password1" placeholder="******">
                                            </div>
                                            <div class="form-group col-md-6">
                                              <label for="password2">Konfirmasi Password</label>
                                              <small><font color="red">* Kosongkan Jika Tidak Diubah *</font></small>
                                              <small><font color="red"><?php echo form_error('password2'); ?></font></small>
                                              <input type="password" name="password2" class="form-control" id="password2" placeholder="******">
                                            </div>
                                          </div>
                                      	<?php endif; ?>

                                          <button type="submit" name="tambah" class="btn btn-primary">Update Member</button>
                                          <a href="<?php echo base_url('Home'); ?>" class="btn btn-danger" >Batal</a>
                                        </form>

                                    </div>
                                    
                                </div>
                            </div>


                        </div>

                    