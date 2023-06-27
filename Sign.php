<html>
	<body>
<?php
foreach($_POST as $key=>$value){
	echo "POST[$key] = $value <br>";
}

//file txt
$nameFile = 'password.txt';

// Open file.txt
$handle = fopen($nameFile, 'r');
$exist  = false;

// Verify if the file is open
if ($handle !== false) {
    // Read every row of the file
    while (($row = fgetcsv($handle)) !== false) {
		if(array_key_exists("user", $_POST)){
            if($row[0]==$_POST["user"]){
			    echo "User found";
			    $exist = true;
				
		    }
        }
    }

    // Close the TXT file
    fclose($handle);
} else {
    // Could not open the file
    echo 'Could not open the file ' . $nameFile;
}

if($exist){
	echo "ERROR. User already exist";
}else{
	$userPass = [];
	if(array_key_exists("user", $_POST)){
		$userPass = array($_POST["user"],$_POST["password"]);
		
	}

	// Open the file with append mode
	$file = fopen("password.txt", "a");

	if ($file) {
    	fputcsv($file, $userPass);
    	fclose($file);
    	echo "User signed";
	} else {
   		echo "Could not open the file";
	}
}


?>

</body>
</html>
