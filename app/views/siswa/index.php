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