<!-- Page Wrapper -->
<div id="wrappers">
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column w-100">

        <!-- Main Content -->
        <div id="content">
            <!-- Begin Page Content -->
            <div class="container-fluid mt-4">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Daftar Siswa</h1>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahSiswa">Tambah Siswa</button>
                </div>
                <div class="col-sm-7">
                    <?php Flasher::flash(); ?>

                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NISN</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>ID Kelas</th>
                                <th>Alamat</th>
                                <th>No. Telp</th>
                                <th>ID SPP</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>NISN</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>ID Kelas</th>
                                <th>Alamat</th>
                                <th>No. Telp</th>
                                <th>ID SPP</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($data['getAllSiswa'] as $siswa) : ?>
                                <?php if ($i % 2 == 0) : ?>
                                    <tr class="bg-gray-100">
                                    <?php endif; ?>
                                    <td><?= $i; ?></td>
                                    <td><?= $siswa['nisn']; ?></td>
                                    <td><?= $siswa['nis']; ?></td>
                                    <td><?= $siswa['nama']; ?></td>
                                    <td><?= $siswa['nama_kelas']; ?></td>
                                    <td><?= $siswa['alamat']; ?></td>
                                    <td><?= $siswa['no_telp']; ?></td>
                                    <td><?= $siswa['tahun']; ?></td>
                                    <td>
                                        <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle text-center" role="button" id="aksi" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v fa-sm text-gray-400"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="aksi">
                                                <a class="dropdown-item" href="<?= BASEURL ?>/admin/hapusSiswa/<?= $siswa['nisn'] ?>">Hapus</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="<?= BASEURL ?>/admin/lihatSiswa/<?= $siswa['nisn'] ?>">Lihat Profil</a>
                                            </div>
                                        </div>
                                    </td>
                                    </tr>
                                    <?php $i++ ?>
                                <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="modal fade" id="tambahSiswa" tabindex="-1" aria-labelledby="modalTambahSiswa" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
                            <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= BASEURL; ?>/admin/tambahSiswa" method="post">
                                <div class="mb-1">
                                    <label for="nisn" class="col-form-label">NISN:</label>
                                    <input type="text" class="form-control" id="nisn" name="nisn" required autocomplete="off">
                                </div>
                                <div class="mb-1">
                                    <label for="nis" class="col-form-label">NIS:</label>
                                    <input type="text" name="nis" id="nis" class="form-control" required autocomplete="off">
                                </div>
                                <div class="mb-1">
                                    <label for="nama" class="col-form-label">Nama:</label>
                                    <input type="text" name="nama" id="nama" class="form-control" required autocomplete="off">
                                </div>
                                <div class="mb-1">
                                    <label for="id_kelas" class="col-form-label">ID Kelas:</label>
                                    <select name="id_kelas" id="id_kelas" class="form-control" required>
                                        <option selected>Choose...</option>
                                        <?php foreach ($data['infoKelas'] as $kelas) : ?>
                                            <option value="<?= $kelas['id_kelas'] ?>">
                                                <?= $kelas['id_kelas']; ?> |
                                                <?= $kelas['nama_kelas']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-1">
                                    <label for="message-text" class="col-form-label">Alamat:</label>
                                    <textarea class="form-control" id="message-text" name="alamat" required></textarea>
                                </div>
                                <div class="mb-1">
                                    <label for="telephone" class="col-form-label">No. Telp:</label>
                                    <input type="tel" name="no_telp" id="telephone" class="form-control" required autocomplete="off">
                                </div>
                                <div class="mb-1">
                                    <label for="id_spp" class="col-form-label">ID SPP:</label>
                                    <select name="id_spp" id="id_spp" class="form-control">
                                        <option selected>Choose...</option>
                                        <?php foreach ($data['dataSPP'] as $spp) : ?>
                                            <option value="<?= $spp['id_spp']; ?>">
                                                <?= $spp['id_spp']; ?> |
                                                <?= $spp['tahun']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2021</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>