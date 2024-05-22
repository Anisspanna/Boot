
<?php
require_once "../core/autoloading.php";
session_start();
if(isset($_SESSION['y3adi']) && isset($_SESSION['valide_token_donneur']))
{
	$stmt_verif_session=$connection->prepare("SELECT `vsidentite`, `nom_donneur_s`, `email_donneur_s`, `telephone_donneur_s`, `ville_donneur_s`, `valide_token_donneur`, `blastek` From `bnadms` WHERE `email_donneur_s`= ? LIMIT 1 ");
    $stmt_verif_session->bind_param("s", $_SESSION["y3adi"]);
    $stmt_verif_session->execute();
    $result = $stmt_verif_session->get_result();
	$row=$result->fetch_assoc();
	$id=$row['vsidentite'];
	$database_token=$row['valide_token_donneur'];
    $session_token=$_SESSION['valide_token_donneur'];
	if($database_token!==$session_token)
	{
		redirect('login.php');
	}else
	{
		if($row['blastek']==="h_bancsang_d")
		{

		

	


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
$(document).ready(function() {
function loadTable() {
$.ajax({
  url: 'get_demmande_sang.php',    
  type: 'GET',
  success: function(data) {
	$('#myTable tbody').html(data);
  }
});
}

loadTable();

setInterval(loadTable, 5000);          
});
</script>
    <title>home donneur</title>
</head>
<body>
	
<style>
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap');

* {
	font-family: 'Open Sans', sans-serif;
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

:root {
	--grey: #F1F0F6;
	--dark-grey: #8D8D8D;
	--light: #fff;
	--dark: #000;
	--green: #81D43A;
	--light-green: #E3FFCB;
	--blue: #1775F1;
	--light-blue: #D0E4FF;
	--dark-blue: #0C5FCD;
	--red: #FC3B56;
}

html {
	overflow-x: hidden;
}

body {
	background: var(--grey);
	overflow-x: hidden;
}

a {
	text-decoration: none;
}

li {
	list-style: none;
}







/* SIDEBAR */
#sidebar {
	position: fixed;
	max-width: 260px;
	width: 100%;
	background: var(--light);
	top: 0;
	left: 0;
	height: 100%;
	overflow-y: auto;
	scrollbar-width: none;
	transition: all .3s ease;
	z-index: 200;
}
#sidebar.hide {
	max-width: 60px;
}
#sidebar.hide:hover {
	max-width: 260px;
}
#sidebar::-webkit-scrollbar {
	display: none;
}
#sidebar .brand {
	font-size: 24px;
	display: flex;
	align-items: center;
	height: 64px;
	font-weight: 700;
	color: var(--blue);
	position: sticky;
	top: 0;
	left: 0;
	z-index: 100;
	background: var(--light);
	transition: all .3s ease;
	padding: 0 6px;
}
#sidebar .icon {
	min-width: 48px;
	display: flex;
	justify-content: center;
	align-items: center;
	margin-right: 6px;
}
#sidebar .icon-right {
	margin-left: auto;
	transition: all .3s ease;
}
#sidebar .side-menu {
	margin: 36px 0;
	padding: 0 20px;
	transition: all .3s ease;
}
#sidebar.hide .side-menu {
	padding: 0 6px;
}
#sidebar.hide:hover .side-menu {
	padding: 0 20px;
}
#sidebar .side-menu a {
	display: flex;
	align-items: center;
	font-size: 14px;
	color: var(--dark);
	padding: 12px 16px 12px 0;
	transition: all .3s ease;
	border-radius: 10px;
	margin: 4px 0;
	white-space: nowrap;
}
#sidebar .side-menu > li > a:hover {
	background: var(--grey);
}
#sidebar .side-menu > li > a.active .icon-right {
	transform: rotateZ(90deg);
}
#sidebar .side-menu > li > a.active,
#sidebar .side-menu > li > a.active:hover {
	background: var(--blue);
	color: var(--light);
}
#sidebar .divider {
	margin-top: 24px;
	font-size: 12px;
	text-transform: uppercase;
	font-weight: 700;
	color: var(--dark-grey);
	transition: all .3s ease;
	white-space: nowrap;
}
#sidebar.hide:hover .divider {
	text-align: left;
}
#sidebar.hide .divider {
	text-align: center;
}
#sidebar .side-dropdown {
	padding-left: 54px;
	max-height: 0;
	overflow-y: hidden;
	transition: all .15s ease;
}
#sidebar .side-dropdown.show {
	max-height: 1000px;
}
#sidebar .side-dropdown a:hover {
	color: var(--blue);
}
#sidebar .ads {
	width: 100%;
	padding: 20px;
}
#sidebar.hide .ads {
	display: none;
}
#sidebar.hide:hover .ads {
	display: block;
}
#sidebar .ads .wrapper {
	background: var(--grey);
	padding: 20px;
	border-radius: 10px;
}
#sidebar .btn-upgrade {
	font-size: 14px;
	display: flex;
	justify-content: center;
	align-items: center;
	padding: 12px 0;
	color: var(--light);
	background: var(--blue);
	transition: all .3s ease;
	border-radius: 5px;
	font-weight: 600;
	margin-bottom: 12px;
}
#sidebar .btn-upgrade:hover {
	background: var(--dark-blue);
}
#sidebar .ads .wrapper p {
	font-size: 12px;
	color: var(--dark-grey);
	text-align: center;
}
#sidebar .ads .wrapper p span {
	font-weight: 700;
}
/* SIDEBAR */





