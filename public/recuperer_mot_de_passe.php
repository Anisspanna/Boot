<?php
require_once "../core/sessionprotection.php";
require_once "../core/autoloading.php";
session_start();

if(isset($_POST) &!empty($_POST))
{
  
  if(isset($_POST['csrf_token']))
  {
    if($_POST['csrf_token'] !== $_SESSION['ana_hwa'])
    {
      $_SESSION['creat']="Une erreur s'est produite. Veuillez réessayer";
      redirect('forgetpass.php');
      
    }

   

    $max_time = 5 * 60; 

    if(isset($_SESSION['ana_hwa_time']))
    {
      $t3adi_time=$_SESSION['ana_hwa_time'];
      if(time() >= $_SESSION['ana_hwa_time'])
      
      {
        unset($_SESSION['ana_hwa']);
        unset($_SESSION['ana_hwa_time']);
        $_SESSION['creat']="Une erreur s'est produite. Veuillez réessayer";
        redirect('forgetpass.php');

      }

    }
    
  } 
}
$_SESSION['ana_hwa']=bin2hex(random_bytes(32));
$_SESSION['ana_hwa_time']=time()+60*15; // 15 minutes

$error=0;
if(isset($_GET['em']) && isset($_GET['cd8']))
{
  $email = clear($_GET["em"]);
  $cdv=clear($_GET["cd8"]);
  $time=time();

  $stmt=$connection->prepare("SELECT `email_donneur_s`, `code_verif_pass_D`, `pass_time_reset` From `bnadms`  WHERE `code_verif_pass_D` = ? AND email_donneur_s = ? LIMIT 1");
  $stmt->bind_param("ss",$cdv,$email);
  $stmt->execute();
  $resulta_fin=$stmt->get_result();
  if($resulta_fin->num_rows > 0)
  {
        $ro = $resulta_fin->fetch_assoc();
        $unique_token=$ro['code_verif_pass_D'];
        $link_creation_time = strtotime($ro['pass_time_reset']);
        $time=time();
        $time_valid = 120; // 2mins
        $time_difference = $time - $link_creation_time; //now   - link creation time
        if ($time_difference > $time_valid) {
          $_SESSION['forget']="Il semble que vous ayez cliqué sur un lien de réinitialisation de mot de passe invalide. Veuillez réessayer.!";
          redirect('forgetpass.php');
        }else
        {
          $mail=$ro['email_donneur_s'];
          $unique=$ro['code_verif_pass_D'];
        }

      $stmt->close();
        
  }else
  {
      $_SESSION['forget']="Il semble que vous ayez cliqué sur un lien de réinitialisation de mot de passe invalide. Veuillez réessayer.!";
      redirect('forgetpass.php');
      
  }

}else
{
  $_SESSION['forget']="Entrer votre email pour recevoir le lien de réinitialisation du mot passe!";
  redirect('forgetpass.php');
}





// change password


if(isset($_POST['new']))
{
    
  

    if(isset($_POST['email']) && $_POST['email']!="")
  {
    $emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
    $email = filtring(mysqli_real_escape_string($connection,$_POST['email']));
    if (!preg_match($emailValidation , $email))
    {
        $error=1;
        $_SESSION['e_email']="Veuillez entrer un email correct!";

    }
    
  }else
  {
     $error=1;
     $_SESSION['e_email']="obligatoire!";
  }

  //password


  if(isset($_POST['password']) && $_POST['password']!="")
    {


        $password =filtring(mysqli_real_escape_string($connection,$_POST['password']));
        

         if(strlen($password) < 8)
         {
             $error=1;
             $_SESSION['e_password']="Le mot de passe doit contenir au moins 8 caractères!";
         }

    }else
    {
       $error=1;
        $_SESSION['e_password']="Obligatoire!";
    }


    //confirm_password

    if(isset($_POST['confirm_password']) && $_POST['confirm_password']!="")
    {


        $confirm_password =filtring(mysqli_real_escape_string($connection,$_POST['confirm_password']));
        

         if(strlen($confirm_password) < 8)
         {
             $error=1;
             $_SESSION['e_confirm_password']="Le mot de passe doit contenir au moins 8 caractères!";
         }

    }else
    {
       $error=1;
        $_SESSION['e_confirm_password']="Obligatoire!";
    }

      //password_token_validation

      if (!isset($_POST['password_token']) || empty($_POST['password_token'])) {
        $error = 1;


    } else {
        $password_token = clear($_POST['password_token']);
    }

    if($error==0)
    {
      if($password_token===$unique_token)
      {
        if (!empty($email) && !empty($password) && !empty($confirm_password)) {
               
            if($password===$confirm_password)
            {
        

              try
              {
               $hash = filtring(password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]));
               $stmt_update_pass = $connection->prepare("UPDATE `bnadms` SET `password_D`= ? WHERE `email_donneur_s`=? AND `code_verif_pass_D`=? LIMIT 1");
               $stmt_update_pass->bind_param("sss", $hash, $email, $password_token);
               $stmt_update_pass->execute();

               if ($stmt_update_pass->affected_rows > 0) {
                   $upd_token =bin2hex(random_bytes(32));
                   $stmt_update_pass->close();
  
                    $check_unique=mysqli_query($connection,"SELECT `code_verif_pass_D` FROM `bnadms` WHERE `code_verif_pass_D` = '$upd_token' LIMIT 1");

                    if(mysqli_num_rows($check_unique) <= 0)
                    {

                      
                      
                      
                        $stmt_update_code = $connection->prepare("UPDATE `bnadms` SET `code_verif_pass_D`=? WHERE `email_donneur_s`=? AND `code_verif_pass_D`=? LIMIT 1");
                        $stmt_update_code->bind_param("sss", $upd_token, $email, $password_token);
                        $stmt_update_code->execute();
                        if ($stmt_update_code->affected_rows > 0) {
                          $stmt_update_code->close();
                          $_SESSION['creat'] = "mot de passe mis à jour avec succès";
                          redirect('login.php');
                        }
                    }else
                    {
                      $_SESSION['creat'] ="Une erreur s'est produite. Veuillez réessayer!";
                      redirect("recuperer_mot_de_passe.php?cd8=$password_token&em=$email");

                    }
                  }else
                  {
                      $_SESSION['creat']="Une erreur s'est produite. Veuillez réessayer!";
                  }

              }catch(Exception $e){

                $_SESSION['creat'] = "n'a pas mis à jour le mot de passe, quelque chose s'est mal passé";
                redirect("recuperer_mot_de_passe.php?cd8=$password_token&em=$email");

              }



            }else
            {
               $_SESSION['creat']="les mots de passes ne correspondent pas.";
               


            }

        }
      }else
      {
        $_SESSION['creat'] = "Il semble que vous ayez cliqué sur un lien de réinitialisation de mot de passe invalide. Veuillez réessayer!";
        redirect("forgetpass.php");

      }

    }



}



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



