<?php

session_start();

if(isset($_SESSION['patient_id']))
{
	unset($_SESSION['patient_id']);

}

header("Location: plogin.php");
die;