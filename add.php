<?php include 'php/db.php' ?>

<?php 
    
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
            <h1 class="add-page__title">Добавить кафедру</h1>
            <form action="index.php" method="GET" class="form">
                <input type="text" class="form__input" placeholder="Название">
                <input type="text" class="form__input" placeholder="Корпус">
                <input type="text" class="form__input" placeholder="Аудитория">
                <input type="text" class="form__input" placeholder="Количество дисциплин">
                <button type="submit" class="button">Добавить</button>
            </form>
        </div>
    </main>
    <script src="js/script.js"></script>
</body>
</html>