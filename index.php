<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab8</title>
</head>
<body>
    <?php include 'php/db.php' ?>
    <?php 
        $ans = db_query("SELECT * FROM `Кафедры`");

        echo "Кафедры: <br>"; 

        /* Выборка результатов запроса */ 
        foreach ($ans as $row){ 
            echo $row['Название'] . "<br>"; 
        } 
    ?>
</body>
</html>