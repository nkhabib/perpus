<div class="container-fluid page__container">
    

    <div class="card mb-3">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img class="m-4 mb-2" src="<?php echo base_url('assets/images/buku/').$buku['foto']; ?>" width="250" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <strong><font size="5">Judul : <?php echo $buku['judul']; ?></font></strong>
        <br><br>
        <table class="table table-striped">
            <tbody>
            <tr>
              <th scope="row" width="10">1</th>
              <td width="200">Author</td>
              <td> : <?php echo $buku['author']; ?></td>
            </tr>

            <tr>
              <th scope="row">2</th>
              <td>Penerbit</td>
              <td> : <?php echo $buku['penerbit']; ?></td>
            </tr>

            <tr>
              <th scope="row">3</th>
              <td>Tahun Terbit</td>
              <td> : <?php echo $buku['tahun_terbit']; ?></td>
            </tr>

            <tr>
              <th scope="row">4</th>
              <td>Tanggal Terbit</td>
              <td> : <?php echo tgl_indo($buku['tanggal_terbit']); ?></td>
            </tr>

            <tr>
              <th scope="row">5</th>
              <td>ISBN</td>
              <td> : <?php echo $buku['isbn']; ?></td>
            </tr>

            </tbody>
            </table>
      </div>
    </div>
  </div>

    <form class="m-4" action="<?php echo base_url('pinjam/pinjam/update_pinjam'); ?>" method="POST">
      <input type="hidden" name="id_pinjam" value="<?php echo $buku['id_pinjam']; ?>">
      <input type="hidden" name="id_buku" value="<?php echo $buku['id_buku']; ?>">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="jumlah">Jumlah Pinjam Buku</label>
          <small><font color="red"><?php echo form_error('jumlah'); ?></font></small>
          <input type="number" name="jumlah" class="form-control" id="jumlah" placeholder="Maksimal : <?php echo $buku['tersedia']; ?>" value="<?php echo $buku['jumlah_pinjam']; ?>">
        </div>
        <div class="form-group col-md-6">
          <label for="tgl_pinjam">Tanggal Pinjam</label>
          <small><font color="red"><?php echo form_error('tgl_pinjam'); ?></font></small>
          <input type="date" name="tgl_pinjam" class="form-control" id="tgl_pinjam" value="<?php echo $buku['tanggal_pinjam']; ?>" readonly>
        </div>
      </div>

      <button type="submit" name="tambah" class="btn btn-primary" id="tombol_hari">Update</button>
      <a href="<?php echo base_url('Home'); ?>" class="btn btn-danger" >Batal</a>
    </form>
</div>


</div>