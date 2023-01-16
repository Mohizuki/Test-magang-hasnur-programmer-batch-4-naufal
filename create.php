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



    
    if(isset($_POST['submit'])){
        $sql = "INSERT INTO datamaha(`nama`,`nim`, `prodi`, `semester`, `kelas`, `tahun_angkatan`) VALUES ('{$_POST['nama']}','{$_POST['nim']}','{$_POST['prodi']}','{$_POST['semester']}','{$_POST['kelas']}','{$_POST['tahun_angkatan']}')";
        $query = mysqli_query($koneksi, $sql);
        if($query==1){
            $sql1 = "INSERT INTO datadetail(`nim`, `alamat`) VALUES ('{$_POST['nim']}', '{$_POST['alamat']}')";
            $query = mysqli_query($koneksi, $sql1);
        }
        //bekas experiment qwq
        // // Simpan data yang di inputkan ke POST ke masing-masing variable
        // // dan convert semua tag HTML yang mungkin dimasukkan untuk mengindari XSS
        // $nama = htmlentities($_POST['nama']);
        // $prodi = htmlentities($_POST['prodi']);
        // $semester = htmlentities($_POST['semester']);
        // $kelas = htmlentities($_POST['kelas']);
        // $tahun_angkatan = htmlentities($_POST['tahun_angkatan']);
        // $nim = htmlentities($_POST['nim']);
        // $alamat = htmlentities($_POST['alamat']);

        // // Prepared statement untuk menambah data
        // $query = $db->prepare("SELECT max(idmaha) AS idmaha FROM datamaha LIMIT 1");
        // $query = $db->prepare("INSERT INTO `datamaha`(`idmaha`, `nama`, `prodi`, `semester`, `kelas`, `tahun_angkatan`)
        // VALUES (:idmaha,:nama,:prodi,:semester,:kelas,:tahun_angkatan)");
        // $query->bindParam(":idmaha", $idmaha);
        // $query->bindParam(":nama", $nama);
        // $query->bindParam(":prodi", $prodi);
        // $query->bindParam(":semester", $semester);
        // $query->bindParam(":kelas", $kelas);
        // $query->bindParam(":tahun_angkatan", $tahun_angkatan);
        // // Jalankan perintah SQL
        // // Alihkan ke index.php

        // $query = $db->prepare("INSERT INTO `datadetail`(`idmaha`, `nim`, `alamat`)
        // VALUES (:idmaha,:nim,:alamat)");
        // $query->bindParam(":idmaha", $idmaha);
        // $query->bindParam(":nim", $nim);
        // $query->bindParam(":alamat", $alamat);

        // $query->execute();
        if($query){
            echo"Data berhasil disimpan";
            header("location: detailmaha.php");
        }else{
            echo "Data gagal disimpan";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        .container{
            width: 45%;
            position: absolute;
        }
        .header{
            display: flex;
            justify-content: space-between;
            background-color: #ABBEED;
            padding: 0 60px;
            top: 0;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="simpan.css">
    <title>Data Mahasiswa Section</title>
    </head>
    <body>
    <section>
        <div class="header">
            <button class="backbutton" name="backhome" style="margin-bottom:10px;"><a href="index.php"><span style="color: #FFFFFF;text-decoration: none;">Back</span></a></button>
        </div>
    </section>
    <div class="welcome" style="text-align:center;">
            <h1>Penambahan Data</h1>        
            <a href="search.php"><button type="button">Pencarian Data</button></a>
            <hr />
    </div>
        <form method="post" style="margin-left:40%;">
            Nama:<br> <input required type="text" name="nama" placeholder="Nama" /> <br>
            Program Studi:<br> <input required type="text" name="prodi" placeholder="Program Studi" /> <br>
            Semester:<br> <input required type="text" name="semester" placeholder="Semester" /> <br>
            Kelas:<br> <input required type="text" name="kelas" placeholder="Kelas" /> <br>
            Tahun Angkatan:<br> <input required type="text" name="tahun_angkatan" placeholder="Tahun Angkatan" /> <br>
            Nomor Induk Mahasiswa:<br> <input required type="text" name="nim" placeholder="Nomor Induk Mahasiswa" /> <br>
            Alamat :<br> <input required type="text" name="alamat" placeholder="Alamat" /> <br>
            <input type="submit" name="submit" />
        </form>
    </body>
</html>
