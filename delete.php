<?php
    require_once "db.php";
    require_once "User.php";
    
    // Buat object user
    $user = new User($db);
    // Jika belum login
    if(!$user->isLoggedIn()){
        header("location: error.php"); //Redirect ke halaman login
    }
    // Ambil data user saat ini
    $currentUser = $user->getUser();
    
    //===============
    $query = $db->prepare("SELECT * FROM datadetail INNER JOIN datamaha ON datadetail.nim=datamaha.nim WHERE id = :id");
    $query->bindParam(":id", $_GET['id']);
    // Jalankan perintah sql
    $query->execute();
    if($query->rowCount() == 0){
        // Tidak ada hasil
        die("Error: ID Tidak Ditemukan");
    }else{
        // ID Ditemukan, Ambil data
        $data = $query->fetch();
    }


    if(isset($_GET['id'])){
        // Prepared statement untuk menghapus data
        $sql = ("DELETE FROM `datamaha` WHERE id = $_GET[id]");
        $query = mysqli_query($koneksi, $sql);
        if($query==1){
            $sql1 = $db->prepare("DELETE FROM `datadetail` WHERE datadetail.nim=datamaha.nim");
            $query = mysqli_query($koneksi, $sql1);
        }

        header("location: daftarmaha.php");
    }
?>
