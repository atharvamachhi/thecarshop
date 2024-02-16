<?php
session_start();
include("cust_header.php");
include("connect.php");

$pid=$_REQUEST['pid'];
$res1=mysql_query("select * from property_master where property_id='$pid'");
$r1=mysql_fetch_array($res1);
$ptype=$r1[2];
$cid=$r1[1];
$add=$r1[3];
$city=$r1[4];
$desc=$r1[5];
$price=$r1[6];
$img1=$r1[7];
$area=$r1[8];

?>

<script type='text/javascript'>
	function validate()
	{
		var TodayDate = new Date(),
		month = '' + (TodayDate.getMonth() + 1),
		day = '' + TodayDate.getDate(),
		year = '' + TodayDate.getFullYear();
	if(month<10)
	{
		month='0'+month;
	}
	if(day<10)
	{
		day='0'+day;
	}
	var cdate = year + "-" + month +"-"+day;
	//alert(cdate);
	
	if(cdate>=form1.txtadate.value)
	{
		alert("Please Select Future Date in Appointment Date");
		form1.txtadate.focus();
		return false;
		
	}
	}
</script>
<?php

if(isset($_POST['btnbook']))
{
	$pid=$_REQUEST['pid'];
	$custid=$_SESSION['cid'];
	$adate=date("Y-m-d",strtotime($_POST['txtadate']));
	$atime=$_POST['seltime'];
	$bdate=date("Y-m-d");
	
	$res1=mysql_query("select max(booking_id) from booking_appointment");
		$bid=0;
		while($r1=mysql_fetch_array($res1))
		{
			$bid=$r1[0];
		}
		$bid++;
	$query1="insert into booking_appointment values('$bid','$bdate','$adate','$atime','$pid','$custid','0')";
		if(mysql_query($query1))
		{
			echo "<script type='text/javascript'>";
			echo "alert('Appointment Booked Succesfully');";
			echo "window.location.href='cust_view_property_detail.php?pid=$pid';";
			echo "</script>";
		}
}

?>
<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">PROPERTY DETAIL</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	
	<div class="container">
	<div class="row">
								<div class="col-md-6">
									<h3></h3>
									<div class="done">
			
		</div>
									<div class="contact-form">
											
		<form method="post" name="form1" class="contact">
											<div class="form-group has-feedback">
												<label for="email"><font size="4">Property Type: <?php echo $ptype; ?></font></label>
												
												
											</div>
											
											<div class="col-md-6">
											<div class="form-group has-feedback">
													<label for="email"><font size="4">Address: <?php echo $add; ?></font></label>
												
												
											</div>
											</div>
											<div class="col-md-6">
												<div class="form-group has-feedback">
														<label for="email"><font size="4">City: <?php echo $city; ?></font></label>
												</div>
											</div>
											<div class="form-group has-feedback">
													<label for="email"><font size="4">Description: <?php echo $desc; ?></font></label>
											</div>
											<div class="col-md-6">
											<div class="form-group has-feedback">
													<label for="email"><font size="4">Price: <?php echo $price; ?></font></label>
												
												
											</div>
											</div>
											<div class="col-md-6">
												<div class="form-group has-feedback">
														<label for="email"><font size="4">Area: <?php echo $area; ?></font></label>
												</div>
											</div>
											
											<?php
											
												$cid=$_SESSION['cid'];
												$res3=mysql_query("select * from booking_appointment where property_id='$pid' and customer_id='$cid'");
												if((mysql_num_rows($res3)>0))
												{
													echo "<font size='4'>Your Appointment is Already Booked</font>";
												}else{
											?>
											
											<div class="form-group has-feedback">
												<label for="email">Appointment Date</label>
												<input type="date" class="form-control" name="txtadate" value="<?php echo date("Y-m-d"); ?>">
											</div>
											<div class="form-group has-feedback">
												<label for="name">Appointment Time: </label>
												<select name="seltime" class="form-control">
													<option value="09:00">09:00</option>
													<option value="09:30">09:30</option>
													<option value="10:00">10:00</option>
													<option value="10:30">10:30</option>
													<option value="11:00">11:00</option>
													<option value="11:30">11:30</option>
													<option value="12:00">12:00</option>
													<option value="12:30">12:30</option>
													<option value="13:00">13:00</option>
													<option value="13:30">13:30</option>
													<option value="14:00">14:00</option>
													<option value="14:30">14:30</option>
													<option value="15:00">15:00</option>
													<option value="15:30">15:30</option>
													<option value="16:00">16:00</option>
													<option value="16:30">16:30</option>
													<option value="17:00">17:00</option>
													<option value="17:30">17:30</option>
													<option value="18:00">18:00</option>
													<option value="18:30">18:30</option>
													<option value="19:00">19:00</option>
													<option value="19:30">19:30</option>
												</select>
											</div>
											
											<input type="submit" value="BOOK APPOINTMENT" class="submit btn btn-default" onclick="return validate();" name="btnbook">
											<?php
												}
											?>
										</form>
										 
										
									</div>
								</div>
								<div class="col-md-6">
									<?php
										if(isset($_REQUEST['img2']))
										{
											$img2=$_REQUEST['img2'];
									?>
									
									<img src="<?php echo $img2; ?>" style="width:300px; height:300px;">
									
									<?php
										}
										else{
										
										
										?>
										<img src="<?php echo $img1; ?>" style="width:300px; height:300px;">
								<?php
										
										}
										$res2=mysql_query("select * from property_img where property_id='$pid'");
										
										if(mysql_num_rows($res2)>0)
										{
											echo "<br/><table border='1' padding='20px'>";
											echo "<tr>";
											while($r2=mysql_fetch_array($res2))
											{
												echo "<td><a href='cust_view_property_detail.php?pid=$pid&img2=$r2[2]'><img src='$r2[2]' style='width:120px; height:120px;'></a></td>";
												
											}
												echo "<td><a href='cust_view_property_detail.php?pid=$pid&img2=$img1'><img src='$img1' style='width:120px; height:120px;'></a></td>";
											echo "</tr>";
											echo "</table>";
										}
										
									
									?>
								</div>
							</div>
	</div>
 
	</section>
<?php
include("footer.php");
?>