<?php
include 'elems/init.php';

$id = $_GET['id'];

$query = "SELECT * FROM articles WHERE id=$id";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row) ;

var_dump($data);
?>


<form action="" method="POST">
    Редактировать статью:<br>
    Название: <input name="title" placeholder="<?=$data[0]['title'];?>"><br><br>
    Текст статьи: <textarea name="text" placeholder="<?=$data[0]['text'];?>"></textarea><br>
    <input type="submit" value="Изменить">
</form>

<?php

if (isset($_POST['title']) and isset($_POST['text'])){
    $query = "INSERT INTO articles SET date=NOW(),title='$_POST[title]', text='$_POST[text]'";
    var_dump($query);
    if (!mysqli_query($link, $query)) {
        echo "Запись не добавлена!";
    }

    header('Location: index.php');
    die();
}

