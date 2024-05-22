<?php
require_once "../core/autoloading.php";
$i=1;
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

		

            $get_locale=mysqli_query($connection,"SELECT * FROM `enregistrer_donneur` WHERE `vsidentite`='{$row['vsidentite']}' AND `type_enregistrement`='locale_d' AND `status_enregistrement`='en attente_d'");
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
                        <td>'.$data['ville_enregistrement'].'</td>
                        <td>'.$data['date_enregistrement'].'</td>
                        <td><a href="valide_locale.php?v='.$data['url_enregistrement'].'" onclick="return confirm(\'Êtes-vous sûr de vouloir valider cet enregistrement ?\');" class="btn btn-success">Valider</a></td>
                        <td><a href="rejeter_locale.php?v='.$data['url_enregistrement'].'" onclick="return confirm(\'Êtes-vous sûr de vouloir rejeter cet enregistrement ?\');" class="btn btn-danger">Rejeter</a></td>
                    </tr>';
                

                    $i++;
                }
                
                
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