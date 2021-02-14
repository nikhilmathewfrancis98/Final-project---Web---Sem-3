<?php
   include_once("config.php");
    
    if(isset($_POST['update']))
    {
      $Pid=$_POST['pid'];
      $name=$_POST['name'];
      $details=$_POST['details'];
      $price=$_POST['price'];
      
       $sql="UPDATE offers SET Offer_name='$name',Offer_details='$details',price='$price' WHERE Offer_Id=$Pid";
       $query = mysqli_query($mysqli,$sql);
        header("Location: viewplan.php ");
         
    }

    if(isset($_POST['Back']))
    {
      header("location:viewplan.php");
    }
?>

<?php
include_once('config.php');
     $Pid = $_REQUEST['pid'];

            $sql="select Offer_name,Offer_details,price from offers where Offer_Id=$Pid";
            $query=mysqli_query($mysqli,$sql);

while($row = mysqli_fetch_array($query))
{
    $name = $row["Offer_name"];
    $details = $row['Offer_details'];
    $price = $row['price'];
}
?>
<html>
<head>
    <title>Edit Data</title>
    <link rel="stylesheet" type="text/css" href="adminpage.css">
<link rel="stylesheet" type="text/css" href="style.php"/>
</head>
<body>
    <form method="post" action="updateplan.php">
      <div><input type="hidden" name="pid" value="<?php echo $Pid; ?>" ></div><br>
  <div><input type="text" name="name" placeholder=" Plan name" value="<?php echo $name; ?>"required/></div>
  <br>
  <div><input type="text" name="details" placeholder=" Plan details" value="<?php echo $details; ?>"required/></div>
  <br>
  <div><input type="number" name="price" placeholder=" Price" value="<?php echo $price; ?>" required/></div>
  <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <button class="btn_1" name="update">Update</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="adminpage.html"><button class="btn_1" name="Back">Back</button></a>
</form>
</body>
</html>
