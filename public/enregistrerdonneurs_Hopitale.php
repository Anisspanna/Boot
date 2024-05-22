<?php
require_once "../core/autoloading.php";
$error=0;
session_start();
if($_SERVER['REQUEST_METHOD']=='POST')
{


if(isset($_SESSION['y3adi']) && isset($_SESSION['valide_token_donneur']))
{
	$stmt_verif_session=$connection->prepare("SELECT  `vsidentite`, `nom_donneur_s`, `email_donneur_s`, `valide_token_donneur`, `ville_donneur_s`, `blastek` From `bnadms` WHERE `email_donneur_s`= ? LIMIT 1 ");
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
		if($row['blastek']==="h_bancsang_maalem_d" || $row['blastek']==="h_bancsang_d")
		{

		

            $get_hopitale=$connection->prepare("SELECT `nom_donneur_s` FROM `bnadms` WHERE `blastek`='hopitale_b_d' AND `ville_donneur_s`=?");
            $get_hopitale->bind_param("s",$row['ville_donneur_s']);
            $get_hopitale->execute();
            $hopitaux=$get_hopitale->get_result();
            $array_h=[];

            foreach($hopitaux as $h)
            {
                $array_h[]=$h['nom_donneur_s'];
            }






if(!isset($_SESSION['ana_hwa']) || !isset($_POST['csrf_token']))
{
    $_SESSION['erreur']= "Une erreur s'est produite. Veuillez réessayer";
    redirect('enregistrerdonneurs_H.php');
}

if($_POST['csrf_token']===$_SESSION['ana_hwa'])
{
    if(time() >= $_SESSION['ana_hwa_time'])
    {
        unset($_SESSION['ana_hwa']);  //On supprime le token pour
        unset($_SESSION['ana_hwa_time']);   //empêcher une utilisation future du meme token
        $_SESSION['erreur']= "Une erreur s'est produite. Veuillez réessayer";
        redirect('enregistrerdonneurs_H.php');
    }else
    {
        unset($_SESSION['ana_hwa']);  //On supprime le token pour
        unset($_SESSION['ana_hwa_time']);  

        if(isset($_POST['enregistrer_d']))
        {
                    
                // Nom

                if(isset($_POST['nom_donneur']) && !empty($_POST['nom_donneur']))
                {
                    $nom_donneur = filtring(mysqli_real_escape_string($connection,ucwords($_POST['nom_donneur'])));
                    
                    $allow = "/^[a-zA-Z]+(\s[a-zA-Z]+)?$/";
                    if(!preg_match($allow,$nom_donneur))
                    {
                    $error=1;
                    $_SESSION['e_nom_donneur']="Veuillez entrer le nom correct!";
                    
                    }else if(strlen($nom_donneur) > 25)
                    {
                    $error=1;
                    $_SESSION['e_nom_donneur']="Le nom ne peut pas dépasser les 25 caractéres!";
                    
                    
                    }
                    
                } else{
                    $error=1;
                    $_SESSION['e_nom_donneur']="Obligatoire! ";
                    
                }
                                
                if(isset($_POST['prenom_donneur']) && !empty($_POST['prenom_donneur']))
                {
                    $prenom_donneur = filtring(mysqli_real_escape_string($connection,ucwords($_POST['prenom_donneur'])));
                    
                    $allow = "/^[a-zA-Z]+(\s[a-zA-Z]+)?$/";
                    if(!preg_match($allow,$prenom_donneur))
                    {
                        $error=1;
                        $_SESSION['e_prenom_donneur']="Veuillez entrer le prenom correct!";
                        
                    }else if(strlen($prenom_donneur) > 25)
                    {
                        $error=1;
                        $_SESSION['e_prenom_donneur']="Le prenom ne peut pas dépasser les 25 caractéres!";
                    
                    
                    }
                    
                } else{
                    $error=1;
                    $_SESSION['e_prenom_donneur']="Obligatoire! ";
                }



                
                if(isset($_POST['age_donneur'])  && !empty($_POST['age_donneur']))
                {
                $age_donneur=filtring(mysqli_real_escape_string($connection, $_POST['age_donneur']));
                if(!is_numeric($age_donneur) || $age_donneur<18 || $age_donneur > 70 )
                {
                    $error=1;
                    $_SESSION['e_age_donneur'] = "L'âge est invalide.";
                }


                }else
                {
                $error =1 ;
                    $_SESSION["e_age_donneur"] ="Obligatoire!";
                }


                if(isset($_POST['groupage_donneur']) && !empty($_POST['groupage_donneur']))
                {
                $groupage_donneur= filtring(mysqli_real_escape_string($connection ,$_POST['groupage_donneur']));

                if(!in_array($groupage_donneur ,['O+','A+','B+','AB+','O-','A-','B-','AB-']))
                {
                    $error=1;
                    $_SESSION['e_groupage_donneur'] = "Le groupe sanguin est incorrect!";

                }

                }else
                {
                $error =1;
                $_SESSION["e_groupage_donneur"] = "Obligatoire!";
                }


               
                

                if(isset($_POST['nom_donneur2']) && !empty($_POST['nom_donneur2']))
                {
                    $nom_donneur2 = filtring(mysqli_real_escape_string($connection,ucwords($_POST['nom_donneur2'])));
                    
                    $allow = "/^[a-zA-Z]+(\s[a-zA-Z]+)?$/";
                    if(!preg_match($allow,$nom_donneur2))
                    {
                    $error=1;
                    $_SESSION['e_nom_donneur2']="Veuillez entrer le nom correct!";
                    
                    }else if(strlen($nom_donneur2) > 25)
                    {
                    $error=1;
                    $_SESSION['e_nom_donneur2']="Le nom ne peut pas dépasser les 25 caractéres!";
                    
                    
                    }
                    
                } else{
                    $error=1;
                    $_SESSION['e_nom_donneur2']="Obligatoire! ";
                    
                }


                if(isset($_POST['prenom_donneur2']) && !empty($_POST['prenom_donneur2']))
                {
                    $prenom_donneur2 = filtring(mysqli_real_escape_string($connection,ucwords($_POST['prenom_donneur2'])));
                    
                    $allow = "/^[a-zA-Z]+(\s[a-zA-Z]+)?$/";
                    if(!preg_match($allow,$prenom_donneur2))
                    {
                        $error=1;
                        $_SESSION['e_prenom_donneur2']="Veuillez entrer le prenom correct!";
                        
                    }else if(strlen($prenom_donneur2) > 25)
                    {
                        $error=1;
                        $_SESSION['e_prenom_donneur2']="Le prenom ne peut pas dépasser les 25 caractéres!";
                    
                    
                    }
                    
                } else{
                    $error=1;
                    $_SESSION['e_prenom_donneur2']="Obligatoire! ";
                }

                

                if(isset($_POST['age_donneur2'])  && !empty($_POST['age_donneur2']))
                {
                $age_donneur2=filtring(mysqli_real_escape_string($connection, $_POST['age_donneur2']));
                if(!is_numeric($age_donneur2) || $age_donneur2<5 || $age_donneur2 > 99 )
                {
                    $error=1;
                    $_SESSION['e_age_donneur2'] = "L'âge est invalide.";
                }


                }else
                {
                $error =1 ;
                    $_SESSION["e_age_donneur2"] ="Obligatoire!";
                }


                if(isset($_POST['groupage_donneur2']) && !empty($_POST['groupage_donneur2']))
                {
                $groupage_donneur2= filtring(mysqli_real_escape_string($connection ,$_POST['groupage_donneur2']));

                if(!in_array($groupage_donneur2 ,['O+','A+','B+','AB+','O-','A-','B-','AB-']))
                {
                    $error=1;
                    $_SESSION['e_groupage_donneur2'] = "Le groupe sanguin est incorrect!";

                }

                }else
                {
                $error =1;
                $_SESSION["e_groupage_donneur2"] = "Obligatoire!";
                }


                if(isset($_POST['hopitaux']) && !empty($_POST['hopitaux']))
                {
                     $hop= filtring(mysqli_real_escape_string($connection ,$_POST['hopitaux']));
                     if(!in_array($hop,$array_h))
                     {
                         $error=1;
                          $_SESSION['e_hopitaux']="Cet hopital n'est pas dans la liste des hopitaux.";
                     }
                        
                }else
                {
                $error =1;
                $_SESSION["e_hopitaux"] = "Obligatoire!";
                }


                

                if($error==0)
                {
                    $date= date("Y-m-d h:i:s");
                    $url=bin2hex(random_bytes(32));

                        $insert_enreg=$connection->prepare("INSERT INTO `enregistrer_donneur`(`nom_donneur_1`, `prenom_donneur_1`, `age_donneur_1`, `groupage_donneur_1`, `groupage_donneur_2`, `nom_donneur_2`, `prenom_donneur_2`, `age_donneur_2`, `type_enregistrement`, `date_enregistrement`, `nom_hopitale`, `ville_enregistrement`, `url_enregistrement`, `vsidentite`, `nom_banc`)
                         VALUES (?,?,?,?,?,?,?,?,'hopitale_d',?,?,?,?,?,?)");
                         $insert_enreg->bind_param("ssssssssssssis",$nom_donneur,$prenom_donneur,$age_donneur,$groupage_donneur,$groupage_donneur2,$nom_donneur2,$prenom_donneur2,$age_donneur2,$date,$hop,$row['ville_donneur_s'],$url,$row['vsidentite'],$row['nom_donneur_s']);
                         $insert_enreg->execute();

                         if($insert_enreg->affected_rows > 0)
                         {
                            $_SESSION['creat']="donneur enregistrer avec succssé!";
                            redirect('enregistrerdonneurs_H.php');
                         }else
                         {
                            $_SESSION['creat']="Erreur  d'enregistrement!";
                            redirect('enregistrerdonneurs_H.php');
                            

                         }

                }else
                {
                    redirect('enregistrerdonneurs_H.php');
                }
                    
        }
      
    }

}else
{
    $_SESSION['erreur']= "Une erreur s'est produite. Veuillez réessayer";
    redirect('enregistrerdonneurs_H.php');
}


}else if($row['blastek']==='hopitale_b_d')
{
    redirect('hopitale.php');
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
    redirect('enregistrerdonneurs_H.php');

}
$get_hopitale->close();
$stmt_verif_session->close();
$connection->close();
?>

