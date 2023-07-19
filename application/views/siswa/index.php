<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-12">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <?= $this->session->flashdata('pesan'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#siswaBaruModal"><i class="fas fa-file-alt"></i> Siswa Baru</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Tempat Lahir</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Agama</th>
                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $a = 1;
                    foreach ($siswa as $sw) { ?>
                        <tr>
                            <th scope="row"><?= $a++; ?></th>
                            <td><?= $sw['nis']; ?></td>
                            <td><?= $sw['nama']; ?></td>
                            <td><?= $sw['kelas']; ?></td>
                            <td><?= $sw['tanggal_lahir']; ?></td>
                            <td><?= $sw['tempat_lahir']; ?></td>
                            <td><?= $sw['alamat']; ?></td>
                            <td><?= $sw['gender']; ?></td>
                            <td><?= $sw['agama']; ?></td>
                            <td>
                                <a href="<?= base_url('siswa/updateSiswa/') . $sw['nis']; ?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                                <a href="<?= base_url('siswa/hapusSiswa/') . $sw['nis']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $sw['nama']; ?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<!-- Modal Tambah buku baru-->
<div class="modal fade" id="siswaBaruModal" tabindex="-1" role="dialog" aria-labelledby="siswaBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="siswaBaruModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('siswa'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="number" class="form-control form-control-user" id="nis" name="nis" placeholder="Masukkan NIS">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Masukkan Nama Siswa">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="kelas" name="kelas" placeholder="Masukkan Kelas Siswa">
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control form-control-user" id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Masukkan Alamat Siswa">
                    </div>
                    <div class="form-group">
                        <select name="gender" class="form-control form-control-user">
                            <option value="">Pilih Jenis Kelamin </option>
                            <?php
                            $gender = ['Pria', 'Wanita', 'Lainnya'];
                            for ($i = 0; $i < 3; $i++) { ?>
                                <option value="<?= $gender[$i]; ?>"><?= $gender[$i]; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="agama" class="form-control form-control-user">
                            <option value="">Pilih Agama</option>
                            <?php
                            $ag = ['Islam', 'Kristen', 'Katolik', 'Budha', 'Hindu', 'Protestan', 'Khonghucu'];
                            for ($i = 0; $i < 7; $i++) { ?>
                                <option value="<?= $ag[$i]; ?>"><?= $ag[$i]; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal Tambah Mneu -->