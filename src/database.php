<?php
class Database
{

    public function connect()
    {
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $db = "expertos";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $db);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $conn;
    }

    public function getDataExerciseOne($conn)
    {
        $sql = "SELECT * FROM recintoestilo";
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
