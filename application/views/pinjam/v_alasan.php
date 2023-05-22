


                        <div class="container-fluid page__container">
                          <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">  
                              <div class="card">
                                <form action="<?php echo base_url('pinjam/pinjam_admin/alasan'); ?>" class="m-5" method="POST">
                                  <div class="form-group row">
                                    <label for="alasan" class="col-sm-2 col-form-label">Alasan</label>
                                    <div class="col-sm-10">
                                    	<font color="red"><?php echo form_error('alasan'); ?></font>
                                      <input type="hidden" name="id_pinjam" value="<?php echo $id_pinjam; ?>">
                                      <input type="text" name="alasan" class="form-control" id="alasan" value="<?php echo set_value('alasan'); ?>" required oninvalid="this.setCustomValidity('Alasan Harus Diisi')" oninput="setCustomValidity('')" >
                                      <br>
                                      <button class="btn btn-primary btn-sm">OK</button>
                                      <a href="<?php echo base_url('Pengajuan_Pinjam'); ?>" class="btn btn-danger btn-sm">Batal</a>
                                    </div>
                                  </div>
                                </form>
                            </div>
                            </div>
                            <div class="col-md-2"></div>
                          </div>
                        </div>

                    