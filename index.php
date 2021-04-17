<?php include 'php/db.php' ?>
<?php include 'php/render.php' ?>
<?php include 'php/get_colums.php' ?>

<?php 
    // Добавляем запись из POST запроса если нужно
    if (isset($_POST["table"])) {

        // Данные для запроса
        $table = $_POST["table"];

        $columns = ($table == "Кафедры" ? $kaf_columns : $prep_columns);
        $values = [];

        // Ищем названия для полей
        foreach ($_POST as $key => $value) {
            $res = NULL;
            foreach ($columns as $item) {
                if ($item["input_name"] == $key) {
                    $res = $item["title"];
                    break;
                }
            }
            if ($res) {
                $val = [
                    "column" => $res,
                    "value" => $value,
                ];
                array_push($values, $val);
            }
        }

        // Формируем запрос
        $to_sql_columns = "";
        $to_sql_values = "";
        foreach ($values as $cur) {
            if ($to_sql_columns != "") {
                $to_sql_columns .= ", ";
            }
            if ($to_sql_values != "") {
                $to_sql_values .= ", ";
            }
            $to_sql_columns .= "`" . $cur["column"] . "`";
            $to_sql_values .= "'" . $cur["value"] . "'";
        }
        $add_sql = "INSERT INTO `$table` (" . $to_sql_columns . ") VALUES (" . $to_sql_values . ")";

        db_query($add_sql);
    }

    // Запросы в соответсвующие БД
    $kaf_sql = "SELECT * FROM `Кафедры`";
    $prep_sql = "SELECT * FROM `Преподаватели`";

    // Если есть GET параметры, дополняем запрос
    $is_search = false;
    foreach ($kaf_columns as $column) {
        if (isset($_GET[$column["input_name"]]) && $_GET[$column["input_name"]] != "") {
            $str = "locate('" . $_GET[$column["input_name"]] . "', `" . $column["title"] . "`)";
            if ($is_search) {
                $kaf_sql .= " and " . $str;
            }
            else {
                $is_search = true;
                $kaf_sql .= " WHERE " . $str;
            }
        }
    }
    foreach ($prep_columns as $column) {
        if (isset($_GET[$column["input_name"]]) && $_GET[$column["input_name"]] != "") {
            $str = "locate('" . $_GET[$column["input_name"]] . "', `" . $column["title"] . "`)";
            if ($is_search) {
                $prep_sql .= " and " . $str;
            }
            else {
                $is_search = true;
                $prep_sql .= " WHERE " . $str;
            }
        }
    }

    // Производим запросы
    $kaf_rows = db_query($kaf_sql);
    $prep_rows = db_query($prep_sql);
?>



<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab8</title>

    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body class="page main-page">
    <main class="content">
        <div class="page__container main-page__container">
            <div class="main-page__item db-item">
                <div class="db-item__header">
                    <h2 class="db-item__title">Кафедры</h2>
                    <button class="button button_theme_round button_action_add" data-table="Кафедры">+</button>
                </div>
                
                <div class="db-item__search">
                    <div class="db-item__subtitle">Поиск</div>
                    <table class="table">
                        <?php render_inputs($kaf_columns) ?>
                    </table>
                </div>

                <div class="db-item__result">
                    <div class="db-item__subtitle">Результат</div>
                    <table class="table">
                        <?php render_heads($kaf_columns) ?>
                        <?php render_rows($kaf_rows) ?>
                    </table>
                </div>

            </div>
            <div class="main-page__item db-item">
                <div class="db-item__header">
                    <h2 class="db-item__title">Преподаватели</h2>
                    <button class="button button_theme_round button_action_add" data-table="Преподаватели">+</button>
                </div>
                
                <div class="db-item__search">
                    <div class="db-item__subtitle">Поиск</div>
                    <table class="table">
                        <?php render_inputs($prep_columns) ?>
                    </table>
                </div>

                <div class="db-item__result">
                    <div class="db-item__subtitle">Результат</div>
                    <table class="table">
                        <?php render_heads($prep_columns) ?>
                        <?php render_rows($prep_rows) ?>
                    </table>
                </div>

            </div>
        </div>
    </main>
    <script src="js/script.js"></script>
</body>
</html>