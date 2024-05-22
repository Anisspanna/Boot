
<?php
require_once "../core/autoloading.php";
session_start();

$_SESSION['ana_hwa']=bin2hex(random_bytes(32));
$_SESSION['ana_hwa_time']=time()+60*15; // 15 minutes

$_SESSION['ana_hwapass']=bin2hex(random_bytes(32));
$_SESSION['ana_hwa_timepass']=time()+60*15; // 15 minutes

$_SESSION['ana_hwadel']=bin2hex(random_bytes(32));
$_SESSION['ana_hwa_timedel']=time()+60*15; // 15 minutes



if(isset($_SESSION['y3adi']) && isset($_SESSION['valide_token_donneur']))
{
	$stmt_verif_session=$connection->prepare("SELECT `vsidentite`, `nom_donneur_s`, `ville_donneur_s`, `telephone_donneur_s`, `sexe_donneur_s`, `prenom_donneur_s`, `groupage_donneur_s`, `dernier_donneur_s`, `agesdonneur_s`, `email_donneur_s`, `valide_token_donneur`, `blastek` From `bnadms` WHERE `email_donneur_s`= ? LIMIT 1 ");
    $stmt_verif_session->bind_param("s", $_SESSION["y3adi"]);
    $stmt_verif_session->execute();
    $result = $stmt_verif_session->get_result();
	$row=$result->fetch_assoc();
	$dernier = ($row['dernier_donneur_s'] == NULL) ? "/" : $row['dernier_donneur_s'];
	$database_token=$row['valide_token_donneur'];
    $session_token=$_SESSION['valide_token_donneur'];
	if($database_token!==$session_token)
	{
		redirect('login.php');
	}else
	{
		if($row['blastek']==="h_b_donneurs")
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
    <title>AdminSite</title>
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



.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid transparent;
    border-radius: .25rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
}
.me-2 {
    margin-right: .5rem!important;
}
#button {
 width: 200px;
 height: 45px;
 cursor: pointer;
 display: flex;
 align-items: center;
 background: red;
 border: none;
 border-radius: 10px;
 box-shadow: 1px 1px 3px rgba(0,0,0,0.15);
 background: #e62222;
}

#button, #button span {
 transition: 200ms;
}

#button .text {
 transform: translateX(35px);
 color: white;
 font-weight: bold;
}

#button .icon {
 position: absolute;
 border-left: 1px solid #c41b1b;
 transform: translateX(150px);
 height: 40px;
 width: 40px;
 display: flex;
 align-items: center;
 justify-content: center;
}

#button svg {
 width: 15px;
 fill: #eee;
}

#button:hover {
 background: #ff3636;
}

.save:hover{
    background-color: #ff3636;

}

#button:hover .text {
 color: transparent;
}

#button:hover .icon {
 width: 150px;
 border-left: none;
 transform: translateX(0);
}

#button:focus {
 outline: none;
}

