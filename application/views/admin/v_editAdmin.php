
                
                        <div class="container-fluid page__container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                    
                                        <form class="m-4" action="<?php echo base_url('admin/admin/updateAdmin'); ?>" method="POST">
                                          <input type="hidden" name="id" value="<?php echo $admin['id']; ?>">
                                          <div class="form-row">
                                            <div class="form-group col-md-6">
                                              <label for="id">Nomor ID</label>
                                              <small><font color="red"><?php echo form_error('id_number'); ?></font></small>
                                              <input type="number" name="id_number" class="form-control" id="id" value="<?php echo $admin['id_number'];?>" >
                                            </div>
                                            <div class="form-group col-md-6">
                                              <label for="nama">Nama</label>
                                              <small><font color="red"><?php echo form_error('nama'); ?></font></small>
                                              <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $admin['nama']; ?>">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <small><font color="red"><?php echo form_error('alamat'); ?></font></small>
                                            <input type="text" name="alamat" class="form-control" id="alamat" value="<?php echo $admin['alamat']; ?>">
                                          </div>

                                          <div class="form-group">
                                            <label for="alamat">Email</label>
                                            <small><font color="red"><?php echo form_error('email'); ?></font></small>
                                            <input type="email" name="email" class="form-control" id="email" value="<?php echo $admin['email']; ?>">
                                          </div>

                                          <div class="form-row">
                                            <div class="form-group col-md-6">
                                              <label for="password1">Password</label>
                                              <small><font color="red">Note : Kosongkan Jika Tidak Diubah</font></small>
                                              <small><font color="red"><?php echo form_error('password1'); ?></font></small>
                                              <input type="password" name="password1" class="form-control" id="password1" placeholder="******">
                                            </div>
                                            <div class="form-group col-md-6">
                                              <label for="password2">Konfirmasi Password</label>
                                              <small><font color="red">Note : Kosongkan Jika Tidak Diubah</font></small>
                                              <small><font color="red"><?php echo form_error('password2'); ?></font></small>
                                              <input type="password" name="password2" class="form-control" id="password2" placeholder="******">
                                            </div>
                                          </div>
                                          
                                          <input type="hidden" name="tipe" value="<?php echo $tipe; ?>">
                                          <button type="submit" name="tambah" class="btn btn-primary">Update <?php echo $tipe; ?></button>
                                          <a href="<?php echo base_url($tipe); ?>" class="btn btn-danger" >Batal</a>
                                        </form>

                                    </div>
                                    
                                </div>
                            </div>


                        </div>

                    