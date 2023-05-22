    <div class="container-fluid page__container">
        <div class="row card-group-row  pt-2">

            <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('msg'); ?>"></div>

            <?php foreach ($buku as $b):?>
            <div class="col-md-6 col-lg-3 card-group-row__col">
                <div class="card card-group-row__card pricing__card pricing__card--popular">

                    <?php if ($b['visit'] == $max):?>
                    <span class="pricing__card-badge">Buku Terpopuler</span>
                    <?php endif; ?>

                    <div class="card-body d-flex flex-column">
                        <img src="<?php echo base_url('assets/images/buku/').$b['foto']; ?>" width="200" height="200">
                        <div class="card-body d-flex flex-column">
                            <small>Judul  : <?php echo $b['judul']; ?></small>
                            <small>Author : <?php echo $b['author']; ?></small>
                            <small>Penerbit : <?php echo $b['penerbit']; ?></small>

                        </div>

                        <a href="<?php echo base_url('buku/buku/detail/').base64_encode($b['id_buku']); ?>" class="btn btn-primary mb-1">Detail</a>
                        <?php if ($role == 2):?>
                            <a href="<?php echo base_url('pinjam/pinjam/pinjam/').base64_encode($b['id_buku']); ?> "class="btn btn-success">Pinjam Buku</a>
                        <?php else: ?>
                            <a href="<?php echo base_url('pinjam/pinjam/pinjam/').base64_encode($b['id_buku']); ?> "class="btn btn-success">Tabel Buku</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
            

        </div>
        <?php echo $halaman; ?>
    </div>