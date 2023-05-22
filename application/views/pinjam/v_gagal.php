
                
                        <div class="container-fluid page__container">
                            
                            <div class="row">
                                <div class="col-md">
                                <div class="card">

                                <?php if (!$gagal):?>
                                    <div class="alert alert-info" role="alert">
                                      <h4 class="alert-heading">Hore !!</h4>
                                      <p>Anda Tidak Memiliki Pinjaman Yang Tidak Disetujui</p>
                                      <hr>
                                      <p class="mb-0">Silahkan Lihat Katalog Buku dan Ajukan Pinjam Buku</p>
                                      <br>
                                      <a href="<?php echo base_url('Katalog_Buku'); ?>" class="btn btn-primary">Katalog Buku</a>
                                    </div>
                                <?php else: ?>
                                    <div class="alert alert-info" role="alert">
                                      <!-- <h4 class="alert-heading">Hore !!</h4> -->
                                      <p>Pinjaman yang tidak disetujui akan terhapus setelah 10 hari</p>
                                      <!-- <hr>
                                      <p class="mb-0">Silahkan Lihat Katalog Buku dan Ajukan Pinjam Buku</p>
                                      <br>
                                      <a href="<?php echo base_url('Katalog_Buku'); ?>" class="btn btn-primary">Katalog Buku</a> -->
                                    </div>
                                <small>
                                    <table class="table table-striped" width="1000">
                                        <thead>
                                            <tr>

                                                <th class="text-center" height="80">No</th>
                                                <th class="text-center">Judul</th>
                                                <th class="text-center">Foto</th>
                                                <th class="text-center">Tanggal Pinjam</th>
                                                <th class="text-center">Maksimal Pengembalian</th>
                                                <th class="text-center">Jumlah Buku</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Keterangan</th>

                                            </tr>
                                        </thead>
                                        <tbody class="list"
                                               id="companies">
                                               <?php $no = 1; foreach ($gagal as $g):?>

                                            <tr>

                                                <td class="text-center"><?php echo $no; ?></td>
                                                <td class="text-center"><?php echo $g['judul']; ?></td>
                                                <td class="text-center">
                                                    <img width="80" src="<?php echo base_url('assets/images/buku/').$g['foto']; ?>">
                                                </td>
                                                <td class="text-center"><?php echo tgl_indo($g['tanggal_pinjam']); ?></td>
                                                <td class="text-center"><?php echo tgl_indo($g['max_tgl_kembali']); ?></td>
                                                <td class="text-center"><?php echo $g['jumlah_pinjam']; ?></td>
                                                <td class="text-center">
                                                    <?php if ($g['gagal'] == 1):?>
                                                        Tidak Disetujui
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-center"><?php echo $g['keterangan']; ?></td>
                                            </tr>         
                                            <?php $no++; endforeach; ?> 

                                        </tbody>
                                    </table>
                                </small>
                            <?php endif; ?>
                                <div class="m-4 mt-0"> 
                                </div>
                                </div>
                                    
                                </div>
                            </div>


                        </div>