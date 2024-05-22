<?php
require_once "../core/sessionprotection.php";
require_once "../core/filltring.php";
session_start();
session_unset();
session_destroy();
redirect('login.php');


?>