<?php
require_once "../core/autoloading.php";
$error=0;
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title></title>


	<link rel="stylesheet" href="css/bootstrap1.css">
    <link rel="stylesheet" href="css/bootstrap2.css">
    <link rel="stylesheet" href="css/bootstrap3.css">

    <!-- java script -->
    <script src="js/bootstrap.js"></script>
    <script src="js/j.js"></script>
    <script src="js/fontowsem.js"></script>
</head>
<body>
	


<style>
    @font-face {
    font-family: "font1" ;
    src: url("fonts/Afacad-Regular.ttf");
}
@font-face {
    font-family: "font2" ;
    src: url("fonts/Kanit-Regular.ttf");
}

@font-face {
    font-family: "font3" ;
    src: url("fonts/ProtestRiot-Regular.ttf");
}

@font-face {
    font-family: "font4" ;
    src: url("fonts/ProtestStrike-Regular.ttf");
}


#titre{
    font-family: font3;
    color: #009de0;
}

#logo{
  font-family: font3;

}
  </style>


  			 <!-- navbar -->
			   <header>
				<!-- Navbar -->
				<?php if(!isset($_SESSION['y3adi']))
				{

				echo'
				<nav class="navbar navbar-expand-lg bg-body-tertiary">
				<div class="container">
				  <a class="navbar-brand" href="index.php"><img class="img-fluid" src="images/log.png" width="50px" alt="log"><span style="font-size: 22px;" id="logo">GoutteVie</span></a>
				  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				  </button>
				  <div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ms-auto  mb-2 mb-lg-0">
					 
					 
					  <li class="nav-item">
						<a class="nav-link"  href="Pourquoi_Donner.php">Pourquoi Donner ?</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="Qui_peut_donner.php">Qui peut donner ?</a>
					  </li>
					  <li class="nav-item">
                    <a class="nav-link"  href="COMMENT_SE_PASSE_LE_DON_DE_SANG.php">Comment ?</a>
                  </li>
					  <li class="nav-item">
						<a class="nav-link" href="Delai_Entre_Deux_Dons.php">Délai Entre Deux Dons ?</a>
					  </li>
					  
					</ul>
					<div  class="d-flex" >
						<a href="inscription.php" class="btn btn-outline-danger me-3">Inscrire</a>
						<a href="login.php" class="btn btn-outline-danger">Connexion</a>
					</div>
				  </div>
				</div>
			</nav>';
				}?>


			<?php if(isset($_SESSION['y3adi']))
			{

			echo '
		<nav class="navbar navbar-expand-lg bg-body-tertiary">
			<div class="container">
			  <a class="navbar-brand" href="index.html"><img class="img-fluid" src="images/log.png" width="50px" alt="log"><span style="font-size: 22px;" id="logo">GoutteVie</span></a>
			  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-auto  mb-2 mb-lg-0">
				 
				 
				 
				  
				  
				</ul>
				<div  class="d-flex" >
				<a href="hopitale.php" class="btn btn-outline-danger">Dashboard</a> &nbsp;
					
					<a href="logout.php" class="btn btn-outline-danger">Déconnecter</a>
				</div>
			  </div>
			</div>
		</nav>';
	
		
	}?>
		
		  </header>





<section  class="container p-3">
	<main class="row justify-content-center">
		<form action="<?php htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
		 <article  class="col-sm p-3 d-sm-block">
			<div class="d-flex justify-content-center">

			   <!--Groupage-->
		  <div class="mb-4 p-2">
			<label class="text-center">Groupage</label>

			  <select name="groupage" class="form-select " >
				<option value="" selected disabled>Groupage</option>
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

			   <!--ville-->
		<div class="mb-4 p-2">
			<label for="">Ville</label>

			  <select name="ville" class="form-select">
			  <option value="" selected disabled>Ville</option>
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
</div>

<!--Groupage-->
<div class="mt-4 p-2">
<button type="submit" name="chercher" class="btn">
Rechercher
</button>
</div>

				
			   

</div>  
		 </article>
	</form>
	</main>
