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
                                                    <?php $pinjam = $this->db->get_where('pinjam',['status' => 0, 'gagal' => 0])->num_rows(); ?>
                                                    <?php if ($sm['judul'] == 'Pinjaman Buku' and $pinjam != 0):?>
                                                        <i class="fas fa-bell ml-2 fa-fw" style="color:yellow"><sup id="notif"><?php echo $pinjam; ?></sup></i>
                                                    <?php endif; ?>
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
        <script src="<?php echo base_url();?>assets/js/sweatalert/sweetalert2.all.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/myscript.js"></script>

        <!-- Bootstrap -->
        <script src="<?php echo base_url(); ?>assets/vendor/popper.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendor/bootstrap.min.js"></script>

        <!-- Perfect Scrollbar -->
        <script src="<?php echo base_url(); ?>assets/vendor/perfect-scrollbar.min.js"></script>

        <!-- DOM Factory -->
        <script src="<?php echo base_url(); ?>assets/vendor/dom-factory.js"></script>

        <!-- MDK -->
        <script src="<?php echo base_url(); ?>assets/vendor/material-design-kit.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/app.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendor/summernote/summernote.min.js"></script>

        <!-- App Settings (safe to remove) -->
        <script src="<?php echo base_url(); ?>assets/js/app-settings.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
              $('#summernote').summernote();
            });
        </script>

    </body>

    <!-- tambah user menu Modal -->
        <div id="role_modal"
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
                                    
                                    <span>Tambah Role</span>
                                </a>
                            </div>

                            <form action="<?php echo base_url('menu/insertRoleMenu'); ?>" method="POST">
                                <div class="form-group">
                                    <label for="menu">Menu</label>
                                    <input class="form-control" name="menu" type="text" id="menu" placeholder="Menu" required oninvalid="this.setCustomValidity('Masukan Nama Menu')" oninput="setCustomValidity('')">

                                    <label>Siapa yang bisa akses ?</label> <br>
                                    <?php $roleuser = $this->db->get('role_user')->result_array(); ?>
                                    <?php foreach ($roleuser as $ru):?>
                                        <?php if ($ru['role_id'] == 1):?>
                                            <input type="hidden" name="role[]" value="<?php echo $ru['role_id']; ?>">
                                            <input  name="role[]" id="<?php echo $ru['role'];?>" type="checkbox" checked disabled value="<?php echo $ru['role_id']; ?>">
                                            <!-- <input  type="checkbox"name="<?php echo $ru['role'];?>" id="<?php echo $ru['role'];?>" checked disabled value="<?php echo $ru['role_id']; ?>"> -->
                                            <label for="<?php echo $ru['role'];?>"><?php echo $ru['role'];?></label>
                                        <?php else: ?>
                                            <input name="role[]" id="<?php echo $ru['role'];?>" type="checkbox" value="<?php echo $ru['role_id'];?>" >
                                            <label for="<?php echo $ru['role'];?>"><?php echo $ru['role'];?></label>
                                            <!-- <input name="<?php echo $ru['role'];?>" id="<?php echo $ru['role'];?>" type="checkbox" value="<?php echo $ru['role_id'];?>" >
                                            <label for="<?php echo $ru['role'];?>"><?php echo $ru['role'];?></label> -->
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

        <!-- end role modal -->

        <!-- menu modal -->

        <div id="menu_modal"
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
                                    
                                    <span>Tambah Menu</span>
                                </a>
                            </div>

                            <form action="<?php echo base_url('menu/insertMenu'); ?>" method="POST">
                                <div class="form-group">

                                    <label for="idMenu">Menu Untuk</label>
                                    <?php $userMenu = $this->db->get('user_menu')->result_array(); ?>
                                    <select class="form-control" name="idMenu" id="idMenu" required oninvalid="this.setCustomValidity('Pilih Menu')" oninput="setCustomValidity('')">
                                        <option value="">-----</option>
                                        <?php foreach ($userMenu as $um): ?>
                                            <option value="<?php echo $um['menu_id']; ?>"><?php echo $um['menu']; ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                    <label for="menu">Menu</label>
                                    <input class="form-control" name="menu" type="text" id="menu" placeholder="Menu" required oninvalid="this.setCustomValidity('Masukan Nama Menu')" oninput="setCustomValidity('')">

                                    <label for="icon">Icon</label>
                                    <input class="form-control" name="icon" type="text" id="icon" placeholder="fas fa-user fa-fw" required oninvalid="this.setCustomValidity('Icon tidak boleh kosong')" oninput="setCustomValidity('')">

                                    <br>
                                    <a href="https://fontawesome.com/v5/search" target="_blank">Referensi icon</a>

                                    <!-- <label>Apa aktif ?</label> <br>
                                    <input name="aktif" id="aktif" type="checkbox" checked disabled value="1" >
                                    <label for="aktif"></label> -->
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
        <!-- end menu modal -->

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