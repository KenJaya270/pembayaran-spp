<?php

class petugas_model
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPetugas()
    {
        $query = "CALL getPetugas(:username, :password)";
        $this->db->query($query);
        $this->db->bind('username', $_POST['username']);
        $this->db->bind('password', $_POST['password']);
        return $this->db->single();
    }

    public function getAllPetugas()
    {
        $query = "CALL getAllPetugas()";
        $this->db->query($query);
        return $this->db->setResults();
    }

    public function tambahPetugas()
    {
        $query = "CALL insertPetugas(:username, :password, :nama_petugas, :level)";
        $this->db->query($query);
        $this->db->bind('username', $_POST['username']);
        $this->db->bind('password', $_POST['password']);
        $this->db->bind('nama_petugas', $_POST['nama_petugas']);
        $this->db->bind('level', $_POST['level']);
        return $this->db->rowCount();
    }

    public function getPetugasById($id)
    {
        $query = "CALL getPetugasById(:id)";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function editPetugas()
    {
        $query = "CALL updatePetugas(:id_petugas, :username, :password, :nama_petugas, :level)";
        $this->db->query($query);
        $this->db->bind('id_petugas', $_POST['id_petugas']);
        $this->db->bind('username', $_POST['username']);
        $this->db->bind('password', $_POST['password']);
        $this->db->bind('nama_petugas', $_POST['nama_petugas']);
        $this->db->bind('level', $_POST['level']);
        return $this->db->rowCount();
    }

    public function hapusPetugas($id)
    {
        $query = "CALL hapusPetugas(:id)";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->rowCount();
    }
}
