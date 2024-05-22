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
    redirect('ajouter_service_hopittalle.php');
}

if($_POST['csrf_token']===$_SESSION['ana_hwa'])
{
    if(time() >= $_SESSION['ana_hwa_time'])
    {
        unset($_SESSION['ana_hwa']);  //On supprime le token pour
        unset($_SESSION['ana_hwa_time']);   //empêcher une utilisation future du meme token
        $_SESSION['erreur']= "Une erreur s'est produite. Veuillez réessayer";
        redirect('ajouter_service_hopittalle.php');
    }else
    {
        unset($_SESSION['ana_hwa']);  //On supprime le token pour
        unset($_SESSION['ana_hwa_time']);  

        if(isset($_POST['Ajouterhopitale']))
        {
            if(isset($_POST['nom_h']) && !empty($_POST['nom_h']))
            {
              $nom_h = filtring(mysqli_real_escape_string($connection,ucwords($_POST['nom_h'])));
              
              $allow = "/^[a-zA-Z]+((\s)?[a-zA-Z]+)+$/";
              if(!preg_match($allow,$nom_h))
              {
                $error=1;
                $_SESSION['e_nom_h']="Veuillez entrer le nom correct!";
                
              }else if(strlen($nom_h) > 30)
              {
                 $error=1;
                 $_SESSION['e_nom_h']="Le nom ne peut pas dépasser les 25 caractéres!";
                 
              
              }
              
            } else{
              $error=1;
              $_SESSION['e_nom_h']="Obligatoire! ";
              
            }

            if(isset($_POST['ville_h']) && !empty($_POST['ville_h']))
            {
              $ville_h= filtring(mysqli_real_escape_string($connection,$_POST['ville_h']));
                if (!in_array($ville_h, ['Adrar', 'Chlef', 'Laghouat', 'Oum El Bouaghi', 'Batna', 'Bejaia', 'Biskra', 'Bechar', 'Blida', 'Bouira', 'Tamanrasset', 'Tebessa', 'Tlemcen', 'Tiaret', 'Tizi Ouzou', 'Alger', 'Djelfa', 'Jijel', 'Setif', 'Saida', 'Skikda', 'Sidi Bel Abbes', 'Annaba', 'Guelma', 'Constantine', 'Medea', 'Mostaganem', 'MSila', 'Mascara', 'Ouargla', 'Oran', 'El Bayadh', 'Illizi', 'Bordj Bou Arreridj', 'Boumerdes', 'El Taref', 'Tindouf', 'Tissemsilt', 'El Oued', 'Khenchela', 'Souk Ahras', 'Tipaza', 'Mila', 'Ain Defla', 'Naama', 'Ain Témouchent', 'Ghardaia', 'Relizane', 'Timimoun', 'Bordj Badji Mokhtar', 'Ouled Djellal', 'Beni Abbes', 'In Salah', 'In Guezzam', 'Touggourt', 'Djanet', 'El Meghaier', 'El Menia'])) {
                    $error = 1;
                    $_SESSION['e_ville_h'] = "La ville n'est pas dans la liste des villes autorisées!";
                }
            
        
            }else
            {
              $error =1;
               $_SESSION["e_ville_h"] = "Obligatoire!";
            }


            if(isset($_POST['email_h']) && $_POST['email_h']!="")
            {
              $emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
              $email_h = filtring(mysqli_real_escape_string($connection,$_POST['email_h']));
                if (!preg_match($emailValidation , $email_h))
                {
                    $error=1;
                    $_SESSION['e_email_h']="Veuillez entrer un email correct!";
            
                }
            }else
            {
               $error=1;
               $_SESSION['e_email_h']="obligatoire!";
            }



            if(isset($_POST['password_h']) && !empty($_POST['password_h']))
            {
        
        
                $password_h =safi(mysqli_real_escape_string($connection,$_POST['password_h']));
                
        
                if(strpos($password_h, ' ') !== false)
                  {
                    $error=1;
                    $_SESSION['e_password_h']="le Mot de passe ne doit pas contenir des espaces!";
        
        
                  }elseif(strlen($password_h) < 8)
                 {
                     $error=1;
                     $_SESSION['e_password_h']="Le mot de passe doit contenir au moins 8 caractères!";
                 }else
                 {
                    $passwd_h=password_hash($password_h, PASSWORD_DEFAULT, ['cost' => 12]);
                 }
        
            }else
            {
               $error=1;
                $_SESSION['e_password_h']="Obligatoire!";
            }


            if(isset($_POST['telephone_h']) && !empty($_POST['telephone_h']))
            {
              $nbr="/^[0]{1}+[5-6-7]{1}+[\d]{8}$/";
              $tel_h= filtring(mysqli_real_escape_string($connection, $_POST['telephone_h']));
        
               if(!preg_match($nbr,$tel_h))
               {
                  $error=1;
                  $_SESSION["e_telephone_h"]="Numero de télephone invalide !";
               }else
               {
                $stmt_phone = $connection->prepare("SELECT `telephone_donneur_s` FROM `bnadms` WHERE `telephone_donneur_s` = ? LIMIT 1");
                $stmt_phone->bind_param("s", $tel_h);
                $stmt_phone->execute();
                $stmt_phone->store_result();
        
                if($stmt_phone->num_rows > 0)
                {
                     $error=1;
                     $_SESSION['e_telephone_h']='Cet Numéro est déjà utilisé!';
        
                }
               }
               $stmt_phone->close();
        
            }else
            {
               $error=1;
               $_SESSION["e_telephone_h"]="Obligatoires!";
        
            }


            if(isset($_POST['addresse']) && !empty($_POST['addresse']))
                    {
                        $addresse_h = filtring(mysqli_real_escape_string($connection,ucwords(strtolower($_POST['addresse']))));
                        $allow_add = "/^[a-zA-Z]+((\s)?[a-zA-Z]+)+$/";
                        if(!preg_match($allow_add,$addresse_h))
                        {
                          $error=1;
                          $_SESSION['e_addresse_s']="Veuillez entrer le nom correct!";
                          
                        }else if(strlen($addresse_h) > 30)
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
                $code_verif_h=bin2hex(random_bytes(32)); 
                $token_h=bin2hex(random_bytes(32));
                $date = date("Y-m-d H:i:s");


                $stmt = $connection->prepare("INSERT INTO `bnadms`(
                    `nom_donneur_s`, `email_donneur_s`, `password_D`, 
                    `telephone_donneur_s`, 
                    `ville_donneur_s`, 
                    `blastek`, `code_verif`, `checkk_me_bro`, `valide_token_donneur`, 
                    `date_inscr`, `address`, `type`
                ) VALUES (?,?,?,?,?,'hopitale_b_d',?,'oO',?,?,?,'hopitale')");
                
               
                $stmt->bind_param("sssssssss",
                    $nom_h, $email_h, $passwd_h, $tel_h, 
                    $ville_h, $code_verif_h,$token_h,$date,$addresse_h);

                $stmt->execute();
                if($stmt->affected_rows > 0)
                {   
                    $stmt->close();
                    $_SESSION['creat']="Hopitale ajouté avec succssé!";
                    redirect('ajouter_service_hopittalle.php');
                }

            }else
            {
                redirect('ajouter_service_hopittalle.php');
            }

          
        
        

          
        }
      
    }

}else
{
    $_SESSION['erreur']= "Une erreur s'est produite. Veuillez réessayer";
    redirect('ajouter_service_hopittale.php');
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
    redirect('ajouter_service_hopittalle.php');

}
$stmt_verif_session->close();
$connection->close();
?>

