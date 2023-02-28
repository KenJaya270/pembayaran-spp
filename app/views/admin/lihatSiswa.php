<div class="container-fluid mt-4">
    <div class="d-sm-flex align-items-center justify-content-between">
        <a href="<?= BASEURL ?>/admin/daftarSiswa" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i>
            Kembali
        </a>
    </div>
</div>


<!-- Profil Siswa -->
<?php foreach ($data['profilSiswa'] as $siswa) : ?>
    <div class="container-lg mt-5">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Profil <span id="judulProfil"><?= $siswa['nama'] ?></span></h1>
        </div>
        <div class="p-3 bg-light border rounded">

            <form class="row g-3" method="post" action="<?= BASEURL ?>/admin/editSiswa">
                <input type="hidden" class="form-control" id="NISN" name="nisn" value="<?= $siswa['nisn'] ?>">
                <div class="col-md-6 mb-4">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $siswa['nama'] ?>">
                </div>
                <div class="col-md-6">
                    <label for="nis" class="form-label">NIS</label>
                    <input type="text" tabindex="-1" class="form-control" id="nis" name="nis" value="<?= $siswa['nis'] ?>">
                </div>
                <div class="col-12 mb-4">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea type="text" class="form-control" id="alamat" name="alamat"><?= $siswa['alamat'] ?></textarea>
                </div>
                <div class="col-md-6 mb-4">
                    <label for="no_telp" class="form-label">No. Telepon</label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $siswa['no_telp'] ?>">
                </div>
                <div class="col-md-4">
                    <label for="kelas" class="form-label">Kelas</label>
                    <select id="kelas" class="form-control" name="id_kelas">
                        <option value="<?= $siswa['id_kelas'] ?>" selected>
                            <?= $siswa['id_kelas'] ?> |
                            <?= $siswa['nama_kelas'] ?>
                        </option>
                        <?php foreach ($data['infoKelas'] as $kelas) : ?>
                            <option value="<?= $kelas['id_kelas'] ?>">
                                <?= $kelas['id_kelas'] ?> |
                                <?= $kelas['nama_kelas'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="id_spp" class="form-label">ID SPP:</label>
                    <select name="id_spp" id="id_spp" class="form-control">
                        <option value="<?= $siswa['id_spp'] ?>" selected>
                            <?= $siswa['id_spp'] ?> |
                            <?= $siswa['tahun'] ?>
                        </option>
                        <?php foreach ($data['infoSpp'] as $spp) : ?>
                            <option value="<?= $spp['id_spp'] ?>">
                                <?= $spp['id_spp'] ?> |
                                <?= $spp['tahun'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-12 mt-2 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
<?php endforeach; ?>


<!-- Riwayat Pembayaran -->
<div class="container-lg mt-5">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Riwayat Pembayaran</h1>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Petugas</th>
                    <th>Tanggal Bayar</th>
                    <th>Bulan Bayar</th>
                    <th>Tahun Bayar</th>
                    <th>Nominal</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Petugas</th>
                    <th>Tanggal Bayar</th>
                    <th>Bulan Bayar</th>
                    <th>Tahun Bayar</th>
                    <th>Nominal</th>
                </tr>
            </tfoot>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($data['riwayatPembayaran'] as $riwayat) : ?>
                    <?php if ($i % 2 == 0) : ?>
                        <tr class="bg-gray-100">
                        <?php endif; ?>
                        <td><?= $i; ?></td>
                        <td><?= $riwayat['nama'] ?></td>
                        <td><?= $riwayat['tgl_bayar'] ?></td>
                        <td id="bulan_bayar"><?= $riwayat['bulan_bayar'] ?></td>
                        <td><?= $riwayat['tahun_bayar'] ?></td>
                        <td><?= $riwayat['nominal'] ?></td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>