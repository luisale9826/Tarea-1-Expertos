<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea 1</title>
</head>

<body>
    <?php
    include "header-2.php";
    ?>
    <div>
        <h1>Ejercicio 4</h1>
        <p>Llene el formulario y la aplicación le dará el tipo de red ya sea A o B.</p>
    </div>
    <form action="ejercicio-4.php" method="post">
        Reliability: <select name="rel">
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        Number of links: <input type="text" name="links">
        Capacity: <select name="cap">
            <option value="3">High</option>
            <option value="2">Medium</option>
            <option value="1">Low</option>
        </select>
        Costo: <select name="cost">
            <option value="13">High</option>
            <option value="12">Medium</option>
            <option value="11">Low</option>
        </select>
        <input type="submit" value="Calcular" name="submit">
    </form>

    <br>
    <?php
    include "database.php";
    include "shared.php";

    // Este apartado se recolectan las variable que el usuario ingresó para hacer el calculo

    $rel = $_POST['rel'];
    $links = $_POST['links'];
    $cap = $_POST['cap'];
    $cost = $_POST['cost'];


    if ($_POST['submit']) {
        $database = new Database();
        $conn = $database->connect();


        $rows = $database->getDataExercise($conn, "redes");

        // Este fragmento de código se encarga de llamar al algoritmo de Euclides y hacer la estimación
        // Utilizando los datos suministrados por el usuario.
        // Por último muestra la clase de red en pantalla según los datos suministrados por el usuario.
        $bestResult = null;
        $class = null;
        $array = array($rel, $links, $cap, $cost);
        while ($row = $rows->fetch_assoc()) {
            $comparisonArray = array(
                $row['Reliability'], $row['Number_of_links'], getCapacity($row['Capacity']), $row['d'], getCost($row['Costo'])
            );

            $result = euclides($array, $comparisonArray);

            if ($bestResult == null || $bestResult <= $result) {
                $bestResult = $result;
                $class = $row['Class'];
            }
        }

        echo "Clase de la Red $class";
    }
    ?>


    <?php
    // Esta función se encarga de trabajar los datos del nivel de Capacidad para que, sea posible hacer las estimaciones.
    // Parámetros: La Capacidad de la red.
    // Retorno: Restorna el número que se le otroga a ese nivel de capacidad de la red.
    function getCapacity($cap)
    {
        switch ($cap) {
            case 'Low':
                return 1;
                break;
            case 'Medium':
                return 2;
                break;
            case 'High':
                return 3;
                break;
        }
    }

    // Esta función se encarga de trabajar los datos del nivel el Costo para que, sea posible hacer las estimaciones.
    // Parámetros: La Costo de la red.
    // Retorno: Restorna el número que se le otroga a ese nivel de costo de la red.
    function getCost($cost)
    {
        switch ($cost) {
            case 'Low':
                return 11;
                break;
            case 'Medium':
                return 12;
                break;
            case 'High':
                return 13;
                break;
        }
    }

    ?>
    <br>
    <a href="../index.php">Volver</a>
</body>

</html>