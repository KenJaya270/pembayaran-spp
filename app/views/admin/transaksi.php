<?php foreach ($data['siswa'] as $siswa) : ?>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            <?= $siswa['nis'] ?></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $siswa['nama'] ?></div>
                        <div class="small"><?= $siswa['alamat'] ?></div>
                        <div class="small">
                            <i class="fa fa-phone text-primary"></i>
                            <?= $siswa['no_telp'] ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>

    <form action="<?= BASEURL ?>/admin/entryPembayaran" class="user d-flex flex-wrap pb-5" method="post">
        <input type="hidden" name="id_petugas" value="<?= $_SESSION['spp']['id_petugas'] ?>">
        <input type="hidden" name="id_spp" value="<?= $siswa['id_spp'] ?>">
        <input type="hidden" name="tgl_bayar" value="<?= date('Y/m/d') ?>">
        <input type="hidden" name="nisn" value="<?= $siswa['nisn'] ?>">
        <input type="hidden" name="tahun_bayar" value="<?= $siswa['tahun'] ?>">
        <?php foreach ($data['bulan'] as $bulan) : ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="d-flex justify-content-end">
                                    <input type="checkbox" name="bulan_bayar[]" id="bulan_bayar" class="form-check" value="<?= $bulan[1] ?>" <?php foreach ($data['bulanDibayar'] as $bulanDibayar) : ?> <?= in_array($bulan[1], $bulanDibayar) ? "checked disabled" : "" ?> <?php endforeach ?>>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $bulan[0] ?></div>
                                <div class="small">Rp. <?= $siswa['nominal'] ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <div style="margin: 0 0 0 16px;">
            <button type="submit" class="btn btn-primary btn-lg">Bayar!</button>
        </div>
    </form>
<?php endforeach; ?>