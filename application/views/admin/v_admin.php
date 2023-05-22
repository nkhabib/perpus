
                
                        <div class="container-fluid page__container">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tmabah_admin"><i class="fas fa-plus-square fa-fw"></i>Tambah Admin</button>
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

                                    <table class="table mb-0 thead-border-top-0 table-striped">
                                        <thead>
                                            <tr>

                                                <th width="12px" class="text-center">No</th>
                                                <th>NO ID</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>Email</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list"
                                               id="companies">
                                               <?php $no = +1; foreach ($admin as $a):?>

                                            <tr>

                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $a['id_number']; ?></td>
                                                <td><?php echo $a['nama']; ?></td>
                                                <td><?php echo $a['alamat']; ?></td>
                                                <td><?php echo $a['email']; ?></td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url('admin/admin/editAdmin/'.base64_encode($a['id'])); ?>" class="badge badge-pill badge-warning" style="font-size: 9px;">Edit</a>                                                    
                                                    <a href="<?php echo base_url('admin/admin/hapusAdmin/'.base64_encode($a['id'])); ?>" class="badge badge-pill badge-danger hapus" style="font-size: 9px;">hapus</a>
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
                    <!-- // END drawer-layout__content -->
                    <div class="mdk-drawer  js-mdk-drawer"
                         id="default-drawer"
                         data-align="start">
                        <div class="mdk-drawer__content">
                            <div class="sidebar sidebar-light sidebar-left sidebar-p-t"
                                 data-perfect-scrollbar>

                                 <!-- nama menu untuk admin / member dll -->
                            <ul class="sidebar-menu">
                                <?php
                                $role = $this->session->userdata('role_id');
                                $this->db->join('user_menu','user_menu.menu_id = user_access_menu.menu_id');
                                $menu = $this->db->get_where('user_access_menu',['role_id' => $role])->result_array();
                                 foreach ($menu as $m):?>
                                    <?php $this->db->order_by('urutan','ASC');
                                    $subMenu = $this->db->get_where('user_sub_menu',['menu_id' => $m['menu_id'],'active' => 1])->result_array(); ?>


                                    <div class="sidebar-heading"><?php echo $m['menu']; ?></div>
                                    <!-- end nama menu untuk admin/ member dll -->
                                    

                                    <?php foreach ($subMenu as $sm):?>

                                        <?php if ( $sm['judul'] == 'Dashboard' or $sm['judul'] == 'Home'):?>

                                            <?php if ($sm['judul'] == $judul):?>
                                                <li class="sidebar-menu-item active">
                                            <?php else: ?>
                                                <li class="sidebar-menu-item">
                                            <?php endif; ?>
                                                <a class="sidebar-menu-button"
                                                   href="<?php echo base_url('Home'); ?>">
                                                    <i class="<?php echo $sm['icon']; ?>" style="margin-right: 10px;"></i>
                                                    <span class="sidebar-menu-text"><?php echo $sm['judul']; ?></span>
                                                </a>
                                            </li>

                                        <?php else: ?>
                                            <?php if ($j_menu == $sm['judul']):?>
                                                <li class="sidebar-menu-item active open">
                                            <?php else: ?>
                                                <li class="sidebar-menu-item">
                                            <?php endif; ?>
                                                <a class="sidebar-menu-button"
                                                   data-toggle="collapse"
                                                   href="#<?php echo str_replace(' ','',$sm['judul']); ?>">
                                                    <i class="<?php echo $sm['icon']; ?>" style="margin-right: 10px;"></i>
                                                    <!-- menu side bar -->
                                                    <span class="sidebar-menu-text"><?php echo $sm['judul']; ?></span>
                                                    <!-- end menu side bar -->
                                                    <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                                </a>

                                                <?php if ($j_menu == $sm['judul']):?>
                                                    <ul class="sidebar-submenu collapse show"
                                                    id="<?php echo str_replace(' ','',$sm['judul']); ?>">
                                                <?php else: ?>
                                                    <ul class="sidebar-submenu collapse"
                                                    id="<?php echo str_replace(' ','',$sm['judul']); ?>">
                                                <?php endif; ?>
                                                <!-- sub menu side bar -->
                                                    
                                                    <?php 
                                                    $this->db->join('sub_menu','sub_menu.id_sub_submenu = sub_menu_access.id_sub_submenu');
                                                    $this->db->order_by('urutan_submenu','ASC');
                                                    $sub = $this->db->get_where('sub_menu_access',['role_id' => $this->session->userdata('role_id'), 'active_submenu' => 1,'id_submenu' => $sm['id_submenu']])->result_array(); ?>

                                                    <?php foreach ($sub as $s):?>
                                                        <?php if ($s['judul_submenu'] == $judul):?>
                                                        <li class="sidebar-menu-item active">
                                                        <?php else: ?>
                                                            <li class="sidebar-menu-item">
                                                        <?php endif; ?>
                                                            <a class="sidebar-menu-button"
                                                               href="<?php echo base_url($s['url_submenu']); ?>">
                                                                <span class="sidebar-menu-text"><?php echo $s['judul_submenu']; ?></span>
                                                                <!-- <span class="badge badge-primary ml-auto">NEW</span> -->
                                                            </a>
                                                        </li>
                                                    
                                                    <?php endforeach; ?>
                                                <!-- end sub menu side bar -->
                                                </ul>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>

                            </ul>

                                

                            </div>
                        </div>
                    </div>
                </div>
                <!-- // END drawer-layout -->

            </div>
            <!-- // END header-layout__content -->

