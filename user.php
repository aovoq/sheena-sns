<?php
session_start();
$id = isset($_GET['id']) ? $_GET['id'] : 'ユーザーがいません';
$title = $id . ' | ';
include('components/_header.php');
?>

<h1>USERID: <?= $id ?></h1>

<?php
include('components/_footer.php');
