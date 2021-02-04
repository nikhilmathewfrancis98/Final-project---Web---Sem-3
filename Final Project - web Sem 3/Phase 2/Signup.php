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
  <link href="css/bootstrap.min.css">
  <link rel="stylesheet" href="Styles/index.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="Styles/login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="JS/Signup.js"></script>
</head>
<style>
  #err_mesg_name,
  #err_mesg_phn,
  #err_mesg_usrnm,
  #err_mesg_psswd,
  #err_mesg_email {
    color: red;
    display: none;
  }
</style>

<body>
  <header>
    <nav id="header-nav" class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <div class="navbar-brand">
            <a href="index.html">
              <h1>SSN Dish Tv Recharge</h1>
            </a>
          </div>

          <button style="visibility:hidden" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapsable-nav" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

          </button>
        </div>

        <div id="collapsable-nav" class="collapse navbar-collapse">
          <ul style="visibility:hidden" id="nav-list" class="nav navbar-nav navbar-right">
            <li>
              <a href="#">
                <span><i class='fas fa-user-secret' style='font-size:24px'></i></span><br class="hidden-xs">Admin Sign In</a>
            </li>
            <li>
              <a href="#">
                <span><i class="fa fa-user"></i></span><br class="hidden-xs">User Sign In</a>
            </li>

          </ul> <!-- #nav-list -->
        </div><!-- collapse .navbar-collapse -->
      </div><!-- .container -->
    </nav><!-- #header-nav -->
  </header>
  <!-- PHP BEGIN -->
  <?php
  $error = $error_login = $error_username = $error_password = "";
  if (isset($_REQUEST['signup'])) {
    $name = $_REQUEST['name'];
    $dob = $_REQUEST['age'];
    $gender = $_REQUEST['gender'];
    $phone = $_REQUEST['phone'];
    $email = $_REQUEST['email'];
    $username = $_REQUEST['uname'];
    $password = $_REQUEST['pwd'];

    $queryUsr = mysqli_query($mysqli, "SELECT U_Id  from users where username = $username");
    $countusr = mysqli_num_rows($queryUsr);

    if ($countusr < 1) {
      $query = mysqli_query($mysqli, "SELECT MAX(C_Id) as max from customer");
      $count = mysqli_num_rows($query);

      if ($count == 1) {
        $maxid = mysqli_fetch_array($query);
        $Cid = $maxid['max'] + 1;
        $result = mysqli_query($mysqli, "INSERT INTO customer(C_Id,C_Name,Age,Gender,PhoneNo,email) VALUES('$Cid','$name',' $dob','$gender','$phone','$email')");
        $result2 = mysqli_query($mysqli, "INSERT INTO users(U_Id,username,password,type) VALUES('$Cid','$username','$password','cust')");
      } else {
        echo "<font color='red'>error</font><br/>";
      }
    } else {

  ?>
      <div class="col-sm-6 mt-5 mx-auto">
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>User already exists with this Username </strong>
        </div>
      </div>
  <?php
    }
  }
  ?>

  <!-- PHP END -->

  <!-- Main content -->
  <div id="main-content" style="width: 100%; margin-bottom:5px;  border:2px solid black;">

    <div class="login-page">

      <div class="form">

        <form class="login-form" method="post" action="" name="myform">


          <input type="text" placeholder="Name*" name="name" id="usname" onkeyup="check_name(this.id,'err_mesg_name')" required />
          <p id="err_mesg_name">*Enter a valid name</p>


          <input type="text" placeholder="d.o.b" onfocus="(this.type='date')" onblur="(this.type='text')" name="age" required />

          <select name="gender" required>
            <option value="" disabled selected style="color:grey">gender</option>
            <option value="male" name="gender">Male</option>
            <option value="female" name="gender">Female</option>
            <option value="other" name="gender">Other</option>
          </select>

          <input type="text" id="phn" placeholder="Mobile number*" name="phone" required minlength="10" maxlength="10" onkeyup="check_phone(this.id,'err_mesg_phn')" />
          <p id="err_mesg_phn">*Phone no should be valid</p>

          <input type="email" placeholder="Email*" name="email" id="mail" required onkeyup="ValidateEmail(this.id,'err_mesg_email')" />
          <p id="err_mesg_email">*Email should be valid</p>

          <input type="text" placeholder="Username*" name="uname" required />
          <!-- <p id="err_mesg_usrnm">*Should contain at-least 6 characters</p> -->

          <input type="password" placeholder="Password*" id="psswd" name="pwd" required onkeyup="ValidatePsswd(this.id,'err_mesg_psswd')" />
          <p id="err_mesg_psswd">*Feed strong Password</p>

          <button type="submit" name="signup" value="signup" id="btn">SignUp</button>
          <p class="message">Already registered? <a href="Login.html">Log In</a></p>

        </form>

      </div>

    </div>

  </div>
  <!--end log form -->

  </div> <!-- main-content closing -->
  <!-- <br style=" border:2px solid black;"> -->


  <!-- Footer should be same in all form except the user registration form -->

  <footer class="footer">
    <div class="footer-div">
      <br style="width: 50px; border:2px solid black;">

      <div class="row1">

        <!-- <br style="width: 50px; border:2px solid black;"> -->
        <section id="hours" style="text-align: center;color: red;">
          This Site is more useful for recharge facilities
        </section>

        <section id="testimonials" style="text-align: center;color: red;">
          <p>"The best Recharging site for the various Dth services !"</p>
          <p>"Great service! Couldn't ask for more! I'll be back again and again!"</p>
        </section>
      </div>
      <div class="text-center" style="color: red" ;>&copy; SSN Dish Tv Recharge 2020</div>
    </div>
  </footer>


  <!-- jQuery (Bootstrap JS plugins depend on it) -->
  <script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>