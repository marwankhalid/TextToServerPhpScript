<?php

	$con = mysqli_connect("localhost","root","","androidTesting")
	or die("Error" . mysqli_error($con));

	$file = isset($_POST['file']) ? $_POST['file'] : '';
	$rand = rand(1,10000);
	$ImagePath = $rand . '.txt';
	//rand(100);
	$ServerURL = "https://0cbb21cd.ngrok.io/fyp/$ImagePath";
 	$sql_query = "insert into tblfile(url) values ('".$ServerURL."');";
 	
 	if(mysqli_query($con, $sql_query)){
		$my_file = 'uploads/'. $rand .'.txt';
		$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
		fwrite($handle, $file);
		fclose($handle);

 	//file_put_contents($ImagePath,base64_decode($file));

 	echo "Data is Uploaded Successfully";
 	}else{
 		echo "Not Uploaded ". $sql_query . "<br>" . mysqli_error($con);
 	}
 
 mysqli_close($con);
?>