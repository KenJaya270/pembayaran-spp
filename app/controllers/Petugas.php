<?php
class Petugas extends Controller
{
    public function index()
    {
        Middleware::auth();
        $data['getAllSiswa'] = $this->model('siswa_model')->getAllSiswa();
        $this->view('templates/header');
        $this->view('templates/navbar');
        $this->view('petugas/index', $data);
        $this->view('templates/footer');
    }

    public function transaksi($nisn)
    {
        Middleware::auth();
        $data['siswa'] = $this->model('siswa_model')->getSiswaByNISN($nisn);
        $data['bulan'] = [
            "Juli" => [
                "Juli",
                7
            ],
            "Agustus" => [
                "Agustus",
                8
            ],
            "September" => [
                "September",
                9
            ],
            "Oktober" => [
                "Oktober",
                10
            ],
            "November" => [
                "November",
                11
            ],
            "Desember" => [
                'Desember',
                12
            ],
            "Januari" => [
                "Januari",
                1
            ],
            "Februari" => [
                "Februari",
                2
            ],
            "Maret" => [
                "Maret",
                3
            ],
            "April" => [
                "April",
                4
            ],
            "Mei" => [
                "Mei",
                5
            ],
            "Juni" => [
                "Juni",
                6
            ]
        ];
        $data['bulanBayar'] = $this->model('transaksi_model')->getBulanBayar($nisn);
        $bulan_dibayar = [];
        foreach ($data['bulanBayar'] as $bulan) {
            array_push($bulan_dibayar, $bulan);
        }
        $data['bulanDibayar'] = $bulan_dibayar;
        $this->view('templates/header');
        $this->view('templates/navbar');
        $this->view('petugas/transaksi', $data);
        $this->view('templates/footer');
    }

    public function entryPembayaran()
    {
        if ($this->model('transaksi_model')->insertPembayaran() > 0) {
            Flasher::setFlash('success', 'Transaksi Berhasil Dilakukan');
            Redirect::to('petugas');
        } else {
            Flasher::setFlash('danger', 'Transaksi Gagal Dilakukan');
            Redirect::to('petugas');
        }
    }

    public function daftarSiswa()
    {
        $data['getAllSiswa'] = $this->model('siswa_model')->getAllSiswa();
        $this->view('templates/header');
        $this->view('templates/navbar');
        $this->view('petugas/daftarSiswa', $data);
        $this->view('templates/footer');
    }

    public function lihatSiswa($nisn)
    {
        $data['profilSiswa'] = $this->model('siswa_model')->getSiswaByNISN($nisn);
        $data['riwayatPembayaran'] = $this->model('transaksi_model')->getHistorySiswa($nisn);
        $this->view('templates/header');
        $this->view('templates/navbar');
        $this->view('petugas/lihatSiswa', $data);
        $this->view('templates/footer');
    }

    public function generate()
    {
        $data['bulan'] = [
            "Juli" => [
                "Juli",
                7
            ],
            "Agustus" => [
                "Agustus",
                8
            ],
            "September" => [
                "September",
                9
            ],
            "Oktober" => [
                "Oktober",
                10
            ],
            "November" => [
                "November",
                11
            ],
            "Desember" => [
                'Desember',
                12
            ],
            "Januari" => [
                "Januari",
                1
            ],
            "Februari" => [
                "Februari",
                2
            ],
            "Maret" => [
                "Maret",
                3
            ],
            "April" => [
                "April",
                4
            ],
            "Mei" => [
                "Mei",
                5
            ],
            "Juni" => [
                "Juni",
                6
            ]
        ];
        $data['dataLaporan'] = [];
        $data['riwayatPembayaran'] = $this->model('transaksi_model')->getAllHistory();
        $data['bulanSudahBayar'] = $this->model('transaksi_model')->getBulanBayarSortByNISN();
        foreach ($data['riwayatPembayaran'] as $history) {
            $data['dataLaporan'][$history['nisn']][] = $history['bulan_bayar'];
        }
        $this->view('templates/header');
        $this->view('templates/navbar');
        $this->view('petugas/generate', $data);
        $this->view('templates/footer');
    }
}
