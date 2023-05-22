


                        <div class="container-fluid page__container">
                          <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">  
                              <div class="card">
                              
                                <form action="<?php echo base_url('menu/updateMenu'); ?>" class="m-5" method="POST">

                                  <h5>Menu Untuk : <?php echo $name_menu; ?></h5><br>
                                  
                                  <div class="form-group row">

                                    <label for="userMenu" class="col-sm-4 col-form-label">Judul</label>
                                    <div class="col-sm-8">
                                      <input type="hidden" name="idMenu" value="<?php echo $menu['id_submenu']; ?>">
                                      <input type="text" name="menu" class="form-control" id="userMenu" value="<?php echo $menu['judul']; ?>" required oninvalid="this.setCustomValidity('Menu Tidak boleh kosong')" oninput="setCustomValidity('')" >
                                    </div>

                                    <label for="menu" class="col-sm-4 col-form-label">Ubah Menu Untuk</label>
                                    <div class="col-sm-8">
                                      <select class="form-control" name="menu_id">
                                        <option value="<?php echo $menu['menu_id']; ?>">-----</option>
                                        <?php foreach ($userMenu as $um):?>
                                          <option value="<?php echo $um['menu_id']; ?>"><?php echo $um['menu']; ?></option>
                                        <?php endforeach; ?>
                                      </select>
                                      <font color="red" size="2px">*Note : Biarkan Kosong jika Tidak Diubah*</font>
                                    </div>


                                    <!-- <label for="url" class="col-sm-2 col-form-label">Url</label>
                                    <div class="col-sm-10">
                                      <input type="text" name="url" class="form-control" id="url" value="<?php echo $menu['url']; ?>">
                                    </div> -->

                                    <label for="icon" class="col-sm-4 col-form-label">Icon</label>
                                    <div class=" ml-3 form-inline">
                                      <input type="text" name="icon" class="form-control" id="icon" value="<?php echo $menu['icon']; ?>" required oninvalid="this.setCustomValidity('Icon tidak boleh kosong')" oninput="setCustomValidity('')">
                                      <label class="ml-1 col-form-label">Icon :</label>
                                      <i class=" ml-1 <?php echo $menu['icon']; ?>"></i>
                                      <a class="ml-2" href="https://fontawesome.com/v5/search?m=free" target="_blank">Lihat Icon Lain</a>
                                      <!-- <br> -->
                                    </div>

                                  </div>
                                      <button class="btn btn-primary btn-sm">Update</button>
                                      <a href="<?php echo base_url('Menu'); ?>" class="btn btn-danger btn-sm">Batal</a>
                                  
                                </form>
                            </div>
                            </div>
                            <div class="col-md-1"></div>
                          </div>
                        </div>

                    