
                
                        <div class="container-fluid page__container">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#menu_modal"><i class="fas fa-plus-square fa-fw"></i>Tambah Menu</button>
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
                                    <table class="table mb-0 thead-border-top-0 table-striped">
                                        <thead>
                                            <tr>

                                                <th width="12px" class="text-center">No</th>
                                                <th>Menu</th>
                                                <!-- <th>Url</th> -->
                                                <th>Icon</th>
                                                <th class="text-center">
                                                Apa Aktif ? <br>
                                                <small>Uncheck/check untuk ubah</small>
                                                </th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list"
                                               id="companies">
                                               <?php $no =$offset +1; foreach ($submenu as $sm):?>

                                            <tr>

                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $sm['judul']; ?></td>
                                                <!-- <td><?php echo $sm['url']; ?></td> -->
                                                <td><i class="<?php echo $sm['icon']; ?> mr-2"></i></td>
                                                <td class="text-center">
                                                    <?php if ($sm['judul'] == "Manajemen Menu"):?>
                                                        <input type="checkbox" checked disabled>
                                                    <?php else: ?>
                                                        <?php if ($sm['active'] == 1 ):?>
                                                            <input type="checkbox" class="statusMenu" checked data-active="1" data-id_submenu="<?php echo $sm['id_submenu']; ?>">
                                                        <?php else: ?>
                                                            <input type="checkbox" class="statusMenu" data-active="1" data-id_submenu="<?php echo $sm['id_submenu']; ?>">
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url('menu/detail/'.$sm['id_submenu']); ?>" class="badge badge-pill badge-primary" style="font-size: 9px;">detail Sub Menu</a>
                                                    <a href="<?php echo base_url('menu/editMenu/'.base64_encode($sm['id_submenu'])); ?>" class="badge badge-pill badge-success" style="font-size: 9px;">Edit</a>                                                    
                                                    <a href="<?php echo base_url('menu/hapusMenu/'.base64_encode($sm['id_submenu'])); ?>" class="badge badge-pill badge-danger hapus" style="font-size: 9px;">hapus</a>
                                                </td>
                                            </tr>         
                                            <?php $no++; endforeach; ?> 

                                        </tbody>
                                    </table>
                                    <?php echo $halaman; ?>
                                </div>
                                    
                                </div>
                            </div>


                        </div>

                    