#logo{
  font-family: font3;

}
  </style>




    <!-- navbar -->
      <header>
          <!-- Navbar -->
          <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
              <a class="navbar-brand" href="index.html"><img class="img-fluid" src="images/log.png" width="50px" alt="log"><span style="font-size: 22px;" id="logo">GoutteVie</span></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto  mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link " href="Annonces.html">Annonces</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="Faire_un_Don.html">Faire un Don ?</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link"  href="Pourquoi_Donner.html">Pourquoi Donner ?</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="Qui_peut_donner.html">Qui peut donner ?</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="Delai_Entre_Deux_Dons.html">Délai Entre Deux Dons ?</a>
                  </li>
                  
                </ul>
                <div  class="d-flex" >
                    <a href="contact.html" class="btn btn-outline-danger me-3">Contact</a>
                    <a href="login.html" class="btn btn-outline-danger">Connexion</a>
                </div>
              </div>
            </div>
        </nav>
        <!-- Navbar -->
      
    
    </header>

    


    <div id="login">
      <section class="container p-5">
               <main class="row justify-content-center">
                      <article style="max-width: 550px; border: 1px solid #eee; border-radius: 20px; background-color: #ffffff;" class="col-sm p-3">
                        <form  method="post" action="<?php htmlentities($_SERVER['PHP_SELF']);?>">
                            <input type="hidden" name="csrf_token" value="<?=$_SESSION['ana_hwa']?>" id="">
                          <div>
                          <input  type="hidden" name="password_token" id="user-id" value="<?php if(isset($unique)) echo $unique?>">
                            <h2 id="titre" class="text-center p-2">Récupérer mot de passe</h2>
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
                 
                          <!--email-->
                          <div class="mb-4">
                            <label for="exampleInputEmail1" class="form-label">Email </label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php if(isset($mail)) echo $mail; ?>" placeholder="Entrer votre email">
                            <?php if(isset($_SESSION['e_email'])) echo '<p class="text-danger">'.$_SESSION['e_email'].'</p>'; unset($_SESSION['e_email']);?>
                          
                          </div>


                          <!--password-->
                          <div class="mb-4">
                            <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Entrer votre Mot de passe">
                            <?php if(isset($_SESSION['e_password'])) echo '<p class="text-danger">'.$_SESSION['e_password'].'</p>'; unset($_SESSION['e_password']);?>

                          </div>


                           
                          <!--password Récupérer-->
                          <div class="mb-4">
                            <label for="exampleInputPassword1" class="form-label">Confermer Mot de passe</label>
                            <input type="password" name="confirm_password" class="form-control" id="exampleInputPassword1" placeholder="Entrer votre Mot de passe">
                            <?php if(isset($_SESSION['e_confirm_password'])) echo '<p class="text-danger">'.$_SESSION['e_confirm_password'].'</p>'; unset($_SESSION['e_confirm_password']);?>

                          </div>

                        

                         


            
                          <div>
                            <button style="width: 100%; background-color: #1984bc; color: #ffffff; font-size: large;" type="submit" name="new" class="btn">Confirmer</button>
                          </div>  
                          
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