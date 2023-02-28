<div class="container">
    <?php Flasher::flash() ?>
</div>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4>Pembayaran Siswa</h4>
        <a href="<?= BASEURL ?>/petugas/generate" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i>
            Cetak Laporan
        </a>
    </div>
</div>
<div class="d-flex flex-wrap">
    <?php foreach ($data['getAllSiswa'] as $siswa) : ?>
        <div class="col-3 mt-2">
            <a class="text-reset" href="<?= BASEURL ?>/petugas/transaksi/<?= $siswa['nisn'] ?>">
                <div class="card-body bg-light shadow rounded border">
                    <h5><?= $siswa['nama'] ?></h5>
                    <p class="m-0 mt-1"><?= $siswa['nis'] ?></p>
                    <p class="m-0 mt-1"><?= $siswa['nama_kelas'] ?> / <?= $siswa['tahun'] ?></p>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
</div>
</div>