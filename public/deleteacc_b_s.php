<?php
require_once "../core/autoloading.php";

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

		

	






if(!isset($_SESSION['ana_hwadel']) || !isset($_POST['csrf_tokensdel']))
{
    $_SESSION['erreur']= "Une erreur s'est produite. Veuillez réessayer";
    redirect('profile_b_s.php');
}

if($_POST['csrf_tokensdel']===$_SESSION['ana_hwadel'])
{
    if(time() >= $_SESSION['ana_hwa_timepass'])
    {
        unset($_SESSION['ana_hwadel']);  //On supprime le token pour
        unset($_SESSION['ana_hwa_timedel']);   //empêcher une utilisation future du meme token
        $_SESSION['erreur']= "Une erreur s'est produite. Veuillez réessayer";
        redirect('profile_b_s.php');
    }else
    {
        unset($_SESSION['ana_hwadel']);  //On supprime le token pour
        unset($_SESSION['ana_hwa_timedel']);  

        if (isset($_POST['delete'])) {
            $error_delete=0;
        
            if(isset($_POST['password_delete']) && !empty($_POST['password_delete']))
            {


                $password_delete =safi(mysqli_real_escape_string($connection,$_POST['password_delete']));

                if(strpos($password_delete, ' ') !== false)
                {
                    $error_delete=1;
                    $_SESSION['e_password_delete']="le Mot de passe ne doit pas contenir des espaces!";


                }else if(strlen($password_delete) < 8)
                {
                    $error_delete=1;
                    $_SESSION['e_password_delete']="Le mot de passe doit contenir au moins 8 caractères!";
                }

            }else
            {
            $error_delete=1;
                $_SESSION['e_password_delete']="Obligatoire!";
            }

            if($error_delete==0)
            {   
                if(!empty($password_delete))
                {
        
                    $stmt = $connection->prepare("SELECT  `password_D` FROM `bnadms` WHERE `email_donneur_s` = ? AND `valide_token_donneur`=? LIMIT 1");
                    $stmt->bind_param("ss", $_SESSION['y3adi'],$_SESSION['valide_token_donneur']);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $stmt->close();
                    $row_delete = $result->fetch_assoc();
                    $pass=$row_delete['password_D'];
                if (password_verify($password_delete, $pass)) {
                    
                    $stmt = $connection->prepare("DELETE FROM `bnadms` WHERE `email_donneur_s` = ? AND `valide_token_donneur`=? AND `password_D`=? LIMIT 1");
                    $stmt->bind_param("sss", $_SESSION['y3adi'],$_SESSION['valide_token_donneur'],$pass);
                    
                    
                    
        
                    $stmt->execute();
                    
                    
                    $stmt->close();
                    
                    
                    redirect('logout.php');
                    
                }else{
                    $_SESSION['e_password_delete']="Mot de passe  incorrect!";
                    redirect('profile_b_s.php');

                }
                }else
                {
                    $_SESSION['e_password_delete'] = "Obligatoire!";
                    redirect('profile_b_s.php');

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
    redirect('profile_b_s.php');
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

