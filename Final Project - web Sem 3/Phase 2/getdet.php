<?php
$conn = mysqli_connect("localhost", "root", "", "projects3") or die("Could not connect database");
if($_POST['type']=="offerprice"){

  $sql = "select * from offers where Offer_Id = {$_POST['id']}";

  $query = mysqli_query($conn,$sql) or die ("Query Unsuccessful");

  $str ="";

  $row = mysqli_fetch_assoc($query);
  $str .= "<input type="text" id="dtl" value="{$row['OfferDetails']}" style="color: aliceblue;">
  </input>";



}
echo $str;
?>
