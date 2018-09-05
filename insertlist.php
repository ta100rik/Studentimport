<?php 
function readCSV($csvFile){
    $file_handle = fopen($csvFile, 'r');
    while (!feof($file_handle) ) {
        $line_of_text[] = fgetcsv($file_handle, 1024);
    }
    fclose($file_handle);
    return $line_of_text;
}
 
 
// Set path to CSV file
$csvFile = 'test.csv';
 
$csv = readCSV($csvFile);
  include_once "api/db.php";
foreach ($csv as $student) {

	$studentnumber 	= mysqli_real_escape_string($con,preg_replace('/\D/', '', $student[0]));
	$lastname 		= mysqli_real_escape_string($con,preg_replace('/\d/', '', $student[1]));
	$tussenvoegsel 	= mysqli_real_escape_string($con,preg_replace('/\d/', '', $student[2]));
	$firstname	 	= mysqli_real_escape_string($con,preg_replace('/\d/', '', $student[3]));
	$klass 		 	= mysqli_real_escape_string($con,preg_replace('/\d/', '', $student[4]));
	$Mentor		 	= mysqli_real_escape_string($con,preg_replace('/\d/', '', $student[5]));
	if($studentnumber){
$insertsql = "
	INSERT INTO Students_list
	(
	Studentnummer,
	Roepnaam,
	Tussenvoegsel,
	Achternaam,
	Klas,
	Klassendocent
	)
	VALUES(
	'" . $studentnumber . "',
	'" . $firstname . "',
	'" . $tussenvoegsel . "',
	'" . $lastname . "',
	'" . $klass . "',
	'" . $Mentor . "'
	)";  
	$result = mysqli_query($con,$insertsql) or die ($con->error);
		echo "<pre>";

	var_dump($result);

	}
}
?>