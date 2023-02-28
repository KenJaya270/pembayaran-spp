<?php
class transaksi_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function insertPembayaran()
    {
        $query = "CALL insertPembayaran(:id_petugas, :nisn, :tgl_bayar, :bulan_bayar, :tahun_bayar, :id_spp)";
        foreach ($_POST['bulan_bayar'] as $bulan) {
            $this->db->query($query);
            $this->db->bind('id_petugas', $_POST['id_petugas']);
            $this->db->bind('nisn', $_POST['nisn']);
            $this->db->bind('tgl_bayar', $_POST['tgl_bayar']);
            $this->db->bind('bulan_bayar', $bulan);
            $this->db->bind('tahun_bayar', $_POST['tahun_bayar']);
            $this->db->bind('id_spp', $_POST['id_spp']);
            $this->db->execute();
        }
        return $this->db->rowCount1();
    }

    public function getBulanBayar($nisn)
    {
        $query = "CALL getBulanBayar(:nisn)";
        $this->db->query($query);
        $this->db->bind("nisn", $nisn);
        return $this->db->setResults();
    }

    public function getHistorySiswa($nisn)
    {
        $query = "CALL getHistoryByNISN(:nisn)";
        $this->db->query($query);
        $this->db->bind('nisn', $nisn);
        return $this->db->setResults();
    }

    public function getAllHistorySortBy()
    {
        $query = "SELECT * FROM pembayaran ORDER BY bulan_bayar, tahun_bayar ASC";
        $this->db->query($query);
        return $this->db->setResults();
    }

    public function getAllHistory()
    {
        $query = "SELECT nisn, bulan_bayar FROM pembayaran";
        $this->db->query($query);
        return $this->db->setResults();
    }

    public function getBulanBayarSortByNISN()
    {
        $query = "SELECT nisn, bulan_bayar FROM pembayaran ORDER BY nisn";
        $this->db->query($query);
        return $this->db->setResults();
    }
}
