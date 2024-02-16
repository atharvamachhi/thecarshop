<?php
session_Start();
include("admin_header.php");
include("connect.php");


if(isset($_POST['btnreport']))
{
	$catid=$_POST['selcat'];
	$tid=$_POST['seltype'];
}



?>
<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">CATEGORY WISE PROPERTY DETAIL REPORT</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	
	<div class="container">
	<div class="row">
		<div class="col-md-6">
											
		<form method="post" name="form1" class="contact" enctype="multipart/form-data">
							
											
							<div class="form-group has-feedback">
												<label for="name">Select Category</label>
												<select class="form-control" name="selcat">
													<option value="0">--Select Category--</option>
													<?php
														$qur2=mysqli_query($con,"select * from category_master");
														while($q2=mysqli_fetch_array($qur2))
														{
															?>
																<option value="<?php echo $q2[0]; ?> <?php if($catid==$q2[0]){ echo "selected='selected'"; } ?>"><?php echo $q2[1]; ?></option>
															<?php
														}
														
													?>
												</select>
												
											</div>
											<div class="form-group has-feedback">
												<label for="name">Select Type</label>
												<select class="form-control" name="seltype">
													<option value="0">--Select Type--</option>
													<option value=" <?php if($type=="1"){ echo "selected='selected'"; } ?>">Rent</option>
													<option value=" <?php if($type=="2"){ echo "selected='selected'"; } ?>">Sell</option>
												</select>
												
											</div>
										<input type="submit" value="VIEW REPORT" class="submit btn btn-default" name="btnreport" >	
											
										</form>
										</div>
								<div class="col-md-12">
									<h3>PROPERTY DETAIL</h3>
									<div class="done">
									
									</div>	
									
									<?php	
										if(isset($_POST['btnreport']))
										{
									
										$qur1=mysqli_query($con,"select * from property_master where category_id='$catid' and type='$tid'");
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
													
													
													<th>VIEW APPOINTMENT</th>
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
												
												
												echo "<td><a href='admin_view_propertywise_appointment.php?pid=$q1[0]'>VIEW APPOINTMENT</a></td>";
												echo "</tr>";
											}
											echo "</table>";
										}else{
											echo "No Property Found";
											
					
										}
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