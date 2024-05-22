<?php
require_once "../core/sessionprotection.php";
require_once "../core/autoloading.php";

session_start();

$_SESSION['ana_hwa']=bin2hex(random_bytes(32));
$_SESSION['ana_hwa_time']=time()+60*15; // 15 minutes

if(isset($_SESSION['y3adi']) && isset($_SESSION['valide_token_donneur']))
{
	$stmt_verif_session=$connection->prepare("SELECT `vsidentite`, `nom_donneur_s`, `email_donneur_s`, `telephone_donneur_s`, `ville_donneur_s`, `valide_token_donneur`, `blastek` From `bnadms` WHERE `email_donneur_s`= ? LIMIT 1 ");
    $stmt_verif_session->bind_param("s", $_SESSION["y3adi"]);
    $stmt_verif_session->execute();
    $result = $stmt_verif_session->get_result();
	$row=$result->fetch_assoc();
	
	$database_token=$row['valide_token_donneur'];
    $session_token=$_SESSION['valide_token_donneur'];
	if($database_token!==$session_token)
	{
		redirect('login.php');
	}else
	{
		if($row['blastek']==="hopitale_b_d")
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
    <title>page sbitar recherche banque du sang</title>
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


<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }

	  .service-block4 {
    position: relative;
    border: 1px solid #f7f7f7;
    background: #fff;
    box-shadow: 0px 10px 30px 0px rgba(50, 50, 50, 0.16);
    border-radius: 5px;
    overflow: hidden;
    padding: 30px
}

.service-block4:before {
    position: absolute;
    top: -42px;
    right: -100px;
    z-index: 0;
    content: " ";
    width: 250px;
    height: 120px;
    background: #f7f7f7;
    border-bottom-left-radius: 0;
    transition: all 0.4s ease-in-out;
    transform: rotate(45deg);
    -moz-transition: all 0.4s ease-in-out;
    -ms-transition: all 0.4s ease-in-out;
    -webkit-transition: all 0.4s ease-in-out;
    -o-transition: all 0.4s ease-in-out
}

.service-block4:hover:before {
    background: red
}

.service-block4 .service-icon {
    position: absolute;
    top: 18px;
    right: 18px;
    z-index: 1;
    text-align: center
}

.service-block4 i {
    color: #2b84d6;
    font-size: 38px;
    line-height: normal;
    transition: all 0.4s ease-in-out;
    -moz-transition: all 0.4s ease-in-out;
    -ms-transition: all 0.4s ease-in-out;
    -webkit-transition: all 0.4s ease-in-out;
    -o-transition: all 0.4s ease-in-out;
    margin-bottom: 0
}

.service-block4:hover i {
    color: #fff
}

.service-block4 .service-desc {
    position: relative
}

.service-block4 .service-desc h4 {
    margin-bottom: 8px;
    font-size: 18px;
    font-weight: 600
}

.service-block4 .service-desc h5 {
    margin-bottom: 5px;
    font-size: 12px;
    font-weight: 500
}

.service-block4 .service-desc h5:after {
    content: '';
    display: block;
    width: 80px;
    height: 2px;
    background: #2b84d6;
    margin-top: 10px;
    margin-bottom: 15px;
    -moz-transition-duration: .4s;
    -ms-transition-duration: .4s;
    -webkit-transition-duration: .4s;
    -o-transition-duration: .4s;
    transition-duration: .4s
}

.service-block4 p {
    margin-top: 25px;
    padding-right: 50px;
    margin-bottom: 0
}

@media screen and (max-width: 1199px) {
    .service-block4:before {
        right: -110px
    }
    .service-block4 .service-desc h4 {
        font-size: 16px;
        margin-bottom: 5px
    }
    .service-block4 p {
        padding-right: 40px;
        margin-top: 20px
    }
    .service-block4 i {
        font-size: 34px
    }
}

@media screen and (max-width: 991px) {
    .service-block4 {
        padding: 25px
    }
    .service-block4 .service-desc h4 {
        font-size: 15px
    }
    .service-block4 i {
        font-size: 32px
    }
    .service-block4 p {
        margin-top: 15px;
        padding-right: 30px
    }
}

@media screen and (max-width: 767px) {
    .service-block4 {
        padding: 20px
    }
    .service-block4:before {
        right: -130px
    }
    .service-block4 i {
        font-size: 28px
    }
    .service-block4 .service-icon {
        top: 13px;
        right: 12px
    }
}

.margin-30px-bottom {
    margin-bottom: 30px;
}
</style>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand"><i class='bx bxs-smile icon'></i> AdminSite</a>
		<ul class="side-menu">
			<li><a href="#" class="active"><i class='bx bxs-dashboard icon' ></i> Dashboard</a></li>
			<li class="divider" data-text="main">Main</li>
			<li>
				<a href="#"><i class='bx bxs-inbox icon' ></i> Chercher Sang/Donneur <i class='bx bx-chevron-right icon-right' ></i></a>
				<ul class="side-dropdown">
					<li><a href="chercher_banque_sang.php">Demmande Sang</a></li>
					<li><a href="chercher_donneur.php">Chercher Donneurs</a></li>
					
				</ul>
			</li>
			<li>
				<a href="#"><i class='bx bxs-inbox icon' ></i> Notifications <i class='bx bx-chevron-right icon-right' ></i></a>
				<ul class="side-dropdown">
					<li><a href="nottification.php">Notification de Don</a></li>
					<li><a href="nottification_demmande.php">Notification Demandes</a></li>
					
				</ul>
			</li>
			
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
					<li><a href="annonces.php"><i class='bx bxs-cog' ></i> Annonces</a></li>
					<li><a href="publication.php"><i class='bx bxs-cog' ></i> Publication</a></li>
					<li><a href="users.php"><i class='bx bxs-cog' ></i> users</a></li>
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
			
			<div class="pt-3  rounded">
        <h3 class="text-center" id="titre">Liste des centres de don!</h3>
      </div>



      <section class="container mt-2">
               <main class="row">
                     
                        <article class="col-sm">
                                
                        <?php  
						  $ville=$row['ville_donneur_s'];
                          $stmt=$connection->prepare("SELECT * FROM `bnadms` WHERE (`blastek`='h_bancsang_d' OR `blastek`='h_bancsang_maalem_d') AND `ville_donneur_s`=?");
                          $stmt->bind_param("s",$ville);
                          $stmt->execute();
                          $result1=$stmt->get_result();

                          if($result1->num_rows > 0)
                          {
                            while($data = $result1->fetch_assoc())
                            {
                               echo'
                               <div  class="row mt-60">
							   <form class="justify-content-center" action="demmande.php" method="post">
                               <div class=" margin-30px-bottom xs-margin-20px-bottom">
                                   <div class="service-block4 h-100">
                                       <div class="service-icon">
                                           <i class="icon-tools"></i>
                                       </div>
                                       <div class="service-desc">
                                           <h4>'.$data['nom_donneur_s'].' ('.$data['nom_donneur_s'].' Maison du don - 13200)</h4>
                                           <h5> <img src="images/position.png" alt="position" width="30px"/> <span></span> Banc du Sang</h5>
										   <article class="d-flex justify-content-evenly pt-3">
											   <div>
													<h6><img src="images/goutte_sang.png" alt="goutte_sang" width="22px"/>Sang<span></span></h6>
											   </div>
											   <div>
													<h6><img src="images/goutte_plasma.png" alt="goutte_plasma" width="22px"/>Plasma<span></span> </h6>
											   </div>
											   <div>
													<h6><img src="images/goutte_plaquette.png" alt="goutte_plaquette" width="22px"/>Plaquette<span></span> </h6>
											   </div>
											</article>
										   <div class="pt-3 text-center">
										   		<h6>Numéro téléphone : '.$data['telephone_donneur_s'].'</h6>
										   </div>

										   <div class="text-center p-3">
										   <!-- Button trigger modal -->
										   <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop' . $data['url_bnadms'] . '">
											 Demande Sang
										   </button>
										   
										   <!-- Modal -->
										   <div class="modal fade" id="staticBackdrop'.$data['url_bnadms'].'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
											 <div class="modal-dialog">
											   <div class="modal-content">
												 <div class="modal-header">
												   <h1 class="modal-title fs-5" id="staticBackdropLabel">Formulaire de la demande</h1>
												   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												 </div>
												 <div class="modal-body  justify-content-center">
												   
												   <input type="hidden" name="csrf_token" value="'.$_SESSION['ana_hwa'].'" name="bs" id="">
												   <input type="hidden" value="'.$data['url_bnadms'].'" name="bs" id="">
												   	<div class="mb-1 text-center">
												   		<p for="inputNom" class="col-sm text-start col-form-label">Nom Malade</p>
												   		<div class="col-sm">
															 <input type="text" name="nom" class="form-control" id="inputNom">
												   		</div>
													 </div>
													 <div class="mb-1">
													 <p for="inputPrenom" class="col-sm text-start col-form-label">Prénom Malade</p>
													   <div class="col-sm">
													     <input type="text" name="prenom" class="form-control" id="inputPrenom">
													   </div>
											         </div>
													 <div class="mb-1">
													 <div class="d-flex pt-5 justify-content-evenly mb-1">
													 <div>
														  <h6><input class="form-check-input " type="radio" value="sang" name="sangg" aria-label="Checkbox for following text input"><img src="images/goutte_sang.png" alt="goutte_sang" width="22px"/>Sang<span></span> </h6>
													 </div>
													 <div>
														  <h6><input class="form-check-input " type="radio" value="plasma" name="sangg" aria-label="Checkbox for following text input"><img src="images/goutte_plasma.png" alt="goutte_plasma" width="22px"/>Plasma<span></span> </h6>
													 </div>
													 <div>
														  <h6><input class="form-check-input " type="radio" value="plaquette" name="sangg" aria-label="Checkbox for following text input"><img src="images/goutte_plaquette.png" alt="goutte_plaquette" width="22px"/>Plaquette<span></span> </h6>
													 </div>
												  </div>
												  </div>

													 <div class="mb-1">
													 <p for="in" class="col-sm text-start col-form-label">Groupage</p>
													   <div class="col-sm">
													   <select name="groupage" class="form-select">
													   <option value="groupage" selected disabled>Groupage</option>
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
													   <select name="poche" id="" class="form-select">
													   <option value="" selected disabled>Nombre de Poche</option>
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
												 	<button type="submit" name="demmander" class="btn btn-primary">Demander</button>
												   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
												 </div>
												 

											   </div>
											 </div>
										   </div>
										</div>




                                       </div>
                   
                                   </div>
                               </div>
							   </form>
                           </div>
                               ';
                            }
                          }else
                          {
                              echo'<div class="row mt-60">
                              <div class=" margin-30px-bottom xs-margin-20px-bottom">
                                  <div class="service-block4 h-100">
                                      <div class="service-icon">
                                          <i class="icon-tools"></i>
                                      </div>
                                      <div class="service-desc">
                                          <h4>Aucun Résultat</h4>
                                          <h5>Banc Sang</h5>
										  <article class="d-flex justify-content-evenly pt-3">
										  <div>
											   <h6><img src="images/goutte_sang.png" alt="goutte_sang" width="22px"/>Sang<span></span></h6>
										  </div>
										  <div>
											   <h6><img src="images/goutte_plasma.png" alt="goutte_plasma" width="22px"/>Plasma<span></span> </h6>
										  </div>
										  <div>
											   <h6><img src="images/goutte_plaquette.png" alt="goutte_plaquette" width="22px"/>Plaquette<span></span> </h6>
										  </div>
									   </article>
                                      </div>
                  
                                  </div>
                              </div>
                                  
                          </div>';
                          }
                      
                    
                    
                    
                  ?>
       
                      
                        </article>

                     <article class="col-sm">
                            <div id="map"></div>
                     </article>

                     
               </main>
      </section>

      <script>
    var customLabel = {
        banc: {
            label: 'B'
        },
    };

    function initMap() {
        var ville = '<?php echo $ville; ?>'; 

        var map = new google.maps.Map(document.getElementById('map'), {
            center: getCityCenter(ville),
            zoom: setZoomLevel(ville),
        });

        var infoWindow = new google.maps.InfoWindow;

        // Change this depending on the name of your PHP or XML file
        downloadUrl('http://localhost/Boot/public/xml.php', function (data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function (markerElem) {
                var id = markerElem.getAttribute('id');
                var name = markerElem.getAttribute('name');
                var address = markerElem.getAttribute('address');
                var type = markerElem.getAttribute('type');
                var point = new google.maps.LatLng(
                    parseFloat(markerElem.getAttribute('lat')),
                    parseFloat(markerElem.getAttribute('lng')));

                var infowincontent = document.createElement('div');
                var strong = document.createElement('strong');
                strong.textContent = name
                infowincontent.appendChild(strong);
                infowincontent.appendChild(document.createElement('br'));

                var text = document.createElement('text');
                text.textContent = address
                infowincontent.appendChild(text);
                var icon = customLabel[type] || {};
                var marker = new google.maps.Marker({
                    map: map,
                    position: point,
                    label: icon.label
                });
                marker.addListener('click', function () {
                    infoWindow.setContent(infowincontent);
                    infoWindow.open(map, marker);
                });
            });
        });
    }

    function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function () {
            if (request.readyState == 4) {
                request.onreadystatechange = doNothing;
                callback(request, request.status);
            }
        };

        request.open('GET', url, true);
        request.send(null);
    }

    function doNothing() {}
    

    function getCityCenter(ville) {
        switch (ville) {
            case 'Annaba':
                return new google.maps.LatLng(36.864235, 7.742628);

			case 'Skikda':
                return new google.maps.LatLng(36.8796,  6.9094);
            
            default:
                return new google.maps.LatLng(30.0339, 1.6596); 
        }
    }

	function setZoomLevel(ville) {
    var zoomLevel;
    switch (ville) {
        case 'Annaba':
            zoomLevel = 12; 
            break;
		case 'Skikda':
            zoomLevel = 12; 
            break;

        default:
            zoomLevel = 4.5; 
    }
    return zoomLevel;
}
	
</script>

<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCmMtcoMz3LWgSGfAJ-VERFE6zMUofv_xk&callback=initMap" defer></script>
 

 

<!-- Footer -->

		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->

	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="js/script.js"></script>
</body>
</html>

<?php 
		}else if($row['blastek']==='h_bancsang_d')
		{
			redirect('banc.php');
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