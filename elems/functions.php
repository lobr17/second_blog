<?php

    function getPage($link)
    {
        if (!isset($_POST['numberOfRecords']) and !isset($_SESSION['numberOfRecords'])) {
           // if (!isset($_POST['numberOfRecords']) and !isset($_SESSION['numberOfRecords']) and !isset($_GET['page']) ) {

            $query = "SELECT * FROM articles ORDER BY date DESC";
            $result = mysqli_query($link, $query) or die(mysqli_error($link));
            for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row) ;

            include 'layout.php';

        }


        if (isset($_POST['numberOfRecords']) and !isset($_GET['page'])) {

            $_SESSION['numberOfRecords'] = $_POST['numberOfRecords'];
            $from = 0;
            $notesOnPage = $_SESSION['numberOfRecords'];//---------количество записей на страницу-------------

            include 'query.php';
            include 'layout.php';
            include 'formShowAll.php';
        }


        if (!isset($_POST['numberOfRecords']) and isset($_SESSION['numberOfRecords']) and !isset($_GET['page'])) {

            $from = 0;
            $notesOnPage = $_SESSION['numberOfRecords'];

            include 'query.php';
            include 'layout.php';
            include 'formShowAll.php';
        }


        if (!isset($_POST['numberOfRecords']) and isset($_SESSION['numberOfRecords']) and isset($_GET['page'])) {

            $from = ($_GET['page'] * $_SESSION['numberOfRecords']) - $_SESSION['numberOfRecords'];
            $notesOnPage = $_SESSION['numberOfRecords'];

            include 'query.php';
            include 'layout.php';
            include 'formShowAll.php';
        }

        if (isset($_POST['numberOfRecords']) and isset($_SESSION['numberOfRecords']) and isset($_GET['page'])) {

            //$_SESSION['numberOfRecords'] = $_POST['numberOfRecords'];
            $from = ($_GET['page'] * $_POST['numberOfRecords']) - $_POST['numberOfRecords'];
            $notesOnPage = $_POST['numberOfRecords'];

            include 'query.php';
            include 'layout.php';
            include 'formShowAll.php';
        }

    }


    function pagination($link)
    {
        $query = "SELECT COUNT(*) as count FROM articles";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        $count = mysqli_fetch_assoc($result)['count'];//------------всего записей---------------

        $notesOnPage = $_SESSION['numberOfRecords'];
        $countPages = ceil($count / $notesOnPage);//----------количество страниц---------------

        for($i = 1; $i <= $countPages; $i++ ) {
            echo "<a href=\"?page=$i\">$i</a> ";
        }

    }




