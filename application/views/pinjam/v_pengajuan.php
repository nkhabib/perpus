
                        <div class="container-fluid page__container">
                            
                            <div class="row">
                                <div class="col-md">
                                <div class="card">
                                    <?php if ($this->session->flashdata('msg')):?>
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                          <strong><?php echo $this->session->flashdata('msg'); ?></strong>
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!$pengajuan):?>
                                        <div class="alert alert-info" role="alert">
                                          <h4 class="alert-heading">OOps!</h4>
                                          <p>Belum Ada Pengajuan Buku Dari Member
                                          </p>
                                        </div>
                                    <?php else: ?>
                                <small>
                                    <table class=" table table-striped">
                                        <thead>
                                            <tr>

                                                <th class="text-center" height="50">No</th>
                                                <th class="text-center">Kode Pinjam</th>
                                                <th class="text-center">Nama Member</th>
                                                <th class="text-center">Judul Buku</th>
                                                <th class="text-center">Foto</th>
                                                <th class="text-center">Tanggal Pinjam</th>
                                                <th class="text-center">Maksimal Pengembalian</th>
                                                <th class="text-center">Jumlah Buku</th>
                                                <!-- <th class="text-center">Status</th> -->
                                                <th class="text-center">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody class="list"
                                               id="companies">
                                               <?php $no = 1; foreach ($pengajuan as $p):?>

                                            <tr>

                                                <td class="text-center"><?php echo $no; ?></td>
                                                <td class="text-center"><?php echo $p['kode_pinjam']; ?></td>
                                                <td class="text-center"><?php echo $p['nama']; ?></td>
                                                <td class="text-center"><?php echo $p['judul']; ?></td>
                                                <td class="text-center"> <img width="80" src="<?php echo base_url('assets/images/buku/').$p['foto']; ?>"> </td>
                                                <td class="text-center"><?php echo tgl_indo($p['tanggal_pinjam']); ?></td>
                                                <td class="text-center"><?php echo tgl_indo($p['max_tgl_kembali']); ?></td>
                                                <td class="text-center"><?php echo $p['jumlah_pinjam']; ?></td>
                                                <!-- <td class="text-center">Belum Disetujui</td> -->
                                                <td class="text-center">
                                                    <a href="<?php echo base_url('pinjam/pinjam_admin/setuju/').base64_encode($p['id_pinjam']); ?>" class="badge badge-pill badge-success">Setuju</a>
                                                    <a href="<?php echo base_url('pinjam/pinjam_admin/tidakSetuju/').base64_encode($p['id_pinjam']); ?>" class="badge badge-pill badge-danger tidak_setuju">Tidak Setuju</a>
                                                </td>
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