/* CONTENT */
#content {
	position: relative;
	width: calc(100% - 260px);
	left: 260px;
	transition: all .3s ease;
}
#sidebar.hide + #content {
	width: calc(100% - 60px);
	left: 60px;
}
/* NAVBAR */
nav {
	background: var(--light);
	height: 64px;
	padding: 0 20px;
	display: flex;
	align-items: center;
	grid-gap: 28px;
	position: sticky;
	top: 0;
	left: 0;
	z-index: 100;
}
nav .toggle-sidebar {
	font-size: 18px;
	cursor: pointer;
}
nav form {
	max-width: 400px;
	width: 100%;
	margin-right: auto;
}
nav .form-group {
	position: relative;
}
nav .form-group input {
	width: 100%;
	background: var(--grey);
	border-radius: 5px;
	border: none;
	outline: none;
	padding: 10px 36px 10px 16px;
	transition: all .3s ease;
}
nav .form-group input:focus {
	box-shadow: 0 0 0 1px var(--blue), 0 0 0 4px var(--light-blue);
}
nav .form-group .icon {
	position: absolute;
	top: 50%;
	transform: translateY(-50%);
	right: 16px;
	color: var(--dark-grey);
}
nav .nav-link {
	position: relative;
}
nav .nav-link .icon {
	font-size: 18px;
	color: var(--dark);
}
nav .nav-link .badge {
	position: absolute;
	top: -12px;
	right: -12px;
	width: 20px;
	height: 20px;
	border-radius: 50%;
	border: 2px solid var(--light);
	background: var(--red);
	display: flex;
	justify-content: center;
	align-items: center;
	color: var(--light);
	font-size: 10px;
	font-weight: 700;
}
nav .divider {
	width: 1px;
	background: var(--grey);
	height: 12px;
	display: block;
}
nav .profile {
	position: relative;
}
nav .profile img {
	width: 36px;
	height: 36px;
	border-radius: 50%;
	object-fit: cover;
	cursor: pointer;
}
nav .profile .profile-link {
	position: absolute;
	top: calc(100% + 10px);
	right: 0;
	background: var(--light);
	padding: 10px 0;
	box-shadow: 4px 4px 16px rgba(0, 0, 0, .1);
	border-radius: 10px;
	width: 160px;
	opacity: 0;
	pointer-events: none;
	transition: all .3s ease;
}
nav .profile .profile-link.show {
	opacity: 1;
	pointer-events: visible;
	top: 100%;
}
nav .profile .profile-link a {
	padding: 10px 16px;
	display: flex;
	grid-gap: 10px;
	font-size: 14px;
	color: var(--dark);
	align-items: center;
	transition: all .3s ease;
}
nav .profile .profile-link a:hover {
	background: var(--grey);
}
/* NAVBAR */



