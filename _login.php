<?php
session_start();
$mail = $_POST['mail'];

// TODO: 例外処理

$users = glob('data/user/*.json');
$json = file_get_contents('data/user.json');
$json = json_decode($json, TRUE);
$key = array_search($mail, array_column($json, 'mail'));
$match = $json[$key];

if (password_verify($_POST['pass'], $match['pass'])) {
   $_SESSION['id'] = $match['id'];
   $_SESSION['mail'] = $match['mail'];
   $msg = 'ログインしました。';
   $link = '<a href="index.php">ホーム</a>';
   header("Location: index.php");
} else {
   $msg = 'パスワードが間違っています';
   $link = '<a href="login.php">戻る</a>';
}
?>

<h1><?= $msg ?></h1>
<?= $link ?>
