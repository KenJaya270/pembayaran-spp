<!-- Begin Page Content -->
<div class="container-fluid mt-4">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Petugas</h1>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahPetugas">Tambah Petugas</button>
    </div>
    <div class="col-sm-7">
        <?php Flasher::flash(); ?>

    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Nama</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Nama</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($data['getAllPetugas'] as $petugas) : ?>
                    <?php if ($i % 2 == 0) : ?>
                        <tr class="bg-gray-100">
                        <?php endif; ?>
                        <td><?= $i; ?></td>
                        <td><?= $petugas['username']; ?></td>
                        <td><?= $petugas['password']; ?></td>
                        <td><?= $petugas['nama']; ?></td>
                        <td><?= $petugas['level']; ?></td>
                        <td>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle text-center" role="button" id="aksi" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="aksi">
                                    <a class="dropdown-item" href="<?= BASEURL ?>/admin/hapusPetugas/<?= $petugas['id_petugas'] ?>">Hapus</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= BASEURL ?>/admin/lihatPetugas/<?= $petugas['id_petugas'] ?>">Lihat Profil</a>
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

<div class="modal fade" id="tambahPetugas" tabindex="-1" aria-labelledby="modalTambahPetugas" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Petugas</h5>
                <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">&#10006;</button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/admin/tambahPetugas" method="post">
                    <div class="mb-1">
                        <label for="username" class="col-form-label">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required autocomplete="off">
                    </div>
                    <div class="mb-1">
                        <label for="password" class="col-form-label">Password:</label>
                        <input type="password" name="password" id="password" class="form-control" required autocomplete="off">
                    </div>
                    <div class="mb-1">
                        <label for="nama_petugas" class="col-form-label">Nama Petugas:</label>
                        <input type="text" name="nama_petugas" id="nama_petugas" class="form-control" required autocomplete="off">
                    </div>
                    <div class="mb-1">
                        <label for="level" class="col-form-label">Level:</label>
                        <select name="level" id="level" class="form-control">
                            <option selected>Choose...</option>
                            <option value="petugas">Petugas</option>
                            <option value="admin">Admin</option>
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