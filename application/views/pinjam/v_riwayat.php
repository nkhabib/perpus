
                
                        <div class="container-fluid page__container">
                            
                            <div class="row">
                                <div class="col-md">
                                <div class="card">
                                <?php if (!$riwayat):?>

                                    <div class="alert alert-info" role="alert">
                                      <h4 class="alert-heading">Ooopss!</h4>
                                      <p>Anda Belum Memiliki Riwayat Pinjaman</p>
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
                                                <th class="text-center">Tanggal Dikembalikan</th>
                                                <th class="text-center">Jumlah Buku</th>
                                                <th class="text-center">Total Denda</th>
                                                <th class="text-center">Petugas Peminjaman</th> 
                                                <th class="text-center">Petugas Pengembalian</th>
                                                <!-- <th class="text-center">Action</th> -->

                                            </tr>
                                        </thead>
                                        <tbody class="list"
                                               id="companies">
                                               <?php $no = $offset+1; foreach ($riwayat as $r):?>

                                            <tr>

                                                <td class="text-center"><?php echo $no; ?></td>
                                                <td class="text-center"><?php echo $r['kode_pinjam']; ?></td>
                                                <td class="text-center"><?php echo $r['judul']; ?></td>
                                                <td class="text-center"> <img width="80" src="<?php echo base_url('assets/images/buku/').$r['foto']; ?>"> </td>
                                                <td class="text-center"><?php echo $r['nama']; ?></td>
                                                <td class="text-center"><?php echo tgl_indo($r['tanggal_pinjam']); ?></td>
                                                <td class="text-center"><?php echo tgl_indo($r['max_tgl_kembali']); ?></td>
                                                <td class="text-center"><?php echo tgl_indo($r['tgl_pengembalian']); ?></td>
                                                <td class="text-center"><?php echo $r['jumlah_pinjam']; ?></td>
                                                <td class="text-center"><?php echo $r['total_denda']; ?></td>
                                                <?php $p_pinjam = $this->db->get_where('admin',['id' => $r['id_petugas_pinjam']])->row_array();
                                                $p_kembali = $this->db->get_where('admin',['id' => $r['id_petugas_kembali']])->row_array();
                                                 ?>
                                                <td class="text-center"><?php echo $p_pinjam['nama']; ?></td>
                                                <td class="text-center"><?php echo $p_kembali['nama']; ?></td>
                                                <!-- <td>
                                                    <a href="<?php echo base_url('pinjam/pinjam/kembali/').base64_encode($r['id_pinjam']); ?>" class="badge badge-pill badge-success">Kembalikan Buku</a>
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