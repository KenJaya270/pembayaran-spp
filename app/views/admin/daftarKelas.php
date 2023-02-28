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
                    <h1 class="h3 mb-0 text-gray-800">Daftar Kelas</h1>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahKelas">Tambah Kelas</button>
                </div>
                <div class="col-sm-7">
                    <?php Flasher::flash(); ?>

                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Kelas</th>
                                <th>Kompetensi Keahlian</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nama Kelas</th>
                                <th>Kompetensi Keahlian</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($data['getAllKelas'] as $kelas) : ?>
                                <?php if ($i % 2 == 0) : ?>
                                    <tr class="bg-gray-100">
                                    <?php endif; ?>
                                    <td><?= $i; ?></td>
                                    <td><?= $kelas['nama_kelas']; ?></td>
                                    <td><?= $kelas['kompetensi_keahlian']; ?></td>
                                    <td>
                                        <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle text-center" role="button" id="aksi" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="aksi">
                                                <a class="dropdown-item" href="<?= BASEURL ?>/admin/hapusKelas/<?= $kelas['id_kelas'] ?>">Hapus</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" id="linkModal" data-toggle="modal" data-target="#ModalEdit<?= $kelas['id_kelas'] ?>">Edit Kelas</a>
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
            <?php foreach ($data['getAllKelas'] as $kelas) : ?>
                <div class="modal fade" id="ModalEdit<?= $kelas['id_kelas'] ?>" tabindex="-1" aria-labelledby="modalMultiFungsi" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="formModalLabel">Edit Kelas</h5>
                                <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">&#10006;</button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= BASEURL; ?>/admin/editKelas" method="post">
                                    <input type="hidden" name="id_kelas" id="id_kelas" class="form-control" value="<?= $kelas['id_kelas'] ?>">
                                    <div class="mb-1">
                                        <label for="nama_kelas" class="col-form-label">Nama Kelas:</label>
                                        <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" required autocomplete="off" value="<?= $kelas['nama_kelas'] ?>">
                                    </div>
                                    <div class="mb-1">
                                        <label for="kompetensi_keahlian" class="col-form-label">Kompetensi Keahlian:</label>
                                        <input type="text" name="kompetensi_keahlian" id="kompetensi_keahlian" class="form-control" required autocomplete="off" value="<?= $kelas['kompetensi_keahlian'] ?>">
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="modal fade" id="tambahKelas" tabindex="-1" aria-labelledby="modalMultiFungsi" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="formModalLabel">Edit Kelas</h5>
                            <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">&#10006;</button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= BASEURL; ?>/admin/tambahKelas" method="post">
                                <div class="mb-1">
                                    <label for="nama_kelas" class="col-form-label">Nama Kelas:</label>
                                    <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" required autocomplete="off">
                                </div>
                                <div class="mb-1">
                                    <label for="kompetensi_keahlian" class="col-form-label">Kompetensi Keahlian:</label>
                                    <input type="text" name="kompetensi_keahlian" id="kompetensi_keahlian" class="form-control" required autocomplete="off">
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