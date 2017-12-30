<?php 
/*menyembunyikan laporan error di php*/
error_reporting(0);
// memulai session
session_start();
/*cek session login*/
$sesi=$_SESSION['loggedIn'];
if ($sesi=='false' || !$_SESSION['loggedIn']) {
	header("location: index.php");
}
if ($_GET['logout']=='logout') {
	// menghapus semua variabel session
	session_unset();

	// mengakhiri session
	session_destroy(); 
	header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP-Dashboard</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Selamat Datang di dashboard: <?php print $_SESSION['username']; ?></a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#dashboard">DASHBOARD</a></li>
					<li><a href="?logout=logout">LOGOUT</a></li>
				</ul>
			</div>
		</div>
	</nav>

	
</body>
</html>