<?php
require_once "../core/sessionprotection.php";

require_once "../core/autoloading.php";

session_start();

if (isset($_GET['confirmation']) && isset($_GET['email'])) {
    $time = time();
    $code = clear($_GET['confirmation']);
    $email = clear($_GET['email']);

  
    $stmt = $connection->prepare("SELECT `email_donneur_s`, `checkk_me_bro`, `code_verif`, `date_inscr` From `bnadms`  WHERE code_verif = ? AND email_donneur_s = ? LIMIT 1");
    $stmt->bind_param("ss", $code, $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $link_creation_time = strtotime($row['date_inscr']);
        $time_valid = 120; // 2mins
        $time_difference = $time - $link_creation_time; //now   - link creation time

        if ($time_difference <= $time_valid) {
            if ($row['checkk_me_bro'] == "xX") {
                $cd_v = $row['code_verif'];
                $mail = $row['email_donneur_s'];
                $stmt->close(); 
                
                $update_stmt = $connection->prepare("UPDATE `bnadms` SET `checkk_me_bro` = 'oO' WHERE code_verif = ? AND email_donneur_s = ? LIMIT 1");
                $update_stmt->bind_param("ss", $cd_v, $mail);
                 $update_stmt->execute();
                
                if ($update_stmt->affected_rows > 0) {
                    $_SESSION['creat'] = "Email vérifié avec succès, connectez-vous maintenant !";
                    $update_stmt->close();
                    redirect('login.php');
                } else {
                    $_SESSION['creat'] = "échec de la vérification !";
                    redirect('login.php');
                }
            } else {
                $_SESSION['creat'] = "E-mail déjà vérifié, connectez-vous maintenant. !";
                redirect('login.php');
            }
        } else {
            $_SESSION['creat'] = "Lien expiré!";
            redirect('login.php');
        }
    } else {
        $_SESSION['creat'] = "Une erreur s'est produite. Veuillez réessayer!";
        redirect('login.php');
    }

   
} else {
    $_SESSION['creat'] = "Une erreur s'est produite. Veuillez réessayer!";
    redirect('login.php');
}

$connection->close();
?>
