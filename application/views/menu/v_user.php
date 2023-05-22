
                
                        <div class="container-fluid page__container">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card">
                                    
                                    <div class="m-2">
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
                                        <table class="table mb-0 thead-border-top-0 table-striped">
                                            <thead>
                                                <tr>

                                                    <th width="12px" class="text-center">No</th>
                                                    <th>User</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list"
                                                   id="companies">
                                                   <?php $no = 1; foreach ($user as $u):?>

                                                <tr>

                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $u['role']; ?></td>
                                                    <td class="text-center">
                                                        <a href="<?php echo base_url('menu/access/'.base64_encode($u['role_id']));?>" class="badge badge-pill badge-warning" style="font-size: 9px;">access</a>

                                                        <?php if ($u['role_id'] != 1):?>
                                                            <a href="<?php echo base_url('menu/editUser/'.base64_encode($u['role_id']));?>" class="badge badge-pill badge-success" style="font-size: 9px;">Edit</a>
                                                            <a href="<?php echo base_url('menu/hapusUser/'.base64_encode($u['role_id']));?>" class="badge badge-pill badge-danger hapus" style="font-size: 9px;">hapus</a>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>         
                                                <?php $no++; endforeach; ?> 

                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                    
                                </div>
                            </div>


                        </div>

                    