<?php
$query = "SELECT * FROM articles WHERE id > 0 ORDER BY date DESC LIMIT $from, $notesOnPage";
echo $query;
$result = mysqli_query($link, $query) or die(mysqli_error($link));
for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row) ;