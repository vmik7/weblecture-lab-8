<?php include 'php/db.php' ?>
<?php include 'php/get_colums.php' ?>

<?php 
    if (isset($_GET["table"]) && $_GET["table"] == "Преподаватели") {
        $table = "Преподаватели";
        $title = "Новый преподаватель";
        $columns = $prep_columns;

        $options_html = "";

        $ans = db_query("SELECT `Название` FROM `Кафедры`");   
        foreach ($ans as $item) {
            $options_html .= '<option value="' . $item["Название"] . '">' . $item["Название"] . '</option>';
        }
    }
    else {
        $table = "Кафедры";
        $title = "Новая кафедра";
        $columns = $kaf_columns;
    }
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
<body class="page add-page">
    <main class="content">
        <div class="page__container add-page__container">
            <h1 class="add-page__title"><?php echo $title ?></h1>
            <form action="index.php" method="POST" class="form form_action_add-row">

                <input type="text" name="table" value="<?php echo $table ?>" class="visually-hidden">

                <?php 
                    if ($table == "Кафедры") {
                        echo '
                            <input type="text" name="' . $columns[0]["input_name"] . '" class="input" placeholder="' . $columns[0]["title"] . '" required>
                            <input type="text" name="' . $columns[1]["input_name"] . '" class="input input_validate_char" placeholder="' . $columns[1]["title"] . '" required>
                            <input type="text" name="' . $columns[2]["input_name"] . '" class="input" placeholder="' . $columns[2]["title"] . '" required>
                            <input type="number" name="' . $columns[3]["input_name"] . '" class="input input_validate_posnum" placeholder="' . $columns[3]["title"] . '" required>
                        ';
                    }
                    else {
                        echo '
                            <input type="text" name="' . $columns[0]["input_name"] . '" class="input" placeholder="' . $columns[0]["title"] . '" required>
                            <select name="' . $columns[1]["input_name"] . '" required>' . $options_html . '</select>
                            <input type="text" name="' . $columns[2]["input_name"] . '" class="input" placeholder="' . $columns[2]["title"] . '" required>
                            <input type="text" name="' . $columns[3]["input_name"] . '" class="input input_validate_tel" placeholder="' . $columns[3]["title"] . '" required>
                        ';
                    }
                ?>

                <button type="submit" class="button">Добавить</button>
            </form>
        </div>
    </main>
    <script src="js/script.js"></script>
</body>
</html>