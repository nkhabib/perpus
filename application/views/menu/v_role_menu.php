
                
                        <div class="container-fluid page__container">
                            <?php $msg = $this->session->flashdata('msg');
                            $gagal = $this->session->flashdata('gagal'); 
                            if ($msg):?>
                            <div class="alert alert-primary" role="alert">
                              <?php echo $this->session->flashdata('msg'); ?>
                            </div>
                            <?php elseif ($gagal): ?>
                                <div class="alert alert-danger" role="alert">
                                  <?php echo $this->session->flashdata('gagal'); ?>
                                </div>
                            <?php endif;?>
                            <?php if(form_error('menu')):?>
                            <div class="alert alert-primary" role="alert">
                                <?php echo form_error('menu'); ?>
                            </div>
                            <?php endif;?>

                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#role_modal"><i class="fas fa-plus-square fa-fw"></i>Tambah Role Menu</button>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                <div class="card">

                                    <table class="table mb-0 thead-border-top-0 table-striped">
                                        <thead>
                                            <tr>

                                                <th width="12px" class="text-center">No</th>
                                                <th>Role Menu</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list"
                                               id="companies">
                                               <?php $no =$offset +1; foreach ($roleMenu as $rm):?>

                                            <tr>

                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $rm['menu']; ?></td>
                                                <td class="text-center">
                                                   <!--  <a href="<?php echo base_url('menu/lihat/'.$rm['menu_id']); ?>" class="badge badge-pill badge-primary">lihat Menu</a> -->
                                                    <a href="<?php echo base_url('menu/edit/'.$rm['menu_id']); ?>" class="badge badge-pill badge-success">Edit</a>
                                                    <a href="<?php echo base_url('menu/hapus/'.$rm['menu_id']); ?>" class="badge badge-pill badge-danger hapus">hapus</a>
                                                </td>
                                            </tr>         
                                            <?php $no++; endforeach; ?> 

                                        </tbody>
                                    </table>
                                    <?php echo $halaman; ?>
                                </div>
                                    
                            </div>

                            <div class="col-md-3"></div>
                        </div>


                        </div>