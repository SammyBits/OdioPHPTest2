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
            font-family: Arial, sans-serif;
            margin: 10;
            padding: 10;
            color: white;
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

        input[type="text"],
        input[type="number"],
        input[type="submit"] {
            margin-right: 10px;
            
            padding: 5px;
            border: none;
            border-radius: 3px;
            background-color: #444;
            color: #fff;
        }

        input[type="submit"] {
            margin-top: 10px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #333;
        }

        .empleados {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            color: white;

        }

        .empleado {
            background-color: #444;
            padding: 10px;
            border-radius: 5px;
            color: white;
            flex-basis: calc(33.333% - 20px);
        }

        .empleado h3 {
            margin-top: 0;
            font-size: 18px;
        }

        .empleado p {
            margin: 5px 0;
        }

        .form-content{
           height: 50px;
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
    <div class="form-content">
        <form action="./services/createEmpleado.php" method="post">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" placeholder="nombre">
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" placeholder="apellido">
            <label for="puesto">Puesto</label>
            <input type="text" name="puesto" placeholder="puesto">
            <label for="salario">Salario</label>
            <input type="number" name="salario" placeholder="salario">
            
            <input type="submit" name="submit" value="submit">
        </form>
    </div>


    <h2>Empleados existentes</h2>
    <div class="empleados">
        <?php
        require ("./services/empleado.php");
        ?>
    </div>
</body>

</html>