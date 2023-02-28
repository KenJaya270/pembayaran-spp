<?php
class Admin extends Controller
{
    //Entry
    public function index()
    {
        Middleware::auth();
        $data['getAllSiswa'] = $this->model('siswa_model')->getAllSiswa();
        $data['infoKelas'] = $this->model('kelas_model')->getAllKelas();
        $data['dataSPP'] = $this->model('spp_model')->getAllSpp();
        $this->view('templates/header');
        $this->view('templates/navbar');
        $this->view('admin/index', $data);
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
        $this->view('admin/transaksi', $data);
        $this->view('templates/footer');
    }

    public function entryPembayaran()
    {
        if ($this->model('transaksi_model')->insertPembayaran()) {
            Flasher::setFlash('success', 'Transaksi Berhasil Dilakukan');
            Redirect::to('admin');
        } else {
            Flasher::setFlash('danger', 'Transaksi Gagal Dilakukan');
            Redirect::to('admin');
        }
        // var_dump($_POST);
    }

    //CRUD SISWA
    public function daftarSiswa()
    {
        Middleware::auth();
        $data['getAllSiswa'] = $this->model('siswa_model')->getAllSiswa();
        $data['infoKelas'] = $this->model('kelas_model')->getAllKelas();
        $data['dataSPP'] = $this->model('spp_model')->getAllSpp();
        $this->view('templates/header');
        $this->view('templates/navbar');
        $this->view('admin/daftarSiswa', $data);
        $this->view('templates/footer');
    }

    public function lihatSiswa($nisn)
    {
        Middleware::auth();
        $data['profilSiswa'] = $this->model('siswa_model')->getSiswaByNISN($nisn);
        $data['infoSpp'] = $this->model('spp_model')->getAllSpp();
        $data['infoKelas'] = $this->model('kelas_model')->getAllKelas();
        $data['riwayatPembayaran'] = $this->model('transaksi_model')->getHistorySiswa($nisn);
        $this->view('templates/header');
        $this->view('templates/navbar');
        $this->view('admin/lihatSiswa', $data);
        $this->view('templates/footer');
    }

    public function tambahSiswa()
    {
        if ($this->model('siswa_model')->tambahSiswa() > 0) {
            Flasher::setFlash('success', 'Siswa Berhasil Ditambahkan');
            Redirect::to('admin/daftarSiswa');
        } else {
            Flasher::setFlash('success', 'Siswa Gagal Ditambahkan');
            Redirect::to('admin/daftarSiswa');
        }
    }

    public function editSiswa()
    {
        if ($this->model('siswa_model')->updateSiswa() > 0) {
            Flasher::setFlash('success', 'Siswa Berhasil Diubah');
            Redirect::to('admin/daftarSiswa');
        } else {
            Flasher::setFlash('danger', 'Siswa Gagal Diubah');
            Redirect::to('admin/daftarSiswa');
        }
    }

    public function hapusSiswa($nisn)
    {
        if ($this->model('siswa_model')->hapusSiswa($nisn)) {
            Flasher::setFlash('success', 'Siswa Berhasil Dihapus');
            Redirect::to('admin/daftarSiswa');
        } else {
            Flasher::setFlash('danger', 'Siswa Gagal Dihapus');
            Redirect::to('admin/daftarSiswa');
        }
    }

    //CRUD Petugas
    public function daftarPetugas()
    {
        Middleware::auth();
        $data['getAllPetugas'] = $this->model('petugas_model')->getAllPetugas();
        $this->view('templates/header');
        $this->view('templates/navbar');
        $this->view('admin/daftarPetugas', $data);
        $this->view('templates/footer');
    }

    public function lihatPetugas($id)
    {
        Middleware::auth();
        $data['petugas'] = $this->model('petugas_model')->getPetugasById($id);
        $this->view('templates/header');
        $this->view('templates/navbar');
        $this->view('admin/lihatPetugas', $data);
        $this->view('templates/footer');
    }

