<html>
	<body>
<?php
foreach($_POST as $key=>$value){
	echo "POST[$key] = $value <br>";
}

$nameFile = 'password.txt';

// Open the TXT file on read mode
$handle = fopen($nameFile, 'r');
$exist  = false;

$userMemory = [];
$user = $_POST['user'];

// Verify if the file is already opened
if ($handle !== false) {
    // Read each row
    while (($row = fgetcsv($handle)) !== false) {
        $userMemory[] = $row;   
    }
    // Close the file
    fclose($handle);   
} else {
    // Error
    echo 'Could not open the file' . $nameFile;
}
foreach($userMemory as $k => &$data){
        foreach($data as $key => $d){
            if($d == $user && $_POST['NewPass'] == $_POST['ConfPass'] ){
                array_splice($data,1,1);
                array_push($data, $_POST['NewPass']);
                echo 'Password has been changed ';
            }
        }    
}   
// Open the file on write mode
$f = fopen($nameFile,'w');
foreach($userMemory as $data){
    fputcsv($f,$data);
}
?>

</body>
</html>
