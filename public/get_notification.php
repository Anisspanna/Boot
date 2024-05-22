<?php
require_once "../core/autoloading.php";
$i=1;
session_start();
if(isset($_SESSION['y3adi']) && isset($_SESSION['valide_token_donneur'])) 
{
	$stmt_verif_session=$connection->prepare("SELECT `vsidentite`, `nom_donneur_s`, `email_donneur_s`, `telephone_donneur_s`, `ville_donneur_s`, `valide_token_donneur`, `blastek` From `bnadms` WHERE `email_donneur_s`= ? LIMIT 1 ");
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

		

            $get_locale=mysqli_query($connection,"SELECT * FROM `enregistrer_donneur` WHERE `nom_hopitale`='{$row['nom_donneur_s']}' AND `ville_enregistrement`='{$row['ville_donneur_s']}' AND `status_enregistrement`='valide_d' AND `type_enregistrement`='hopitale_d'");
            if(mysqli_num_rows($get_locale) > 0)
            {
             

                while($data=mysqli_fetch_assoc($get_locale))
                {
                    echo '
                    <tr>
                        <td>'.$i.'</td>
                        <td>'.$data['nom_donneur_1'].'</td>
                        <td>'.$data['prenom_donneur_1'].'</td>
                        <td>'.$data['age_donneur_1'].'</td>
                        <td>'.$data['groupage_donneur_1'].'</td>
                        <td>'.$data['nom_donneur_2'].'</td>
                        <td>'.$data['prenom_donneur_2'].'</td>
                        <td>'.$data['age_donneur_2'].'</td>
                        <td>'.$data['groupage_donneur_2'].'</td>
                        <td>'.$data['nom_hopitale'].'</td>
                        <td>'.$data['nom_banc'].'</td>
                        <td>'.$data['ville_enregistrement'].'</td>
                        <td>'.$data['date_enregistrement'].'</td>
                        <td><a href="facture.php?u='.$data['url_enregistrement'].'" class="btn btn-primary" target="_blank">Detail</a></td>
                        
                       

                    </tr>';
                

                    $i++;
                }
                
                
            }


        }else if($row['blastek']==='h_bancsang_d')
        {
            redirect('banc.php');
        }else if($row['blastek']==="h_b_donneurs")
        {
            redirect('home.php');
        }elseif($row['blastek']==="h_bancsang_maalem_d")
        {
            redirect('bancsang_mallem.php');

        }
    }

}else{
        redirect('login.php');	
    }


?>