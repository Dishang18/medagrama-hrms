<?php

function check_login($con)
{

	if(isset($_SESSION['patient_id']))
	{

		$id = $_SESSION['patient_id'];
		$query = "select * from patients where patient_id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$patient_data = mysqli_fetch_assoc($result);
			return $patient_data;
		}
	}

	//redirect to login
	header("Location: plogin.php");
	die;

}

function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 
		# code...

		$text .= rand(0,9);
	}

	return $text;
}