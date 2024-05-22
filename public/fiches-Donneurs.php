

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Fiches donneurs</title>
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



button {
display: flex;
 align-items: center;
 justify-content: center;
 height: 50px;
 position: relative;
 padding: 0 60px;
 font-size: 18px;
 text-transform: uppercase;
 border: 0;
 box-shadow: hsl(210deg 87% 36%) 0px 7px 0px 0px;
 background-color: hsl(210deg 100% 44%);
 border-radius: 12px;
 overflow: hidden;
 transition: 31ms cubic-bezier(.5, .7, .4, 1);
}

button:before {
 content: attr(alt);
 display: flex;
 align-items: center;
 justify-content: center;
 position: absolute;
 inset: 0;
 font-size: 15px;
 font-weight: bold;
 color: white;
 letter-spacing: 4px;
 opacity: 1;
}

button:active {
 box-shadow: none;
 transform: translateY(7px);
 transition: 35ms cubic-bezier(.5, .7, .4, 1);
}

button:hover:before {
 transition: all .0s;
 transform: translateY(100%);
 opacity: 0;
}

button i {
 color: white;
 font-size: 15px;
 font-weight: bold;
 letter-spacing: 4px;
 font-style: normal;
 transition: all 2s ease;
 transform: translateY(-20px);
 opacity: 0;
}

button:hover i {
 transition: all .2s ease;
 transform: translateY(0px);
 opacity: 1;
}

button:hover i:nth-child(1) {
 transition-delay: 0.045s;
}

button:hover i:nth-child(2) {
 transition-delay: calc(0.045s * 3);
}

button:hover i:nth-child(3) {
 transition-delay: calc(0.045s * 4);
}

button:hover i:nth-child(4) {
 transition-delay: calc(0.045s * 5);
}

button:hover i:nth-child(6) {
 transition-delay: calc(0.045s * 6);
}

button:hover i:nth-child(7) {
 transition-delay: calc(0.045s * 7);
}

button:hover i:nth-child(8) {
 transition-delay: calc(0.045s * 8);
}

button:hover i:nth-child(9) {
 transition-delay: calc(0.045s * 9);
}

button:hover i:nth-child(10) {
 transition-delay: calc(0.045s * 10);
}


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


    </style>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand"><i class='bx bxs-smile icon'></i> AdminSite</a>
		<ul class="side-menu">
			<li><a href="#" class="active"><i class='bx bxs-dashboard icon' ></i> Dashboard</a></li>
			<li class="divider" data-text="main">Main</li>
			<li>
				<a href="#"><i class='bx bxs-inbox icon' ></i> Elements <i class='bx bx-chevron-right icon-right' ></i></a>
				<ul class="side-dropdown">
					<li><a href="#">Alert</a></li>
					<li><a href="#">Badges</a></li>
					<li><a href="#">Breadcrumbs</a></li>
					<li><a href="#">Button</a></li>
				</ul>
			</li>
			<li><a href="#"><i class='bx bxs-chart icon' ></i> Charts</a></li>
			<li><a href="#"><i class='bx bxs-widget icon' ></i> Widgets</a></li>
			<li class="divider" data-text="table and forms">Table and forms</li>
			<li><a href="#"><i class='bx bx-table icon' ></i> Tables</a></li>
			<li>
				<a href="#"><i class='bx bxs-notepad icon' ></i> Forms <i class='bx bx-chevron-right icon-right' ></i></a>
				<ul class="side-dropdown">
					<li><a href="#">Basic</a></li>
					<li><a href="#">Select</a></li>
					<li><a href="#">Checkbox</a></li>
					<li><a href="#">Radio</a></li>
				</ul>
			</li>
		</ul>
		<div class="ads">
			<div class="wrapper">
				<a href="#" class="btn-upgrade">Upgrade</a>
				<p>Become a <span>PRO</span> member and enjoy <span>All Features</span></p>
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
			

            <section class="container-fluid">
                <main class="row">
                     <article class="col-sm">
                        <div class="card">
                            <div class="card-body">
                            <form method="post">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nom Donneur1</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="nom" class="form-control" >
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Prenom Donneur1</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="prenom" class="form-control" >
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Age Donneur1</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="age" class="form-control" >
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Groupage Donneur1</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <select name="groupage" class="form-select " >
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


                               
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Numero Télé Donneur 1</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="telephone" class="form-control">
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">wech mn blasa ha ytbe3</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <select class="form-select" id="sel1" name="role">
                                          <option selected disabled value="type Entreprise">type Entreprise</option>
                                          <option>2</option>
                                          <option>3</option>
                                          <option>4</option>
                                        </select>
                                    </div>
                                </div>

                              


                                <!--donneur 2-->
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nom Donneur2</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="nom" class="form-control" >
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Prenom Donneur2</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="prenom" class="form-control" >
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Age Donneur2</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="age" class="form-control" >
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Groupage Donneu2</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <select name="groupage" class="form-select " >
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



                        <div class="row justify-content-center">
                                <div class="col-sm-3"></div>
                                    <div class="col-sm-9">
                                        <button alt="tony stark">
                                            <i>t</i>
                                            <i>o</i>
                                            <i>n</i>
                                            <i>y</i>
                                            <i>&nbsp;</i>
                                            <i>s</i>
                                            <i>t</i>
                                            <i>a</i>
                                            <i>r</i>
                                            <i>k</i>
                                          </button>

                                          
                                    </div>

                                 
                        </div>
                   
                   </form>
                 </div>
                </div>
                  </article>
                </main>
            </section>

			
		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->

	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="js/script.js"></script>
</body>
</html>
