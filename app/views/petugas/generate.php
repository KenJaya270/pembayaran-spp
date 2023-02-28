<div class="m-3">
    <div class="d-sm-flex align-items-center mb-4 justify-content-end" id="filtering">
        <button type="button" id="geneButton" class="btn btn-primary">
            <i class="fas fa-download fa-sm text-gray-100"></i>
            Cetak
        </button>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" cellspacing="0">
            <thead>
                <tr>
                    <th>NISN</th>
                    <?php foreach ($data['bulan'] as $bulan) : ?>
                        <th><?= $bulan[0] ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>NISN</th>
                    <?php foreach ($data['bulan'] as $bulan) : ?>
                        <th><?= $bulan[0] ?></th>
                    <?php endforeach; ?>
                </tr>
            </tfoot>

            <tbody>
                <?php foreach ($data['dataLaporan'] as $key => $laporan) : ?>
                    <tr>
                        <td><?= $key ?></td>
                        <?php foreach ($data['bulan'] as $bulan) : ?>
                            <?php if (in_array($bulan[1], $laporan)) : ?>
                                <td>
                                    <i class="fas fa-check-circle text-success"></i>
                                </td>
                            <?php else : ?>
                                <td>
                                    <i class="fas fa-times-circle text-danger"></i>
                                </td>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>