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

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="style.php">
  <link rel="stylesheet" type="text/css" href="adminpage.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
<body>
  <header>
    <nav id="header-nav" class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
         <div class="navbar-brand">
            <a href="index.html"><h1>SSN Dish Tv Recharge</h1></a>
           </div>

          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapsable-nav" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

          </button>
        </div>

        <div id="collapsable-nav" class="collapse navbar-collapse">
           <ul id="nav-list" class="nav navbar-nav navbar-right">
            <li>
              <a href="logout.php">
                <span><i class='fa fa-user-secret' style='font-size:24px'></i></span><br class="hidden-xs">Log Out</a>
            </li>

          </ul><!-- #nav-list -->
        </div><!-- .collapse .navbar-collapse -->
      </div><!-- .container -->
    </nav><!-- #header-nav -->
  </header>
  <!-- PHP session-->
  <?php
if (isset($_POST['submit']))
{
  $name=$_POST['name'];
  $url=$_POST['url'];
  $img=$_FILES['image'];

  //print_r($img);

  $filename=$img['name'];
  $fileerror=$img['error'];
  $filetmp=$img['tmp_name'];

  $fileext=explode('.', $filename);
  $filecheck=strtolower(end($fileext));

  $fileextstored = array('jpg','png','jpeg');
  if (in_array($filecheck, $fileextstored)) {
  	$filedestination='storage/'.$filename;
  	move_uploaded_file($filetmp, $filedestination);
    $query = mysqli_query($mysqli, "SELECT MAX(D_Id) as max from dish");
 		  $count = mysqli_num_rows($query);
      $query = mysqli_query($mysqli, "SELECT MAX(D_Id) as max from dish");
		  $count = mysqli_num_rows($query);
                if($count == 1){
                    $maxid = mysqli_fetch_array($query);
					$did = $maxid['max']+1;
				}
				else
				{ $did=1;
			  }
  	$sql="INSERT INTO `dish`(`D_Id`,`D_Name`, `D_Details`, `D_Image`) VALUES ('$did','$name','$url','$filedestination')";
  $query=mysqli_query($mysqli,$sql);
  if($query){
  ?>
         <script>
          window.confirm('Operator added');
            window.location = "adminpage.html";
        </script>
        <?php
      }
      else {
        ?>
               <script>
                window.confirm('failed to add Operator');
                  window.location = "adminpage.html";
              </script>
              <?php
      }

  }

}

?>



  <!-- Main content -->
  <div>
  <form action="" method="post" enctype="multipart/form-data">
  <div><input type="text" name="name" placeholder="Operator Name"required/></div><br>
  <div><input type="url" name="url" placeholder="Website" required/></div><br>
    <div class="file-field">
    <div class="btn-logo">
      <span>Operator logo</span>
      <input type="file" class="file" name="image" required/><!--<button value="upload"><i class="fa fa-upload" aria-hidden="true"></i> upload</button>-->
    </div>
  </div><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <button class="btn_1" name="submit">Add</button>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <button class="btn_1" onclick="history.back()">Back</button>

</form>
</div>
  <!--end log form -->

        </div> <!-- main-content closing -->


 <!-- Footer should be same in all form except the user regestration form -->
  <footer class="footer">
    <div class="footer-div">
      <br style="width: 50px; border:2px solid black;">

      <div class="row1">

         <br style="width: 50px; border:2px solid black;">
        <section id="hours" style="text-align: center;color: red;">
         This  Site is more usefull for recharge facilities
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
