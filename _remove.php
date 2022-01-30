<?php
include('components/_header.php');
privatePage($isLogin);

$postJson = file_get_contents('data/posts/' . $_SESSION['id'] . '.json');
$postDatas = json_decode($postJson, TRUE);
$removeIndex = array_search(intval($_POST['date']), array_column($postDatas, 'date'));
unlink($postDatas[$removeIndex]['image']);
array_splice($postDatas, $removeIndex, 1);
$postJson = json_encode($postDatas);
file_put_contents('data/posts/' . $_SESSION['id'] . '.json', $postJson);

header("Location: /show.php?id=" . $_SESSION['id']);
exit();
