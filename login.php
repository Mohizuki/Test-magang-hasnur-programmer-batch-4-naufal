<?php
    // Lampirkan db dan User
    require_once "db.php";
    require_once "User.php";

    //Buat object user
    $user = new User($db);

    //Jika sudah login
    if($user->isLoggedIn()){
        header("location: error.php"); //redirect ke index
    }

    //jika ada data yg dikirim
    if(isset($_POST['kirim'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Proses login user
        if($user->login($username, $password)){
            header("location: index.php");
        }else{
            // Jika login gagal, ambil pesan error
            $error = $user->getLastError();
        }
    }
 ?>


<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
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
	<title>Login Data Mahasiswa</title>
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
					Account Login
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" method="post">
					<?php if (isset($error)): ?>
						<div class="error">
							<?php echo $error ?>
						</div>
					<?php endif; ?>
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="input" placeholder="username" name="username" required/>
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" placeholder="password" name="password" required/>
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn" type="submit" name="kirim">Login</button>
					</div>
					<div>
                        <p style="text-align:center; padding-top:10px; color:gray;">Don't have account? <a href="register.php" style="text-align:center; padding-top:10px; color:red;">Register Here</a></p>
					</div>
				</form>
			</div>
		</div>
	    <!-- </div>
            <form class="login-form" method="post">
              <h1>Sign In...</h1>
              <hr>
              <input type="input" name="username" placeholder="username" required/><br>
              <input type="password" name="password" placeholder="password" required/><br>
              <button type="submit" name="kirim">login</button>
              <p class="message">Don't have account? <a href="register.php">Register Here</a></p>
            </form>            
          </div> -->
        </div>
    </body>
</html>
