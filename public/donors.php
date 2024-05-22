<?php
require_once "../core/autoloading.php";
$groupage = clear($_POST['groupage']);
$ville = clear($_POST['Ville']);

$stmt=$connection->prepare("SELECT * FROM `bnadms` WHERE `blastek`='h_b_donneurs' AND `ville_donneur_s`=? AND `groupage_donneur_s`=?");
$stmt->bind_param("ss", $ville, $groupage);  
$stmt->execute();
$res=$stmt->get_result();

$data = array();
while ($row = $res->fetch_assoc()) {
    $data[] = $row;
}


echo json_encode($data);

$stmt->close();
$connection->close();



?>