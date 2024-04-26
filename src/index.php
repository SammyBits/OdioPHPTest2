<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - ODIOPHP</title>
</head>

<body>

    <style>
        body,
        html {
            background-color: #272727;
            color: #fff;

        }

        form {
            margin-bottom: 20px;
        }

        h2 {
            margin-top: 20px;
        }

        p {
            color: #fff;
        }

        input[type="text"] {
            margin-right: 10px;
        }

        input[type="submit"] {
            margin-top: 10px;
        }
    </style>

    <?php

    $db = 'Test1';
    $host = 'localhost';
    $user = 'root';
    $pass = '123456789';

    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Proceso de eliminación de un usuario si se ha enviado el formulario de eliminación
    if (isset($_POST['delete'])) {
        $empleadoId = $_POST['empleadoId'];

        $sql = "DELETE FROM Empleados WHERE _EmpleadoId = $empleadoId";

        if ($conn->query($sql) === TRUE) {
            // Redirigir al usuario a una nueva página después de eliminar el usuario
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit();
        } else {
            echo "Error al eliminar el empleado: " . $conn->error;
        }
    }
    ?>

    <?php

    $db = 'Test1';
    $host = 'localhost';
    $user = 'root';
    $pass = '123456789';

    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if (isset($_POST['edit'])) {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $puesto = $_POST['puesto'];
        $salario = $_POST['salario'];
        $empleadoId = $_POST['empleadoId'];


        $sql = "UPDATE Empleados SET nombre = '$nombre', apellido = '$apellido', puesto = '$puesto', salario = '$salario' WHERE _EmpleadoId = $empleadoId";

        if ($conn->query($sql) === TRUE) {
            // Redirigir al usuario a una nueva página después de editar el usuario
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit();
        } else {
            echo "Error al editar el usuario: " . $conn->error;
        }
    }
    ?>

    <h2>Crear nuevo empleado</h2>
    <form action="./services/createEmpleado.php" method="post">
        <input type="text" name="nombre" placeholder="nombre">
        <input type="text" name="apellido" placeholder="apellido">
        <input type="text" name="puesto" placeholder="puesto">
        <input type="number" name="salario" placeholder="salario">
        <input type="submit" name="submit" value="submit">
    </form>

    <h2>Empleados existentes</h2>
    <div class="empleados">
        <?php
        require ("./services/empleado.php");
        ?>
    </div>
</body>

</html>