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

		

            $get_locale=mysqli_query($connection,"SELECT d.*,b.nom_donneur_s FROM `demmande_poches` d JOIN bnadms b ON b.vsidentite=d.url2 WHERE `url1`='{$row['vsidentite']}' AND `status_d`='confirmer'");
            if(mysqli_num_rows($get_locale) > 0)
            {
             

                while($data=mysqli_fetch_assoc($get_locale))
                {
                    echo '
                    <tr>
                        <td>'.$i.'</td>
                        <td>'.$data['nom_donneur_s'].'</td>
                        <td>'.$data['nom'].'</td>
                        <td>'.$data['prenom'].'</td>
                        <td>'.$data['type_sang'].'</td>
                        <td>'.$data['groupage'].'</td>
                        <td>'.$data['nb_poche'].'</td>
                        <td>'.$data['dated'].'</td>
                        <td><a href="demmandes.php?u='.$data['url_demmande'].'" class="btn btn-primary" target="_blank">Detail</a></td>
                        
                       

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