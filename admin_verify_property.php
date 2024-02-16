<?php
session_Start();
include("admin_header.php");
include("connect.php");


if(isset($_REQUEST['vid']))
{
	$pid=$_REQUEST['vid'];
	
	$query="update property_master set status='1' where property_id='$pid'";
	
	if(mysqli_query($con,$query))
	{
		
		echo "<script type='text/javascript'>";
		echo "alert('Property Verified');";
		echo "window.location.href='admin_verify_property.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['nvid']))
{
	$pid=$_REQUEST['nvid'];
	
	$query="update property_master set status='2' where property_id='$pid'";
	
	if(mysqli_query($con,$query))
	{
		
		echo "<script type='text/javascript'>";
		echo "alert('Property Not Verified');";
		echo "window.location.href='admin_verify_property.php';";
		echo "</script>";
	}
}



?>
<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">VERIFY SELLER UPLOAD PROPERTY</h2>
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
			
		</div>	<?php
										$qur1=mysqli_query($con,"select * from property_master where customer_id!='0' and status='0'");
										if(mysqli_num_rows($qur1)>0)
										{
											echo "<table width='100%' border='1'>
												<tr>
													<th>PROPERTY ID</th>
													<th>CATEGORY</th>
													<th>PROPERTY TYPE</th>
													<th>ADDRESS</th>
													<th>CITY</th>
													<th width='150px'>DESCRIPTION</th>
													
													<th>PRICE</th>
													<th>AREA</th>
													<th>TYPE</th>
													<th>IMAGE</th>
													<th>VERIFY</th>
													<th>NOT VERIFY</th>
													<th>IMAGES</th>
												</tr>";
											while($q1=mysqli_fetch_array($qur1))
											{
												echo "<tr>";
												echo "<td>$q1[0]</td>";
												//echo "<td>$q1[1]</td>";
												$qur2=mysqli_query($con,"select * from category_master where category_id='$q1[1]'");
												$q2=mysqli_fetch_array($qur2);
												echo "<td>$q2[1]</td>";
												echo "<td>$q1[2]</td>";
												echo "<td>$q1[3]</td>";
												echo "<td>$q1[4]</td>";
												echo "<td>$q1[5]</td>";
												echo "<td>$q1[6]</td>";
												echo "<td>$q1[8]</td>";
												if($q1[9]=="1")
												{
													echo "<td>Rent</td>";
												}else{
													echo "<td>Sell</td>";
												}
												echo "<td><a href='$q1[7]' target='_blank'><img src='$q1[7]' style='width:100px; height:100px' ></a></td>";
												echo "<td><a href='admin_verify_property.php?vid=$q1[0]'>VERIFY</a></td>";
												
												echo "<td><a href='admin_verify_property.php?nvid=$q1[0]'>NOT VERIFY</a></td>";
												echo "<td><a href='admin_view_property_img.php?pid=$q1[0]'>VIEW MORE IMAGES</a></td>";
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