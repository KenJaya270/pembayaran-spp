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
                    <h1 class="h3 mb-0 text-gray-800">Daftar SPP</h1>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahSpp" id="tambahSPP">Tambah SPP</button>
                </div>
                <div class="col-sm-7">
                    <?php Flasher::flash(); ?>

                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tahun</th>
                                <th>Nominal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Tahun</th>
                                <th>Nominal</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($data['getAllSpp'] as $spp) : ?>
                                <?php if ($i % 2 == 0) : ?>
                                    <tr class="bg-gray-100">
                                    <?php endif; ?>
                                    <td><?= $i; ?></td>
                                    <td><?= $spp['tahun']; ?></td>
                                    <td>Rp. <?= $spp['nominal']; ?></td>
                                    <td>
                                        <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle text-center" role="button" id="aksi" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="aksi">
                                                <a class="dropdown-item" href="<?= BASEURL ?>/admin/hapusSpp/<?= $spp['id_spp'] ?>">Hapus</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" id="linkEditModal" href="<?= BASEURL ?>admin/spp" data-toggle="modal" data-target="#editSpp<?= $spp['id_spp'] ?>">Edit SPP</a>
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

            <div class="modal fade" id="tambahSpp" tabindex="-1" aria-labelledby="modalMultiFungsi" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="formModalLabel">Tambah SPP</h5>
                            <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">&#10006;</button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= BASEURL; ?>/admin/tambahSpp" method="post">
                                <input type="hidden" name="id_spp" id="id_spp" class="form-control">
                                <div class="mb-1">
                                    <label for="tahun" class="col-form-label">Tahun:</label>
                                    <input type="number" class="form-control" id="tahun" name="tahun" required autocomplete="off">
                                </div>
                                <div class="mb-1">
                                    <label for="nominal" class="col-form-label">Nominal:</label>
                                    <input type="number" name="nominal" id="nominal" class="form-control" required autocomplete="off">
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php foreach ($data['getAllSpp'] as $spp) : ?>
                <div class=" modal fade" id="editSpp<?= $spp['id_spp'] ?>" tabindex="-1" aria-labelledby="modalMultiFungsi" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="formModalLabel">Tambah SPP</h5>
                                <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">&#10006;</button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= BASEURL; ?>/admin/editSpp" method="post">
                                    <input type="hidden" name="id_spp" id="id_spp" class="form-control" value="<?= $spp['id_spp'] ?>">
                                    <div class="mb-1">
                                        <label for="tahun" class="col-form-label">Tahun:</label>
                                        <input type="number" class="form-control" id="tahun" name="tahun" required autocomplete="off" value="<?= $spp['tahun'] ?>">
                                    </div>
                                    <div class="mb-1">
                                        <label for="nominal" class="col-form-label">Nominal:</label>
                                        <input type="number" name="nominal" id="nominal" class="form-control" required autocomplete="off" value="<?= $spp['nominal'] ?>">
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