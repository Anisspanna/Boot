<?php
require_once "../core/sessionprotection.php";
require_once "../core/autoloading.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if($_SERVER['REQUEST_METHOD']=='POST')
{

session_start();
$error = 0;


if(!isset($_SESSION['ana_hwa']) || !isset($_POST['csrf_token']))
{
    $_SESSION['creat']= "Une erreur s'est produite. Veuillez réessayer";
    redirect('forgetpass.php');
}

if($_POST['csrf_token']===$_SESSION['ana_hwa'])
{
    if(time() >= $_SESSION['ana_hwa_time'])
    {
        unset($_SESSION['ana_hwa']);  //On supprime le token pour
        unset($_SESSION['ana_hwa_time']);   //empêcher une utilisation future du meme token
        $_SESSION['creat']= "Une erreur s'est produite. Veuillez réessayer";
        redirect('forgetpass.php');
    }else
    {
        unset($_SESSION['ana_hwa']);  //On supprime le token pour
        unset($_SESSION['ana_hwa_time']);  

        if(isset($_POST['Reset']))
{
    if(isset($_POST['email']) && $_POST['email']!="")
    {
      $emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
      $email = clear(mysqli_real_escape_string($connection,$_POST['email']));
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

    if($error==0)
    {
      
     
        
        
        $stmt_get_mail = $connection->prepare("SELECT `email_donneur_s` FROM `bnadms` WHERE `email_donneur_s`=? LIMIT 1");
        $stmt_get_mail->bind_param("s", $email);
        $stmt_get_mail->execute();
        $result = $stmt_get_mail->get_result();
        
        if($result->num_rows > 0)
        {
          $stmt_get_mail->close();

           $code_verification=bin2hex(random_bytes(32));
            $sql= "SELECT `code_verif_pass_D` FROM `bnadms` WHERE `code_verif_pass_D`='$code_verification' LIMIT 1";
            $result_sql=mysqli_query($connection,$sql);

              if(mysqli_num_rows($result_sql)==0)
              {

                $date = date("Y-m-d H:i:s");
           
            
                $stmt_update_token = $connection->prepare("UPDATE `bnadms` SET `code_verif_pass_D`=?, `pass_time_reset`=? WHERE `email_donneur_s`=? LIMIT 1");
                $stmt_update_token->bind_param("sss", $code_verification, $date, $email);
                $stmt_update_token->execute();
                
            
            if ($stmt_update_token->affected_rows > 0) {
              
              require_once "../core/mailpass.php";
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
                
                $mail->Subject = ' Reanstalisation du Mot de passe!';
                
                $mail->Body  = $style;
                $true=$mail->send();
                
                if($true)
                {
                  $_SESSION['creat'] ="Un mail a été envoyé à votre adresse pour réinitialiser le mot de passe!";
                }
                
                redirect('login.php');
               
                
                
              }catch(Exception $e){
                $_SESSION['creat'] ="Une erreur s'est produite. Veuillez réessayer.";
                redirect('forgetpass.php');
                
              }
              $stmt_update_token->close();
              
            }else
            {
              $_SESSION['creat'] ="Une erreur s'est produite. Veuillez réessayer.";
              redirect('forgetpass.php');
            }

          }else
          {
            $_SESSION['creat']= "Une erreur s'est produite. Veuillez réessayer";
            redirect('forgetpass.php');
          }  
            
        }else
        {
            $_SESSION['creat'] = "Cet email est invalide!";
            redirect('forgetpass.php');  
        }
       


    }else
    {
        redirect('forgetpass.php');
    }
}

    
        
      
    }

}else
{
    $_SESSION['creat']= "Une erreur s'est produite. Veuillez réessayer";
    redirect('forgetpass.php');
}



}else
{
    redirect('forgetpass.php');

}
$connection->close();

?>