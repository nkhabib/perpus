
                
                        <div class="container-fluid page__container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">

                                        <form class="m-4" enctype="multipart/form-data" action="<?php echo base_url('Tambah_Buku'); ?>" method="POST">
                                          <div class="form-row">
                                            <div class="form-group col-md-6">
                                              <label for="judul">Judul Buku</label>
                                              <small><font color="red"><?php echo form_error('judul'); ?></font></small>
                                              <input type="text" name="judul" class="form-control" id="judul" placeholder="Name Book" value="<?php echo set_value('judul'); ?>" >
                                            </div>
                                            <div class="form-group col-md-6">
                                              <label for="author">Author</label>
                                              <small><font color="red"><?php echo form_error('author'); ?></font></small>
                                              <input type="text" name="author" class="form-control" id="author" placeholder="Author" value="<?php echo set_value('author'); ?>">
                                            </div>
                                          </div>

                                          <div class="form-row">
                                            <div class="form-group col-md-6">
                                              <label for="penerbit">Penerbit</label>
                                              <small><font color="red"><?php echo form_error('penerbit'); ?></font></small>
                                              <input type="text" name="penerbit" class="form-control" id="penerbit" placeholder="Penerbit" value="<?php echo set_value('penerbit'); ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                              <label for="tahun">Tahun Terbit</label>
                                              <small><font color="red"><?php echo form_error('tahun'); ?></font></small>
                                              <input type="number" name="tahun" class="form-control" id="tahun" placeholder="Minimum Tahun : 1900" value="<?php echo set_value('tahun'); ?>">
                                            </div>
                                          </div>

                                          <div class="form-row">
                                            <div class="form-group col-md-6">
                                              <label for="tgl">Tanggal Terbit</label>
                                              <small><font color="red"><?php echo form_error('tgl'); ?></font></small>
                                              <input type="date" name="tgl" class="form-control" id="tgl" placeholder="" value="<?php echo set_value('tgl'); ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                              <label for="isbn">ISBN</label>
                                              <small><font color="red"><?php echo form_error('isbn'); ?></font></small>
                                              <input type="number" name="isbn" class="form-control" id="isbn" placeholder="Ex : 978-987-7897-67-9" value="<?php echo set_value('isbn'); ?>">
                                            </div>
                                          </div>


                                          <div class="form-row">
                                            <div class="form-group col-md-6">
                                              <label for="foto">Foto</label>
                                              <small><font color="red"><?php echo $error; ?></font></small>
                                              <input type="file" name="foto" class="form-control" id="foto">
                                            </div>
                                            <div class="form-group col-md-6">
                                              <label for="jumlah">Jumlah Buku</label>
                                              <small><font color="red"><?php echo form_error('jumlah'); ?></font></small>
                                              <input type="number" name="jumlah" class="form-control" id="jumlah" placeholder="Minimum Jumlah : 1" value="<?php echo set_value('jumlah'); ?>">
                                            </div>
                                          </div>
                                          
                                          <div class="form-group col-md-6">
                                              <label for="kategori">Kategori Buku</label>
                                              <small><font color="red"><?php echo form_error('kategori'); ?></font></small>
                                              <select class="form-control" name="kategori">
                                                <?php if (isset($_POST['tambah'])): $id_kategori = set_value('kategori');?>
                                                  <?php if ($id_kategori == ""): ?>
                                                    <option value="">----</option>
                                                  <?php else: ?>
                                                    <?php $after_tambah = $this->db->get_where('kategori',['id_kategori' => $id_kategori])->row_array(); ?>
                                                      
                                                        <option value="<?php echo set_value('kategori'); ?>">
                                                    
                                                          <?php echo $after_tambah['kategori']; ?>
                                                        </option>
                                                  <?php endif; ?>
                                                <?php else: ?>
                                                  <option value="">----</option>
                                                <?php endif; ?>
                                                <?php foreach($kategori as $k): ?>
                                                  <option value="<?php echo $k['id_kategori']; ?>"><?php echo $k['kategori']; ?></option>
                                                <?php endforeach; ?>
                                              </select>
                                          </div>

                                          <div class="form-row">
                                            <div class="form-group col-md-12">
                                              <label for="sinopsis">Sinopsis</label>
                                              <small><font color="red">* Minimal 200 Karakter / Kosongkan Jika Tidak Ada Sinopsis *</font></small>
                                              <small><font color="red"><?php echo form_error('sinopsis'); ?></font></small>
                                              <textarea name="sinopsis" class="form-control" id="summernote"><?php if (isset($_POST['tambah'])) {
                                                echo set_value('sinopsis');
                                              } ?></textarea>
                                            </div>
                                          </div>
                                          
                                          <button type="submit" name="tambah" class="btn btn-primary">Tambah Buku</button>
                                          <!-- <a href="<?php echo base_url('Home'); ?>" class="btn btn-danger" >Batal</a> -->
                                        </form>

                                    </div>
                                    
                                </div>
                            </div>


                        </div>

                    