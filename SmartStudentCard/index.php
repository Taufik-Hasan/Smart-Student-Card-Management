<?php
  require ("dataserver.php");
  $Error_Message=NULL;
  if(isset($_POST['login'])){
    $loginFormUserName = $_POST['userName']; 
    $loginFormPassword = $_POST['userPassword'];
    if($DB->validate_login($loginFormUserName, $loginFormPassword)){
      $DB->initialize_user($loginFormUserName);
      $_SESSION['current_username']=$loginFormUserName;
    }
    else{
      $Error_Message='invalid_username_or_password';
    }
  }
  if(isset($_GET['logout'])){
    session_destroy();
    header("Location:/SmartStudentCard");
    return;
  }
  if(isset($_SESSION['SSC_user'])){
    if($_SESSION['SSC_user']->user_type=="Doctor")
      header("Location:doctor/");
    else if($_SESSION['SSC_user']->user_type=="Liberian")
      header("Location:Liberian/");
    else if($_SESSION['SSC_user']->user_type=="Cafeteria") 
      header("Location:Cafeteria/");
    else if($_SESSION['SSC_user']->user_type=="Admin") 
      header("Location:Admin/");
    else{
      require '../include/error.php';
      return;
    }
  }

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=0.9">
  <title>Smart Student ID Card</title>
  <link rel="icon" href="images/icon/duet_icon.ico">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="fonts/font-awesome.min.css">
</head>
<body>
  <!-- Main Section Start -->
  <!-- Header Start -->
  <div class="header">
    <div class="mainmenu">
      <center><div class="siteTitle"><a href="/SmartStudentCard"><img src="images/icon/duet_icon.ico" height="25"> Smart Student ID Card</a></div></center>
      
    </div>
  </div><!-- /.header -->
  
  <br><br><br><br><br>
  <?php if(!isset($_SESSION['SSC_user'])) {?>  
  <div class="main">
    <!-- Header End -->
    <div class="logInForm">
      <h3>Log In</h3>
      <form method="POST" action="">
        <input type="text" name="userName" value="" placeholder="Username" minlength="5" required/>
        <input type="password" name="userPassword" value="" placeholder="Password" minlength="5" required />
        <button type="submit" name="login">Log In</button>
      </form>
    </div>
    <div class="clearFix"></div>
    <?php
      if($Error_Message != NULL)
        echo "<center><p><b>".$Error_Message."</b></p></center>";
    ?>
    <!-- Mission and Vision Section End -->
  </div><!-- /.main -->
  <!-- Main Section End -->
  <?php }
  else{ ?> 
  <div class="main">
    <center><h3>.......</h3></center>
  </div>
  <?php } ?>
  <br><br><br><br><br><br><br>
  <!-- Footer Section Start -->
  <?php 
    require ("include/footer.php");
  ?>
  <!-- Footer Section End -->
  <script src="js/jquery-2.x-git.min.js"></script>
  <script src="js/function.js"></script>

</body>
</html>