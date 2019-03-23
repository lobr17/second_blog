<?php
include 'elems/init.php';
include 'elems/form.php';


        if (!empty($_POST['title']) and !empty($_POST['text'])) {
            $title = $_POST['title'];
            $text = $_POST['text'];

            $query = "INSERT INTO articles (date , title, text) VALUES (NOW(), '$title', '$text')";
            mysqli_query($link, $query) or die(mysqli_error($link));

            header('Location: index.php');
            die();
			//уфыдкшвгп
        }