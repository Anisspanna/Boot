<?php
require_once "../core/sessionprotection.php";

require_once "../core/autoloading.php";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

session_start();
$error=0;

if($_SERVER['REQUEST_METHOD']=='POST')
{



if(!isset($_SESSION['ana_hwa']) || !isset($_POST['csrf_token']))
{
    $_SESSION['creat']= "Une erreur s'est produite. Veuillez réessayer";
    redirect('login.php');
}


if($_POST['csrf_token']===$_SESSION['ana_hwa'])
{
    if(time() >= $_SESSION['ana_hwa_time'])
    {
        unset($_SESSION['ana_hwa']);  //On supprime le token pour
        unset($_SESSION['ana_hwa_time']);   //empêcher une utilisation future du meme token
        $_SESSION['creat']= "Une erreur s'est produite. Veuillez réessayer";
        redirect('inscription.php');
    }else
    {
        unset($_SESSION['ana_hwa']);  //On supprime le token pour
        unset($_SESSION['ana_hwa_time']);

   if(isset($_POST['register']))
{

   // Nom
  if(isset($_POST['nom']) && !empty($_POST['nom']))
  {
    $nom = filtring(mysqli_real_escape_string($connection,ucwords($_POST['nom'])));
    
    $allow = "/^[a-zA-Z]+(\s[a-zA-Z]+)?$/";
    if(!preg_match($allow,$nom))
    {
      $error=1;
      $_SESSION['e_nom']="Veuillez entrer le nom correct!";
      
    }else if(strlen($nom) > 25)
    {
       $error=1;
       $_SESSION['e_nom']="Le nom ne peut pas dépasser les 25 caractéres!";
       
    
    }
    
  } else{
    $error=1;
    $_SESSION['e_nom']="Obligatoire! ";
    
  }

  //Verification du prenom

  if(isset($_POST['prenom']) && !empty($_POST['prenom']))
  {
    $prenom = filtring(mysqli_real_escape_string($connection,ucwords($_POST['prenom'])));
    
    $allow = "/^[a-zA-Z]+(\s[a-zA-Z]+)?$/";
    if(!preg_match($allow,$prenom))
    {
        $error=1;
        $_SESSION['e_prenom']="Veuillez entrer le prenom correct!";
        
    }else if(strlen($prenom) > 25)
    {
        $error=1;
        $_SESSION['e_prenom']="Le prenom ne peut pas dépasser les 25 caractéres!";
       
    
    }
    
  } else{
    $error=1;
    $_SESSION['e_prenom']="Obligatoire! ";
  }


    //Email


  if(isset($_POST['email']) && !empty($_POST['email']))
  {
    $emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
    $email = filtring(mysqli_real_escape_string($connection,$_POST['email']));
    if (!preg_match($emailValidation , $email))
    {
        $error=1;
        $_SESSION['e_email']="Veuillez entrer un email correct!";

    }else
    {
        $stmt_mail = $connection->prepare("SELECT `email_donneur_s` FROM `bnadms` WHERE `email_donneur_s` = ? LIMIT 1");
        $stmt_mail->bind_param("s", $email);
        $stmt_mail->execute();
        $stmt_mail->store_result();

        if($stmt_mail->num_rows > 0)
        {
             $error=1;
             $_SESSION['e_email']='Cet e-mail est déjà utilisé!';

        }
    }
    $stmt_mail->close();
  }else
  {
     $error=1;
     $_SESSION['e_email']="obligatoire!";
  }

  //Password

  if(isset($_POST['password']) && !empty($_POST['password']))
    {


        $password =safi(mysqli_real_escape_string($connection,$_POST['password']));
        

        if(strpos($password, ' ') !== false)
          {
            $error=1;
            $_SESSION['e_password']="le Mot de passe ne doit pas contenir des espaces!";


          }elseif(strlen($password) < 8)
         {
             $error=1;
             $_SESSION['e_password']="Le mot de passe doit contenir au moins 8 caractères!";
         }else
         {
            $passwd=password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);
         }

    }else
    {
       $error=1;
        $_SESSION['e_password']="Obligatoire!";
    }


    //telephone

    if(isset($_POST['telephone']) && !empty($_POST['telephone']))
    {
      $nbr="/^[0]{1}+[5-6-7]{1}+[\d]{8}$/";
      $tel= filtring(mysqli_real_escape_string($connection, $_POST['telephone']));

       if(!preg_match($nbr,$tel))
       {
          $error=1;
          $_SESSION["e_telephone"]="Numero de télephone invalide !";
       }else
       {
        $stmt_phone = $connection->prepare("SELECT `telephone_donneur_s` FROM `bnadms` WHERE `telephone_donneur_s` = ? LIMIT 1");
        $stmt_phone->bind_param("s", $tel);
        $stmt_phone->execute();
        $stmt_phone->store_result();

        if($stmt_phone->num_rows > 0)
        {
             $error=1;
             $_SESSION['e_telephone']='Cet Numéro est déjà utilisé!';

        }
       }
       $stmt_phone->close();

    }else
    {
       $error=1;
       $_SESSION["e_telephone"]="Obligatoires!";

    }

    //Age

    if(isset($_POST['age'])  && !empty($_POST['age']))
    {
      $age=filtring(mysqli_real_escape_string($connection, $_POST['age']));
      if(!is_numeric($age) || $age<18 || $age > 70 )
      {
           $error=1;
           $_SESSION['e_age'] = "L'âge est invalide.";
      }


    }else
    {
       $error =1 ;
        $_SESSION["e_age"] ="Obligatoire!";
    }


    // Grouppage

    if(isset($_POST['groupage']) && !empty($_POST['groupage']))
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

    // Ville

    if(isset($_POST['ville']) && !empty($_POST['ville']))
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



    //Sexe


    if(isset($_POST['sexe']) && !empty($_POST['sexe']))
    {
      $sexe= filtring(mysqli_real_escape_string($connection ,$_POST['sexe']));

      if(!in_array($sexe ,['homme','femme']))
      {
        $error=1;
        $_SESSION['e_sexe'] = "Le sexe est incorrect!";

      }

    }else
    {
      $error =1;
       $_SESSION["e_sexe"] = "Obligatoire!";
    }








  if($error==0)
  {
    $url_validation=bin2hex(random_bytes(32));
    $code_verification=bin2hex(random_bytes(32));
    $check_unique=mysqli_query($connection,"SELECT `code_verif` FROM `bnadms` WHERE `code_verif` = '$code_verification' LIMIT 1");
    if(mysqli_num_rows($check_unique) <= 0)
    {

      
      $token=bin2hex(random_bytes(32));
      $urldonneur=bin2hex(random_bytes(16));
      $date = date("Y-m-d H:i:s");
      
      $insert=$connection->prepare("INSERT INTO `bnadms`(`nom_donneur_s`, `prenom_donneur_s`, `email_donneur_s`, `password_D`, `telephone_donneur_s`, `agesdonneur_s`, `groupage_donneur_s`, `ville_donneur_s`, `sexe_donneur_s`, `blastek`, `code_verif`, `valide_token_donneur`, `date_inscr`, `url_bnadms`) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,'h_b_donneurs', ?, ?, ?, ?)");
    $insert->bind_param("sssssssssssss", $nom, $prenom, $email, $passwd, $tel, $age, $groupage, $ville, $sexe, $code_verification, $token, $date,$url_validation);
    $insert->execute();
    if($insert->affected_rows > 0)
    {
      require_once "../core/mailsend.php";
      
      try
      {
        $mail = new PHPMailer(true);            
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                    
        $mail->SMTPAuth   = true;                                  
        $mail->Username   = 'anissannabi2@gmail.com';                    
          $mail->Password   = 'rhnlzljubvpnjzcy';                           
          $mail->SMTPSecure = 'tls';           
          $mail->Port       = 587;                                   
          $mail->setFrom('anissannabi2@gmail.com');
          $mail->addAddress($email);    
          $mail->isHTML(true);
          
          $mail->Subject = ' Verification Email Addresse';
          
          $mail->Body  = $style;
          $true=$mail->send();
          
          if($true)
          {
            $_SESSION['creat'] ="Vérifier Votre email pour vous Connectez.";
          }
          
          redirect('login.php');
          

        }catch(Exception $e){
          $_SESSION['creat'] ="Une erreur s'est produite. Veuillez réessayer.";
          
        }
        
        
    }else
    {
      $_SESSION['creat'] ="Une erreur s'est produite. Veuillez réessayer!";
      redirect('inscription.php');
    }
    
  }else
  {
    $_SESSION['creat']= "Une erreur s'est produite. Veuillez réessayer";
    redirect('inscription.php');
    
  }
    
  }else
  {
    
    redirect('inscription.php');
  }



  $insert->close();
}   


    }

}else
{
    $_SESSION['creat']= "Une erreur s'est produite. Veuillez réessayer";
    redirect('inscription.php');
}


}else
{
    redirect('inscription.php');

}
$connection->close();

?>
