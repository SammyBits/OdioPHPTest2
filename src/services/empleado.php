<?php

$db = 'Test1';
$host = 'localhost';
$user = 'root';
$pass = '123456789';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM Empleados";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["_EmpleadoId"] . " - Name: " . $row["nombre"] . " - Apellido: " . $row["apellido"] . " - Puesto: " . $row["puesto"] . " - Salario: " . $row["salario"] . "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
