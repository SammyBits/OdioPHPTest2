<?php

$db = 'Test1';
$host = 'localhost';
$user = 'root';
$pass = '123456789';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Lectura de usuarios existentes
$sql = "SELECT _EmpleadoId, nombre, apellido, puesto, salario FROM Empleados";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["_EmpleadoId"] . " - Nombre: " . $row["nombre"] . " - Apellido: " . $row["apellido"] . " - Puesto: " . $row["puesto"] . " - Salario: " . $row["salario"] . "<br>";
        // Botón de editar
        echo "<form method='post' action=''>";
        echo "<input type='text' name='empleadoId' value='" . $row["_EmpleadoId"] . "'>";
        echo "<input type='text' name='nombre' value='" . $row["nombre"] . "'>";
        echo "<input type='text' name='apellido' value='" . $row["apellido"] . "'>";
        echo "<input type='text' name='puesto' value='" . $row["puesto"] . "'>";
        echo "<input type='text' name='salario' value='" . $row["salario"] . "'>";
        echo "<input type='submit' name='edit' value='Editar'>";
        echo "</form>";
        // Botón de eliminar
        echo "<form method='post' action=''>";
        echo "<input type='hidden' name='empleadoId' value='" . $row["_EmpleadoId"] . "'>";
        echo "<input type='submit' name='delete' value='Eliminar'>";
        echo "</form>";
    }
} else {
    echo "0 resultados";
}

$conn->close();