</section>




			<section class="container-fluid ">
				<main class="row justify-content-center"> 
				    
				     <article class="col-sm">

		<div style="overflow-x:auto;">			
					 <table class="table table-bordered">
  <thead>
    <tr>
	<th>Nom & Prenom</th>
	<th>Age</th>
	<th>Numero Téléphone</th>
	<th>Groupage</th>
	<th>Ville</th>
	<th>Sexe</th>
    </tr>
  </thead>
  <tbody>
<?php
	
	if(isset($_POST['chercher']))
	{
		if(isset($_POST['ville']) && $_POST['ville']!="")
		{
		  $ville= filtring(mysqli_real_escape_string($connection,$_POST['ville']));
		  if (!in_array($ville, ['Adrar', 'Chlef', 'Laghouat', 'Oum El Bouaghi', 'Batna', 'Bejaia', 'Biskra', 'Bechar', 'Blida', 'Bouira', 'Tamanrasset', 'Tebessa', 'Tlemcen', 'Tiaret', 'Tizi Ouzou', 'Alger', 'Djelfa', 'Jijel', 'Setif', 'Saida', 'Skikda', 'Sidi Bel Abbes', 'Annaba', 'Guelma', 'Constantine', 'Medea', 'Mostaganem', 'MSila', 'Mascara', 'Ouargla', 'Oran', 'El Bayadh', 'Illizi', 'Bordj Bou Arreridj', 'Boumerdes', 'El Taref', 'Tindouf', 'Tissemsilt', 'El Oued', 'Khenchela', 'Souk Ahras', 'Tipaza', 'Mila', 'Ain Defla', 'Naama', 'Ain Témouchent', 'Ghardaia', 'Relizane', 'Timimoun', 'Bordj Badji Mokhtar', 'Ouled Djellal', 'Beni Abbes', 'In Salah', 'In Guezzam', 'Touggourt', 'Djanet', 'El Meghaier', 'El Menia'])) {
			$error = 1;
			$_SESSION['e_ville'] = "La ville n'est pas dans la liste des villes autorisées!";
		}
		
	
		}else
		{
		  $error =1;
		   $_SESSION["e_ville"] = "Obligatoire!";
		}

if(isset($_POST['groupage']) && $_POST['groupage']!="")
{
  $groupage= filtring(mysqli_real_escape_string($connection ,$_POST['groupage']));

  if(!in_array($groupage ,['O+','A+','B+','AB+','O-','A-','B-','AB-']))
  {
	$error=1;
	$_SESSION['e_groupage'] = "Le groupe sanguin est incorrect!";

  }

}else
{
  $error =1;
   $_SESSION["e_groupage"] = "Obligatoire!";
}


		if($error==0)
		{
			$stmt=$connection->prepare("SELECT * FROM `bnadms` WHERE `blastek`='h_b_donneurs' AND `ville_donneur_s`=? AND `groupage_donneur_s`=? ");
			$stmt->bind_param("ss",$ville, $groupage);
			$stmt->execute();
			$res=$stmt->get_result();

				if($res->num_rows > 0)
				{
						while ($row = $res->fetch_assoc())
						{
							echo '
							<tr>
							  <td>
							
									<p class="fw-bold mb-1">'.$row['nom_donneur_s'].' '.$row['prenom_donneur_s'].'</p>
									
								
		
							  </td>
							  <td>

							  <p class="fw-bold mb-1">'.$row['agesdonneur_s'].' Ans</p>

							  </td>
							  <td>
								<p class="fw-bold mb-1">'.$row['telephone_donneur_s'].'</p>
								
							  </td>
							  <td>
								<h3 class="badge badge-success rounded-pill d-inline">'.$row['groupage_donneur_s'].'</h3>
							  </td>
							  
							  <td>
							  		<p class="fw-bold mb-1">'.$row['ville_donneur_s'].'</p>
							  </td>
							  <td>

							  <p class="fw-bold mb-1">'.$row['sexe_donneur_s'].'</p>

							  </td>
							</tr>
						   
						  ';
						}
				}else
				{
					echo'
					
					<tr>
					<td>
					Aucune donneur disponible
					</td>
					<td>
					Aucune donneur disponible
					</td>
					<td>
					Aucune donneur disponible
					</td>
					<td>
					Aucune donneur disponible
					</td>
					<td>
					Aucune donneur disponible
					</td>
					<td>
					Aucune donneur disponible
					</td>
					</tr>
					';
				}

		}else
		{
			
			echo '
			<div class="alert alert-success alert-dismissible">
			
			<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
					
				Veuillez Selecter la ville et le groupage!

			</div>
			';
		}
		
		
	}
	
	
	?>

