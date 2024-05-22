<?php
require_once "../core/autoloading.php";
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

		

                if(isset($_GET['u']) && !empty($_GET['u']))
                {
                  
                    $valid_token=filtring(mysqli_real_escape_string($connection, $_GET['u']));
                    $stmt_check_valid_token=$connection->prepare("SELECT d.*,b.nom_donneur_s FROM `demmande_poches` d JOIN bnadms b ON b.vsidentite=d.url2 WHERE `url_demmande`=? AND `url1`='{$row['vsidentite']}' AND `status_d`='confirmer'LIMIT 1");
                    $stmt_check_valid_token->bind_param("s", $valid_token);
                    $stmt_check_valid_token->execute();
                    $result=$stmt_check_valid_token->get_result();
                    if($result->num_rows > 0)
                    {

                        $z=$result->fetch_assoc();
                    }else
                    {
                        redirect('nottification_demmande.php');
                    }

                }else
                {
                    redirect('nottification_demmande.php');
                }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap1.css">
    <link rel="stylesheet" href="css/bootstrap2.css">
    <link rel="stylesheet" href="css/bootstrap3.css">
    <link rel="stylesheet" href="css/btn1.css">

    <!-- java script -->
    <script src="js/bootstrap.js"></script>
    <script src="js/j.js"></script>
    <script src="js/fontowsem.js"></script>


</head>
<body>
    

    <style>
        
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    
}
    </style>



    <div class="container pt-5">
        <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="invoice-title">
                                <h4 class="float-end font-size-15"> <span class="badge bg-danger font-size-12 ms-2"></span></h4>
                                <div class="mb-4">
                                   <h2 class="mb-1 text-muted">Information</h2>
                                </div>
                                <div class="text-muted">
                                
                                    <p class="mb-1">Center du don : <b><?=$z['nom_donneur_s']?></b></p>
                                    <p class="mb-1">Nom  : <b><?=$z['nom']?></b></p>
                                    <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i>Prénom : <b><?=$z['prenom']?></b> </p>
                                    <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i>Groupage Donneur : <b><?=$z['groupage']?><b></p>
                                    <p><i class="uil uil-phone me-1"></i> Type sang : <b><?=$z['type_sang']?></b></p>
                                    <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i>Nombre Poches : <b><?=$z['nb_poche']?><b></p>

                                </div>
                            </div>
        
                            <hr class="my-4">
        
                            <div class="row">
                                <div class="col-sm-6">
                                  
                                </div>
                                <!-- end col -->
                                <div class="col-sm-6">
                                    <div class="text-muted text-sm-end">
                                        <div>
                                            <h5 class="font-size-15 mb-1">Nom Hopitale : <span><b><?=$row['nom_donneur_s']?></b></span> </h5>
                                        </div>
                                        <div class="mt-4">
                                            <h5 class="font-size-15 mb-1">Date : <span><b><?=$z['dated']?></b></span> </h5>
                                        </div>
                                        <div class="mt-4">
                                            <h5 class="font-size-15 mb-1">Ville : <span><b><?=$row['ville_donneur_s']?></b></span></span> </h5>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                            
                            <div class="py-2">
        
                                
                                <div class="d-print-none mt-4">
                                    <div class="float-end">
                                        <a href="javascript:window.print()" class="btn btn-success me-1"><i class="fa fa-print"></i></a>
                                        <a href="confirme.php?v=<?php echo $valid_token; ?>"  class="btn btn-primary w-md" onclick="return confirm(\'Êtes-vous sûr de vouloir valider cette demmande ?\');" >Valider</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->
            </div>
        </div>

</body>
</html>

<?php 
		}else if($row['blastek']==='h_bancsang_d')
		{
			redirect('banc.php');
		}else if($row['blastek']==="h_b_donneurs")
		{
			redirect('home.php');

		}else if($row['blastek']==="h_bancsang_maalem_d")
		{
			redirect('bancsang_mallem.php');
		}
	}
}else{
	redirect('login.php');	
}

$stmt_verif_session->close();

$connection->close();
?>