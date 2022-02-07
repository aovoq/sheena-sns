<?php
$title = isset($_GET['id']) ? $_GET['id'] . ' | ' : '';
include('components/_header.php');
$isMyaccount = false;

$userJson = file_get_contents('data/postUsers.json');
$userJson = json_decode($userJson);
$key = in_array($_GET['id'], array_column($userJson, 'id'));

if (!$key) {
   err404();
}

if ($isLogin) {
   if ($_GET['id'] == $_SESSION['id']) {
      $isMyaccount = true;
   }
}

$token = bin2hex(random_bytes(32));
$_SESSION['token'] = $token;
?>


<main class="wrapper">
   <section>
      <h1 class='createrName'><?= h($_GET['id']) ?><?php if ($isMyaccount) echo ' - マイページ'; ?></h1>
   </section>
   <div class="grid">
      <?php
      $postJson = file_get_contents('data/posts/' . $_GET['id'] . '.json');
      $postDatas = json_decode($postJson, TRUE);
      foreach ($postDatas as $postData) { ?>
         <div class='postCard'>
            <img class="postCard__image" src="<?= h($postData['image']) ?>" desc="<?= h($postData['desc']) ?>" date="<?= h($postData['date']) ?>">
            <div class="postCard__image--border" src="<?= h($postData['image']) ?>" desc="<?= h($postData['desc']) ?>" date="<?= h($postData['date']) ?>"></div>
         </div>
      <?php } ?>
   </div>
</main>

<div class="modal">
   <div class="modal-content">
      <div class="modal-image"></div>
      <div class="modal-detail">
         <div class="modal-nameBox">
            <div class="modal-circle"></div>
            <p class="modal-name"><?= h($_GET['id']); ?></p>
         </div>
         <?php if ($isMyaccount) { ?>
            <form id="update-form" action="/_update.php" method="POST" class="modal-desc">
               <input type="hidden" name="token" value="<?= $token ?>">
               <input type="hidden" id="hidden-date-update" name="date" value="">
               <textarea name="desc" id="modal-desc"></textarea>
            </form>
         <?php } else { ?>
            <div class="modal-desc" id="modal-desc">
            </div>
         <?php } ?>
         <div class="modal-desc-bottom">
            <?php if ($isMyaccount) { ?>
               <div class="modal-form">
                  <button form="update-form" class="modal-postUpdateButton">Update Description</button>
               </div>
               <form action="/_remove.php" method="POST" class="modal-form">
                  <input type="hidden" name="token" value="<?= $token ?>">
                  <input type="hidden" id="hidden-date-remove" name="date" value="">
                  <button class="modal-postDeleteButton" onclick="return confirm('本当に削除してよろしいですか？')">Delete this post</button>
               </form>
            <?php } ?>
            <div class="modal-date">Date: </div>
         </div>
      </div>
      <div class="modal-close">x</div>
   </div>
</div>

<script src="./js/modal.js"></script>
<?php include('components/_footer.php');
