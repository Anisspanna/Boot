<?php
function  clear($input){
    
    $input=str_replace(' ','',$input);
    $input=trim($input);
    $input=htmlspecialchars($input,ENT_QUOTES,'UTF-8');
    $input=htmlentities($input, ENT_QUOTES, 'UTF-8');

    $input=strip_tags($input);

    return $input;


}



function  filtring($input){

    $input=trim($input);
    $input=htmlspecialchars($input,ENT_QUOTES,'UTF-8');
    $input=htmlentities($input, ENT_QUOTES, 'UTF-8');
    $input=strip_tags($input);

    return $input;


}

function  safi($input){

    
    $input=htmlspecialchars($input,ENT_QUOTES,'UTF-8');
    $input=htmlentities($input, ENT_QUOTES, 'UTF-8');
    $input=strip_tags($input);

    return $input;


}

function redirect($path)
{
    header("Location:http://localhost/Boot/public/$path");
    die;
}




?>