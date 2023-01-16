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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .header{
            display: flex;
            justify-content: space-between;
            background-color: #ABBEED;
            padding: 0 60px;
        }
        .container{
            height: 100%;
            display: flex;
            width: 80%;
            margin: auto;
	        text-align: center;
	        padding-top: 50px;

        }
        .row{
            height: 20%;
            align-items: center;
            justify-content: center;
	        text-align: center; 
        }
        .card{
            flex-basis: 40%;
            margin-right: 10px;
	        border-radius: 10px;
	        margin-bottom: 30px;
	        position: relative;
	        overflow: hidden;
            height:550px; 
            width:650px;
        }
        .card a{
            color: black;
	        text-decoration: none;
	        font-size: 13px;
	        font-family: "playfair-display";
        }
        .card img{
            width: 100%;
            height: 100%;
            height: auto;
            display: block;
        }
        .welcomenote{
            text-align: center;
            opacity: 1;
            position: absolute;
            z-index: 1;
            top: 20%;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body style="background-color: #ABBEED;">
<section>
    <div class="header">
        <h1 style="color: white; text-shadow:2px 2px black;">Website Sistem Pengelola Data Mahasiswa</h1>
        <form action="" method="POST">
        <button class="login100-form-btn" name="Signout">LOG OUT</button>
        </form>
    </div>

</section>
<div class="wpbg">
<div class="welcomenote">
    <h1 style="color:white; text-shadow:2px 2px black;">Welcome to Admin Panel -<font style="color:red"> <?php echo $currentUser['nama']?></font> </h1>
</div>
<section class="container">
        <div class="row">    
            <div class="card" style="border-radius: 50px;">
                    <a href="daftarmaha.php">
                    <img src="https://png.pngtree.com/png-vector/20190214/ourmid/pngtree-people-icon-business-corporate-team-working-together-social-network-png-image_448334.jpg" class="rounded" alt="...">
                    <h1 style="position: center;">Data Mahasiswa</h1>
                    </a>
                </div>
                <div class="card" style="border-radius: 50px;">
                    <a href="detailmaha.php">
                    <img src="https://png.pngtree.com/template/20190316/ourmid/pngtree-books-logo-image_79143.jpg" class="rounded" alt="...">
                    <h1 style="position: center;">Detail Mahasiswa</h1>
                    </a>
                </div>
                <div class="card" style="border-radius: 50px;">
                    <a href="Search.php">
                    <img src="https://pixsector.com/cache/e7836840/av6584c34aabb39f00a10.png" class="rounded" alt="...">
                    <h1 style="position: center;">Search</h1>
                    </a>
                </div>
                <div class="card" style="border-radius: 50px;">
                    <a href="About.php">
                    <img src="https://thumbs.dreamstime.com/b/hand-giving-open-book-filled-outline-icon-hand-giving-open-book-filled-outline-icon-line-vector-sign-linear-colorful-pictogram-121375538.jpg" class="rounded" alt="...">
                    <h1 style="position: center;">About</h1>
                    </a>
                </div>
            </div>
    </div>
</section>
</div>
<?php
    if(isset($_POST['Signout'])){
        session_destroy();
        header('location: login.php');
    }

?>
</body>
</html>