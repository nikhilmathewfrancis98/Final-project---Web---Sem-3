<?php
include("config.php");
	$Uid = $_REQUEST['uid'];
	$Pid = $_REQUEST['pid'];
	$Oid = $_REQUEST['oid'];
	$Fid = $_REQUEST['fid'];
	$Rid = $_REQUEST['rid'];
	if ($Uid!='')
	{
		$result = mysqli_query($mysqli, "DELETE FROM `Customer` WHERE C_Id=$Uid");
	header("Location:viewusers.php");
	}
	if ($Pid!='')
	{	
	$result = mysqli_query($mysqli, "DELETE FROM `Offers` WHERE Offer_Id=$Pid");
	header("Location:viewplan.php");
	}
	if ($Oid!='')
	{	
	$result = mysqli_query($mysqli, "DELETE FROM `Dish` WHERE D_Id=$Oid");
	header("Location:viewoperator.php");
	}
	if ($Fid!='')
	{	
	$result = mysqli_query($mysqli, "DELETE FROM `Feedback` WHERE F_Id=$Fid");
	header("Location:feedbacks.php");
	}
	if ($Rid!='')
	{	
	$result = mysqli_query($mysqli, "DELETE FROM `Recharge` WHERE R_Id=$Rid");
	header("Location:rechargedetails.php");
	}
	
?>
