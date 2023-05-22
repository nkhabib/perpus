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

            <tr>
              <th scope="row">6</th>
              <td>Jumlah Buku</td>
              <td> : <?php echo $buku['jumlah_buku']; ?></td>
            </tr>

            <tr>
              <th scope="row">7</th>
              <td>Jumlah Buku Dipinjam</td>
              <td> : <?php echo $buku['total_pinjam']; ?></td>
            </tr>

            <tr>
              <th scope="row">8</th>
              <td>Buku Tersedia</td>
              <td> : <?php echo $buku['tersedia']; ?></td>
            </tr>
            </tbody>
            </table>
      </div>
    </div>

    <div class="col-md-12 m-4">
        <h5 class="card-title">Sinopsis</h5>
        <div class="mr-5">
            <?php echo $buku['sinopsis'];?>
        </div>
    </div>
  </div>
</div>


</div>