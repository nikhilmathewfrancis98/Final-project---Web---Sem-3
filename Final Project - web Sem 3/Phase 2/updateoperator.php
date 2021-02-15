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
  <link rel="stylesheet" type="text/css" href="adminpage.css">
  <link rel="stylesheet" type="text/css" href="style.php">
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
  <!--PHP session-->
<?php
   include_once("config.php");

    if(isset($_POST['update']))
    {
      $Oid = $_POST['oid'];
      $name = $_POST['name'];
      $url = $_POST['url'];
      $sql="UPDATE `dish` SET `D_Name`='$name',`D_Details`='$url' WHERE D_Id=$Oid";
      $query = mysqli_query($mysqli,$sql);
      ?>
          <script>
          window.confirm('updated')
            window.location = "viewoperator.php";
        </script>
        <?php
      if (isset($_FILES['image']))
      {
        $img=$_FILES['image'];

      $filename=$img['name'];
      $fileerror=$img['error'];
      $filetmp=$img['tmp_name'];

      $fileext=explode('.', $filename);
      $filecheck=strtolower(end($fileext));

      $fileextstored = array('jpg','png','jpeg');
      if (in_array($filecheck, $fileextstored))
       {
        $filedestination='storage/'.$filename;
        move_uploaded_file($filetmp, $filedestination);


        $sql="UPDATE `dish` SET `D_Name`='$name',`D_Details`='$url',`D_Image`='$filedestination' WHERE D_Id=$Oid";
        $query = mysqli_query($mysqli,$sql);
        ?>
          <script>
          window.confirm('updated')
            window.location = "viewoperator.php";
        </script>
        <?php
       }
      }

    }

    if(isset($_POST['Back']))
    {
      header("location:viewoperator.php");
    }

?>

<?php
include_once('config.php');
     $Oid = $_REQUEST['oid'];

            $sql="select D_Name,D_Details,D_Image from dish where D_Id=$Oid";
            $query=mysqli_query($mysqli,$sql);

while($row = mysqli_fetch_array($query))
{
    $name = $row["D_Name"];
    $details = $row['D_Details'];
    $img = $row['D_Image'];

}
?>
<html>
<head>
    <title>Edit Data</title>
    <link rel="stylesheet" type="text/css" href="adminpage.css">
<link rel="stylesheet" type="text/css" href="style.php"/>
</head>
<body>
    <form action="updateoperator.php" method="post" enctype="multipart/form-data">
  <div><input type="text" name="name" placeholder="Operator Name" value="<?php echo $name; ?>" required/></div><br>
  <div><input type="url" name="url" placeholder="Website"  value="<?php echo $details; ?>" required/></div><br>
    <div class="file-field">
    <div class="btn-logo">
      <span>Do you want to Change logo?</span>
      <input type="file" class="file" name="image" value="<?php echo $img; ?>">
    </div>
  </div><br>
  <input type="hidden" name="oid" value="<?php echo $Oid; ?>">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <button class="btn_1" name="update">Update</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="adminpage.html"><button class="btn_1" name="Back">Back</button></a>

</form>
</body>
</html>
