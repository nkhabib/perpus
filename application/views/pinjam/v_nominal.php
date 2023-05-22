


                        <div class="container-fluid page__container">
                          <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">  
                              <div class="card">
                                <form action="<?php echo base_url('Nominal'); ?>" class="m-5" method="POST">
                                  <div class="form-group row">
                                    <label for="denda" class="col-sm-2 col-form-label">Jumlah Denda</label>
                                    <div class="col-sm-10">
                                    	<font color="red"><?php echo form_error('denda'); ?></font>
                                      <select class="form-control" name="denda" id="denda">
                                        <?php if ($denda):?>
                                          <option value="<?php echo $denda['denda'] ?>">Rp.<?php echo $denda['denda']; ?></option>
                                        <?php else: ?>
                                          <option value="">---</option>
                                        <?php endif; ?>
                                        <?php for ($i=500; $i <=10000 ; $i++): ?>
                                          <?php if ($i%500 == 0): ?>
                                            <option value="<?php echo $i; ?>">Rp <?php echo $i; ?></option>
                                          <?php endif; ?>
                                        <?php endfor; ?>
                                      </select>
                                      <br>
                                      <button class="btn btn-primary btn-sm">
                                        <?php if ($denda):?>
                                          Update
                                        <?php else: ?>
                                          Tambah
                                        <?php endif; ?>
                                      </button>
                                      <a href="<?php echo base_url('Home'); ?>" class="btn btn-danger btn-sm">Batal</a>
                                    </div>
                                  </div>
                                </form>
                            </div>
                            </div>
                            <div class="col-md-2"></div>
                          </div>
                        </div>

                    