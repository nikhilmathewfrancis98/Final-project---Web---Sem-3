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
  <link rel="stylesheet" type="text/css" href="Styles/addoffer.css">
  <link rel="stylesheet" type="text/css" href="Styles/adminpage.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
select
{
  border: none;
  appearance:none;
  background: #f2f2f2;
  padding: 12px;
  border-radius: 3px;
  width: 250px;
  outline:none;
  appearance: none;
  padding-right: 2em;


  &:invalid {
    color: gray;
  }


  [disabled] {
    color: gray;
  }

  option {
    color: $default-color;
  }
}
</style>
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
              <a href="#">
                <span><i class='fa fa-user-secret' style='font-size:24px'></i></span><br class="hidden-xs">Admin Profile</a>
            </li>

          </ul><!-- #nav-list -->
        </div><!-- .collapse .navbar-collapse -->
      </div><!-- .container -->
    </nav><!-- #header-nav -->
  </header>

   <!-- PHP BEGIN -->
  <?php
    $error = $error_login = $error_username = $error_password = "";
    if(isset($_REQUEST['btn'])){
        $name = $_REQUEST['name'];
		$details = $_REQUEST['det'];
		$price =$_REQUEST['price'];
		$dishtv=$_REQUEST['dish'];

          $query = mysqli_query($mysqli, "SELECT MAX(Offer_Id) as max from offers");
		  $count = mysqli_num_rows($query);
                if($count == 1){
                    $maxid = mysqli_fetch_array($query);
					$Cid = $maxid['max']+1;

				}
				else
				{
				      $Cid=1;
				}
				$result = mysqli_query($mysqli, "INSERT INTO offers(Offer_Id,Offer_Name,D_Id,price,OfferDetails) VALUES('$Cid','$name','$dishtv','$price','$details')");
              if($result)
              {
                ?>


                      <script>
                        window.confirm('Offer added');
                          window.location = "adminpage.html";
                      </script>
                    <?php
              }else {
                ?>
                      <script>
                        window.confirm('failed to add offer');
                      </script>
                    <?php
              }
        }
        ?>

  <!-- PHP END -->

  <!-- Main content -->
  <div>
  <form>
  <div><input type="text" name="name" placeholder="Offer Name"></div><br>
  <?php
    $dish  =  mysqli_query($mysqli, "SELECT D_Id,D_name from dish");
        echo"<div>";
        echo "<select name=dish>";
                echo"<option value='' disabled selected style='color:grey'>DISH</option>";
				while ($row = mysqli_fetch_assoc($dish)) {
                echo"<option value=$row[D_Id]>$row[D_name]</option>";
                }
        echo"</select>";
		echo"</div><br>";
		?>
  <div><input type="text" name="det" placeholder="Offer Details"></div><br>
  <div><input type="number" name="price" placeholder="Amount"></div><br>
  <button class="btn" name="btn" value="submit"> Add</button>
  <button class="btn"value="reset"> cancel</button>
  <button class="btn" onclick="history.back()">Back</button>
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
