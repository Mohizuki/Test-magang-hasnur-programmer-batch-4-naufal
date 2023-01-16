<?php
    // Lampirkan db dan User
    require_once "db.php";
    require_once "User.php";

    // Buat object user
    $user = new User($db);

    // Jika sudah login
    if($user->isLoggedIn()){
        header("location: index.php"); //Redirect ke index
    }

    //Jika ada data dikirim
    if(isset($_POST['kirim'])){
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Registrasi user baru
        if($user->register($nama, $username, $password)){
            // Jika berhasil set variable success ke true
            $success = true;
        }else{
            // Jika gagal, ambil pesan error
            $error = $user->getLastError();
        }
    }
 ?>


<!DOCTYPE html>
<html>
    <head>
    <style>
	.header{
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #dedede;
            padding: 10px 60px;
        }
	</style>
	<title>Register Admin Mahasiswa</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/css/font-awesome.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/icon-font.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->

    </head>
    <body>
    <div class="limiter">
		<div class="container-login100" style="background-image: url('images/wpmahasiswa.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Admin Register
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" method="post">
                        <?php if (isset($error)): ?>
                        <div class="error">
                            <?php echo $error ?>
                        </div>
                        <?php endif; ?>
                        <?php if (isset($success)): ?>
                            <div class="success">
                                <p style="text-align:center; padding-top:10px; color:gray;"> Berhasil Mendaftar silahkan login <a href="login.php" style="text-align:center; padding-top:10px; color:red;">masuk</a></p>
                            </div>
                        <?php endif; ?>
                    <div class="wrap-input100 validate-input" data-validate = "Enter your name">
						<input class="input100" type="text" placeholder="nama" name="nama" required/>
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>   
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="input" placeholder="username" name="username" required/>
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" placeholder="password" name="password" required/>
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn" type="submit" name="kirim">Create</button>
					</div>
					<div>
                        <p style="text-align:center; padding-top:10px; color:gray;">Already registered? <a href="login.php" style="text-align:center; padding-top:10px; color:red;">Sign In</a></p>
					</div>
				</form>
			</div>
		</div>
    </div>
        <!-- <div class="login-page">
          <div class="form">
              <form class="register-form" method="post">
              <?php if (isset($error)): ?>
                  <div class="error">
                      <?php echo $error ?>
                  </div>
              <?php endif; ?>
              <?php if (isset($success)): ?>
                  <div class="success">
                      Berhasil mendaftar. Silakan <a href="login.php">masuk</a>
                  </div>
              <?php endif; ?>
			  <h1>Register...</h1>
              <hr>
               <input type="text" name="nama" placeholder="nama" required/><br>
               <input type="input" name="username" placeholder="username" required/><br>
               <input type="password" name="password" placeholder="password" required/><br>
               <button type="submit" name="kirim">create</button>
               <p class="message">Already registered? <a href="login.php">Sign In</a></p>
             </form>
          </div>
        </div> -->
    </body>
</html>
