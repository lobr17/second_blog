<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css?v=2">
    <title><?php //=$title;?></title>

</head>
<body>
<div id="wrapper">
    <header>
        header
        <!--<a href="add.php">add new page</a><br>
        <a href="logout.php">logout</a>-->
    </header>

    <main>
        main

        <?php $i = 0; foreach ($data as $item): ?>
            <h2>Тема: <?php echo $item['title']; ?></h2>
            <p>Стать: <?php echo $item['text']; ?></p>
            <p>Дата: <?php echo $item['date']; ?></p>
            <a href="edit.php?id=<?php echo $item['id']; ?> ">
                Редактировать статью.
            </a>
            <hr>
            <?php $i++; endforeach; ?>

        <?/*="$text";*/?>
    </main>

    <footer>
        footer
    </footer>
</div>
</body>
</html>
