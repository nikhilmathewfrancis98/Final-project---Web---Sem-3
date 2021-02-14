<?php
$conn = mysqli_connect("localhost", "root", "", "projects3") or die("Could not connect database");
if($_POST['type']==""){

  $sql = "select * from dish";

  $query = mysqli_query($conn,$sql) or die ("Query Unsuccessful");

  $str =" ";

  while($row = mysqli_fetch_assoc($query)){
  $str .= "<option value='{$row['D_Id']}'>{$row['D_Name']}</option>";

  }

}elseif ($_POST['type']=="offerinfo") {

  $sql = "select * from offers where D_Id = {$_POST['id']}";

  $query = mysqli_query($conn,$sql) or die ("Query Unsuccessful");

  $str ="<option value disabled selected>Select offer</option>";

  while($row = mysqli_fetch_assoc($query)){
  $str .= "<option value='{$row['Offer_Id']}'>{$row['Offer_Name']}</option>";

  }

}elseif ($_POST['type']=="offerprice") {

  $sql = "select * from offers where Offer_Id = {$_POST['id']}";

  $query = mysqli_query($conn,$sql) or die ("Query Unsuccessful");

  while($row = mysqli_fetch_assoc($query)){
  $str .= "<option value='{$row['price']}' selected>{$row['price']}</option>";

  }


}elseif ($_POST['type']=="offerdet") {

  $sql = "select * from offers where Offer_Id = {$_POST['id']}";

  $query = mysqli_query($conn,$sql) or die ("Query Unsuccessful");

  while($row = mysqli_fetch_assoc($query)){
  $str .= "<option value='' selected>{$row['OfferDetails']}</option>";

  }


}



 echo $str;

?>
