
                
                        <div class="container-fluid page__container">
                            
                            <div class="row">
                                <div class="col-md">
                                <div class="card">
                                <?php if ($this->session->flashdata('msg')):?>
                                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                      <?php echo $this->session->flashdata('msg'); ?>

                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                <?php elseif ($this->session->flashdata('gagal')): ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                      <?php echo $this->session->flashdata('gagal'); ?>
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                <?php endif; ?>

                                <small>
                                    <table class=" table table-striped">
                                        <thead>
                                            <tr>

                                                <th class="text-center">No</th>
                                                <th>Judul</th>
                                                <th>Author</th>
                                                <th>Penerbit</th>
                                                <th>Tahun Terbit</th>
                                                <th>Tanggal Terbit</th>
                                                <th>Kategori</th>
                                                <th>Foto</th>
                                                <th class="text-center">Jumlah</th>
                                                <th class="text-center">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody class="list"
                                               id="companies">
                                               <?php $no = $offset+1; foreach ($buku as $b):?>

                                            <tr>

                                                <td class="text-center"><?php echo $no; ?></td>
                                                <td><?php echo $b['judul']; ?></td>
                                                <td><?php echo $b['author']; ?></td>
                                                <td><?php echo $b['penerbit']; ?></td>
                                                <td><?php echo $b['tahun_terbit']; ?></td>
                                                <td><?php echo tgl_indo($b['tanggal_terbit']); ?></td>
                                                <td><?php echo $b['kategori']; ?></td>
                                                <td width="60"><img src="<?php echo base_url('assets/images/buku/').$b['foto']; ?>" width="50" height="60" ></td>
                                                <td class="text-center"><?php echo $b['jumlah_buku']; ?></td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url('buku/buku/detail/'.base64_encode($b['id_buku'])); ?>" class="badge badge-pill badge-primary" style="font-size: 9px;">Detail</a>

                                                    <a href="<?php echo base_url('admin/Buku_Admin/editBuku/'.base64_encode($b['id_buku'])); ?>" class="badge badge-pill badge-warning" style="font-size: 9px;">Edit</a>                                                    
                                                    <a href="<?php echo base_url('admin/Buku_Admin/hapusBuku/'.base64_encode($b['id_buku'])); ?>" class="badge badge-pill badge-danger hapus" style="font-size: 9px;">hapus</a>
                                                </td>
                                            </tr>         
                                            <?php $no++; endforeach; ?> 

                                        </tbody>
                                    </table>
                                </small>
                                <div class="m-4 mt-0"> 
                                    <?php echo $halaman; ?>
                                </div>

                                </div>
                                    
                                </div>
                            </div>


                        </div>