<?php //ini isinya function
include_once("m_admin.php");
session_start();

class c_MeJatim {
    public $model;

    public function __construct(){
        $this->model = new m_admin();
    }

    function invoke() {
        $data = $this->model->selectAll();
        include "v_HalamanPublik.php";
    }

    function login() {
        if ($_POST['username'] == 'admin' && $_POST['password'] == 'rahasia') {
            $_SESSION['username'] = 'admin';
            $_SESSION['role'] = 'admin';     
            $data = $this->model->selectAll();
            include "v_HalamanAdmin.php";
        } else {
            $_SESSION['error_message'] = "Username atau password salah! Coba isikan kembali dengan benar.";
            header('Location:v_HalamanLogin.php');
            exit();
        }
    }

    function add_lukisan() {
        $judul = $_POST ['judulLukisan'];
        $pelukis = $_POST['namaPelukis'];
        $deskripsi = $_POST['deskripsiKarya'];
        $foto = $_POST['addGambar'];

        if(isset($_FILES['addGambar'])) {
            $fileName = $_FILES['addGambar'] ['name'];
            $fileTmpName = $_FILES['addGambar']['tmp_name'];

            $fileDestination = 'uploads/' . uniqid('', true) . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
            move_uploaded_file($fileTmpName, $fileDestination);
        }

        $insert = $this->model->tambahLukisan($judul, $pelukis, $deskripsi, $fileName, $fileDestination);
        header("location:v_HalamanAdmin.php"); 
    }

    function edit_lukisan() {
        $id = $_POST ['id'];
        $judul = $_POST ['judulLukisan'];
        $pelukis = $_POST['namaPelukis'];
        $deskripsi = $_POST['deskripsiKarya'];
        $foto = $_POST['addGambar'];

        if(isset($_FILES['addGambar'])) {
            $fileName = $_FILES['addGambar'] ['name'];
            $fileTmpName = $_FILES['addGambar']['tmp_name'];

            $fileDestination = 'uploads/' . uniqid('', true) . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
            move_uploaded_file($fileTmpName, $fileDestination);
        }

        $update = $this->model->editLukisan($id, $judul, $pelukis, $deskripsi, $fileName, $fileDestination);
        header("location:v_HalamanAdmin.php"); 
    }

    function tampilkan_lukisan() {
        $result = $this->model->selectAll();
        header("location:v_HalamanPublik.php"); 
    }

    function hapus_lukisan() {
        $id = $_POST ['id'];
        $result = $this->model->deleteProgram($id);
        header("location:v_HalamanAdmin.php"); 
    }
}
?>