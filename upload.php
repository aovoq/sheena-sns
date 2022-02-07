<?php
include('components/_header.php');
privatePage($isLogin);

$token = bin2hex(random_bytes(32));
$_SESSION['token'] = $token;
?>

<main class="wrapper">
   <form action="_upload.php" method='POST' enctype='multipart/form-data' class='upload'>
      <input type="hidden" name="token" value="<?= $token ?>">
      <div class='upload__left'>
         <div class="upload__dropArea">
            <span class="material-icons-outlined">
               cloud_upload
            </span>
            <p>Drag and drop a file or click</p>
            <div class='upload__preview--wrapper'>
               <img src="" id='upload__preview' class='upload__preview'>
            </div>
            <input type="file" name='image' id='input-files' accept='image/*'>
         </div>
      </div>
      <div class='upload__right'>
         <label class='upload__label'>Description</label>
         <textarea class='upload__input' name="desc" id="upload__input"></textarea>
         <button class='upload__button'>アップロード</button>
      </div>
   </form>
</main>

<script>
   const imgInp = document.querySelector('#input-files')
   const preview = document.querySelector('#upload__preview')
   imgInp.addEventListener('change', () => {
      const [file] = imgInp.files
      if (file) {
         preview.src = URL.createObjectURL(file)
         if (!preview.className.includes('active')) {
            preview.className += ' active'
         }
      }
   })
</script>
<?php include('components/_footer.php');
