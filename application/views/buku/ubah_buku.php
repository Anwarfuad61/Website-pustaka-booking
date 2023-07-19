<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-6">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <?= $this->session->flashdata('pesan'); ?>


            <!-- KOnten -->
            <?php foreach ($buku as $b) { ?>
                <form action="<?= base_url('buku/ubahBuku'); ?>" method="post" enctype="multipart/form-data">
                    <div class='row'>
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/upload/') . $b['image']; ?>" class="img-thumbnail" alt="">
                        </div>
                        <div class='col-sm-9'>
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="hidden" name="id" id="id" value="<?php echo $b['id']; ?>">
                                    <input type="text" class="form-control form-control-user" id="judul_buku" name="judul_buku" placeholder="Masukkan Judul Buku" value="<?= $b['judul_buku']; ?>">
                                </div>
                                <div class="form-group">
                                    <select name="id_kategori" class="form-control form-control-user">
                                        <!-- <option value="<?= $b['id']; ?>" selected="selected"></option> -->
                                        <option value="<?= $b['id']; ?>">Data tidak berubah...</option>
                                        <?php foreach ($kategori as $k) { ?>
                                            <option value="<?= $k['id']; ?>"><?= $k['kategori']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="pengarang" name="pengarang" placeholder="Masukkan nama pengarang" value='<?= $b['pengarang']; ?>'>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="penerbit" name="penerbit" placeholder="Masukkan nama penerbit" value='<?= $b['penerbit']; ?>'>
                                </div>
                                <div class="form-group">
                                    <select name="tahun" class="form-control form-control-user">
                                        <option value="<?= $b['tahun_terbit']; ?>">Data tidak berubah...</option>
                                        <?php for ($i = date('Y'); $i > 1000; $i--) { ?>
                                            <option value="<?= $i; ?>"><?= $i; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="isbn" name="isbn" placeholder="Masukkan ISBN" value='<?= $b['isbn']; ?>'>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="stok" name="stok" placeholder="Masukkan nominal stok" value='<?= $b['stok']; ?>'>
                                </div>
                                <div class="form-group">
                                    <!-- <?php
                                            if (isset($b['image'])) { ?>

                                        <input type="hidden" name="old_pict" id="old_pict" value="<?= $b['image']; ?>">

                                        <picture>
                                            <source srcset="" type="image/svg+xml">
                                            <img src="<?= base_url('assets/img/upload/') . $b['image']; ?>" class="rounded mx-auto mb-3 d-blok" alt="...">
                                        </picture>

                                    <?php } ?> -->
                                    <input type="file" class="form-control form-control-user" id="image" name="image">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" onclick="window.history.back(-1)"><i class="fas fa-ban"></i>Close</button>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i>
                                    Update</button>
                            </div>
                        </div>
                    </div>

                </form>
            <?php } ?>

        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->