/* MAIN */
main {
	width: 100%;
	padding: 24px 20px 20px 20px;
}
main .title {
	font-size: 28px;
	font-weight: 600;
	margin-bottom: 10px;
}
main .breadcrumbs {
	display: flex;
	grid-gap: 6px;
}
main .breadcrumbs li,
main .breadcrumbs li a {
	font-size: 14px;
}
main .breadcrumbs li a {
	color: var(--blue);
}
main .breadcrumbs li a.active,
main .breadcrumbs li.divider {
	color: var(--dark-grey);
	pointer-events: none;
}
main .info-data {
	margin-top: 36px;
	display: grid;
	grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
	grid-gap: 20px;
}
main .info-data .card {
	padding: 20px;
	border-radius: 10px;
	background: var(--light);
	box-shadow: 4px 4px 16px rgba(0, 0, 0, .05);
}
main .card .head {
	display: flex;
	justify-content: space-between;
	align-items: flex-start;
}
main .card .head h2 {
	font-size: 24px;
	font-weight: 600;
}
main .card .head p {
	font-size: 14px;
}
main .card .head .icon {
	font-size: 20px;
	color: var(--green);
}
main .card .head .icon.down {
	color: var(--red);
}
main .card .progress {
	display: block;
	margin-top: 24px;
	height: 10px;
	width: 100%;
	border-radius: 10px;
	background: var(--grey);
	overflow-y: hidden;
	position: relative;
	margin-bottom: 4px;
}
main .card .progress::before {
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	height: 100%;
	background: var(--blue);
	width: var(--value);
}
main .card .label {
	font-size: 14px;
	font-weight: 700;
}
main .data {
	display: flex;
	grid-gap: 20px;
	margin-top: 20px;
	flex-wrap: wrap;
}
main .data .content-data {
	flex-grow: 1;
	flex-basis: 400px;
	padding: 20px;
	background: var(--light);
	border-radius: 10px;
	box-shadow: 4px 4px 16px rgba(0, 0, 0, .1);
}
main .content-data .head {
	display: flex;
	justify-content: space-between;
	align-items: center;
	margin-bottom: 24px;
}
main .content-data .head h3 {
	font-size: 20px;
	font-weight: 600;
}
main .content-data .head .menu {
	position: relative;
	display: flex;
	justify-content: center;
	align-items: center;
}
main .content-data .head .menu .icon {
	cursor: pointer;
}
main .content-data .head .menu-link {
	position: absolute;
	top: calc(100% + 10px);
	right: 0;
	width: 140px;
	background: var(--light);
	border-radius: 10px;
	box-shadow: 4px 4px 16px rgba(0, 0, 0, .1);
	padding: 10px 0;
	z-index: 100;
	opacity: 0;
	pointer-events: none;
	transition: all .3s ease;
}
main .content-data .head .menu-link.show {
	top: 100%;
	opacity: 1;
	pointer-events: visible;
}
main .content-data .head .menu-link a {
	display: block;
	padding: 6px 16px;
	font-size: 14px;
	color: var(--dark);
	transition: all .3s ease;
}
main .content-data .head .menu-link a:hover {
	background: var(--grey);
}
main .content-data .chart {
	width: 100%;
	max-width: 100%;
	overflow-x: auto;
	scrollbar-width: none;
}
main .content-data .chart::-webkit-scrollbar {
	display: none;
}

