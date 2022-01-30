<?php
include('components/_header.php');

?>

<main class='wrapper'>
   <section class="serviceDescription">
      <h2>illustagramとは...</h2>
      <p>似顔絵を描く人と、似顔絵を描いてもらいたい人を繋げるサービスです。</p>
      <p>現在はダミー画像として写真を入れています。</p>
   </section>
   <div class="grid">
      <?php
      $postUsers = file_get_contents('data/postUsers.json');
      $postUsers = json_decode($postUsers, TRUE);
      foreach ($postUsers as $postUser) { ?>
         <!-- <h3><a href="./user.php?id=<?= h($postUser['id']) ?>"><?= h($postUser['id']) ?></a></h3> -->
         <div class='postCard'>
            <a href="show.php?id=<?= h($postUser['id']) ?>">
               <img class="postCard__image" src="<?= h($postUser['image']) ?>">
               <span class='postCard__image--backId'><?= h($postUser['id']) ?></span>
               <div class="postCard__image--border"></div>
               <div class="postCard__image--box">
                  <h2 class='postCard__image--userId'><?= h($postUser['id']) ?> &gt;</h2>
               </div>
            </a>
         </div>
      <?php } ?>
   </div>
</main>

<?php include('components/_footer.php');
