<?php
require_once "../core/autoloading.php";
$error=0;
session_start();
if($_SERVER['REQUEST_METHOD']=='POST')
{


if(isset($_SESSION['y3adi']) && isset($_SESSION['valide_token_donneur']))
{
	$stmt_verif_session=$connection->prepare("SELECT  `vsidentite`, `email_donneur_s`, `valide_token_donneur`, `blastek` From `bnadms` WHERE `email_donneur_s`= ? LIMIT 1 ");
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
		if($row['blastek']==="hopitale_b_d")
		{

		

	






if(!isset($_SESSION['ana_hwa']) || !isset($_POST['csrf_token']))
{
    $_SESSION['erreur']= "Une erreur s'est produite. Veuillez réessayer";
    redirect('chercher_banque_sang.php');
}

if($_POST['csrf_token']===$_SESSION['ana_hwa'])
{
    if(time() >= $_SESSION['ana_hwa_time'])
    {
        unset($_SESSION['ana_hwa']);  //On supprime le token pour
        unset($_SESSION['ana_hwa_time']);   //empêcher une utilisation future du meme token
        $_SESSION['erreur']= "Une erreur s'est produite. Veuillez réessayer";
        redirect('chercher_banque_sang.php');

    }else
    {
        unset($_SESSION['ana_hwa']);  //On supprime le token pour
        unset($_SESSION['ana_hwa_time']);  
        if(isset($_POST['demmander']))
        {
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


                if(isset($_POST['prenom']) && !empty($_POST['prenom']))
                {
                  $prenom = filtring(mysqli_real_escape_string($connection,ucwords($_POST['prenom'])));
                  
                  $allow = "/^[a-zA-Z]+(\s[a-zA-Z]+)?$/";
                  if(!preg_match($allow,$prenom))
                  {
                      $error=1;
                      $_SESSION['e_nom']="Veuillez entrer le prenom correct!";
                      
                  }else if(strlen($nom) > 25)
                  {
                      $error=1;
                      $_SESSION['e_nom']="Le prenom ne peut pas dépasser les 25 caractéres!";
                     
                  
                  }
                  
                } else{
                  $error=1;
                  $_SESSION['e_nom']="Obligatoire! ";
                }



                if(isset($_POST['groupage']) && !empty($_POST['groupage']))
                {
                  $groupage= filtring(mysqli_real_escape_string($connection ,$_POST['groupage']));
            
                  if(!in_array($groupage ,['O+','A+','B+','AB+','O-','A-','B-','AB-']))
                  {
                    $error=1;
                    $_SESSION['e_nom'] = "Le groupe sanguin est incorrect!";
            
                  }
            
                }else
                {
                  $error =1;
                   $_SESSION["e_nom"] = "Obligatoire!";
                }

                if(isset($_POST['poche']) && !empty($_POST['poche']))
                {
                    $poche=filtring(mysqli_real_escape_string($connection ,$_POST['poche']));

                    if(!in_array($poche ,[1,2,3,4,5]))
                    {
                      $error=1;
                      $_SESSION['e_nom'] = "Le groupe sanguin est incorrect!";
              
                    }

                }else
                {
                  $error =1;
                   $_SESSION["e_nom"] = "Obligatoire!";
                }



                if(isset($_POST['sangg']) && !empty($_POST['sangg']))
                {
                    $sangg=filtring(mysqli_real_escape_string($connection ,$_POST['sangg']));

                    if(!in_array($sangg,['sang','plasma','plaquette']))
                    {
                        $error=1;
                        $_SESSION['e_nom'] = "Le groupe sanguin est incorrect!";
                    }
                }else
                {
                  $error =1;
                   $_SESSION["e_nom"] = "Obligatoire!";
                }
        

                    if(isset($_POST['bs']) && !empty($_POST['bs']))
                    {
                        $bs_token=filtring(mysqli_real_escape_string($connection ,$_POST['bs']));
                        $get=$connection->prepare("SELECT `vsidentite` FROM `bnadms` WHERE `url_bnadms`=?");
                        $get->bind_param("s",$bs_token);
                        $get->execute();
                        $r= $get->get_result();
                        $get->close();
                        if($r->num_rows==0)
                        {
                            $error=1;
                        }else if($r->num_rows > 0)
                        {
                            $rip=$r->fetch_assoc();
                            $id_banc= $rip['vsidentite'];
                        }

                    }else
                    {
                        $error=1;
                    }


            if($error==0)
            {       
                    if(!empty($id_banc))
                    {

                        $url_d=bin2hex(random_bytes(32));
                        $dd=date("Y-m-d H:i:s");
                        $go=$connection->prepare("INSERT INTO `demmande_poches`(`url1`, `url2`, `nom`, `prenom`, `type_sang`, `groupage`, `nb_poche`, `url_demmande`, `dated`, `status_d`) 
                    VALUES (?,?,?,?,?,?,?,?,?,'en attente')");
                    $go->bind_param("iisssssss",$row['vsidentite'],$id_banc,$nom,$prenom,$sangg,$groupage,$poche,$url_d,$dd);
                    $go->execute();

                    if($go->affected_rows > 0)
                    {
                        $go->close();
                        redirect('chercher_banque_sang.php');

                    }
                    }

            }else
            {
                redirect('chercher_banque_sang.php');

            }

        }

      
    }

}else
{
    $_SESSION['erreur']= "Une erreur s'est produite. Veuillez réessayer";
    redirect('ajouter_service_hopittale.php');
}


}else if($row['blastek']==='h_bancsang_maalem_d')
{
    redirect('bancsang_mallem.php');
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
    redirect('chercher_banque_sang.php');


}
$stmt_verif_session->close();
$connection->close();
?>


