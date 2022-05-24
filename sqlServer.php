<?php
$sql_host = "192.168.1.24";
$sql_dbnm = "EIMining";
$sql_user = "akortreno";
$sql_pswd = "akono";


$serverName = "DESKTOP-9JF5V0K\SQLSRV3IL"; //serverName\instanceName

// Vu que UID et PWD ne sont pas spécifiés dans le tableau $connectionInfo,
// la connexion va tenter d'utiliser l'authentification Windows.
//$connectionInfo = array( "Database"=>"EIMining", "UID"=>"akono", "PWD"=>"akodddno");
$connectionInfo = array( "Database"=>"EIMining");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Connexion établie.<br />";
}else{
     echo "La connexion n'a pu être établie.<br />";
     die( print_r( sqlsrv_errors(), true));
}
$sql = "SELECT TOP(10) [job],[marital] ,[education] FROM [EIMining].[dbo].[BankMarketingTrain]";
$stmt = sqlsrv_query($conn, $sql);
while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
	echo $row['job'] ." - ".$row['marital'] ." - ".$row['education']. "<br>";
}