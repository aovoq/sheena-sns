<?php include('components/_header.php') ?>
<main class='wrapper'>
   <div class='login'>
      <div class="login__link--signin isSignup">
         <p><a href="/login.php">ログイン</a></p>
      </div>
      <div class="login__link--signup isSignup">
         <p><a href="/signup.php">新規登録</a></p>
      </div>
      <form action="_signup.php" method="POST" class='login__form isSignup'>
         <div class='login__inputWrapper isSignup'>
            <label for="id" class='login__label'>ID</label>
            <input type="text" name='id' required class='login__input'>
         </div>
         <div class='login__inputWrapper isSignup'>
            <label for="email" class='login__label'>EMAIL</label>
            <input type="email" name="mail" required class='login__input'>
         </div>
         <div class='login__inputWrapper isSignup'>
            <label for="pass" class='login__label'>PASSWORD</label>
            <input type="password" name="pass" required class='login__input'>
         </div>
         <button class='login__button'>
            <div class='login__button--text'>新規登録</div>
            <div class='login__button--accent'>
               <span class="material-icons-outlined">
                  navigate_next
               </span>
            </div>
         </button>
      </form>
   </div>
</main>
<?php include('components/_footer.php');
