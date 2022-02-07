<?php
$id = $_POST['id'];
$mail = $_POST['mail'];
$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

if ($_POST['token'] != $_SESSION['token']) {
   $_SESSION = array();
   header("Location: index.php");
   exit();
}

// TODO: 例外処理

$filename = 'data/user.json';
$json = file_get_contents($filename);
$json = json_decode($json);
$json[] = array('id' => $id, 'mail' => $mail, 'pass' => $pass);
$json = json_encode($json);
file_put_contents($filename, $json);
header("Location: index.php");
?>
<?php
// $id = $_POST['id'];
// $mail = $_POST['mail'];
// $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

// $filename = 'data/user/' . $id . '.json';
// if (($fp = fopen($filename, 'wb')) != FALSE) {
//    $json = json_encode(array('id' => $id, 'mail' => $mail, 'pass' => $pass));
//    fwrite($fp, $json);
//    fclose($fp);
// }

// $users = glob('data/user/*.json');
// foreach ($users as $user) {
//    $filebase = basename($user, '.json');
//    $json_str = file_get_contents($user);
//    $json = json_decode($json_str, TRUE);
//    echo $id . "<br/>";
//    echo $json['id'] . "<br/>";
//    echo $mail . "<br/>";
//    echo $json['mail'] . "<br/>";
//    if (!$id === $json['id'] || !$mail === $json['mail']) {
//       echo '被っていない<br/>';
//    } else {
//       echo 'idかmailが既に登録されています。<br/>';
//    }
//    echo "<br/>";
// }
