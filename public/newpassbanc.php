<?php
require_once "../core/autoloading.php";
$error=0;
session_start();
if($_SERVER['REQUEST_METHOD']=='POST')
{


if(isset($_SESSION['y3adi']) && isset($_SESSION['valide_token_donneur']))
{
	$stmt_verif_session=$connection->prepare("SELECT  `agesdonneur_s`, `email_donneur_s`, `ville_donneur_s`, `valide_token_donneur`, `blastek`, `telephone_donneur_s` From `bnadms` WHERE `email_donneur_s`= ? LIMIT 1 ");
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
		if($row['blastek']==="h_bancsang_maalem_d" || $row['blastek']==="hopitale_b_d" || $row['blastek']==="h_bancsang_d")
		{

		

	






if(!isset($_SESSION['ana_hwapass']) || !isset($_POST['csrf_tokens']))
{
    $_SESSION['erreur']= "Une erreur s'est produite. Veuillez réessayer";
    redirect('profile_b_s.php');
}

if($_POST['csrf_tokens']===$_SESSION['ana_hwapass'])
{
    if(time() >= $_SESSION['ana_hwa_timepass'])
    {
        unset($_SESSION['ana_hwapass']);  //On supprime le token pour
        unset($_SESSION['ana_hwa_timepass']);   //empêcher une utilisation future du meme token
        $_SESSION['erreur']= "Une erreur s'est produite. Veuillez réessayer";
        redirect('profile_b_s.php');
    }else
    {
        unset($_SESSION['ana_hwapass']);  //On supprime le token pour
        unset($_SESSION['ana_hwa_timepass']);  

        if(isset($_POST['nv_pass']))
        {


            if(isset($_POST['password']) && !empty($_POST['password']))
            {


                $password =safi(mysqli_real_escape_string($connection,$_POST['password']));

                if(strpos($password, ' ') !== false)
                {
                    $error=1;
                    $_SESSION['e_password']="le Mot de passe ne doit pas contenir des espaces!";


                }else if(strlen($password) < 8)
                {
                    $error=1;
                    $_SESSION['e_password']="Le mot de passe doit contenir au moins 8 caractères!";
                }

            }else
            {
            $error=1;
                $_SESSION['e_password']="Obligatoire!";
            }

            if(isset($_POST['new_password']) && !empty($_POST['new_password']))
            {


                $new_password =safi(mysqli_real_escape_string($connection,$_POST['new_password']));
                

                if(strpos($new_password, ' ') !== false)
                {
                    $error=1;
                    $_SESSION['e_new_password']="le Mot de passe ne doit pas contenir des espaces!";


                }elseif(strlen($new_password) < 8)
                {
                    $error=1;
                    $_SESSION['e_new_password']="Le mot de passe doit contenir au moins 8 caractères!";
                }else
                {
                    $hash = password_hash($new_password, PASSWORD_DEFAULT,['cost' => 12]);

                }

            }else
            {
            $error=1;
                $_SESSION['e_new_password']="Obligatoire!";
            }

            if($error==0)
            {
                $stmt = $connection->prepare("SELECT `password_D` FROM `bnadms` WHERE `email_donneur_s` = ? AND `valide_token_donneur`=? LIMIT 1");
                $stmt->bind_param("ss", $_SESSION['y3adi'],$_SESSION['valide_token_donneur']);
                $stmt->execute();
                $result = $stmt->get_result();
                $stmt->close();
                if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $old_password = $row['password_D'];
                if (password_verify($password, $old_password)) {
                    if(!password_verify($new_password,$old_password))
                    {   
                        $stmt = $connection->prepare("UPDATE `bnadms` SET `password_D` = ? WHERE `email_donneur_s` = ? AND `password_D`= ? AND `valide_token_donneur`=? LIMIT 1");
                        $stmt->bind_param("ssss", $hash, $_SESSION['y3adi'],$old_password,$_SESSION['valide_token_donneur']);
                        $stmt->execute();
                        $stmt->close();
                        $_SESSION['creat']= "Votre mot de passe a été modifié avec succès.";
                        redirect('profile_b_s.php');
                    }
                    else
                    {
                        $_SESSION['erreur']="vous etes deja utiliser ce mot de passe!";
                        redirect('profile_b_s.php');
                    }
                }else
                {
                    $_SESSION['erreur']="Mot de pass incorect!";
                    redirect('profile_b_s.php');
                    
                }

                }
            }else
            {
                redirect('profile_b_s.php');

            }




        }
      
    }

}else
{
    $_SESSION['erreur']= "Une erreur s'est produite. Veuillez réessayer";
    redirect('profile.php');
}


}else if($row['blastek']==='h_b_donneurs')
{
    redirect('profile.php');
}
}
}else{
redirect('login.php');	
}

}else
{
    redirect('profile_b_s.php');

}
$stmt_verif_session->close();
$connection->close();
?>

