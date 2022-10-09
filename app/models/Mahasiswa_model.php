<?php

class Mahasiswa_model{

    private $table = 'mahasiswa2';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa(){

        $this->db->query('SELECT * FROM '. $this->table);
        return $this->db->resultSet();

        // $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa2');
        // $this->stmt->execute();
        // return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
 
    public function getMahasiswaById($id){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataMahasiswa($data){
        $query = "INSERT INTO mahasiswa2
                        VALUES
                        ('', :nama, :nim, :email, :jurusan)";
        
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

        // private $mhs = [
    //     [
    //         "nama" => "Supidan Zam Zam",
    //         "nim" => "181011400551",
    //         "email" => "s@gmail.com",
    //         "jurusan" => "Teknik Informatika"
    //     ],
    //     [
    //         "nama" => "Dicky Chandra",
    //         "nim" => "181011400409",
    //         "email" => "kiw@gmail.com",
    //         "jurusan" => "Teknik Informatika"
    //     ],
    //     [
    //         "nama" => "Bayu",
    //         "nim" => "181011400550",
    //         "email" => "bayu1@gmail.com",
    //         "jurusan" => "Teknik Mesin"
    //     ]
    // ];
}