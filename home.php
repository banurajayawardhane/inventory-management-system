

<style>
body, html {
  height: 100%;
}

.img_home{
  
  height: 100%;
  width: 120%;

  /* Center and scale the image nicely */
  position: center;
  position: relative;
  repeat: no-repeat;
  size: cover;
  margin-top: -80px;
  margin-bottom: 0px;
  margin-left: -130px;
  
  
}


</style>


<?php

  $page_title = 'Home Page';
  require_once('includes/load.php');
  if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
?>

<?php include_once('layouts/header.php'); ?>

    <?php echo display_msg($msg); ?>
  
<div class="looo">
      <img  src="libs\images\logo.png" alt="Italian Trulli" class="img_home">
       </div> 
      
    
 

