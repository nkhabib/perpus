
                
                        <div class="container-fluid page__container">
                            
                            <div class="row">
                                <div class="col-md">
                                <div class="card">
                                <?php if (!$dipinjam):?>

                                    <div class="alert alert-info" role="alert">
                                      <h4 class="alert-heading">Ooopss!</h4>
                                      <p>Belum Ada Buku Yang Dipinjam Member</p>
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
                                                <th class="text-center">Nama Peminjam</th>
                                                <th class="text-center">Tanggal Pinjam</th>
                                                <th class="text-center">Maksimal Pengembalian</th>
                                                <th class="text-center">Jumlah Buku</th>
                                                <th class="text-center">Petugas</th>
                                                <!-- <th class="text-center">Action</th> -->

                                            </tr>
                                        </thead>
                                        <tbody class="list"
                                               id="companies">
                                               <?php $no = $offset+1; foreach ($dipinjam as $d):?>

                                            <tr>

                                                <td class="text-center"><?php echo $no; ?></td>
                                                <td class="text-center"><?php echo $d['kode_pinjam']; ?></td>
                                                <td class="text-center"><?php echo $d['judul']; ?></td>
                                                <td class="text-center"> <img width="80" src="<?php echo base_url('assets/images/buku/').$d['foto']; ?>"> </td>
                                                <td class="text-center"><?php echo $d['nama']; ?></td>
                                                <td class="text-center"><?php echo tgl_indo($d['tanggal_pinjam']); ?></td>
                                                <td class="text-center"><?php echo tgl_indo($d['max_tgl_kembali']); ?></td>
                                                <td class="text-center"><?php echo $d['jumlah_pinjam']; ?></td>
                                                <td class="text-center"><?php echo $d['nama']; ?></td>
                                                <!-- <td>
                                                    <a href="<?php echo base_url('pinjam/pinjam/kembali/').base64_encode($d['id_pinjam']); ?>" class="badge badge-pill badge-success">Kembalikan Buku</a>
                                                </td> -->
                                            </tr>         
                                            <?php $no++; endforeach; ?> 

                                        </tbody>
                                    </table>
                                </small>
                                <div class="m-4 mt-0"> 
                                    <?php echo $halaman; ?>
                                </div>
                                <?php endif; ?>
                                </div>
                                    
                                </div>
                            </div>


                        </div>