#button:active .icon svg {
 transform: scale(0.8);
}



    </style>
	<!-- SIDEBAR -->


	
	<section id="sidebar">
		<a href="#" class="brand"><i class='bx bxs-smile icon'></i> AdminSite</a>
		<ul class="side-menu">
			<li><a href="hopitale.php" class="active"><i class='bx bxs-dashboard icon' ></i> Dashboard</a></li>
			
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
								
            <div class="container">
                <div class="main-body">
					
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin" class="rounded-circle p-1 bg-black" width="110">
                                        <div class="mt-3">
                                            <h4><b><?= $row['nom_donneur_s'].' '.$row['prenom_donneur_s'] ?></b></h4>
                                            <p class="text-secondary mb-1"><b><?=ucfirst($row['sexe_donneur_s']) ?></b></p>
                                            <p class="text-muted font-size-sm"><b class="">Groupage:<b class="text-danger"> <?= $row['groupage_donneur_s']?></b></b></p>
                                            <p class="text-muted font-size-sm"><b><?= $row['email_donneur_s']?></b></p>


                                           
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h5 class="mb-0"><b>Ville:</b></h5>
                                            <span class="text-secondary"><b><?= $row['ville_donneur_s'] ?></b></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h5 class="mb-0"><b>Dernier Don:</b></h5>
                                            <span class="text-secondary"><b><?= $dernier?></b></span>
                                        </li>
                                    
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                 <form action="savedata.php" method="post">
	<!-- Chart -->						<input type="hidden" name="csrf_token" value="<?=$_SESSION['ana_hwa']?>" id="">
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Téléphone</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" name="telephone" value="<?= $row['telephone_donneur_s']?>">
										<?php if(isset($_SESSION['e_telephone'])) echo '<p class="text-danger">'.$_SESSION['e_telephone'].'</p>'; unset($_SESSION['e_telephone']);?>                        

                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Age</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" name="age" value="<?=$row['agesdonneur_s']?>">
										<?php if(isset($_SESSION['e_age'])) echo '<p class="text-danger">'.$_SESSION['e_age'].'</p>'; unset($_SESSION['e_age']);?>                        

                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Ville</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
										<select name="ville" class="form-select">
              <option value="" selected disabled><?= $row['ville_donneur_s']?></option>
              <option value="Adrar">Adrar</option>
              <option value="Chlef">Chlef </option>
              <option value="Laghouat">Laghouat</option>
              <option value="Oum El Bouaghi">Oum El Bouaghi</option>
              <option value="Batna">Batna</option>               
              <option value="Bejaia">Bejaia</option>
              <option value="Biskra">Biskra</option>
              <option value="Bechar">Béchar </option>
              <option value="Blida">Blida </option>
              <option value="Bouira">Bouira </option>
              <option value="Tamanrasset">Tamanrasset </option>
              <option value="Tebessa">Tébessa </option>
              <option value="Tlemcen">Tlemcen </option>
              <option value="Tiaret">Tiaret </option>
              <option value="Tizi Ouzou">Tizi Ouzou</option>
              <option value="Alger">Alger </option>
              <option value="Djelfa">Djelfa </option>
              <option value="Jijel">Jijel </option>
              <option value="Setif">Sétif </option>
              <option value="Saida">Saida </option>
              <option value="Skikda">Skikda </option>
              <option value="Sidi Bel Abbes">Sidi Bel Abbes</option>
              <option value="Annaba">Annaba</option>
              <option value="Guelma">Guelma </option>
              <option value="Constantine">Constantine </option>
              <option value="Medea">Médéa </option>
              <option value="Mostaganem">Mostaganem </option>
              <option value="MSila">M'Sila </option>
              <option value="Mascara">Mascara</option>
              <option value="Ouargla">Ouargla </option>
              <option value="Oran">Oran </option>
              <option value="El Bayadh">El Bayadh</option>
              <option value="Illizi">Illizi </option>
              <option value="Bordj Bou Arreridj">Bordj Bou Arréridj</option>
              <option value="Boumerdes">Boumerdès </option>
              <option value="El Taref">El Taref </option>
              <option value="Tindouf">Tindouf </option>
              <option value="Tissemsilt">Tissemsilt </option>
              <option value="El Oued">El Oued</option>
              <option value="Khenchela">Khenchela </option>
              <option value="Souk Ahras">Souk Ahras</option>
              <option value="Tipaza">Tipaza </option>
              <option value="Mila">Mila </option>
              <option value="Ain Defla">Aïn Defla </option>
              <option value="Naama">Naâma </option>
              <option value="Aïn Témouchent">Aïn Témouchent</option>
              <option value="Ghardaia">Ghardaïa </option>
              <option value="Relizane">Relizane </option>
              <option value="Timimoun">Timimoun </option>
              <option value="Bordj Badji Mokhtar">Bordj Badji Mokhtar</option>
              <option value="Ouled Djellal">Ouled Djellal</option>
              <option value="Beni Abbes">Béni Abbès</option>
              <option value="In Salah">In Salah</option>
              <option value="In Guezzam">In Guezzam </option>
              <option value="Touggourt">Touggourt</option>
              <option value="Djanet">Djanet</option>
              <option value="El Meghaier">El Meghaier</option>
              <option value="El Menia">El Menia</option>
                            </select>
										<?php if(isset($_SESSION['e_ville'])) echo '<p class="text-danger">'.$_SESSION['e_ville'].'</p>'; unset($_SESSION['e_ville']);?>                        

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-primary px-4"  name="save" value="Sauvegarder">
                                        </div>
                                    </div>
								  </form>
                                </div>
                            </div>   
						<div class="row">
							<form action="datasaves.php" method="post">
								<input type="hidden" name="csrf_tokens" value="<?=$_SESSION['ana_hwapass']?>" id="">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
                                <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Mot de passe</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="password" name="password" class="form-control">
									<?php if(isset($_SESSION['e_password'])) echo '<p class="text-danger">'.$_SESSION['e_password'].'</p>'; unset($_SESSION['e_password']);?>                        
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Nouveau Mot de passe</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="password" name="new_password" class="form-control">
									<?php if(isset($_SESSION['e_new_password'])) echo '<p class="text-danger">'.$_SESSION['e_new_password'].'</p>'; unset($_SESSION['e_new_password']);?>                        
								</div>
							</div>
                            <div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="submit" name="nv_pass" class="btn btn-primary px-4" value="Changer">
								</div>
							</div>
								</div>
							</div>
						</div>
						</form>

					</div>
					<div class="row">
						<div class="col-sm-12">
							<form action="deleteacc.php" method="post">
								<input type="hidden" name="csrf_tokensdel" value="<?=$_SESSION['ana_hwadel']?>" id="">
							<div class="card">
								<div class="card-body">
                                <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Mot de passe</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="password" name="password_delete" class="form-control">
									<?php if(isset($_SESSION['e_password_delete'])) echo '<p class="text-danger">'.$_SESSION['e_password_delete'].'</p>'; unset($_SESSION['e_password_delete']);?>                        

								</div>
							</div>
							
							
                            <div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
                                <button type="submit" name="delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer votre compte ?');" class="noselect" id="button">
                                        <span class="text">Supprimer</span>
                                        <span class="icon">
                                          <svg xmlns="http://www.w3.org/2000/svg" 
                                            width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 
                                            3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path>
                                          </svg>
                                        </span>
                                      </button>
								</div>
							</div>
								</div>
							</div>
							</form>
						</div>
					</div>
                        </div>
						
                    </div>
					
                </div>
            </div>
			
		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->

	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="js/script.js"></script>
</body>
</html>
<?php 
		
		}else
		{
			redirect('profile_b_s.php');

		}
	}
}else{
	redirect('login.php');	
}
$stmt_verif_session->close();
$connection->close();
?>