</tbody>
</table>
	
</div>
					 </article>
				
				<main>
			</section>



		
<!-- Footer -->
<footer style="border: 1px solid #eee; background-image: url('images/bg15.jpg'); background-size: cover; background-repeat: no-repeat;" class="text-center text-lg-start bg-body-tertiary text-muted mt-5">
 

	<!-- Section: Links  -->
	<section class="">
	  <div class="container text-center text-md-start mt-5">
		<!-- Grid row -->
		<div class="row mt-3">
		  <!-- Grid column -->
		  <div style="border: 1px solid #eee;border-radius: 10px; width: 200px; background-color: #ffffff;" class=" p-3 col-lg-2 col-xl-2 mx-auto mb-4">
			<!-- Links -->
			<div>
			  <a href="index.html"><img class="img-fluid" src="images/log.png" width="50px" alt="log"><span style="font-size: 25px; color: black;" id="logo">GoutteVie</span></a>
			</div>
			<hr>
			<div  class="text-dark">
			  <p>LE SERVICE DU SANG</p>
			</div>
			<hr>
			<p class="text-dark text-center">
			  <i class="fas fa-home me-2"></i>Annaba, Algérie
			</p>
			<p class="text-dark">
			  <span>goutteviedz@gmail.com</span>
			</p>
			<hr>
			<p class="text-dark">
			  <i class="fas fa-phone me-2"></i> +213 7 95 33 75 74
			</p>
			
		  </div>
		  <!-- Grid column -->
  
		  <!-- Grid column -->
		  <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-4 text-center text-white">
			<!-- Links -->
			<h6 class="text-uppercase fw-bold mb-4">
			  LE DON DE SANG 
			</h6>
			<p>
			  <a href="#!" class="text-reset">Annonces</a>
			</p>
  
			<p>
			  <a href="#!" class="text-reset">Faire un Don</a>
			</p>
			
			<p>
			  <a href="#!" class="text-reset">Pourquoi Donner</a>
			</p>
			<p>
			  <a href="#!" class="text-reset">Qui peut Donner</a>
			</p>
			<p>
			  <a href="#!" class="text-reset">Délai Entre Deux Dons</a>
			</p>
			<p>
			  <a href="#!" class="text-reset">Comment se passe le don de Sang  </a>
			</p>
			
		  </div>
		  <!-- Grid column -->
  
		  <!-- Grid column -->
		  <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-4 text-center text-white">
			<!-- Links -->
			<h6 class="text-white fw-bold mb-4">
			  CONTACT
			</h6>
		  
			<p>
			  <a href="#!" class="text-reset">Connexion</a>
			</p>
			<p>
			  <a href="#!" class="text-reset">Contacter Nous</a>
			</p>
		   
			<!-- Section: Social media -->
			<div class="d-flex justify-content-center p-4 ">
	  
  
	<!-- Right -->
	<div class="text-center">
	  <a href="" class="me-4 text-reset">
		<img src="images/fb.png" alt="Facebook" width="40">
	  </a>
	 
	 
	  <a href="" class="me-4 text-reset">
		<img src="images/ins.png" alt="Instagram" width="40">
  
	  </a>
	  <a href="" class="me-4 text-reset">
		<img src="images/lin.png" alt="Linkedin" width="40">
  
	  </a>
	 
	</div>
	<!-- Right -->
			</div>
			<!-- Section: Social media -->
		  </div>
		  <!-- Grid column -->
  
		 
		</div>
		<!-- Grid row -->
	  </div>
	</section>
	<!-- Section: Links  -->
  
   
  
  
	<!-- Copyright -->
	<div class="text-center p-4 text-white" >
	  © 2024 Copyright :
	  <span class="text-white fw-bold"> GoutteVie.com</span>
	</div>
	<!-- Copyright -->
  </footer>
  <!-- Footer -->
  
  
  
  
  
  
  
  
  </body>
  </html>