    public function tambahPetugas()
    {
        if ($this->model('petugas_model')->tambahPetugas() > 0) {
            Flasher::setFlash('success', 'Petugas Berhasil Ditambahkan');
            Redirect::to('admin/daftarPetugas');
        } else {
            Flasher::setFlash('danger', 'Petugas Gagal Ditambahkan');
            Redirect::to('admin/daftarPetugas');
        }
    }

    public function ubahPetugas()
    {
        if ($this->model('petugas_model')->editPetugas() > 0) {
            Flasher::setFlash('success', 'Petugas Berhasil Diedit');
            Redirect::to('admin/daftarPetugas');
        } else {
            Flasher::setFlash('danger', 'Petugas Gagal Diedit');
            Redirect::to('admin/daftarPetugas');
        }
    }

    public function hapusPetugas($id)
    {
        if ($this->model('petugas_model')->hapusPetugas($id) > 0) {
            Flasher::setFlash('success', 'Petugas Berhasil Dihapus');
            Redirect::to('admin/daftarPetugas');
        } else {
            Flasher::setFlash('danger', 'Petugas Gagal Dihapus');
            Redirect::to('admin/daftarPetugas');
        }
    }

    //CRUD Kelas
    public function daftarKelas()
    {
        Middleware::auth();
        $data['getAllKelas'] = $this->model('kelas_model')->getAllKelas();
        $this->view('templates/header');
        $this->view('templates/navbar');
        $this->view('admin/daftarKelas', $data);
        $this->view('templates/footer');
    }

    public function tambahKelas()
    {
        if ($this->model('kelas_model')->tambahKelas() > 0) {
            Flasher::setFlash('success', 'Kelas Berhasil Ditambahkan');
            Redirect::to('admin/daftarKelas');
        } else {
            Flasher::setFlash('danger', 'Kelas Gagal Ditambahkan');
            Redirect::to('admin/daftarKelas');
        }
    }

    public function editKelas()
    {
        if ($this->model('kelas_model')->updateKelas() > 0) {
            Flasher::setFlash('success', 'Kelas Berhasil Diubah');
            Redirect::to('admin/daftarKelas');
        } else {
            Flasher::setFlash('danger', 'Kelas Gagal Diubah');
            Redirect::to('admin/daftarKelas');
        }
    }

    public function hapusKelas($id)
    {
        if ($this->model('kelas_model')->hapusKelas($id) > 0) {
            Flasher::setFlash('success', 'Kelas Berhasil Dihapus');
            Redirect::to('admin/daftarKelas');
        } else {
            Flasher::setFlash('danger', 'Kelas Gagal Dihapus');
            Redirect::to('admin/daftarKelas');
        }
    }

    //CRUD SPP
    public function daftarSpp()
    {
        Middleware::auth();
        $data['getAllSpp'] = $this->model('spp_model')->getAllSpp();
        $this->view('templates/header');
        $this->view('templates/navbar');
        $this->view('admin/daftarSpp', $data);
        $this->view('templates/footer');
    }

    public function tambahSpp()
    {
        if ($this->model('spp_model')->tambahSpp() > 0) {
            Flasher::setFlash('success', 'SPP Berhasil Ditambahkan');
            Redirect::to('admin/daftarSpp');
        } else {
            Flasher::setFlash('danger', 'SPP Gagal Ditambahkan');
            Redirect::to('admin/daftarSpp');
        }
    }

    public function editSpp()
    {
        if ($this->model('spp_model')->editSpp() > 0) {
            Flasher::setFlash('success', 'SPP Berhasil Diedit');
            Redirect::to('admin/daftarSpp');
        } else {
            Flasher::setFlash('success', 'SPP Gagal Diedit');
            Redirect::to('admin/daftarSpp');
        }
    }

    public function hapusSpp($id)
    {
        if ($this->model('spp_model')->hapusSpp($id)) {
            Flasher::setFlash('success', 'SPP Berhasil Dihapus');
            Redirect::to('admin/daftarSpp');
        } else {
            Flasher::setFlash('success', 'SPP Gagal Dihapus');
            Redirect::to('admin/daftarSpp');
        }
    }

    //Cetak Laporan
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
        // var_dump($data['dataLaporan']);
        // die;
        $this->view('admin/generate', $data);
        $this->view('templates/footer');
    }
}
