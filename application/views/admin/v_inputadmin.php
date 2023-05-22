
                
                        <div class="container-fluid page__container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                    
                                        <form class="m-4" action="<?php echo base_url('Tambah'); ?>" method="POST">
                                          <div class="form-row">
                                            <div class="form-group col-md-6">
                                              <label for="id">Nomor ID</label>
                                              <small><font color="red"><?php echo form_error('id_number'); ?></font></small>
                                              <input type="number" name="id_number" class="form-control" id="id" placeholder="1-0" value="<?php echo set_value('id_number'); ?>" >
                                            </div>
                                            <div class="form-group col-md-6">
                                              <label for="nama">Nama</label>
                                              <small><font color="red"><?php echo form_error('nama'); ?></font></small>
                                              <input type="text" name="nama" class="form-control" id="nama" placeholder="yourname" value="<?php echo set_value('nama'); ?>">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <small><font color="red"><?php echo form_error('alamat'); ?></font></small>
                                            <input type="text" name="alamat" class="form-control" id="alamat" placeholder="RT / RW / jln" value="<?php echo set_value('alamat'); ?>">
                                          </div>

                                          <div class="form-group">
                                            <label for="alamat">Email</label>
                                            <small><font color="red"><?php echo form_error('email'); ?></font></small>
                                            <input type="email" name="email" class="form-control" id="email" placeholder="yourname@mail.com" value="<?php echo set_value('email'); ?>">
                                          </div>

                                          <div class="form-row">
                                            <div class="form-group col-md-6">
                                              <label for="password1">Password</label>
                                              <small><font color="red"><?php echo form_error('password1'); ?></font></small>
                                              <input type="password" name="password1" class="form-control" id="password1" placeholder="******">
                                            </div>
                                            <div class="form-group col-md-6">
                                              <label for="password2">Konfirmasi Password</label>
                                              <small><font color="red"><?php echo form_error('password2'); ?></font></small>
                                              <input type="password" name="password2" class="form-control" id="password2" placeholder="******">
                                            </div>
                                          </div>

                                          <div class="form-row">
                                            <div class="form-group col-md-6">
                                              <label for="role">Role</label>
                                              <small><font color="red"><?php echo form_error('role'); ?></font></small>
                                              <select name="role" id="role" class="form-control" required>
                                                <?php if (isset($_POST['tambah'])):?>
                                                    <?php $value = set_value('role');
                                                    $namaRole = $this->db->get_where('role_user',['role_id' => $value])->row_array(); ?>
                                                    <option value="<?php echo $value; ?>"><?php echo $namaRole['role']; ?></option>
                                                <?php else: ?>
                                                  <option value="">------</option>
                                                <?php endif; ?>
                                                  <?php foreach ($role as $r):?>
                                                    <?php if ($r['role'] == 'Admin' or $r['role'] == 'Petugas'):?>
                                                    <option value="<?php echo $r['role_id']; ?>"><?php echo $r['role']; ?></option>
                                                  <?php endif; ?>
                                                  <?php endforeach; ?>
                                              </select>
                                            </div>
                                          </div>

                                          
                                          <button type="submit" name="tambah" class="btn btn-primary">Tambah Admin</button>
                                          <a href="<?php echo base_url('Home'); ?>" class="btn btn-danger" >Batal</a>
                                        </form>

                                    </div>
                                    
                                </div>
                            </div>


                        </div>

                    