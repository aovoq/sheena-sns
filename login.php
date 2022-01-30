<?php include('components/_header.php'); ?>
<main class='wrapper'>
   <div class='login'>
      <div class="login__link--signin">
         <p><a href="/login.php">ログイン</a></p>
      </div>
      <div class="login__link--signup">
         <p><a href="/signup.php">新規登録</a></p>
      </div>
      <form action="_login.php" method="POST" class='login__form'>
         <div class='login__inputWrapper'>
            <label for="email" class='login__label'>EMAIL</label>
            <input type="mail" name="mail" required class='login__input'>
         </div>
         <div class='login__inputWrapper'>
            <label for="pass" class='login__label'>PASSWORD</label>
            <input type="password" name="pass" required class='login__input'>
         </div>
         <button class='login__button'>
            <div class='login__button--text'>ログイン</div>
            <div class='login__button--accent'>
               <span class="material-icons-outlined">
                  navigate_next
               </span>
            </div>
         </button>
      </form>
   </div>
</main>

<div class="alert">
   <p>そのページを見るにはログインする必要があります。<br />
      アカウントが無い場合は新規登録してください。</p>
</div>

<script>
   if (location.search) {
      document.querySelector('.alert').className += ' enable active'
      setTimeout(() => {
         console.log('asdf')
         const alertClass = document.querySelector('.alert').className.replace(' active', '')
         document.querySelector('.alert').className = alertClass
      }, 1500)
   }
</script>
<?php include('components/_footer.php');
