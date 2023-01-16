<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .gambar{
            width: 100%;  
            min-height: 100vh;
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            position: relative;
        }

    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>401 Unauthorized </title>
    <link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>


<div class="gambar" style="background-image: url('images/errorimg.png');">

<?php
echo"<script>alert('Silahkan login terlebih dahulu')</script>";
header("refresh: 2; url=login.php");

?>
</body>
</html>