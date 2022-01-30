<?php
$front_title = isset($title) ? $title : '';

session_start();
if (isset($_SESSION['id'])) {
   $isLogin = true;
   $userId = $_SESSION['id'];
   $userMail = $_SESSION['mail'];
} else {
   $isLogin = false;
}

// escape function
function h($escapeText) {
   return htmlspecialchars($escapeText, \ENT_QUOTES, 'UTF-8');
}

function privatePage($isLogin) {
   if (!$isLogin) {
      header('Location: login.php?pls');
      exit();
   }
}

function err404() {
   header("HTTP/1.1 404 Not Found");
   header('Location: 404.php');
   // NOTE: 404で返す際にリダイレクトするのはどうなのか。
   // include('/404.php');
   exit;
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?= h($front_title); ?>illustagram</title>
   <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
   <link rel="stylesheet" href="/components/style.css">
</head>

<body>
   <header class='site-header'>
      <div class="wrapper site-header__wrapper">
         <a href="/" class='brand'>illustagram</a>
         <nav class='nav'>
            <ul class='nav__wrapper'>
               <?php if ($isLogin) { ?>
                  <li class="nav__item"><a href="/upload.php">アップロード</a></li>
                  <li class="nav__item"><a href="/show.php?id=<?= h($userId) ?>">マイページ</a></li>
                  <li class="nav__item"><a href="/logout.php">ログアウト</a></li>
               <?php } else { ?>
                  <li class="nav__item"><a href="/upload.php">アップロード</a></li>
                  <li class='nav__item'><a href="/login.php">ログイン</a></li>
                  <li class='nav__item'><a href="/signup.php">新規登録</a></li>
               <?php } ?>
            </ul>
         </nav>
      </div>
   </header>
