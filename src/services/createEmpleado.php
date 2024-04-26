<?php

$db = 'Test1';
$host = 'localhost';
$user = 'root';
$pass = '123456789';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "";
if (isset($_POST['submit'])) {
    $nombre = $_POST['nombre'];
    $apelido = $_POST['apellido'];
    $puesto = $_POST['puesto'];
    $salario = $_POST['salario'];

    $sql = "INSERT INTO Empleados (nombre, apellido, puesto, salario) VALUES ('$nombre', '$apellido', '$puesto', '$salario')";
    if ($conn->query($sql) === TRUE) {
        echo "Empleado creado correctamente";
        header('Location: ../index.php');
        exit();

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->query($sql);
    echo "";
}

$conn->close();