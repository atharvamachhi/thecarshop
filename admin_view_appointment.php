<?php
session_Start();
include("admin_header.php");
include("connect.php");


if(isset($_REQUEST['cid']))
{
	$aid=$_REQUEST['cid'];
	
	$query="update booking_appointment set status='1' where booking_id='$aid'";
	
	if(mysqli_query($con,$query))
	{
		
		echo "<script type='text/javascript'>";
		echo "alert('Booking Confirmed');";
		echo "window.location.href='admin_view_appointment.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['ncid']))
{
	$aid=$_REQUEST['ncid'];
	
	$query="update booking_appointment set status='2' where booking_id='$aid'";
	
	if(mysqli_query($con,$query))
	{
		
		echo "<script type='text/javascript'>";
		echo "alert('Booking Not Confirmed');";
		echo "window.location.href='admin_view_appointment.php';";
		echo "</script>";
	}
}




?>
<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">APPOINTMENT DETAIL</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	
	<div class="container">
	<div class="row">
								<div class="col-md-12">
									<h3>PROPERTY DETAIL</h3>
									<div class="done">
			
		</div>	
		<?php
		
										$qur1=mysqli_query($con,"select * from booking_appointment where property_id in (select property_id from property_master where customer_id='0') and status='0'");
										if(mysqli_num_rows($qur1)>0)
										{
											echo "<table width='100%' border='1'>
												<tr>
													<th>BOOKING DATE</th>
													<th>APPOINTMENT DATE</th>
													<th>APPOINTMENT TIME</th>
													<th>PROPERTY TYPE</th>
													<th>PROPERTY IMAGE</th>
													<th>CUSTOMER NAME</th>
													<th>MOBILE NO</th>
													<th>CONFIRM</th>
													<th>NOT CONFIRM</th>
												</tr>";
											while($q1=mysqli_fetch_array($qur1))
											{
												echo "<tr>";
												
												echo "<td>$q1[1]</td>";
												echo "<td>$q1[2]</td>";
												echo "<td>$q1[3]</td>";
												$qur2=mysqli_query($con,"select * from property_master where property_id='$q1[4]'");
												$q2=mysqli_fetch_array($qur2);
												echo "<td>$q2[2]</td>";
												echo "<td><img src='$q2[7]' style='width:150px; height:150px;'></td>";
												$qur3=mysqli_query($con,"select * from registration where customer_id='$q1[5]'");
												$q3=mysqli_fetch_array($qur3);
												echo "<td>$q3[1]</td>";
												echo "<td>$q3[4]</td>";
												
												echo "<td><a href='admin_view_appointment.php?cid=$q1[0]'>CONFIRM</a></td>";
												
												echo "<td><a href='admin_view_appointment.php?ncid=$q1[0]'>NOT CONFIRM</a></td>";
												echo "</tr>";
											}
											echo "</table>";
										}else{
											echo "No Booking Appointment Found";
											
					
										}
									
									?>
									
								</div>
								<div class="col-md-6">
									<h3><br/></h3>
									<div class="done">
			
		</div>
		
										 
								
								</div>
								
							</div>
	</div>
 
	</section>
<?php
include("footer.php");
?>