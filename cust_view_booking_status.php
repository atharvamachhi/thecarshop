<?php
session_Start();
include("cust_header.php");
include("connect.php");


?>
<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">BOOOKING STATUS DETAIL</h2>
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
			$cid=$_SESSION['cid'];
										$qur1=mysqli_query($con,"select * from booking_appointment where customer_id='$cid' order by booking_id desc");
										if(mysqli_num_rows($qur1)>0)
										{
											echo "<table width='100%' border='1'>
												<tr>
													<th>BOOKING DATE</th>
													<th>APPOINTMENT DATE</th>
													<th>APPOINTMENT TIME</th>
													<th>PROPERTY TYPE</th>
													<th>PROPERTY IMAGE</th>
													<th>SELL / RENT</th>
													<th>STATUS</th>
													
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
												if($q2[9]=="1")
												{
													echo "<td>Rent</td>";
												}else{
													echo "<td>Sell</td>";
												}
												if($q1[6]=="0")
												{
													echo "<td>Wait For Confirmation</td>";
												}
												else if($q1[6]=="1"){
													echo "<td>Confirm</td>";
												}else{
													echo "<td>Not Confirm</td>";
												}
												echo "</tr>";
											}
											echo "</table>";
										}else{
											echo "No Category Found";
											
					
										}
									
									?>
									<div class="contact-form">
											
		
										 
										
									</div>
								</div>
								<div class="col-md-6">
									<br/><br/><br/>
									
								</div>
							</div>
	</div>
 
	</section>
<?php
include("footer.php");
?>