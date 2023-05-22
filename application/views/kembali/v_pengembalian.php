
                
                        <div class="container-fluid page__container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card" style="background-color: #F0FFF0;">
                                      <table class="m-4">
                                        <tr>
                                          <td width="150"><strong>Kode Pinjam</strong></td>
                                          <td width="200"><strong>: <?php echo $pinjam['kode_pinjam']; ?></strong></td>
                                        </tr>
                                        <tr>
                                          <td><img class="img-thumbnail" src="<?php echo base_url('assets/images/buku/').$pinjam['foto'];?>"></td>
                                        </tr>

                                        <tr>
                                          <td>Judul</strong></td>
                                          <td width="400">: <?php echo $pinjam['judul']; ?></td>

                                          <td width="200">Author</td>
                                          <td>: <?php echo $pinjam['author']; ?></td>
                                        </tr>

                                        <tr>
                                          <td width="70">Penerbit</td>
                                          <td>: <?php echo $pinjam['penerbit']; ?></td>

                                          <td>Tahun Terbit</td>
                                          <td>: <?php echo $pinjam['tahun_terbit']; ?></td>
                                        </tr>

                                        <tr>
                                          <td width="70">Tanggal Terbit</td>
                                          <td>: <?php echo tgl_indo($pinjam['tanggal_terbit']); ?></td>

                                          <td>ISBN</td>
                                          <td>: <?php echo $pinjam['isbn']; ?></td>
                                        </tr>

                                        <tr>
                                          <td height="30"></td>
                                        </tr>

                                        <tr>
                                          <td>Tanggal Peminjaman</td>
                                          <td>: <?php echo tgl_indo($pinjam['tanggal_pinjam']); ?></td>

                                          <td>Maksimal Pengembalian</td>
                                          <td>: <?php echo tgl_indo($pinjam['max_tgl_kembali']); ?></td>
                                        </tr>

                                        <tr>
                                          <td>Jumlah Buku</td>
                                          <td>: <?php echo $pinjam['jumlah_pinjam']; ?></td>

                                          <td>Peminjam</td>
                                          <td>: <?php echo $pinjam['nama']; ?></td>
                                        </tr>
                                        <!-- <td><strong>Judul Buku : <?php echo $pinjam['judul']; ?></strong></td> -->
                                      </table>

                                        <form class="m-4" enctype="multipart/form-data" action="<?php echo base_url('Kembalikan'); ?>" method="POST">

                                          <input type="hidden" name="kode_pinjam" value="<?php echo $pinjam['kode_pinjam']; ?>">
                                          <input type="hidden" name="tgl_pinjam" id="tgl_pinjam" value="<?php echo $pinjam['tanggal_pinjam']; ?>">

                                          <!-- jquery -->
                                          <input type="hidden" name="denda" id="denda" value="<?php echo $denda['denda']; ?>">
                                          <input type="hidden" name="maksimal" id="max_day" value="<?php echo $max['lama_pinjam']; ?>">
                                          <input type="hidden" name="terlambat" id="terlambat">
                                          <input type="hidden" name="jml_buku" id="jml_buku" value="<?php echo $pinjam['jumlah_pinjam']; ?>" >

                                          <div class="form-row">
                                            <div class="form-group col-md-6">
                                              <label for="tgl_kembali">Tanggal Pengembalian</label>
                                              <small><font color="red"><?php echo form_error('tgl_kembali'); ?></font></small>
                                              <input type="date" name="tgl_kembali" class="form-control tgl_kembali" id="tgl_kembali" placeholder="" value="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                              <strong>
                                                <font color="red" class="terlambat"></font><br>
                                                <font color="red" class="denda"></font>
                                              </strong>
                                            </div>
                                          </div>
                                          
                                          <button type="submit" name="tambah" class="btn btn-primary">Kembalikan Buku</button>
                                          <a href="<?php echo base_url('Home'); ?>" class="btn btn-danger" >Batal</a>
                                        </form>

                                    </div>
                                    
                                </div>
                            </div>


                        </div>

                    