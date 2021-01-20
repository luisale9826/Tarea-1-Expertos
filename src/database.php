<?php
class Database
{

    // Esta función se encarga de establecer la conección con la base de datos y regresa la conección
    // con la base.
    // Retrona: La conección establecida con la base de datos
    public function connect()
    {
        $servername = "remotemysql.com";
        $username = "qcfLX4UH7j";
        $password = "HErIGDdxlf";
        $db = "qcfLX4UH7j";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $db);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $conn;
    }

    // Esta función se encarga de realizar las consultas a la base de datos y obtener los datos para 
    // realizar las estimaciones.
    // Parametros: $conn = conección con la base de datos, $table = tabla a la que va dirigida la consulta
    // Retorna: los datos obtenidos de la base de datos o nulo;
    public function getDataExercise($conn, $table)
    {
        $sql = "SELECT * FROM $table";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            $conn->close();
            return $result;
        } else {
            echo "0 results";
        }
        $conn->close();
        return null;
    }
}
