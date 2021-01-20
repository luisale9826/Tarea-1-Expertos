<?php
class Database
{

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
