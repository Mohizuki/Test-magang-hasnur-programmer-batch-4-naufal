<!doctype html>
<html>
<head>
	<meta name="viewport" content="with=device-width, initial-scale=1.0">
	<title>Crunchii Novel</title>
	<link rel="shortcut icon" type="image/icon" href="images/crunchiitopicon.ico" />
	<link rel="stylesheet" href="about.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>	
<section class="bawahcon">
    <form action="" method="POST">
    <button class="backbutton" name="backhome">Back</button>
    </form>
	<h1>Contact</h1>
	<p>I'm trying to build this website for Hasnur's test purposes, idk how ugly it is but im trying to build it as much as i can while im still on fight w final exam at STIKI Malang, these are my contacts</p>
	<div class="row">
		<div class="bawahcon2-col">
			<img class="con1" src="contact1.png" alt="">
			<div class="layer2">
			</div>
		</div>
	</div>
	<h1>Social Media</h1>
	<div class="sosmed">
		<div class="sosiconrow">
			<div class="sosicon">
				<a href="https://www.instagram.com/crunchill/">
				<i class="fa fa-github"> Mohizuki</i>
				</a>
			</div>
			<div class="sosicon">
				<a href="https://www.instagram.com/crunchill/">
				<i class="fa fa-instagram"> Crunchill</i>
				</a>
			</div>
			<div class="sosicon">
				<a href="https://www.instagram.com/crunchill/">
				<i class="fa fa-steam"> Mohizuki</i>
				</a>
			</div>
		</div>
	</div>
</section>	

<!----- footer ----->	
	
<section class="footer">
	<p>Made with <i class="fa fa-heart-o"></i> tears ;-;</p>
</section>
</body>
<?php
    if(isset($_POST['backhome'])){
        header('location: index.php');
    }
?>
</html>