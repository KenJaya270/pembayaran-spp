<?php
class Siswa extends Controller
{
    public function index()
    {
        Middleware::auth();
        $data['riwayatPembayaran'] = $this->model('transaksi_model')->getHistorySiswa($_SESSION['spp']['nisn']);
        $this->view('templates/header');
        $this->view('templates/navbar');
        $this->view('siswa/index', $data);
        $this->view('templates/footer');
    }
}