</div>
        <!-- // END header-layout -->

        <!-- App Settings FAB -->
        <div id="app-settings">
            <app-settings layout-active="default"
                          :layout-location="{
      
    }"></app-settings>

        </div>

        <!-- jQuery -->
        <script src="<?php echo base_url();?>assets/vendor/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/myscript.js"></script>
        <script src="<?php echo base_url();?>assets/js/sweatalert/sweetalert2.all.min.js"></script>

        <!-- Bootstrap -->
        <script src="<?php echo base_url(); ?>assets/vendor/popper.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendor/bootstrap.min.js"></script>

        <!-- Perfect Scrollbar -->
        <script src="<?php echo base_url(); ?>assets/vendor/perfect-scrollbar.min.js"></script>

        <!-- DOM Factory -->
        <script src="<?php echo base_url(); ?>assets/vendor/dom-factory.js"></script>

        <!-- MDK -->
        <script src="<?php echo base_url(); ?>assets/vendor/material-design-kit.js"></script>

        <!-- App -->
        <script src="<?php echo base_url(); ?>assets/js/toggle-check-all.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/check-selected-row.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/dropdown.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/sidebar-mini.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/app.js"></script>

        <!-- App Settings (safe to remove) -->
        <script src="<?php echo base_url(); ?>assets/js/app-settings.js"></script>

    </body>

        <!-- modal sub menu -->
        <div id="tmabah_admin"
             class="modal fade"
             tabindex="-1"
             role="dialog"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="px-3">
                            <div class="d-flex justify-content-center mt-2 mb-4 navbar-light">
                                <a href="index.html"
                                   class="navbar-brand"
                                   style="min-width: 0">
                                    
                                    <span>Tambah Admin</span>
                                </a>
                            </div>

                            <form action="<?php echo base_url('admin/admin/input_admin'); ?>" method="POST">
                                <div class="form-group">
                                    <label for="id_number">ID Number</label>
                                    <font color="red"><?php echo form_error('id_number'); ?></font>
                                    <input class="form-control mb-2" name="id_number" type="number" id="id_number" placeholder="16 Digit angka" required oninvalid="this.setCustomValidity('Masukan ID Number')" oninput="setCustomValidity('')" value="<?php echo set_value('id_number'); ?>" >

                                    <label for="nama">Nama</label>
                                    <font color="red"><?php echo form_error('nama'); ?></font>
                                    <input class="form-control" name="nama" type="text" id="nama" placeholder="Your Name" required oninvalid="this.setCustomValidity('Masukan Nama Anda')" oninput="setCustomValidity('')" value="<?php echo set_value('nama'); ?>">

                                    <label for="alamat">Alamat</label>
                                    <font color="red"><?php echo form_error('alamat'); ?></font>
                                    <input class="form-control" name="alamat" type="text" id="alamat" placeholder="RT / RW atau Jln" required oninvalid="this.setCustomValidity('Masukan Alamat')" oninput="setCustomValidity('')" value="<?php echo set_value('alamat'); ?>">

                                    <label for="email">Email</label>
                                    <font color="red"><?php echo form_error('email'); ?></font>
                                    <input class="form-control" name="email" type="email" id="email" placeholder="yourmail@mail.com" required oninvalid="this.setCustomValidity('Masukan Email')" oninput="setCustomValidity('')" value="<?php echo set_value('email'); ?>">

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <label for="password1">Password</label>
                                          <font color="red"><?php echo form_error('password1'); ?></font>
                                          <input type="password" name="password1" class="form-control" id="password1" placeholder="******" required oninvalid="this.setCustomValidity('Masukan Password')" oninput="setCustomValidity('')">
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label for="password2">Konfirmasi Password</label>
                                          <font color="red"><?php echo form_error('password2'); ?></font>
                                          <input type="password" name="password2" class="form-control" id="password2" placeholder="******" required oninvalid="this.setCustomValidity('Masukan Password')" oninput="setCustomValidity('')">
                                        </div>
                                    </div>

                                    <label for="role">Role</label>
                                    <input class="form-control" type="text" value="Admin" disabled>

                                </div>

                                <input type="hidden" name="tipe" value="Admin">
                                <div class="form-group text-center">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                                    <button class="btn btn-primary" type="submit">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div> <!-- // END .modal-body -->
                </div> <!-- // END .modal-content -->
            </div> <!-- // END .modal-dialog -->
        </div> <!-- // END .modal -->
        <!-- end modal sub menu -->
</html>