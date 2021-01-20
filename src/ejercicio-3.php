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
        <h1>Ejercicio 3</h1>
        <p>
            Llene selecciones las opciones en el formulario que se le presenta en la parte de abajo y se le calculará el tipo de profesor que usted es.

        </p>
    </div>

    <form action="ejercicio-3.php" method="post">
        A: <select name="A">
            <option value="3">3</option>
            <option value="2">2</option>
            <option value="1">1</option>
        </select>
        B: <select name="B">
            <option value="6">F</option>
            <option value="5">NA</option>
            <option value="4">M</option>
        </select>
        C: <select name="C">
            <option value="9">I</option>
            <option value="8">B</option>
            <option value="7">A</option>
        </select>
        D: <select name="D">
            <option value="3">3</option>
            <option value="2">2</option>
            <option value="1">1</option>
        </select>
        E: <select name="E">
            <option value="23">O</option>
            <option value="22">ND</option>
            <option value="21">DM</option>
        </select>
        F: <select name="F">
            <option value="33">A</option>
            <option value="32">H</option>
            <option value="31">L</option>
        </select>
        G: <select name="G">
            <option value="43">O</option>
            <option value="42">S</option>
            <option value="41">N</option>
        </select>
        H: <select name="H">
            <option value="53">O</option>
            <option value="52">S</option>
            <option value="51">N</option>
        </select>
        <input type="submit" value="Calcular" name="submit">
    </form>
    <br>
    <?php
    include "database.php";
    include "shared.php";

    if ($_POST["submit"]) {

        $database = new Database();
        $conn = $database->connect();

        $A = $_POST["A"];
        $B = $_POST["B"];
        $C = $_POST["C"];
        $D = $_POST["D"];
        $E = $_POST["E"];
        $F = $_POST["F"];
        $G = $_POST["G"];
        $H = $_POST["H"];

        $rows = $database->getDataExercise($conn, "profesores");

        $bestResult = null;
        $type = null;
        $array = array($A, $B, $C, $D, $E, $F, $G, $H);
        while ($row = $rows->fetch_assoc()) {
            $comparisonArray = array(
                $row['a'], getNumberB($row['b']), getNumberC($row['c']), $row['d'], getNumberE($row['e']), getNumberF($row['f']), getNumberG($row['g']), getNumberH($row['h'])
            );

            $result = euclides($array, $comparisonArray);
            if ($bestResult == null || $bestResult <= $result) {
                $bestResult = $result;
                $type = $row['class'];
            }
        }

        echo "Clase del Profesor: $type";
    }

    ?>

    <?php
    function getNumberB($letter)
    {
        switch ($letter) {
            case 'F':
                return 6;
                break;
            case 'NA':
                return 5;
                break;
            case 'M':
                return 4;
                break;
        }
    }

    function getNumberC($letter)
    {
        switch ($letter) {
            case 'I':
                return 9;
                break;
            case 'A':
                return 7;
                break;
            case 'B':
                return 8;
                break;
        }
    }

    function getNumberE($letter)
    {
        switch ($letter) {
            case 'O':
                return 23;
                break;
            case 'ND':
                return 22;
                break;
            case 'DM':
                return 21;
                break;
        }
    }

    function getNumberF($letter)
    {
        switch ($letter) {
            case 'A':
                return 33;
                break;
            case 'H':
                return 32;
                break;
            case 'L':
                return 31;
                break;
        }
    }

    function getNumberG($letter)
    {
        switch ($letter) {
            case 'O':
                return 43;
                break;
            case 'S':
                return 42;
                break;
            case 'N':
                return 41;
                break;
        }
    }

    function getNumberH($letter)
    {
        switch ($letter) {
            case 'O':
                return 53;
                break;
            case 'S':
                return 52;
                break;
            case 'N':
                return 51;
                break;
        }
    }

    ?>
    <br>
    <a href="../index.php">Volver</a>
</body>

</html>