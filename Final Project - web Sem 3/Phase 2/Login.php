<?php session_start();
    require("config.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dish Tv Recharge</title>
    <link  href="css/bootstrap.min.css">
    <link rel="stylesheet" href="Styles/index.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="Styles/login.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
<body>

    <nav id="header-nav" class="navbar navbar-default" style="margin: 0px;">
      <div class="container">
        <div class="navbar-header">
         <div class="navbar-brand">
            <a href="index.html"><h1>SSN Dish Tv Recharge</h1></a>
           </div>

       <button style="visibility:hidden" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapsable-nav" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

          </button>
        </div>

        <div id="collapsable-nav" class="collapse navbar-collapse">
           <ul id="nav-list" class="nav navbar-nav navbar-right" style="visibility:hidden">
            <li>
             <a href="#" hidden>
                <span><i class='fas fa-user-secret' style='font-size:24px'></i></span><br class="hidden-xs">Admin Sign In</a>
            </li>
            <li>
              <a href="#" hidden>
                <span><i class="fa fa-user"></i></span><br class="hidden-xs">User Sign In</a>
            </li>

          </ul><!-- #nav-list -->
        </div><!-- .collapse .navbar-collapse -->
      </div><!-- .container -->
    </nav><!-- #header-nav -->


  <!-- PHP BEGIN -->

  <?php
    $error = $error_login = $error_username = $error_password = "";
    if(isset($_REQUEST['login'])){
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];

        if(empty($username) || empty($password)){
            if(empty($username)){
				echo '<script>alert("Wrong info")</script>';
                $error_username = "Username field is mendatory";
            }
            if(empty($password)){
				echo '<script>alert("Wrong info")</script>';
                $error_password = "Password field is mendatory";
            }
        }
        else{
                $query = mysqli_query($mysqli, "SELECT * FROM users WHERE username='$username' AND password='$password'");
                $count = mysqli_num_rows($query);
                if($count == 1){
                    $row = mysqli_fetch_array($query);

                    $_SESSION['U_Id'] = $row['U_Id'];
                    $_SESSION['username'] = $row['username'];
					          $_SESSION['type'] = $row['type'];
					if($row['type']=='admin')
					{
                    header("location:adminpage.html");
					}
					if($row['type']=='cust')
					{
                    header("location:User_page.html");
					}
                }
                else{
                  ?>

                      <div class="col-md-12 mx-auto" >
                        <div class="alert alert-danger alert-dismissible text-center">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong style="background-color:white;"> username and password combination doesn't match!!! </strong>
                        </div>
                      </div>
                    <?php
                }
            }
        }
        ?>
  <!-- PHP END -->

  <!-- Main content -->
  <form action="login.php" method="post">
  <div id="main-content" style="width: 100%;height: 700px;" >
    <div class="login-page">
    <div class="form">

      <form class="login-form">
        <input type="text" placeholder="username" name="username" required/>
        <input type="password" placeholder="password" name="password" required/>
        <button type="submit" name="login" value="login">login</button>
        <p class="message">Not registered? <a href="Signup.php">Create an account</a></p>
      </form>
    </div>
  </div>
  </div>
</form><!--end log form -->

        </div> <!-- main-content closing -->
<div style="width: 100px; display:flex; justify-content: center;">
    <div class="col-sm-12 align-content-center" style="border: 1px solid white;padding:0 25% 0 25%;">

    </div>
  </div>










 <!-- Footer should be same in all form except the user registration form -->

  <footer class="footer">
    <div class="footer-div">
    	<br style="width: 50px; border:2px solid black;">

      <div class="row1">

      	<!-- <br style="width: 50px; border:2px solid black;"> -->
        <section id="hours" style="text-align: center;color: red;">
         This  Site is more useful for recharge facilities
        </section>

        <section id="testimonials" style="text-align: center;color: red;">
          <p>"The best Recharging site for the various Dth services !"</p>
          <p>"Great service! Couldn't ask for more! I'll be back again and again!"</p>
        </section>
      </div>
      <div class="text-center" style="color: red";>&copy; SSN Dish Tv Recharge  2020</div>
    </div>
  </footer>


  <!-- jQuery (Bootstrap JS plugins depend on it) -->
  <script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
</body>
</html>
