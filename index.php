<?php
include 'elems/init.php';
include 'elems/numberofrecords.php';
include 'elems/functions.php';
?>
<br><br>
<a href="add.php">Добавить новую статью.</a>
<br><br>
<?php

        if(isset($_POST['ShowAll'])) {
            unset($_SESSION['numberOfRecords']);
        }

        getPage($link);

        if(isset($_SESSION['numberOfRecords'])) {
            pagination($link);
        }

var_dump($_POST);
var_dump($_GET);
var_dump($_SESSION);