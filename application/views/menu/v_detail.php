
                
                        <div class="container-fluid page__container">
                            <div class="row">
                                <div class="col-md">
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal_subMenu"><i class="fas fa-plus-square fa-fw"></i>Tambah Sub Menu</button>
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

                                                <th  rowspan="2" width="12px" class="text-center">No</th>
                                                <th  rowspan="2">Sub Menu</th>
                                                <th  rowspan="2">Url</th>
                                                <th colspan="<?php echo $jml; ?>" class="text-center">Akses ?<br>
                                                    <small>cek/uncek untuk ubah</small>
                                                </th>
                                                <th colspan="1" class="text-center">Status ?<br>
                                                    <small>cek/uncek untuk ubah</small>
                                                </th>
                                                <th rowspan="2" class="text-center">Action</th>
                                            </tr>
                                            <tr>
                                                <?php foreach ($user as $u):?>
                                                    <td class="text-center"><?php echo $u['role']; ?></td>
                                                <?php endforeach; ?>

                                                <td class="text-center">Aktif</td>
                                            </tr>
                                        </thead>
                                        <tbody class="list"
                                               id="companies">
                                            <?php $no = 1; foreach ($submenu as $sm):?>
                                               <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $sm['judul_submenu'] ?></td>
                                                <td><?php echo $sm['url_submenu'] ?></td>
                                                <?php foreach ($user as $u): ?>
                                                    <td class="text-center">
                                                        <?php $ada = $this->db->get_where('sub_menu_access',['role_id' => $u['role_id'],'id_sub_submenu' => $sm['id_sub_submenu']])->num_rows(); ?>
                                                        <?php if ($ada > 0):?>
                                                            <?php if ($u['role_id'] == 1) :?>
                                                                <input type="checkbox" checked name="" disabled>
                                                            <?php else: ?>
                                                                <input type="checkbox" class="sub_menu_access" checked name="" data-role_id="<?php echo $u['role_id']; ?>" data-id_submenu="<?php echo $sm['id_sub_submenu']; ?>">
                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <input type="checkbox" name="" class="sub_menu_access" data-role_id="<?php echo $u['role_id']; ?>" data-id_submenu="<?php echo $sm['id_sub_submenu']; ?>" >
                                                        <?php endif; ?>
                                                    </td>
                                                <?php endforeach; ?>
                                                

                                                <td class="text-center">
                                                    <?php if ($sm['active_submenu'] == 1):?>
                                                        <input type="checkbox" class="submenu_active" checked data-id_submenu="<?php echo $sm['id_sub_submenu']; ?>">
                                                    <?php else: ?>
                                                        <input type="checkbox" class="submenu_active" data-id_submenu="<?php echo $sm['id_sub_submenu']; ?>">
                                                    <?php endif; ?>
                                                </td>
                                                
                                                <!-- <td class="text-center">
                                                    <input type="checkbox" checked name="">
                                                </td>

                                                <td class="text-center">
                                                    <input type="checkbox" name="">
                                                </td> -->

                                                <td class="text-center">
                                                    <a href="<?php echo base_url('menu/edit_submenu/'.$sm['id_sub_submenu']); ?>" class="badge badge-pill badge-warning" style="font-size: 9px;">Edit</a>
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
        <div id="modal_subMenu"
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
                                    
                                    <span>Tambah Sub Menu</span>
                                </a>
                            </div>

                            <form action="<?php echo base_url('menu/insertSubMenu'); ?>" method="POST">
                                <div class="form-group">
                                    <label for="subMmenu">Sub Menu</label>
                                    <input class="form-control mb-2" name="subMenu" type="text" id="subMenu" placeholder="Sub Menu" required oninvalid="this.setCustomValidity('Masukan Nama Sub Menu')" oninput="setCustomValidity('')">

                                    <input type="hidden" name="idSubMenu" value="<?php echo $id_submenu; ?>">

                                    <label for="url">Url 
                                        <small>
                                            <font color="red" size="1.5px">Note : * Silahan hubungi pembuat aplikasi jika tida bisa membuat link *</font>
                                        </small>
                                    </label>
                                    <input class="form-control" name="url" type="text" id="url" placeholder="Contoh : controller/funtion atau nama alias" required oninvalid="this.setCustomValidity('Masukan Url Sub Menu')" oninput="setCustomValidity('')">

                                    <label>Siapa yang bisa akses ?</label> <br>
                                    <?php foreach ($roleuser as $ru):?>
                                        <?php if ($ru['role_id'] == 1):?>
                                            <input type="hidden" name="role[]" value="<?php echo $ru['role_id']; ?>">
                                            <input  name="role[]" id="<?php echo $ru['role'];?>" type="checkbox" checked disabled value="<?php echo $ru['role_id']; ?>">
                                            <!-- <input  type="checkbox"name="<?php echo $ru['role'];?>" id="<?php echo $ru['role'];?>" checked disabled value="<?php echo $ru['role_id']; ?>"> -->
                                            <label for="<?php echo $ru['role'];?>"><?php echo $ru['role'];?></label>
                                        <?php else: ?>
                                            <input name="role[]" id="<?php echo $ru['role'];?>" type="checkbox" value="<?php echo $ru['role_id'];?>" >
                                            <label for="<?php echo $ru['role'];?>"><?php echo $ru['role'];?></label>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
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