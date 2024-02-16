<?php
session_Start();
include("admin_header.php");
include("connect.php");





?>
<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">CUSTOMER DETAIL REPORT</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	
	<div class="container">
	<div class="row">
								<div class="col-md-12">
									<h3>CUSTOMER DETAIL</h3>
									<div class="done">
			
		</div>	<?php
										$qur1=mysqli_query($con,"select * from registration");
										if(mysqli_num_rows($qur1)>0)
										{
											echo "<table width='100%' border='1'>
												<tr>
													<th>CUSTOMER ID</th>
													<th>CUSTOMER NAME</th>
													<th>ADDRESS</th>
													<th>CITY</th>
													<th>MOBILE NO</th>
													<th>EMAIL ID</th>
													<th>VIEW APPOINTMENT</th>
												</tr>";
											while($q1=mysqli_fetch_array($qur1))
											{
												echo "<tr>";
												echo "<td>$q1[0]</td>";
												echo "<td>$q1[1]</td>";
												
												echo "<td>$q1[2]</td>";
												echo "<td>$q1[3]</td>";
												echo "<td>$q1[4]</td>";
												echo "<td>$q1[5]</td>";
											
												echo "<td><a href='admin_view_custwise_appointment_report.php?cid=$q1[0]'>VIEW APPOINTMENT</a></td>";
												echo "</tr>";
											}
											echo "</table>";
										}else{
											echo "No Property Found";
											
					
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