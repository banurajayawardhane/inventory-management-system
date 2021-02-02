<style>
body, html {
  height: 100%;
}

.img_home{
  
  height: 100%;
  width: 250%;

  /* Center and scale the image nicely */
  position: center;
  position: relative;
  repeat: no-repeat;
  size: cover;
  margin-top: -80px;
  margin-left: -550px;
  margin-bottom: 0px;

  
  
}

.boo{
  margin-left:200px;
  margin-top:100px;
}

</style>

<?php
  ob_start();
  require_once('includes/load.php');
  if($session->isUserLoggedIn(true)) { redirect('home.php', false);}
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
   
<div class="col-md-6">
      <img  src="libs\images\logo.png" alt="Italian Trulli" class="img_home">
       </div> 
<div class="boo">
<div class="col-md-6">
<div class="login-page">
    <div class="text-center">
       <h1>Welcome</h1>
       <p>Sign in to start your session</p>
     </div>
     <?php echo display_msg($msg); ?>
      <form method="post" action="auth.php" class="clearfix">
        <div class="form-group">
              <label for="username" class="control-label">Username</label>
              <input type="name" class="form-control" name="username" placeholder="Username">
        </div>
        <div class="form-group">
            <label for="Password" class="control-label">Password</label>
            <input type="password" name= "password" class="form-control" placeholder="password">
        </div>
        <div class="form-group">
                <button type="submit" class="btn btn-info  pull-right">Login</button>
        </div>
    </form>
</div>
</div>
</div>
</div>
<?php include_once('layouts/footer.php'); ?>
</body>
