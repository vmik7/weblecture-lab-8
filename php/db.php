<?php 
    function db_query($sql) {
        $hostname = "localhost:8889"; 
        $username = "root"; 
        $password = "root"; 
        $dbName = "weblecture_lab_8"; 
        
        $result = [];

        $connection = mysqli_connect($hostname, $username, $password, $dbName);
        if (!$connection) { 
            echo "Ошибка подключения к базе данных. Код ошибки: <br>" . mysqli_connect_error(); 
            exit; 
        } 

        if ($ans = mysqli_query($connection, $sql)) { 
            while($row = mysqli_fetch_assoc($ans)){ 
                array_push($result, $row);
            } 
            mysqli_free_result($ans); 
        }
        else {
            echo "Ошибка: " . $sql . "<br>" . mysqli_error($connection);
        }

        mysqli_close($connection);

        return $result;
    }
?>