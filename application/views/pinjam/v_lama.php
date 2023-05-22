
                
                        <div class="container-fluid page__container">
                            
                            <div class="row">
                                <div class="col-md">
                                <div class="card">
                                <?php if ($lama_pinjam->num_rows() == 0):?>
                                    <div class="alert alert-warning" role="alert">
                                      <p><strong>Maksimal lama peminjaman buku belum ditetapkan !!</strong></p>
                                      <br>
                                      <a href="<?php echo base_url('Maksimal'); ?>" class="btn btn-primary">Tetapkan Lama Hari</a>
                                    </div>
                                <?php else: $lama = $lama_pinjam->row_array(); ?>
                                    <div class="alert alert-info" role="alert">
                                      <p><strong>Maksimal lama peminjaman : <?php echo $lama['lama_pinjam']; ?> Hari</strong></p>
                                      <br>
                                      <a href="<?php echo base_url('Maksimal'); ?>" class="btn btn-primary">Ubah Lama Hari</a>
                                    </div>
                            <?php endif; ?>
                                <div class="m-4 mt-0"> 
                                </div>
                                </div>
                                    
                                </div>
                            </div>


                        </div>