<?php
class kelas_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllKelas()
    {
        $query = "CALL getAllKelas()";
        $this->db->query($query);
        return $this->db->setResults();
    }

    public function tambahKelas()
    {
        $query = "CALL insertKelas(:nama_kelas, :kompetensi_keahlian)";
        $this->db->query($query);
        $this->db->bind('nama_kelas', $_POST['nama_kelas']);
        $this->db->bind('kompetensi_keahlian', $_POST['kompetensi_keahlian']);
        return $this->db->rowCount();
    }

    public function updateKelas()
    {
        $query = "CALL updateKelas(:id_kelas, :nama_kelas, :kompetensi_keahlian)";
        $this->db->query($query);
        $this->db->bind('id_kelas', $_POST['id_kelas']);
        $this->db->bind('nama_kelas', $_POST['nama_kelas']);
        $this->db->bind('kompetensi_keahlian', $_POST['kompetensi_keahlian']);
        return $this->db->rowCount();
    }

    public function hapusKelas($id)
    {
        $query = "CALL hapusKelas(:id_kelas)";
        $this->db->query($query);
        $this->db->bind("id_kelas", $id);
        return $this->db->rowCount();
    }
}
