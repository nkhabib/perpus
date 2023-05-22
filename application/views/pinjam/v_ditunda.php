
                
                        <div class="container-fluid page__container">
                            <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('msg'); ?>"></div>
                            <div class="row">
                                <div class="col-md">
                                <div class="card">
                                    <div class="flash-data-hapus" data-flashdata="<?php echo $this->session->flashdata('hps'); ?>"></div>
                                <?php if (!$pinjam):?>

                                    <div class="alert alert-info" role="alert">
                                      <h4 class="alert-heading">Ooopss!</h4>
                                      <p>Anda Belum Mengajukan Pinjaman Buku Apapun</p>
                                      <hr>
                                      <p class="mb-0">Silahkan Lihat Katalog Buku dan Ajukan Pinjam Buku</p>
                                      <br>
                                      <a href="<?php echo base_url('Katalog_Buku'); ?>" class="btn btn-primary">Katalog Buku</a>
                                    </div>
                                <?php else: ?>
                                <small>
                                    <div class="alert alert-warning" role="alert">
                                      <p class="mb-0">Pengajuan akan dihapus jika sudah melebihi 3 hari belum disetujui petugas</p>
                                    </div>
                                    <table class="table-striped" width="1000">
                                        <thead>
                                            <tr>

                                                <th class="text-center" height="80">No</th>
                                                <th class="text-center">Judul</th>
                                                <th class="text-center">Foto</th>
                                                <th class="text-center">Tanggal Pinjam</th>
                                                <th class="text-center">Maksimal Pengambalian</th>
                                                <th class="text-center">Jumlah Buku</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody class="list"
                                               id="companies">
                                               <?php $no = 1; foreach ($pinjam as $p):?>

                                            <tr>

                                                <td class="text-center"><?php echo $no; ?></td>
                                                <td class="text-center"><?php echo $p['judul']; ?></td>
                                                <td class="text-center">
                                                    <img width="80" src="<?php echo base_url('assets/images/buku/').$p['foto']; ?>">
                                                </td>
                                                <td class="text-center"><?php echo tgl_indo($p['tanggal_pinjam']); ?></td>
                                                <td class="text-center"><?php echo tgl_indo($p['max_tgl_kembali']); ?></td>
                                                <td class="text-center"><?php echo $p['jumlah_pinjam']; ?></td>
                                                <td class="text-center">
                                                    <?php if ($p['status'] == 0):?>
                                                        Belum Disetujui
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url('pinjam/pinjam/edit/').base64_encode($p['id_pinjam']); ?>" class="badge badge-pill badge-warning">Edit</a>
                                                    <a href="<?php echo base_url('pinjam/pinjam/hapus/').base64_encode($p['id_pinjam']); ?>" class="badge badge-pill badge-danger hapus">Hapus</a>
                                                </td>
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