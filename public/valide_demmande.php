<?php

require_once "../core/autoloading.php";
session_start();
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
		if($row['blastek']==="h_bancsang_maalem_d" || $row['blastek']==="h_bancsang_d")
		{


                if(isset($_GET['v']) && !empty($_GET['v']))
                {
                    $valid_token=filtring(mysqli_real_escape_string($connection, $_GET['v']));
                    $stmt_check_valid_token=$connection->prepare("SELECT * FROM `demmande_poches` WHERE `url_demmande`=? AND `url2`=? LIMIT 1");
                    $stmt_check_valid_token->bind_param("ss", $valid_token,$row['vsidentite']);
                    $stmt_check_valid_token->execute();
                    $result=$stmt_check_valid_token->get_result();
                    
                    if(mysqli_num_rows($result)>0)
                    {
                            $fetch=$result->fetch_assoc();
                            
                            $stmt_update=$connection->prepare("UPDATE `demmande_poches` SET `status_d`='confirmer'  WHERE `url_demmande`=? AND `url2`=? LIMIT 1");
                            $stmt_update->bind_param("ss",$fetch['url_demmande'],$row['vsidentite']);
                            $stmt_update->execute();

                            if($stmt_update->affected_rows > 0)
                            {   
                                $stmt_check_valid_token->close();
                                $stmt_update->close();

                                $_SESSION['creat']="Demmande Accepter Avec succseé";

                                if($row['blastek']==='h_bancsang_d')
                                {
                                    redirect('banc.php');
                                }else if($row['blastek']==='h_bancsang_maalem_d')
                                {
                                    redirect('bancsang_mallem.php');
                
                                }
                      
                            }

                    }else
                    {
                        $_SESSION['erreur']="erreur";
                        
                        if($row['blastek']==='h_bancsang_d')
                        {
                            redirect('banc.php');
                        }else if($row['blastek']==='h_bancsang_maalem_d')
                        {
                            redirect('bancsang_mallem.php');
        
                        }


                    }
                    
                }else if($row['blastek']==='h_bancsang_d')
                {
                    redirect('banc.php');
                }else if($row['blastek']==='h_bancsang_maalem_d')
                {
                    redirect('bancsang_mallem.php');

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


        ?>