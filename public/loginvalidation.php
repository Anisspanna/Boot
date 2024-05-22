<?php
require_once "../core/autoloading.php";
$error=0;
session_start();


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
        redirect('login.php');
    }else
    {
        unset($_SESSION['ana_hwa']);  //On supprime le token pour
        unset($_SESSION['ana_hwa_time']);  


    if(isset($_POST['email']) && !empty($_POST['email']))
  {
    $emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
    $email = filtring(mysqli_real_escape_string($connection,$_POST['email']));
    if (!preg_match($emailValidation , $email))
    {
        $error=1;
        $_SESSION['e_email']="format d'email invalide!";

    }

  }else
  {
     $error=1;
     $_SESSION['e_email']="obligatoire!";
  }

    //password

  if(isset($_POST['password']) && !empty($_POST['password']))
  {

      $password =safi(mysqli_real_escape_string($connection,$_POST['password']));

  }else
  {
     $error=1;
      $_SESSION['e_password']="Obligatoire!";
  }

  if($error==0)
  {
    $stmt_login = $connection->prepare("SELECT  `email_donneur_s`, `valide_token_donneur`, `password_D`, `checkk_me_bro`, `blastek`, `valide_token_donneur` FROM `bnadms` WHERE email_donneur_s=? LIMIT 1");
    $stmt_login->bind_param("s", $email);
    $stmt_login->execute();
    $result = $stmt_login->get_result();

    if($result->num_rows >0)
    {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password_D'])) {
            $stmt_login->close();
            if ($row['checkk_me_bro'] === "oO") {
                
                session_regenerate_id(true);
                $_SESSION['y3adi'] = $email;
                $_SESSION['valide_token_donneur'] = $row['valide_token_donneur'];

                if($row['blastek']==="h_b_donneurs")
                {
                        redirect('home.php');
                }else if($row['blastek']==="hopitale_b_d")
                {
                        redirect('hopitale.php');
                        
                }else if($row['blastek']==="h_bancsang_d")
                {
                        redirect('banc.php');
                }else if($row['blastek']==="h_bancsang_maalem_d")
                {
                    redirect('bancsang_mallem.php');
                }

            }else
            {
                $_SESSION['creat']="veuillez vérifier votre e-mail pour vous connecter !";
                redirect('login.php');
            }
        }else
        {
            $error=1;
            $_SESSION['e_email']="Email ou mot de passe incorrect.";
            $_SESSION['e_password']="Email ou mot de passe incorrect.";
            redirect('login.php');

        }
    }else
    {
        $error=1;
        $_SESSION['e_email']="Email ou mot de passe incorrect.";
        $_SESSION['e_password']="Email ou mot de passe incorrect.";
        redirect('login.php');
    }

  }else
  {
    redirect('login.php');
  }

        
      
    }

}else
{
    $_SESSION['creat']= "Une erreur s'est produite. Veuillez réessayer";
    redirect('login.php');
}

}else
{
    redirect('login.php');

}

$connection->close();
?>