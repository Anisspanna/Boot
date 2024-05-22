<?php
require_once "../core/sessionprotection.php";

require_once "../core/autoloading.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
session_start();

$error = 0;

if($_SERVER['REQUEST_METHOD']=='POST')
{


if(!isset($_SESSION['ana_hwa']) || !isset($_POST['csrf_token']))
{
    $_SESSION['creat']= "Une erreur s'est produite. Veuillez réessayer";
    redirect('renvoyer.php');
}

if($_POST['csrf_token']===$_SESSION['ana_hwa'])
{
    if(time() >= $_SESSION['ana_hwa_time'])
    {
        unset($_SESSION['ana_hwa']);  //On supprime le token pour
        unset($_SESSION['ana_hwa_time']);   //empêcher une utilisation future du meme token
        $_SESSION['creat']= "Une erreur s'est produite. Veuillez réessayer";
        redirect('renvoyer.php');
    }else
    {
        unset($_SESSION['ana_hwa']);  //On supprime le token pour
        unset($_SESSION['ana_hwa_time']);  


        if(isset($_POST['renvoyer'])) 
{

    

    if(isset($_POST['email']) && $_POST['email']!="")
    {
      $emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
      $email = clear(mysqli_real_escape_string($connection,$_POST['email']));
      if (!preg_match($emailValidation , $email))
      {
          $error=1;
          $_SESSION['e_email']="Veuillez entrer un email correct!";
  
      }else
      {
          $stmt_mail = $connection->prepare("SELECT `code_verif`, `checkk_me_bro` FROM `bnadms` WHERE `email_donneur_s` = ? LIMIT 1");
          $stmt_mail->bind_param("s", $email);
          $stmt_mail->execute();
          $res=$stmt_mail->get_result();
  
      }
      
    }else
    {
       $error=1;
       $_SESSION['e_email']="obligatoire!";
    }


    if($error==0)
    {
        if($res->num_rows > 0)
        {
            $info = $res->fetch_assoc();
            $checkk = $info['checkk_me_bro'];

            if($checkk=='xX')
            {   
                $date = date("Y-m-d H:i:s");
                $code_verification=$info['code_verif'];
                $stmt_mail->close();
                $stmt = $connection->prepare("UPDATE `bnadms` SET `date_inscr`=? WHERE email_donneur_s=? LIMIT 1");
                $stmt->bind_param("ss", $date, $email);
                $stmt->execute();

                if($stmt->affected_rows > 0)
                {
                    $stmt->close();
                    // Envoie du mail de validation

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
                          $_SESSION['creat'] ="Vérifier Votre email pour vous connectez.";
                        }
                        
                        redirect('renvoyer.php');
                        
              
                      }catch(Exception $e){
                        $_SESSION['creat'] ="Une erreur s'est produite. Veuillez réessayer.";
                        redirect('renvoyer.php');
                        
                      }
                }

                

            }else
            {
                $_SESSION['creat'] = "cet e-mail est déjà vérifier, Veuillez vous connectez maintenant !";
                redirect('login.php');
            }

        }else
        {
           $_SESSION['creat'] = "Cet email est invalide!";
           redirect('renvoyer.php');   
        }
    }else
    {
        redirect('renvoyer.php');
    }



}



        
      
    }

}else
{
    $_SESSION['creat']= "Une erreur s'est produite. Veuillez réessayer";
    redirect('renvoyer.php');
}




}else
{
    redirect('renvoyer.php');

}
$connection->close();

?>