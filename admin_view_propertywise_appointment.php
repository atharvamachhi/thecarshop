<?php
session_Start();
include("admin_header.php");
include("connect.php");






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
									<h3>APPOINTMENT DETAIL</h3>
									<div class="done">
			
		</div>	
		<?php
									$pid=$_REQUEST['pid'];
										$qur1=mysqli_query($con,"select * from booking_appointment where property_id='$pid'");
										if(mysqli_num_rows($qur1)>0)
										{
											echo "<table width='100%' border='1'>
												<tr>
													<th>BOOKING ID</th>
													<th>BOOKING DATE</th>
													<th>APPOINTMENT DATE</th>
													<th>APPOINTMENT TIME</th>
													<th>PROPERTY TYPE</th>
													<th>PROPERTY IMAGE</th>
													<th>CUSTOMER NAME</th>
													<th>MOBILE NO</th>
													
												</tr>";
											while($q1=mysqli_fetch_array($qur1))
											{
												echo "<tr>";
												echo "<td>$q1[0]</td>";
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