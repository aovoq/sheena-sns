<?php
session_start();
$_SESSION = array();
session_destroy();
include('components/_header.php');
header('Location: index.php');
?>

<p>ログアウトしました</p>
<a href="index.php">ログインへ</a>
<?php include('components/_footer.php');
