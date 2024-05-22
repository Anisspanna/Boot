<?php
require_once "../core/sessionprotection.php";
require_once "../core/autoloading.php";

session_start();

$_SESSION['ana_hwa']=bin2hex(random_bytes(32));
$_SESSION['ana_hwa_time']=time()+60*15; // 15 minutes

if(isset($_SESSION['y3adi']) && isset($_SESSION['valide_token_donneur']))
{
    $stmt_verif_session=$connection->prepare("SELECT  `email_donneur_s`, `valide_token_donneur`, `blastek` From `bnadms` WHERE `email_donneur_s`= ? LIMIT 1 ");
    $stmt_verif_session->bind_param("s", $_SESSION["y3adi"]);
    $stmt_verif_session->execute();
    $result = $stmt_verif_session->get_result();
	  $row=$result->fetch_assoc();

    $database_token=$row['valide_token_donneur'];
    $session_token=$_SESSION['valide_token_donneur'];
    $stmt_verif_session->close();
	  if($database_token==$session_token)
	  {
		
      if($row['blastek']==='h_b_donneurs')
      {
        redirect('profile.php');
      }elseif($row['blastek']==='hopitale_b_d')
      {
        redirect('hopitale.php');

      }elseif($row['blastek']==='h_bancsang_d')
      {
        redirect('banc.php');

      }else if($row['blastek']==='h_bancsang_maalem_d')
      {
          redirect('bancsang_mallem.php');

      }
	  }else
    {
      unset($_SESSION['y3adi']);
      unset($_SESSION['valide_token_donneur']);
      

    }
}

$connection->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap1.css">
    <link rel="stylesheet" href="css/bootstrap2.css">
    <link rel="stylesheet" href="css/bootstrap3.css">
    <link rel="stylesheet" href="css/btn1.css">

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
          <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
          <a class="navbar-brand" href="index.php"><img class="img-fluid" src="images/log.png" width="50px" alt="log"><span style="font-size: 22px;" id="logo">GoutteVie</span></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto  mb-2 mb-lg-0">
             
            <li class="nav-item">
                <a class="nav-link"  href="chercher_donneur.php">Chercher Donneurs ?</a>
              </li>
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
    </nav>
        <!-- Navbar -->
      
    
      </header>


    <div id="login">
      <section class="container p-5" >
               <main class="row justify-content-center">
                      <article style="max-width: 550px; border: 1px solid #eee; border-radius: 20px; background-color: #ffffff;" class="col-sm p-3">
                        <form  method="post" action="<?php echo htmlspecialchars("inscriptionvalidation.php");?>">
                          <div>
                          <input type="hidden" name="csrf_token" value="<?=$_SESSION['ana_hwa']?>" id="">

                            <h2 id="titre" class="text-center p-2">Inscrivez-vous</h2>

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
                            
                            <hr style="color: #000;">
                          </div>
                            <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col">
      <div class="col-sm">
        <div  class="">
          <label for="exampleInputEmail1" class="form-label">Nom </label>
          <input type="text" name="nom" id="form3Example2" class="form-control" placeholder="Entrer votre Nom"/>
        </div>
        <?php if(isset($_SESSION['e_nom'])) echo '<p class="text-danger">'.$_SESSION['e_nom'].'</p>'; unset($_SESSION['e_nom']);?>

      </div>
    </div>
    <div class="col">
      <div  class="">
        <label for="exampleInputEmail1" class="form-label">Prenom </label>
        <input type="text" name="prenom" id="form3Example2" class="form-control" placeholder="Entrer votre Prenom"/>
      </div>
      <?php if(isset($_SESSION['e_prenom'])) echo '<p class="text-danger">'.$_SESSION['e_prenom'].'</p>'; unset($_SESSION['e_prenom']);?>
    </div>
  </div>                    
                          <!--email-->
                          <div class="mb-4">
                            <label for="exampleInputEmail1" class="form-label">Email </label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrer votre email">
                            <?php if(isset($_SESSION['e_email'])) echo '<p class="text-danger">'.$_SESSION['e_email'].'</p>'; unset($_SESSION['e_email']);?>

                          </div>
                          <!--password-->
                          <div class="mb-4">
                            <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Entrer votre Mot de passe">
                            <?php if(isset($_SESSION['e_password'])) echo '<p class="text-danger">'.$_SESSION['e_password'].'</p>'; unset($_SESSION['e_password']);?>
                          </div>

                        
                          <!--telephone-->
                          <div class="mb-4">
                            <label for="exampleInputPassword1" class="form-label">Âge </label>
                            <input type="text" name="age" class="form-control" id="exampleInputPassword1" placeholder="Entrer votre Age">
                            <?php if(isset($_SESSION['e_age'])) echo '<p class="text-danger">'.$_SESSION['e_age'].'</p>'; unset($_SESSION['e_age']);?>                        
                          </div>

                          <!--telephone-->
                          <div class="mb-4">
                            <label for="exampleInputPassword1" class="form-label">Numero Téléphone </label>
                            <input type="text" name="telephone" class="form-control" id="exampleInputPassword1" placeholder="Entrer votre Numero telephone">
                            <?php if(isset($_SESSION['e_telephone'])) echo '<p class="text-danger">'.$_SESSION['e_telephone'].'</p>'; unset($_SESSION['e_telephone']);?>                        

                          </div>


<div class="d-flex justify-content-around  ">

                          <!--Groupage-->
                          
                          <div class="mb-4 p-2">
                            <label class="text-center">Groupage</label>

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
                              <?php if(isset($_SESSION['e_groupage'])) echo '<p class="text-danger">'.$_SESSION['e_groupage'].'</p>'; unset($_SESSION['e_groupage']);?>                        

                          </div>


                        <!--ville-->
                        <div class="mb-4 p-2">
                          <label >Ville</label>

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
                            <?php if(isset($_SESSION['e_ville'])) echo '<p class="text-danger">'.$_SESSION['e_ville'].'</p>'; unset($_SESSION['e_ville']);?>                        

                          </div>


                         
                          
                          <div class="mb-4 p-2">
                            <label>Sexe</label>
                            

                              <select name="sexe" class="form-select">
                                <option value="" selected disabled>Sexe</option>
                                <option value="homme">Homme</option>
                                <option value="femme">Femme</option>
                              </select>
                              <?php if(isset($_SESSION['e_sexe'])) echo '<p class="text-danger">'.$_SESSION['e_sexe'].'</p>'; unset($_SESSION['e_sexe']);?>                        

                          </div>

 </div>                  
                          <div>
                            <button style="width: 100%; background-color: #1984bc; color: #ffffff; font-size: large;" type="submit" name="register" class="btn">S'Incrire</button>
                          </div>  
                          <h6 class="mt-3 text-center">Ne pas recevoir un email? <a href="renvoyer.php">Renvoyer</a></h6>
                          <h6 class="mt-3 text-center">Êtes-vous déjà inscrit? <a href="login.php">Connecter-vous</a></h6>
                          
                      </form>
                      </article>
               </main>
      </section>
    </div>

     








      

<!-- Footer -->
<footer style="border: 1px solid #eee; background-image: url('images/bg15.jpg'); background-size: cover; background-repeat: no-repeat;" class="text-center text-lg-start bg-body-tertiary text-muted" >
 

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