main .chat-box {
	width: 100%;
	max-height: 360px;
	overflow-y: auto;
	scrollbar-width: none;
}
main .chat-box::-webkit-scrollbar {
	display: none;
}
main .chat-box .day {
	text-align: center;
	margin-bottom: 10px;
}
main .chat-box .day span {
	display: inline-block;
	padding: 6px 12px;
	border-radius: 20px;
	background: var(--light-blue);
	color: var(--blue);
	font-size: 12px;
	font-weight: 600;
}
main .chat-box .msg img {
	width: 28px;
	height: 28px;
	border-radius: 50%;
	object-fit: cover;
}
main .chat-box .msg {
	display: flex;
	grid-gap: 6px;
	align-items: flex-start;
}
main .chat-box .profile .username {
	font-size: 14px;
	font-weight: 600;
	display: inline-block;
	margin-right: 6px;
}
main .chat-box .profile .time {
	font-size: 12px;
	color: var(--dark-grey);
}
main .chat-box .chat p {
	font-size: 14px;
	padding: 6px 10px;
	display: inline-block;
	max-width: 400px;
	line-height: 150%;
}
main .chat-box .msg:not(.me) .chat p {
	border-radius: 0 5px 5px 5px;
	background: var(--blue);
	color: var(--light);
}
main .chat-box .msg.me {
	justify-content: flex-end;
}
main .chat-box .msg.me .profile {
	text-align: right;
}
main .chat-box .msg.me p {
	background: var(--grey);
	border-radius: 5px 0 5px 5px;
}
main form {
	margin-top: 6px;
}
main .form-group {
	width: 100%;
	display: flex;
	grid-gap: 10px;
}
main .form-group input {
	flex-grow: 1;
	padding: 10px 16px;
	border-radius: 5px;
	outline: none;
	background: var(--grey);
	border: none;
	transition: all .3s ease;
	width: 100%;
}
main .form-group input:focus {
	box-shadow: 0 0 0 1px var(--blue), 0 0 0 4px var(--light-blue);
}
main .btn-send {
	padding: 0 16px;
	background: var(--blue);
	border-radius: 5px;
	color: var(--light);
	cursor: pointer;
	border: none;
	transition: all .3s ease;
}
main .btn-send:hover {
	background: var(--dark-blue);
}
/* MAIN */
/* CONTENT */






