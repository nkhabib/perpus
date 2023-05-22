


                        <div class="container-fluid page__container">
                          <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">  
                              <div class="card">
                                <?php if ($this->session->flashdata('msg')):?>
                                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                      <?php echo $this->session->flashdata('msg'); ?>

                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                <?php elseif ($this->session->flashdata('gagal')): ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                      <?php echo $this->session->flashdata('gagal'); ?>
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                <?php endif; ?>
                              
                                <form action="<?php echo base_url('menu/updateUser'); ?>" class="m-5" method="POST">
                                  <div class="form-group row">
                                    <label for="userMenu" class="col-sm-2 col-form-label">User</label>
                                    <div class="col-sm-10">
                                      <input type="hidden" name="roleId" value="<?php echo $user['role_id']; ?>">
                                      <input type="text" name="role" class="form-control" id="userMenu" value="<?php echo $user['role']; ?>" required oninvalid="this.setCustomValidity('User Tidak boleh kosong')" oninput="setCustomValidity('')" >
                                      <br>
                                      <button class="btn btn-primary btn-sm">Update</button>
                                      <a href="<?php echo base_url('User'); ?>" class="btn btn-danger btn-sm">Batal</a>
                                    </div>
                                  </div>
                                </form>
                            </div>
                            </div>
                            <div class="col-md-2"></div>
                          </div>
                        </div>

                    