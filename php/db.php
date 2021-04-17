<?php 
    function db_query($sql) {
        /* Переменные для соединения с базой данных */ 
        $hostname = "localhost:8889"; 
        $username = "root"; 
        $password = "root"; 
        $dbName = "weblecture_lab_8"; 
        
        $result = [];

        /* Подключение к серверу MySQL */ 
        $link = mysqli_connect($hostname, $username, $password, $dbName);

        if (!$link) { 
            echo "Ошибка подключения к базе данных. Код ошибки: " . mysqli_connect_error(); 
            exit; 
        } 

        /* Посылаем запрос серверу */ 
        if ($ans = mysqli_query($link, $sql)) { 

            while($row = mysqli_fetch_assoc($ans)){ 
                array_push($result, $row);
            } 

            /* Освобождаем используемую память */ 
            mysqli_free_result($ans); 
        } 

        /* Закрываем соединение */ 
        mysqli_close($link);

        return $result;
    }
?>