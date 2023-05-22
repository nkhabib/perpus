


                        <div class="container-fluid page__container">
                          <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">  
                              <div class="card">
                              
                                <form action="<?php echo base_url('menu/update_submenu'); ?>" class="m-5" method="POST">
                                  <div class="form-group row">
                                    <label for="userMenu" class="col-sm-2 col-form-label">Sub Menu</label>
                                    <div class="col-sm-10">
                                      <input type="hidden" name="idSM" value="<?php echo $sm['id_sub_submenu']; ?>">
                                      <input type="text" name="judul_SM" class="form-control" id="userMenu" value="<?php echo $sm['judul_submenu']; ?>">
                                    </div>

                                    <label for="url" class="col-sm-2 col-form-label">URL</label>
                                    <div class="col-sm-10">
                                      <input type="text" name="url" class="form-control" id="url" value="<?php echo $sm['url_submenu']; ?>">
                                    </div>

                                  </div>
                                  <button class="btn btn-primary btn-sm">Update</button>
                                  <a href="<?php echo base_url('menu/detail/'.$sm['id_sub_submenu']); ?>" class="btn btn-danger btn-sm">Batal</a>
                                </form>
                            </div>
                            </div>
                            <div class="col-md-2"></div>
                          </div>
                        </div>

                    