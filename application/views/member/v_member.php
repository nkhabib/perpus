
                
                        <div class="container-fluid page__container">
                            <a href="<?php echo base_url('TambahMember') ?>" class="btn btn-info"><i class="fas fa-plus-square fa-fw"></i>Tambah Member</a>
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

                                <?php if ($status == 'gagal'):?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                      Gagal Menambah Admin, Cek Form !!
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                <?php endif; ?>
                                <small>
                                    
                                    <table class="table mb-0 thead-border-top-0 table-striped">
                                        <thead>
                                            <tr>

                                                <th width="50px" class="text-center">No</th>
                                                <th>NO ID</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>Email</th>
                                                <th>Provesi</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list"
                                               id="companies">
                                               <?php $no = $offset+1; foreach ($data as $m):?>

                                            <tr>

                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $m['id_number']; ?></td>
                                                <td><?php echo $m['nama']; ?></td>
                                                <td><?php echo $m['alamat']; ?></td>
                                                <td><?php echo $m['email']; ?></td>
                                                <td><?php echo $m['provesi']; ?></td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url('member/member/detailMember/'.base64_encode($m['id'])); ?>" class="badge badge-pill badge-success" style="font-size: 9px;">Detail</a>

                                                    <a href="<?php echo base_url('member/member/editMember/'.base64_encode($m['id'])); ?>" class="badge badge-pill badge-warning" style="font-size: 9px;">Edit</a>                                                    
                                                    <a href="<?php echo base_url('member/member/hapusMember/'.base64_encode($m['id'])); ?>" class="badge badge-pill badge-danger hapus" style="font-size: 9px;">hapus</a>
                                                </td>
                                            </tr>         
                                            <?php $no++; endforeach; ?> 

                                        </tbody>
                                    </table>
                                </small>
                                    <br>
                                    <div class="m-4">
                                        <?php echo $halaman; ?>
                                    </div>
                                    
                                </div>
                                    
                                </div>
                            </div>


                        </div>