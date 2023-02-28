<?php
class spp_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllSpp()
    {
        $query = "CALL getAllSpp()";
        $this->db->query($query);
        return $this->db->setResults();
    }

    public function tambahSpp()
    {
        $query = "CALL insertSpp(:tahun, :nominal)";
        $this->db->query($query);
        $this->db->bind('tahun', $_POST['tahun']);
        $this->db->bind('nominal', $_POST['nominal']);
        return $this->db->rowCount();
    }

    public function editSpp()
    {
        $query = "CALL updateSpp(:id_spp, :tahun, :nominal)";
        $this->db->query($query);
        $this->db->bind('id_spp', $_POST['id_spp']);
        $this->db->bind('tahun', $_POST['tahun']);
        $this->db->bind('nominal', $_POST['nominal']);
        return $this->db->rowCount();
    }

    public function hapusSpp($id)
    {
        $query = "CALL hapusSpp(:id_spp)";
        $this->db->query($query);
        $this->db->bind('id_spp', $id);
        return $this->db->rowCount();
    }
}
