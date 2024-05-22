<?php
require("../core/autoloading.php");

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}



$query = "SELECT * FROM bnadms WHERE blastek='h_bancsang_d' OR blastek='h_bancsang_maalem_d'";
$result = mysqli_query($connection,$query);
if (!$result) {
  die('Invalid query: ' . mysqli_error());
}

header("Content-type: text/xml");


echo "<?xml version='1.0' ?>";
echo '<markers>';
$ind=0;

while ($row = @mysqli_fetch_assoc($result)){
  
  echo '<marker ';
  echo 'id="' . $row['vsidentite'] . '" ';
  echo 'name="' . parseToXML($row['nom_donneur_s']) . '" ';
  echo 'address="' . parseToXML($row['address']) . '" ';
  echo 'lat="' . $row['latitude_b_s'] . '" ';
  echo 'lng="' . $row['longitude_b_s'] . '" ';
  echo 'type="' . $row['type'] . '" ';
  echo '/>';
  $ind = $ind + 1;
}


echo '</markers>';

?>
