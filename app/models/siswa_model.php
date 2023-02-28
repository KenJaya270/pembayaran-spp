<?php

class siswa_model
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getSiswa()
    {
        $query = "CALL getSiswa(:nis, :nisn)";
        $this->db->query($query);
        $this->db->bind('nis', $_POST['username']);
        $this->db->bind('nisn', $_POST['password']);
        return $this->db->single();
    }

    public function getAllSiswa()
    {
        $query = "SELECT * FROM infosiswa";
        $this->db->query($query);
        return $this->db->setResults();
    }

    public function getSiswaByNISN($nisn)
    {
        $query = "CALL getSiswaByNISN(:nisn)";
        $this->db->query($query);
        $this->db->bind('nisn', $nisn);
        return $this->db->setResults();
    }

    public function tambahSiswa()
    {
        $query = "CALL insertSiswa(:nisn, :nis, :nama, :id_kelas, :alamat, :no_telp, :id_spp)";
        $this->db->query($query);
        $this->db->bind('nisn', $_POST['nisn']);
        $this->db->bind('nis', $_POST['nis']);
        $this->db->bind('nama', $_POST['nama']);
        $this->db->bind('id_kelas', $_POST['id_kelas']);
        $this->db->bind('alamat', $_POST['alamat']);
        $this->db->bind('no_telp', $_POST['no_telp']);
        $this->db->bind('id_spp', $_POST['id_spp']);
        return $this->db->rowCount();
    }

    public function updateSiswa()
    {
        $query = "CALL updateSiswa(:nisn, :nis, :nama, :id_kelas, :alamat, :no_telp, :id_spp)";
        $this->db->query($query);
        $this->db->bind('nisn', $_POST['nisn']);
        $this->db->bind('nis', $_POST['nis']);
        $this->db->bind('nama', $_POST['nama']);
        $this->db->bind('id_kelas', $_POST['id_kelas']);
        $this->db->bind('alamat', $_POST['alamat']);
        $this->db->bind('no_telp', $_POST['no_telp']);
        $this->db->bind('id_spp', $_POST['id_spp']);
        return $this->db->rowCount();
    }

    public function hapusSiswa($nisn)
    {
        $query = "CALL hapusSiswa(:nisn)";
        $this->db->query($query);
        $this->db->bind('nisn', $nisn);
        return $this->db->rowCount();
    }
}
