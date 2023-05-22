
                
                        <div class="container-fluid page__container">
                            
                            <div class="row">
                                <div class="col-md">
                                <div class="card">
                                <?php if (!$pinjaman):?>

                                    <div class="alert alert-info" role="alert">
                                      <h4 class="alert-heading">Ooopss!</h4>
                                      <p>Anda Belum Meminjam Buku Apapun atau Pinjaman Anda Belum Disetujui</p>
                                      <hr>
                                      <p class="mb-0">Silahkan Lihat Katalog Buku atau Pinjaman Tertunda atau Hubungi Petugas</p>
                                      <br>
                                      <a href="<?php echo base_url('Katalog_Buku'); ?>" class="btn btn-primary">Katalog Buku</a>
                                      <a href="<?php echo base_url('Tertunda'); ?>" class="btn btn-primary">Pinjaman Tertunda</a>
                                    </div>
                                <?php else: ?>
                                <small>
                                    <table class=" table table-striped">
                                        <thead>
                                            <tr>

                                                <th class="text-center">No</th>
                                                <th class="text-center">Kode Pinjam</th>
                                                <th class="text-center">Judul</th>
                                                <th class="text-center">Foto</th>
                                                <th class="text-center">Tanggal Pinjam</th>
                                                <th class="text-center">Maksimal Pengembalian</th>
                                                <th class="text-center">Jumlah Buku</th>
                                                <th class="text-center">Status</th>
                                                <!-- <th class="text-center">Action</th> -->

                                            </tr>
                                        </thead>
                                        <tbody class="list"
                                               id="companies">
                                               <?php $no = 1; foreach ($pinjaman as $p):?>

                                            <tr>

                                                <td class="text-center"><?php echo $no; ?></td>
                                                <td class="text-center"><?php echo $p['kode_pinjam']; ?></td>
                                                <td class="text-center"><?php echo $p['judul']; ?></td>
                                                <td class="text-center"> <img width="80" src="<?php echo base_url('assets/images/buku/').$p['foto']; ?>"> </td>
                                                <td class="text-center"><?php echo tgl_indo($p['tanggal_pinjam']); ?></td>
                                                <td class="text-center"><?php echo tgl_indo($p['max_tgl_kembali']); ?></td>
                                                <td class="text-center"><?php echo $p['jumlah_pinjam']; ?></td>
                                                <td class="text-center">Belum Dikembalikan</td>
                                                <!-- <td>
                                                    <a href="<?php echo base_url('pinjam/pinjam/kembali/').base64_encode($p['id_pinjam']); ?>" class="badge badge-pill badge-success">Kembalikan Buku</a>
                                                </td> -->
                                            </tr>         
                                            <?php $no++; endforeach; ?> 

                                        </tbody>
                                    </table>
                                </small>
                                <div class="m-4 mt-0"> 
                                </div>
                                <?php endif; ?>
                                </div>
                                    
                                </div>
                            </div>


                        </div>