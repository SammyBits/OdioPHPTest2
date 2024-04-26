<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - ODIOPHP</title>
</head>

<body>
    <h2>Crear nuevo empleado</h2>

    <form action="./services/createEmpleado.php" method="post">
        <input type="text" name="nombre" placeholder="Name">
        <input type="text" name="apellido" placeholder="Password">
        <input type="text" name="puesto" placeholder="Password">
        <input type="number" name="salario" placeholder="Password">
        <input type="submit" name="submit" value="submit">
    </form>

    <h2>Empleados existentes</h2>
    <?php
    require ("./services/empleado.php");
    ?>
</body>

</html>