<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
</head>
<body>

<?php


$mysqli = new mysqli("localhost", "Justaway", "mysql1221", "restaurante");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$sql;
$consec;
$nombre = "Jeisson";
$sql = "SELECT id FROM clientes";

$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $consec = $row["id"];
    }
}

$consec+=1;
$sql = "INSERT INTO clientes (id, nombre, contrasena)
VALUES ( '$consec' , '$nombre', '111' )";


if ($mysqli->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;

}
$mysqli->close();

?>

</body>
</html>