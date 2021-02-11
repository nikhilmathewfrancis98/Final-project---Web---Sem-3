<?php
$conn = mysqli_connect("localhost", "root", "", "projects3") or die("Could not connect database");
if($_POST['type']==""){

  $sql = "select * from dish";

  $query = mysqli_query($conn,$sql) or die ("Query Unsuccessful");

  $str =" ";

  while($row = mysqli_fetch_assoc($query)){
  $str .= "<option value='{$row['D_Id']}'>{$row['D_name']}</option>";

  }

}elseif ($_POST['type']=="offerinfo") {

  $sql = "select * from offers where D_Id = {$_POST['id']}";

  $query = mysqli_query($conn,$sql) or die ("Query Unsuccessful");

  $str =" ";

  while($row = mysqli_fetch_assoc($query)){
  $str .= "<option value='{$row['Offer_Id']}'>{$row['Offer_Name']}</option>";

  }

}


 echo $str;

?>
