


                        <div class="container-fluid page__container">
                          <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">  
                              <div class="card">
                              
                                <form action="<?php echo base_url('menu/updateRole'); ?>" class="m-5" method="POST">
                                  <div class="form-group row">
                                    <label for="userMenu" class="col-sm-2 col-form-label">User Menu</label>
                                    <div class="col-sm-10">
                                      <input type="hidden" name="idMenu" value="<?php echo $edit['menu_id']; ?>">
                                      <input type="text" name="menu" class="form-control" id="userMenu" value="<?php echo $edit['menu']; ?>">
                                      <br>
                                      <button class="btn btn-primary btn-sm">Update</button>
                                      <a href="<?php echo base_url('Role'); ?>" class="btn btn-danger btn-sm">Batal</a>
                                    </div>
                                  </div>
                                </form>
                            </div>
                            </div>
                            <div class="col-md-2"></div>
                          </div>
                        </div>

                    