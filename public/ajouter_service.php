<?php
require_once "../core/autoloading.php";
$error=0;
session_start();
if($_SERVER['REQUEST_METHOD']=='POST')
{


if(isset($_SESSION['y3adi']) && isset($_SESSION['valide_token_donneur']))
{
	$stmt_verif_session=$connection->prepare("SELECT  `email_donneur_s`, `valide_token_donneur`, `blastek` From `bnadms` WHERE `email_donneur_s`= ? LIMIT 1 ");
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
		if($row['blastek']==="h_bancsang_maalem_d")
		{

		

	






if(!isset($_SESSION['ana_hwa']) || !isset($_POST['csrf_token']))
{
    $_SESSION['erreur']= "Une erreur s'est produite. Veuillez réessayer";
    redirect('ajouter_service_banc.php');
}

if($_POST['csrf_token']===$_SESSION['ana_hwa'])
{
    if(time() >= $_SESSION['ana_hwa_time'])
    {
        unset($_SESSION['ana_hwa']);  //On supprime le token pour
        unset($_SESSION['ana_hwa_time']);   //empêcher une utilisation future du meme token
        $_SESSION['erreur']= "Une erreur s'est produite. Veuillez réessayer";
        redirect('ajouter_service_banc.php');
    }else
    {
        unset($_SESSION['ana_hwa']);  //On supprime le token pour
        unset($_SESSION['ana_hwa_time']);  

        if(isset($_POST['Ajouter']))
        {
            if(isset($_POST['nom_b_s']) && !empty($_POST['nom_b_s']))
            {
              $nom_b_s = filtring(mysqli_real_escape_string($connection,ucwords($_POST['nom_b_s'])));
              
              $allow = "/^[a-zA-Z]+((\s)?[a-zA-Z]+)+$/";
              if(!preg_match($allow,$nom_b_s))
              {
                $error=1;
                $_SESSION['e_nom_b_s']="Veuillez entrer le nom correct!";
                
              }else if(strlen($nom_b_s) > 30)
              {
                 $error=1;
                 $_SESSION['e_nom_b_s']="Le nom ne peut pas dépasser les 25 caractéres!";
                 
              
              }
              
            } else{
              $error=1;
              $_SESSION['e_nom_b_s']="Obligatoire! ";
              
            }

            if(isset($_POST['ville_b_s']) && !empty($_POST['ville_b_s']))
            {
              $ville_b_s= filtring(mysqli_real_escape_string($connection,$_POST['ville_b_s']));
                if (!in_array($ville_b_s, ['Adrar', 'Chlef', 'Laghouat', 'Oum El Bouaghi', 'Batna', 'Bejaia', 'Biskra', 'Bechar', 'Blida', 'Bouira', 'Tamanrasset', 'Tebessa', 'Tlemcen', 'Tiaret', 'Tizi Ouzou', 'Alger', 'Djelfa', 'Jijel', 'Setif', 'Saida', 'Skikda', 'Sidi Bel Abbes', 'Annaba', 'Guelma', 'Constantine', 'Medea', 'Mostaganem', 'MSila', 'Mascara', 'Ouargla', 'Oran', 'El Bayadh', 'Illizi', 'Bordj Bou Arreridj', 'Boumerdes', 'El Taref', 'Tindouf', 'Tissemsilt', 'El Oued', 'Khenchela', 'Souk Ahras', 'Tipaza', 'Mila', 'Ain Defla', 'Naama', 'Ain Témouchent', 'Ghardaia', 'Relizane', 'Timimoun', 'Bordj Badji Mokhtar', 'Ouled Djellal', 'Beni Abbes', 'In Salah', 'In Guezzam', 'Touggourt', 'Djanet', 'El Meghaier', 'El Menia'])) {
                    $error = 1;
                    $_SESSION['e_ville_b_s'] = "La ville n'est pas dans la liste des villes autorisées!";
                }
            
        
            }else
            {
              $error =1;
               $_SESSION["e_ville_b_s"] = "Obligatoire!";
            }


            if(isset($_POST['email_b_s']) && $_POST['email_b_s']!="")
            {
              $emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
              $email_b_s = filtring(mysqli_real_escape_string($connection,$_POST['email_b_s']));
                if (!preg_match($emailValidation , $email_b_s))
                {
                    $error=1;
                    $_SESSION['e_email_b_s']="Veuillez entrer un email correct!";
            
                }else
                {
                    $stmt_mail = $connection->prepare("SELECT `email_donneur_s` FROM `bnadms` WHERE `email_donneur_s` = ? LIMIT 1");
                    $stmt_mail->bind_param("s", $email_b_s);
                    $stmt_mail->execute();
                    $stmt_mail->store_result();
            
                    if($stmt_mail->num_rows > 0)
                    {
                         $error=1;
                         $_SESSION['e_email_b_s']='Cet e-mail est déjà utilisé!';
            
                    }
                }
                $stmt_mail->close();
            }else
            {
               $error=1;
               $_SESSION['e_email_b_s']="obligatoire!";
            }



            if(isset($_POST['password_b_s']) && !empty($_POST['password_b_s']))
            {
        
        
                $password_b_s =safi(mysqli_real_escape_string($connection,$_POST['password_b_s']));
                
        
                if(strpos($password_b_s, ' ') !== false)
                  {
                    $error=1;
                    $_SESSION['e_password_b_s']="le Mot de passe ne doit pas contenir des espaces!";
        
        
                  }elseif(strlen($password_b_s) < 8)
                 {
                     $error=1;
                     $_SESSION['e_password_b_s']="Le mot de passe doit contenir au moins 8 caractères!";
                 }else
                 {
                    $passwd=password_hash($password_b_s, PASSWORD_DEFAULT, ['cost' => 12]);
                 }
        
            }else
            {
               $error=1;
                $_SESSION['e_password_b_s']="Obligatoire!";
            }


            if(isset($_POST['telephone_b_s']) && !empty($_POST['telephone_b_s']))
            {
              $nbr="/^[0]{1}+[5-6-7]{1}+[\d]{8}$/";
              $tel= filtring(mysqli_real_escape_string($connection, $_POST['telephone_b_s']));
        
               if(!preg_match($nbr,$tel))
               {
                  $error=1;
                  $_SESSION["e_telephone_b_s"]="Numero de télephone invalide !";
               }else
               {
                $stmt_phone = $connection->prepare("SELECT `telephone_donneur_s` FROM `bnadms` WHERE `telephone_donneur_s` = ? LIMIT 1");
                $stmt_phone->bind_param("s", $tel);
                $stmt_phone->execute();
                $stmt_phone->store_result();
        
                if($stmt_phone->num_rows > 0)
                {
                     $error=1;
                     $_SESSION['e_telephone_b_s']='Cet Numéro est déjà utilisé!';
        
                }
               }
               $stmt_phone->close();
        
            }else
            {
               $error=1;
               $_SESSION["e_telephone_b_s"]="Obligatoires!";
        
            }


                    if(isset($_POST['latitude_b_s']) && !empty($_POST['latitude_b_s']))
                    {
                        $regexLatitude = '/^-?(90(\.0+)?|[0-9]|[1-8][0-9])(\.[0-9]{6})?$/';
                        $latitude= filtring(mysqli_real_escape_string($connection, $_POST['latitude_b_s']));
                        if(!preg_match($regexLatitude,$latitude))
                        {
                            $error=1;
                            $_SESSION['e_latitude']= "La latitude est invalide.";
                        }
                        

                    }else
                    {
                       $error=1;
                       $_SESSION["e_latitude"]="Obligatoires!";
                
                    }
                   
                    
                    
                    if(isset($_POST['longitude_b_s']) && !empty($_POST['longitude_b_s']))
                    {
                        $regexLongitude = '/^-?(180(\.0+)?|1[0-7][0-9]|[0-9]|[1-9][0-9])(\.[0-9]{6})?$/';
                        $longitude= filtring(mysqli_real_escape_string($connection, $_POST['longitude_b_s']));
                        if(!preg_match($regexLongitude,$longitude))
                        {
                            $error=1;
                            $_SESSION['e_longitude']= "La langitude est invalide.";
                        }
                        

                    }else
                    {
                       $error=1;
                       $_SESSION["e_longitude"]="Obligatoires!";
                
                    }

                    if(isset($_POST['addresse']) && !empty($_POST['addresse']))
                    {
                        $addresse = filtring(mysqli_real_escape_string($connection,ucwords(strtolower($_POST['addresse']))));
                        $allow_add = "/^[a-zA-Z]+((\s)?[a-zA-Z]+)+$/";
                        if(!preg_match($allow_add,$addresse))
                        {
                          $error=1;
                          $_SESSION['e_addresse_s']="Veuillez entrer le nom correct!";
                          
                        }else if(strlen($addresse) > 30)
                        {
                              $error=1;
                              $_SESSION['e_addresse_l']="Addresse trés longe!";
                        }

                    }else
                    {
                       $error=1;
                       $_SESSION["e_addresse_s"]="Obligatoires!";

                    }
        

            if($error==0)
            {   
                //insert data
                $url_validation=bin2hex(random_bytes(32));
                $code_verif=bin2hex(random_bytes(32)); 
                $token=bin2hex(random_bytes(32));
                $date = date("Y-m-d H:i:s");


                $stmt = $connection->prepare("INSERT INTO `bnadms`(
                    `nom_donneur_s`, `email_donneur_s`, `password_D`, 
                    `telephone_donneur_s`, 
                    `ville_donneur_s`, 
                    `blastek`, `code_verif`, `checkk_me_bro`, `valide_token_donneur`, 
                    `latitude_b_s`, `longitude_b_s`, `date_inscr`, `type`, `address`, `url_bnadms`
                ) VALUES (?,?,?,?,?,'h_bancsang_d',?,'oO',?,?,?,?,'banc',?,?)");
                
               
                $stmt->bind_param("sssssssddsss",
                    $nom_b_s, $email_b_s, $passwd, $tel, 
                    $ville_b_s, $code_verif,$token,$latitude, $longitude,$date,$addresse,$url_validation);

                $stmt->execute();
                if($stmt->affected_rows > 0)
                {   
                    $stmt->close();
                    $_SESSION['creat']="Banc du sang ajoutée avec succssé!";
                    redirect('ajouter_service_banc.php');
                }

            }else
            {
                redirect('ajouter_service_banc.php');
            }

          
        
        

          
        }
      
    }

}else
{
    $_SESSION['erreur']= "Une erreur s'est produite. Veuillez réessayer";
    redirect('ajouter_service_banc.php');
}


}else if($row['blastek']==='hopitale_b_d')
{
    redirect('hopitale.php');
}elseif($row['blastek']==="h_bancsang_d")
{
    redirect('banc.php');

}else if($row['blastek']==="h_b_donneurs")
{
    redirect('home.php');
}
}
}else{
redirect('login.php');	
}

}else
{
    redirect('ajouter_service_banc.php');

}
$stmt_verif_session->close();
$connection->close();
?>

