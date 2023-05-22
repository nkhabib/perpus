


                        <div class="container-fluid page__container">
                          <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('msg'); ?>"></div>
                          <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">  
                              <div class="card" style="background-color: #F0FFF0;">
                                <?php if ($this->session->flashdata('gagal')):?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                      <strong><?php echo $this->session->flashdata('gagal'); ?></strong>
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                <?php endif; ?>
                                <form action="<?php echo base_url('Kembali'); ?>" class="m-5" method="POST">
                                  <div class="form-group row">
                                    <label for="kode_pinjam" class="col-sm-3 col-form-label">Kode Pinjam</label>
                                    <div class="col-sm-9">
                                        <font color="red"><?php echo form_error('kode_pinjam'); ?></font>
                                        <input class="form-control" type="text" name="kode_pinjam" id="kode_pinjam" placeholder="EX: BK12-111020-1">
                                        <br>
                                        <button class="btn btn-primary">Cek Buku</button>
                                        <a href="<?php echo base_url('Home'); ?>" class="btn btn-danger">Batal</a>
                                    </div>
                                  </div>
                                </form>
                            </div>
                            </div>
                            <div class="col-md-2"></div>
                          </div>
                        </div>

                    