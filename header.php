<?php
include "includes/config.php";
session_start();
if (!isset($_SESSION['nama_lengkap'])) {
	echo "<script>location.href='login.php'</script>";
}
$config = new Config();
$db = $config->getConnection();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Weight Product</title>
	<link rel="icon" href="images/th.jpeg" type="image/x-icon">

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/dataTables.bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="css/jquery.toastmessage.css" rel="stylesheet" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>

	<nav class="navbar navbar-default navbar-static-top bg-white"
		style="background-color:#d9534f; border-color:steelblue">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
					data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="index.php">HOME</a></li>
					<li><a href="nilai.php">NILAI</a></li>
					<li><a href="kriteria.php">KRITERIA</a></li>
					<li><a href="bobot.php">BOBOT</a></li>
					<li><a href="alternatif.php">ALTERNATIF</a></li>
					<li><a href="rangking.php">RANGKING</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
							aria-expanded="false" style="background-color:#d9534f; border-color:#d9534f">Laporan <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="laporan.php">Laporan Perankingan</a></li>
							<li><a onclick="window.open('includes/LaporanNilai.php', '_blank')">Laporan Nilai</a></li>
							<li><a onclick="window.open('includes/LaporanAlternatif.php', '_blank')">Laporan
									Alternatif</a></li>
							<li><a onclick="window.open('includes/LaporanKriteria.php', '_blank')">Laporan Kriteria</a>
							</li>
						</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="profil.php"><?php echo $_SESSION['nama_lengkap'] ?></a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
							aria-expanded="false" style="background-color:#d9534f; border-color:#d9534f"><span class="glyphicon glyphicon-cog"></span> <span
								class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="profil.php">Profil</a></li>
							<li><a href="user.php">Manejer Pengguna</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>

	<div class="container">