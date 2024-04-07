<?php

function check_login($con)
{

	if(isset($_SESSION['doctor_id']))
	{

		$id = $_SESSION['doctor_id'];
		$query = "select * from doctors where doctor_id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$doctor_data = mysqli_fetch_assoc($result);
			return $doctor_data;
		}
	}

	//redirect to login
	header("Location: dlogin.php");
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