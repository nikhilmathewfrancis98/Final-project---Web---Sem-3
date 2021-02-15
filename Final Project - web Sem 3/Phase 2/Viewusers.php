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
<link rel="stylesheet" type="text/css" href="adminpage.css">
<link rel="stylesheet" type="text/css" href="style.php">
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



  <!-- Main content -->
  <center>
  	<br><br>
	<?php
	include 'config.php';
	$sql="select C_Id,C_Name,Age,Gender,PhoneNo,Email from customer";
	$query=mysqli_query($mysqli,$sql);
  $count=mysqli_num_rows($query);
	if($count>0)
	{
    echo "<table>";
    echo "<tr>
    <th>Customer Id</th>
    <th>Customer Name</th>
    <th>Age</th>
    <th>Gender</th>
    <th>Phone Number</th>
    <th>Email</th>
    <th></th>
    </tr>";
		while ($row=mysqli_fetch_array($query))
		{
			echo "<tr><td>".$row['C_Id']."</td><td>".$row['C_Name']."</td><td>".$row['Age']."</td><td>".$row['Gender']."</td><td>".$row['PhoneNo']."</td><td>".$row['Email']."</td><td> <a href=\"delete.php?uid=$row[C_Id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td></tr>";
		}

	}
	else
		echo "<b><i>empty</i></b>";
  echo "</table>";
	?>
  <a href="adminpage.html"><button class="btn_1">Back</button></a>
  </center>





   <!-- main-content closing -->


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
