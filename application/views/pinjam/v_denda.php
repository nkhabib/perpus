
                
                        <div class="container-fluid page__container">
                            
                            <div class="row">
                                <div class="col-md">
                                <div class="card">
                                <?php if (!$denda):?>
                                    <div class="alert alert-warning" role="alert">
                                      <p><strong>Denda keterlambatan pengembalian belum ditetapkan</strong></p>
                                      <br>
                                      <a href="<?php echo base_url('Nominal'); ?>" class="btn btn-primary">Tetapkan Denda</a>
                                    </div>
                                <?php else: ?>
                                    <div class="alert alert-info" role="alert">
                                      <p><strong>Denda keterlambatan : Rp.<?php echo $denda['denda']; ?> Per Hari</strong></p>
                                      <br>
                                      <a href="<?php echo base_url('Nominal'); ?>" class="btn btn-primary">Ubah Denda</a>
                                    </div>
                            <?php endif; ?>
                                <div class="m-4 mt-0"> 
                                </div>
                                </div>
                                    
                                </div>
                            </div>


                        </div>