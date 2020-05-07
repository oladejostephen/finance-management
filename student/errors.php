<?php  if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p style="text-align: center; font-family: cursive; color: red; line-height: 15px;"><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>