@media screen and (max-width: 768px) {
	#content {
		position: relative;
		width: calc(100% - 60px);
		transition: all .3s ease;
	}
	nav .nav-link,
	nav .divider {
		display: none;
	}
}

    </style>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand"><i class='bx bxs-smile icon'></i> AdminSite</a>
		<ul class="side-menu">
			<li><a href="#" class="active"><i class='bx bxs-dashboard icon' ></i> Dashboard</a></li>
			<li class="divider" data-text="main">Main</li>
			<li>
				<a href="#"><i class='bx bxs-inbox icon' ></i> Enregistrer Donneur <i class='bx bx-chevron-right icon-right' ></i></a>
				<ul class="side-dropdown">
					<li><a href="enregistrerdonneurs.php">Enregistrer Donneur Locale</a></li>
					<li><a href="enregistrerdonneurs_H.php">Enregistrer Donneur Hopitale</a></li>
					<li><a href="enregistrerdonneurs_D.php">Enregistrer Disponible</a></li>
					<li><a href="#">Button</a></li>
				</ul>
			</li>
	
			<li>
				<a href="#"><i class='bx bxs-inbox icon' ></i> Gére Donneur <i class='bx bx-chevron-right icon-right' ></i></a>
				<ul class="side-dropdown">
					<li><a href="don_locale_v.php">Don Locale</a></li>
					<li><a href="don_hopitale.php">Don Hopitale</a></li>
					<li><a href="don_disponible.php">Don Disponible</a></li>
					<li><a href="#">Button</a></li>
				</ul>
			</li>
			<li>
				<a href="#"><i class='bx bxs-inbox icon' ></i> Archives <i class='bx bx-chevron-right icon-right' ></i></a>
				<ul class="side-dropdown">
					<li><a href="archive.php">Archive</a></li>
					<li><a href="archive_disponible.php">Don Disponible</a></li>
					
				</ul>
			</li>
			<li><a href="chercher_donneur.php"><i class='bx bx-table icon' ></i> Chercher Donneurs</a></li>
			<li><a href="profile_b_s.php"><i class='bx bx-table icon' ></i> Profile</a></li>
			
			
		</ul>
		<div class="ads">
			<div class="wrapper">
				<a href="logout.php" class="btn-upgrade">Déconnecter</a>
				
			</div>
		</div>
	</section>
	<!-- SIDEBAR -->

	<!-- NAVBAR -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu toggle-sidebar' ></i>
			<form action="#">
				<div class="form-group">
					<input type="text" placeholder="Search...">
					<i class='bx bx-search icon' ></i>
				</div>
			</form>
			<a href="#" class="nav-link">
				<i class='bx bxs-bell icon' ></i>
				<span class="badge">5</span>
			</a>
			<a href="#" class="nav-link">
				<i class='bx bxs-message-square-dots icon' ></i>
				<span class="badge">8</span>
			</a>
			<span class="divider"></span>
			<div class="profile">
				<img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cGVvcGxlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
				<ul class="profile-link">
					<li><a href="profile.php"><i class='bx bxs-user-circle icon' ></i> Profile</a></li>
					
					<li><a href="logout.php"><i class='bx bxs-log-out-circle' ></i> Logout</a></li>
				</ul>
			</div>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<h1 class="title">Dashboard</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Home</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Dashboard</a></li>
			</ul>
			<div class="info-data">
			<div class="card">
					<div class="head">
						<div>
							<h2><?= $row['nom_donneur_s']?></h2>
							
						</div>
						
						
						
					</div>
					
					<b>Ville: <?= $row['ville_donneur_s']?></b>
					<b>Tél: <?= $row['telephone_donneur_s'] ?></b><br>

					<a class="btn btn-primary" href="profile_b_s.php">Profile</a>
				</div>
				<div class="card">
					<div class="head">
						<?php $get_d=mysqli_query($connection,"SELECT * FROM `demmande_poches` WHERE url2='$id' AND status_d='en attente'") ;?>
						<?php $num_d=mysqli_num_rows($get_d);?>
						<div >
							<?php 
								if($num_d==0)
								{

								  	echo '<h2>Demandes <span class="text-danger">'. $num_d.'</span></h2>';
								}else
								{
									echo '<h2>Demandes <span class="text-success">'.$num_d.'</span></h2>';

								}
							?>

							<h6> Les demandes de sang ou des produit sanguins.  </h6>
							
						</div>
						
					</div>
				

					
				</div>
				<div class="card">
				 <?php $get_disponibleAplus=mysqli_query($connection,"SELECT * FROM `enregistrer_donneur` WHERE `vsidentite`='$id' AND `type_enregistrement`='disponible_d' AND `status_enregistrement`='valide_d' AND groupage_donneur_1='A+'");?>
				 <?php $num_disponibleAplus=mysqli_num_rows($get_disponibleAplus);?>

				 <?php $get_disponibleAmoins=mysqli_query($connection,"SELECT * FROM `enregistrer_donneur` WHERE `vsidentite`='$id' AND `type_enregistrement`='disponible_d' AND `status_enregistrement`='valide_d' AND groupage_donneur_1='A-'");?>
				 <?php $num_disponibleAmoins=mysqli_num_rows($get_disponibleAmoins);?>

				 <?php $get_disponibleBplus=mysqli_query($connection,"SELECT * FROM `enregistrer_donneur` WHERE `vsidentite`='$id' AND `type_enregistrement`='disponible_d' AND `status_enregistrement`='valide_d' AND groupage_donneur_1='B+'");?>
				 <?php $num_disponibleBplus=mysqli_num_rows($get_disponibleBplus);?>

				 <?php $get_disponibleBmoins=mysqli_query($connection,"SELECT * FROM `enregistrer_donneur` WHERE `vsidentite`='$id' AND `type_enregistrement`='disponible_d' AND `status_enregistrement`='valide_d' AND groupage_donneur_1='B-'");?>
				 <?php $num_disponibleBmoins=mysqli_num_rows($get_disponibleBmoins);?>

				 <?php $get_disponibleOplus=mysqli_query($connection,"SELECT * FROM `enregistrer_donneur` WHERE `vsidentite`='$id' AND `type_enregistrement`='disponible_d' AND `status_enregistrement`='valide_d' AND groupage_donneur_1='O+'");?>
				 <?php $num_disponibleOplus=mysqli_num_rows($get_disponibleOplus);?>

				 <?php $get_disponibleOmoins=mysqli_query($connection,"SELECT * FROM `enregistrer_donneur` WHERE `vsidentite`='$id' AND `type_enregistrement`='disponible_d' AND `status_enregistrement`='valide_d' AND groupage_donneur_1='O-'");?>
				 <?php $num_disponibleOmoins=mysqli_num_rows($get_disponibleOmoins);?>

				 <?php $get_disponibleABplus=mysqli_query($connection,"SELECT * FROM `enregistrer_donneur` WHERE `vsidentite`='$id' AND `type_enregistrement`='disponible_d' AND `status_enregistrement`='valide_d' AND groupage_donneur_1='AB+'");?>
				 <?php $num_disponibleABplus=mysqli_num_rows($get_disponibleABplus);?>

				 <?php $get_disponibleABmoins=mysqli_query($connection,"SELECT * FROM `enregistrer_donneur` WHERE `vsidentite`='$id' AND `type_enregistrement`='disponible_d' AND `status_enregistrement`='valide_d' AND groupage_donneur_1='AB-'");?>
				 <?php $num_disponibleABmoins=mysqli_num_rows($get_disponibleABmoins);?>

				


					<div class="head">
						<div >
							<h2>Hostorique Des Sang disponible</h2>
							<div class="d-flex justify-content-around" >
								<h5>A+ <span class="text-danger"> <?=$num_disponibleAplus?></span></h5>
								<h5>B+ <span class="text-danger"><?=$num_disponibleBplus?> </span></h5>
								<h5>AB+ <span class="text-danger"><?=$num_disponibleABplus?></span></h5>
								<h5>O+ <span class="text-danger"><?=$num_disponibleOplus?></span></h5>

							</div>

							<div class="d-flex justify-content-around" >
								<h5>A- <span class="text-danger"> <?=$num_disponibleAmoins?></span></h5>
								<h5>B- <span class="text-danger"><?=$num_disponibleBmoins?> </span></h5>
								<h5>AB- <span class="text-danger"><?=$num_disponibleABmoins?></span></h5>
								<h5>O- <span class="text-danger"><?=$num_disponibleOmoins?></span></h5>
						</div>
						
					</div>
				
					
				</div>
				<a class="btn btn-primary" href="archive_disponible.php">Sang Disponible</a>
			</div>
			
		</main>
		<!-- MAIN -->
		
		<div class="container">
		<?php if(isset($_SESSION['creat']) && $_SESSION['creat'] !=""): ?>
                              <div class="alert alert-success alert-dismissible">
                                <?php

                                    {

                                     echo'<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
                                     echo $_SESSION['creat'];
                                    }
                                    unset($_SESSION["creat"]);

                                ?>
                                </div>
                                <?php endif;?>


                                <?php if(isset($_SESSION['erreur']) && $_SESSION['erreur'] !=""): ?>
                              <div class="alert alert-danger alert-dismissible">
                                <?php

                                    {

                                     echo'<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
                                     echo $_SESSION['erreur'];
                                    }
                                    unset($_SESSION["erreur"]);

                                ?>
                                </div>
                                <?php endif;?>
	<div style="overflow-x:auto;">
		
		<table class="table bg-white rounded shadow-sm  table-hover" id="myTable">
			<thead>
			  <tr>
			  <th>N°</th>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Type Snag</th>
				<th>Groupage</th>
				<th>Nombre Poches</th>
				<th>Hopital</th>
				<th>Date</th>
				<th>Valider</th>
				<th>Detail</th>
				<th>Supprimer</th>
			  </tr>
			</thead>
			<tbody>
			<?php 
				$i=1;

				 $get_locale=mysqli_query($connection,"SELECT d.*, b.nom_donneur_s FROM `demmande_poches` d JOIN bnadms b ON b.vsidentite=d.url1 WHERE `url2`='{$row['vsidentite']}' AND `status_d`='en attente'");
				 if(mysqli_num_rows($get_locale) > 0)
				 {
	 
					 while($data=mysqli_fetch_assoc($get_locale))
					 {
						 echo '
						 
						 
	 
						 <tr>
						 
							 <td>'.$i.'</td>
							 <td>'.$data['nom'].'</td>
							 <td>'.$data['prenom'].'</td>
							 <td>'.$data['type_sang'].'</td>
							 <td>'.$data['groupage'].'</td>
							 <td>'.$data['nb_poche'].'</td>
							 <td>'.$data['nom_donneur_s'].'</td>
							 <td>'.$data['dated'].'</td>
							 <td><a href="valide_demmande.php?v='.$data['url_demmande'].'" onclick="return confirm(\'Êtes-vous sûr de vouloir valider cette demmande ?\');" class="btn btn-success">Valider</a></td>
							 <div class="text-center p-3">
							 <!-- Button trigger modal -->
							 <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop' . $data['url_demmande'] . '">
							    Detail
							 </button></td>
							 
							 <!-- Modal -->
							 <div class="modal fade" id="staticBackdrop'.$data['url_demmande'].'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							  <form method="post">
							 <div class="modal-dialog">
								 <div class="modal-content">
								   <div class="modal-header">
									 <h1 class="modal-title fs-5" id="staticBackdropLabel">informations</h1>
									 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								   </div>
								   <div class="modal-body  justify-content-center">
									 <input type="hidden" value="'.$data['url_demmande'].'" name="bs" id="">
										 <div class="mb-1 text-center">
											 <p for="inputNom" class="col-sm text-start col-form-label">Nom Malade</p>
											 <div class="col-sm">
											   <input type="text" name="nom" value="'.$data['nom'].'" class="form-control" id="inputNom" disabled>
											 </div>
									   </div>
									   <div class="mb-1">
									   <p for="inputPrenom" class="col-sm text-start col-form-label">Prénom Malade</p>
										 <div class="col-sm">
										   <input type="text" name="prenom" value="'.$data['prenom'].'" class="form-control" id="inputPrenom" disabled>
										 </div>
									   </div>

									   <div class="mb-1">
									   <p for="inputPrenom" class="col-sm text-start col-form-label">Type Sang</p>
										 <div class="col-sm">
										   <input type="text" name="" value="'.$data['type_sang'].'" class="form-control" id="inputPrenom" disabled>
										 </div>
									   </div>
									  

									   <div class="mb-1">
									   <p for="in" class="col-sm text-start col-form-label">Groupage</p>
										 <div class="col-sm">
										 <select name="groupage" class="form-select" disabled>
										 <option value="groupage" selected disabled>'.$data['groupage'].'</option>
										 <option value="O+">O+</option>
										 <option value="A+">A+</option>
										 <option value="B+">B+</option>
										 <option value="AB+">AB+</option>
										 <option value="O-">O-</option>
										 <option value="A-">A-</option>
										 <option value="B-">B-</option>
										 <option value="AB-">AB-</option>
									   </select>
										 </div>
									   </div>

									   <div class="mb-1">
									   <p for="inputNumber" class="col-sm text-start col-form-label">Nombre poche</p>
										 <div class="col-sm">
										 <select name="poche" id="" class="form-select" disabled>
										 <option value="" selected disabled>'.$data['nb_poche'].'</option>
										 <option value="1">1</option>
										 <option value="2">2</option>
										 <option value="3">3</option>
										 <option value="4">4</option>
										 <option value="5">5</option>
											 </select>
										  

										 </div>
									   </div>

								   </div>
								   <div class="modal-footer">
									  
									 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
								   </div>
								   

								 </div>
							   </div>
							   <form>
							 </div>
							 <td><a href="rejeter_demmande.php?v='.$data['url_demmande'].'" onclick="return confirm(\'Êtes-vous sûr de vouloir rejeter cette demmande ?\');" class="btn btn-danger">Rejeter</a></td>
						 </tr>';
						 $i++;
						 
					 }
					 
					 
				 }
	 
			?>
			</tbody>
		  </table>
		  </div>
				
	</div>
	</section>
	<!-- NAVBAR -->

	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="js/script.js"></script>
</body>
</html>
<?php 
		}else if($row['blastek']==='hopitale_b_d')
		{
			redirect('hopitale.php');
		}else if($row['blastek']==="h_b_donneurs")
		{
			redirect('home.php');

		}else if($row['blastek']==="h_bancsang_maalem_d")
		{
			redirect('bancsang_mallem.php');
		}
	}
}else{
	redirect('login.php');	
}
$stmt_verif_session->close();
$connection->close();
?>