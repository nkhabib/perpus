
                
                        <div class="container-fluid page__container">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="card">

                                        <?php if ($this->session->flashdata('msg')):?>
                                            <div class="alert alert-primary" role="alert">
                                              <?php echo $this->session->flashdata('msg'); ?>
                                            </div>
                                        <?php endif; ?>

                                        <div class="m-4">
                                            
                                            <h4>Role : <?php echo $role['role']; ?></h4>
                                        
                                            <table class="table mb-0 thead-border-top-0 table-striped">
                                                <thead>
                                                    <tr>

                                                        <th width="12px" class="text-center">No</th>
                                                        <th>Menu</th>
                                                        <th class="text-center">Akses</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list"
                                                       id="companies">
                                                       <?php $no = 1; foreach ($menu as $m):?>

                                                    <tr>

                                                        <td><?php echo $no; ?></td>
                                                        <td><?php echo $m['menu']; ?></td>
                                                        <td class="text-center">
                                                            <?php if ($role['role_id'] == 1 ): ?>
                                                                <input type="checkbox" <?php echo cek_access($role['role_id'],$m['menu_id']); ?> disabled >
                                                            <?php else: ?>
                                                                <input class="user_access" type="checkbox" <?php echo cek_access($role['role_id'],$m['menu_id']); ?> data-role_id="<?php echo $role['role_id']; ?>" data-menu_id="<?php echo $m['menu_id']; ?>">
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>         
                                                    <?php $no++; endforeach; ?> 

                                                </tbody>
                                            </table>

                                            <br>
                                            <a class="btn btn-primary btn-sm" href="<?php echo base_url('User'); ?>">Kembali</a>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>


                        </div>

                    