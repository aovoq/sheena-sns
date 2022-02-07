<?php
session_start();
$path = 'data/posts/';
$dirname = $_SESSION['id'];
$isFirst = false;

if ($_POST['token'] != $_SESSION['token']) {
   $_SESSION = array();
   header("Location: index.php");
   exit();
}

//TODO: 例外処理
//TODO: 容量の制限処理

$image = $_FILES['image'];
$desc = $_POST['desc'];

$filename = date('YmdHis');
$jsonpath = "${path}${dirname}.json";
$img_path = "${path}${dirname}/${filename}";


if (file_exists($image['tmp_name']) && isset($desc)) {
   if (getimagesize($image['tmp_name'])) {
      switch ($image['type']) {
         case 'image/jpeg':
            $img_path .= '.jpeg';
            break;
         case 'image/jpg':
            $img_path .= '.jpg';
            break;
         case 'image/png':
            $img_path .= '.png';
            break;
         default:
            $err = '画像形式はjpgとpngのみ許可されています。';
            exit('画像形式はjpgとpngのみ許可されています。');
      }
      // NOTE: ディレクトリー作成
      if (is_writable($path) && !file_exists($path . $dirname)) {
         if (mkdir($path . $dirname)) {
            echo 'ディレクトリを作成しました。';
            $isFirst = true;
         } else {
            echo 'ディレクトリの作成に失敗しました。';
            exit();
         }
      } else {
         // echo '親ディレクトリが書き込みを許可していない or 既に同名のディレクトリが存在する';
      }
      if ($isFirst == true) {
         $postUsers_json = file_get_contents('data/postUsers.json');
         $postUsers_json = json_decode($postUsers_json);
         $postUsers_json[] = array(
            'id' => $_SESSION['id'],
            'image' => $img_path
         );
         $postUsers_json = json_encode($postUsers_json);
         file_put_contents('data/postUsers.json', $postUsers_json);
      }

      $json = file_get_contents($jsonpath);
      $json = json_decode($json);
      $json[] = array(
         "thumb" => $isFirst == true ? true : false,
         "desc" => $desc,
         "image" => $img_path,
         "date" => time(),
      );
      $json = json_encode($json);
      file_put_contents($jsonpath, $json);
      move_uploaded_file($image['tmp_name'], $img_path);

      header("Location: /show.php?id=" . $_SESSION['id']);
      exit();
   } else {
      $err = 'ファイルが画像ではありません。';
   }
} else {
   $err = 'ファイル又は、説明がありません。';
}

echo $err;
