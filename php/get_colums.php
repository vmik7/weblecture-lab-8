<?php 
    // Данные о колонках (ID для инпута, заголовок)
    $kaf_columns = [];
    $prep_columns = [];

    // Тут будет храниться ID для текущего поля при инициализации
    $cur_id = 0;

    // Достаеём столбцы таблицы Кафедры из БД
    $ans = db_query("SHOW COLUMNS FROM `Кафедры`");
    foreach ($ans as $row){ 
        $val = [
            "input_name" => "field" . $cur_id,
            "title" => $row["Field"]
        ];
        array_push($kaf_columns, $val);
        $cur_id++;
    } 

    // Достаеём столбцы таблицы Преподаватели из БД
    $ans = db_query("SHOW COLUMNS FROM `Преподаватели`");
    foreach ($ans as $row){ 
        $val = [
            "input_name" => "field" . $cur_id,
            "title" => $row["Field"]
        ];
        array_push($prep_columns, $val);
        $cur_id++;
    }  
?>