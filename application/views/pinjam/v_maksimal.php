


                        <div class="container-fluid page__container">
                          <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">  
                              <div class="card">
                                <form action="<?php echo base_url('Maksimal'); ?>" class="m-5" method="POST">
                                  <div class="form-group row">
                                    <label for="maksimal" class="col-sm-5 col-form-label">Maksimal Lama Peminjaman</label>
                                    <div class="col-sm-7">
                                    	<font color="red"><?php echo form_error('maksimal'); ?></font>
                                      <?php if ($maksimal):?>
                                        <input class="form-control" type="number" name="maksimal" id="maksimal" value="<?php echo $maksimal['lama_pinjam']; ?>">
                                      <?php else: ?>
                                        <input class="form-control" type="number" name="maksimal" id="maksimal" placeholder="EX : 7">
                                        <br>
                                      <?php endif; ?>
                                      <button class="btn btn-primary">
                                        <?php if ($maksimal):?>
                                          Update
                                        <?php else: ?>
                                          Buat
                                        <?php endif; ?>
                                      </button>
                                      <a href="<?php echo base_url('Home'); ?>" class="btn btn-danger">Batal</a>
                                    </div>
                                  </div>
                                </form>
                            </div>
                            </div>
                            <div class="col-md-2"></div>
                          </div>
                        </div>

                    