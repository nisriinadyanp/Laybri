<?php //buat objek lukisan + functionnya
require "koneksiMVC.php";
class m_admin {
    private $judul_lukisan;
    private $pelukis;
    private $deskripsi;
    private $foto_lukisan;
    private $fileName;
    private $fileDestination;
    private $id;
    public $connect;
   
    public function __construct(){
        $this->connect = new koneksiMVC();
    }

    public function execute($query){
        return mysqli_query($this->connect->getKoneksi(), $query);
    }

    public function selectAll(){
        $query = "select * from lukisan";
        return $this->execute($query);
    }

    public function selectLukisan($judul){
        $query = "select * from lukisan where judul_lukisan='$judul'";
        return $this->execute($query);
    }

    public function tambahLukisan($judul, $pelukis, $desk, $fileName, $fileDestination){
        $query = "insert into lukisan(judul_lukisan, pelukis, deskripsi, nama_file, direktori_file) values ('$judul', '$pelukis', '$desk', '$fileName', '$fileDestination')";
        return $this->execute($query);
    }

    public function editLukisan($id, $judul, $pelukis, $desk, $fileName, $fileDestination){
        $query = "update lukisan set judul_lukisan = '$judul', pelukis='$pelukis', deskripsi='$desk', nama_file='$fileName', direktori_file='$fileDestination' where id='$id'";
        return $this->execute($query);
    }

    public function deleteProgram($id){
        $query = "delete from lukisan where id='$id'";
        return $this->execute($query);
    }

    public function sqlData($data){
        return mysqli_fetch_array($data);
    }

    public function __destruct(){
        
    }
}