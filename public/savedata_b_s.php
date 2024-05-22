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
		if($row['blastek']==="h_bancsang_maalem_d" || $row['blastek']==='h_bancsang_d' || $row['blastek']==='hopitale_b_d')
		{

		

	






if(!isset($_SESSION['ana_hwa']) || !isset($_POST['csrf_token']))
{
    $_SESSION['erreur']= "Une erreur s'est produite. Veuillez réessayer";
    redirect('profile_b_s.php');
}

if($_POST['csrf_token']===$_SESSION['ana_hwa'])
{
    if(time() >= $_SESSION['ana_hwa_time'])
    {
        unset($_SESSION['ana_hwa']);  //On supprime le token pour
        unset($_SESSION['ana_hwa_time']);   //empêcher une utilisation future du meme token
        $_SESSION['erreur']= "Une erreur s'est produite. Veuillez réessayer";
        redirect('profile_b_s.php');
    }else
    {
        unset($_SESSION['ana_hwa']);  //On supprime le token pour
        unset($_SESSION['ana_hwa_time']);  
        if(isset($_POST['save']))
        {
            if(isset($_POST['telephone']) && !empty($_POST['telephone'])){
        
                $telephone = clear(mysqli_real_escape_string($connection,$_POST['telephone'])) ;
                
             
                
                
                
                $nbr="/^[0]{1}+[5-6-7]{1}+[\d]{8}$/";
                
                
                if(!preg_match($nbr,$telephone))
                {
                    $_SESSION['e_telephone']="Entrez un numéro de téléphone correct !";
                    $error=1;   
                }elseif($result->num_rows > 0) {
                    if($row['telephone_donneur_s']!=$telephone)
                    {       
                        $stmt_check_phone=$connection->prepare(" SELECT `telephone_donneur_s` FROM `bnadms` WHERE `telephone_donneur_s` = ? LIMIT 1");
                        $stmt_check_phone->bind_param("s", $telephone);
                        $stmt_check_phone->execute();
                        $num=$stmt_check_phone->get_result();
                        if($num->num_rows >0)
                        {
                            $_SESSION['e_telephone']="Ce numéro est déjà utilisé par un autre utilisateur.";
                            $error=1;
                        }else
                        {
                            $stmt_check_phone->close();
                            $stmtupdate_phone = $connection->prepare("UPDATE `bnadms` SET `telephone_donneur_s` = ? WHERE `email_donneur_s` = ? AND `valide_token_donneur`=? LIMIT 1");
                            $stmtupdate_phone->bind_param("sss", $telephone, $_SESSION['y3adi'],$_SESSION['valide_token_donneur']);
                            $stmtupdate_phone->execute();
                           
                            if($stmtupdate_phone->affected_rows >0)
                            {
                                $A=2;
                                $stmtupdate_phone->close();
                                
                            }else
                            {
                                $_SESSION['erreur']="Certain Modification n'est pas enregistrer!";

                                $error=1;
                            }
                        }
                        
        
                    }

                }
                
                
                
            } else {
                $_SESSION['e_telephone']= "Obligatoire!" ;
                $error=1;
            }



          
        
                //ville 
                if(isset($_POST['ville']) && !empty($_POST['ville']))
                {
                  $ville= filtring(mysqli_real_escape_string($connection,$_POST['ville']));
                  if (!in_array($ville, ['Adrar', 'Chlef', 'Laghouat', 'Oum El Bouaghi', 'Batna', 'Bejaia', 'Biskra', 'Bechar', 'Blida', 'Bouira', 'Tamanrasset', 'Tebessa', 'Tlemcen', 'Tiaret', 'Tizi Ouzou', 'Alger', 'Djelfa', 'Jijel', 'Setif', 'Saida', 'Skikda', 'Sidi Bel Abbes', 'Annaba', 'Guelma', 'Constantine', 'Medea', 'Mostaganem', 'MSila', 'Mascara', 'Ouargla', 'Oran', 'El Bayadh', 'Illizi', 'Bordj Bou Arreridj', 'Boumerdes', 'El Taref', 'Tindouf', 'Tissemsilt', 'El Oued', 'Khenchela', 'Souk Ahras', 'Tipaza', 'Mila', 'Ain Defla', 'Naama', 'Ain Témouchent', 'Ghardaia', 'Relizane', 'Timimoun', 'Bordj Badji Mokhtar', 'Ouled Djellal', 'Beni Abbes', 'In Salah', 'In Guezzam', 'Touggourt', 'Djanet', 'El Meghaier', 'El Menia'])) {
                    $error = 1;
                    $_SESSION['e_ville'] = "La ville n'est pas dans la liste des villes autorisées!";
                }elseif($row['ville_donneur_s']!= $ville){
                    $stmtupdate_ville = $connection->prepare("UPDATE `bnadms` SET `ville_donneur_s` = ? WHERE `email_donneur_s` = ? AND `valide_token_donneur`=? LIMIT 1");
                    $stmtupdate_ville->bind_param("sss", $ville, $_SESSION['y3adi'],$_SESSION['valide_token_donneur']);
                    $stmtupdate_ville->execute();
                    if($stmtupdate_ville->affected_rows >0)
                            {
                                $A=2;
                                $stmtupdate_ville->close();
                                
                            }else
                            {
                                $_SESSION['erreur']="Certain Modification n'est pas enregistrer!";
                                $error=1;
                            }
            
                }
                
            
                }

            if($error==0 && $A==2)
            {
                $_SESSION['creat'] = "profile mis à jour avec succès";
                redirect('profile_b_s.php');

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

