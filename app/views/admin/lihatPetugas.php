<div class="container-fluid mt-4">
    <div class="d-sm-flex align-items-center justify-content-between">
        <a href="<?= BASEURL ?>/admin/daftarPetugas" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i>
            Kembali
        </a>
    </div>
</div>

<div class="container-lg mt-5">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profil <span id="judulProfil"><?= $data['petugas']['nama'] ?></span></h1>
    </div>
    <div class="p-3 bg-light border rounded">

        <form class="row g-3" method="post" action="<?= BASEURL ?>/admin/ubahPetugas">
            <input type="hidden" class="form-control" id="id" name="id_petugas" value="<?= $data['petugas']['id_petugas'] ?>">
            <div class="col-md-6">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= $data['petugas']['username'] ?>">
            </div>
            <div class="col-md-6">
                <label for="password" class="form-label">Password:</label>
                <input type="text" tabindex="-1" class="form-control" id="password" name="password" value="<?= $data['petugas']['password'] ?>">
            </div>
            <div class="col-12">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama_petugas" value="<?= $data['petugas']['nama'] ?>">
            </div>
            <div class="col-md-4">
                <label for="level" class="form-label">Level:</label>
                <select id="level" class="form-control mb-2" name="level">
                    <option value="<?= $data['petugas']['level'] ?>" selected>
                        <?= $data['petugas']['level'] ?>
                    </option>
                    <?php if ($data['petugas']['level'] == 'petugas') : ?>
                        <option value="admin">
                            Admin
                        </option>
                    <?php elseif ($data['petugas']['level'] == 'admin') : ?>
                        <option value="petugas">Petugas</option>
                    <?php endif; ?>
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>