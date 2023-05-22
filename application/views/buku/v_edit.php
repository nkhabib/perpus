
                
                        <div class="container-fluid page__container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">

                                        <form class="m-4" enctype="multipart/form-data" action="<?php echo base_url('UpdateBuku'); ?>" method="POST">
                                          <input type="hidden" name="id_buku" value="<?php echo $buku['id_buku']; ?>">
                                          <div class="form-row">
                                            <div class="form-group col-md-6">
                                              <label for="judul">Judul Buku</label>
                                              <small><font color="red"><?php echo form_error('judul'); ?></font></small>
                                              <input type="text" name="judul" class="form-control" id="judul" placeholder="Name Book" value="<?php echo $buku['judul']; ?>" >
                                            </div>
                                            <div class="form-group col-md-6">
                                              <label for="author">Author</label>
                                              <small><font color="red"><?php echo form_error('author'); ?></font></small>
                                              <input type="text" name="author" class="form-control" id="author" placeholder="Author" value="<?php echo $buku['author']; ?>">
                                            </div>
                                          </div>

                                          <div class="form-row">
                                            <div class="form-group col-md-6">
                                              <label for="penerbit">Penerbit</label>
                                              <small><font color="red"><?php echo form_error('penerbit'); ?></font></small>
                                              <input type="text" name="penerbit" class="form-control" id="penerbit" placeholder="" value="<?php echo $buku['penerbit']; ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                              <label for="tahun">Tahun Terbit</label>
                                              <small><font color="red"><?php echo form_error('tahun'); ?></font></small>
                                              <input type="number" name="tahun" class="form-control" id="tahun" placeholder="Minimum Tahun : 1900" value="<?php echo $buku['tahun_terbit']; ?>">
                                            </div>
                                          </div>

                                          <div class="form-row">
                                            <div class="form-group col-md-6">
                                              <label for="tgl">Tanggal Terbit</label>
                                              <small><font color="red"><?php echo form_error('tgl'); ?></font></small>
                                              <input type="date" name="tgl" class="form-control" id="tgl" placeholder="" value="<?php echo $buku['tanggal_terbit'];?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                              <label for="isbn">ISBN</label>
                                              <small><font color="red"><?php echo form_error('isbn'); ?></font></small>
                                              <?php if ($buku['isbn'] != 0): ?>
                                                <input type="number" name="isbn" class="form-control" id="isbn" value="<?php echo $buku['isbn']; ?>">
                                              <?php else: ?>
                                                <input type="number" name="isbn" class="form-control" id="isbn" placeholder="Tidak Ada ISBN">
                                              <?php endif; ?>
                                            </div>
                                          </div>


                                          <div class="form-row">
                                            <div class="form-group col-md-6">
                                              <label for="jumlah">Jumlah Buku</label>
                                              <small><font color="red"><?php echo form_error('jumlah'); ?></font></small>
                                              <input type="number" name="jumlah" class="form-control" id="jumlah" placeholder="Minimum Jumlah : 1" value="<?php echo $buku['jumlah_buku']; ?>">
                                            </div>

                                            <div class="form-group col-md-6">
                                              <label for="kategori">Kategori Buku</label>
                                              <small><font color="red"><?php echo form_error('kategori'); ?></font></small>
                                              <select class="form-control" name="kategori" id="kategori">
                                                <option value="<?php echo $buku['id_kategori'] ?>"><?php echo $buku['kategori']; ?></option>
                                                <?php foreach($kategori as $k): ?>
                                                  <option value="<?php echo $k['id_kategori']; ?>"><?php echo $k['kategori']; ?></option>
                                                <?php endforeach; ?>
                                              </select>
                                            </div>

                                          </div>

                                          <div class="form-row">
                                            <div class="form-group col-md-2">
                                              <img src="<?php echo base_url('assets/images/buku/').$buku['foto']; ?>" width="150">
                                            </div>
                                            <div class="form-group col-md-4">
                                              <label for="foto">Foto</label>
                                              <small><font color="red">* Kosongkan Jika Tidak Diubah *</font></small>
                                              <small><font color="red"><?php echo $error; ?></font></small>
                                              <input type="file" name="foto" class="form-control" id="foto">
                                            </div>
                                          </div>
                                          
                                          <div class="form-row">
                                            <div class="form-group col-md-12">
                                              <label for="sinopsis">Sinopsis</label>
                                              <small><font color="red">* Minimal 200 Karakter / Kosongkan Jika Tidak Ada Sinopsis *</font></small>
                                              <small><font color="red"><?php echo form_error('sinopsis'); ?></font></small>
                                              <textarea name="sinopsis" class="form-control" id="summernote">
                                                <?php echo $buku['sinopsis']; ?>
                                              </textarea>
                                            </div>
                                          </div>
                                          
                                          <button type="submit" name="tambah" class="btn btn-primary">Update Buku</button>
                                          <a href="<?php echo base_url('Tabel_buku'); ?>" class="btn btn-danger" >Batal</a>
                                        </form>

                                    </div>
                                    
                                </div>
                            </div>


                        </div>

                    