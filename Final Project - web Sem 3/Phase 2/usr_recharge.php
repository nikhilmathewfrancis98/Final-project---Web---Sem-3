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
    <link rel="stylesheet" href="Styles/usr_page2.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="Styles/index.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){

    function loadDish(type,offertype){
     $.ajax({
       url : "getoffer.php",
       type : "POST",
       data :{type : type ,id : offertype},
       success : function(data){
         if(type == "offerinfo")
         {
           $("#offer").html(data);
         }else if(type == "offerprice")
         {
           $("#amt").html(data);
         }else if(type == "offerdet")
         {
           $("#Details").html(data);
         }
         else{
           $("#dth").append(data);
         }

       }

     });
    }
    loadDish();
    $("#dth").on("change",function(){
      var dth = $("#dth").val();
      loadDish("offerinfo",dth);
    });
    $("#offer").on("change",function(){
      var offer = $("#offer").val();
      loadDish("offerprice",offer);
    });
    $("#offer").on("change",function(){
      var offer = $("#offer").val();
      loadDish("offerdet",offer);
    });
  });
</script>
  </head>
<body>
  <header>
    <nav id="header-nav" class="navbar navbar-default">
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
           <ul id="nav-list" class="nav navbar-nav navbar-right">
            <li>
              <a href="#">
                <span><i class="fa fa-user"></i></span><br>User Profile</a>
            </li>

          </ul><!-- #nav-list -->
        </div><!-- .collapse .navbar-collapse -->
      </div><!-- .container -->
    </nav><!-- #header-nav -->
  </header>
  <!--php -->
  <?php
    if(isset($_REQUEST['Recharge'])){
      $dish = $_REQUEST['dth_types'];
      $offer = $_REQUEST['offer_types'];
      $Date = date('Y-m-d');
      $Cid = $_SESSION['U_Id'];
      $query1 = mysqli_query($mysqli, "SELECT MAX(R_Id) as max from recharge");
      $count = mysqli_num_rows($query1);
      if ($count >= 0) {
        $maxid = mysqli_fetch_array($query1);
        $rid = $maxid['max'] + 1;
        $result = mysqli_query($mysqli, "INSERT INTO recharge(R_Id,C_Id,D_Id,R_date,OfferID) VALUES('$rid','$Cid',' $dish','$Date','$offer')");

        ?>


              <script>
                window.confirm('Recharge Successful')
                  window.location = "User_page.html";



              </script>
            <?php

      }

    }
      ?>
  <!-- Main content -->
  <div id="main-content" style="width: 100%;height: 900px;" >
    <div class="Rechrg_detls">
    <div class="form" style="width: 500px;height: 700px; margin-left: 400px; padding-top: 80px;" >

      <form class="rechrge-form">
          <div>
       <span> <label for="dth" style="color: aliceblue;">Select Dth type</label></span>
    <span>  <select id="dth" name="dth_types">
            <option value=" ">Select DTH</option>

        </select>
        </span>
    </div><br>
        <div>
       <span> <label for="offer" style="color: aliceblue;">Offers</label></span>
    <span>  <select id="offer" name="offer_types">

            <option value disabled selected>Select offer</option>
        </select>
       </span>
    </div>
    <br>

        <div>
        <span></span><label for="amt" style="color: aliceblue;">Amount</label></span>
    <span> <select id="amt" name="amt">
            <option value disabled>Price</option>
        </select></span>
    </div>
    <br>
    <div>

    <span></span><label for="Details" style="color: aliceblue;">Offer Details</label></span>
<span> <select id="Details" name="Details"  style="text-overflow:ellipsis;white-space:nowrap;">
        <option value disabled>DETAILS</option>
    </select></span>
</div>
<br>

        <button type="submit" name="Recharge" value="Recharge">Recharge</button>

      </form>
    </div>
  </div>
  </div><!--end log form -->

        </div> <!-- main-content closing -->
<br style="width: 50px; border:2px solid black;">











 <!-- Footer should be same in all form except the user regestration form -->

  <footer class="footer">
    <div class="footer-div">
    	<br style="width: 50px; border:2px solid black;">

      <div class="row1">

      	<!-- <br style="width: 50px; border:2px solid black;"> -->
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
