<?php
session_Start();
include("admin_header.php");
include("connect.php");

$res=mysqli_query($con,"select max(property_id) from property_master");
$pid=0;
while($r=mysqli_fetch_array($res))
{
	$pid=$r[0];
}
$pid++;
?>
<script type='text/javascript'>
	function validate()
	{
		if(form1.selcat.value=="0")
		{
			alert("Please Select Category");
			form1.selcat.focus();
			return false;
		}
		
		var v=/^[a-zA-Z ]+$/;
		if(form1.txtptype.value=="")
		{
			alert("Please Enter Car Type");
			form1.txtptype.focus();
			return false;
		}
		else{
			if(!v.test(form1.txtptype.value))
			{
				alert("Please Enter Only Characters in Car Type");
				form1.txtptype.focus();
				return false;
			}
		}
		
		if(form1.txtadd.value==""){
			alert("Please Enter Car Owner Address");
			form1.txtadd.focus();
			return false;
		}	
		
		if(form1.txtdesc.value==""){
			alert("Please Enter Car Description");
			form1.txtdesc.focus();
			return false;
		}	
		
		
		if(form1.txtcity.value=="")
		{
			alert("Please Enter Car City");
			form1.txtcity.focus();
			return false;
		}
		else{
			if(!v.test(form1.txtcity.value))
			{
				alert("Please Enter Only Characters in Car City");
				form1.txtcity.focus();
				return false;
			}
		}
		
		var c=form1.txtprice.value;
		if(form1.txtprice.value=="")
		{
			alert('Please Enter Car Price');
			form1.txtprice.focus();
			return false;
		}else{
			for(i=0;i<c.length;i++)
			{
				if(isNaN(c.charAt(i)))
				{
					alert('Dont Used Character or Special Symbols in Car Price');
					return false;
					break;
				}
			}
		}
		
		
		
		if(form1.txtarea.value=="")
		{
			alert("Please Enter Car Area");
			form1.txtarea.focus();
			return false;
		}
		
		if(form1.seltype.value=="0")
		{
			alert("Please Select Type");
			form1.seltype.focus();
			return false;
		}
		
		var filename=document.getElementById('txtimg').value;
		var extension=filename.substr(filename.lastIndexOf('.')+1).toLowerCase().trim();
		if(document.getElementById('txtimg').value=="")
		{
			alert("Please Select Car Image");
			return false;
		}else{
			if(!((extension=="jpg") || (extension=="jpeg") || (extension=="png")))
			{
			
				//alert(extension);
				alert("Please Select Car Image in Format like png,jpeg,or jpg ");
				return false;
			}
		}
	}
	
	function validate1()
	{
		/*if(form1.selcat.value=="0")
		{
			alert("Please Select Category");
			form1.selcat.focus();
			return false;
		}*/
		
		var v=/^[a-zA-Z ]+$/;
		if(form1.txtptype.value=="")
		{
			alert("Please Enter Car Type");
			form1.txtptype.focus();
			return false;
		}
		else{
			if(!v.test(form1.txtptype.value))
			{
				alert("Please Enter Only Characters in Car Type");
				form1.txtptype.focus();
				return false;
			}
		}
		
		if(form1.txtadd.value==""){
			alert("Please Enter Car Address");
			form1.txtadd.focus();
			return false;
		}	
		
		if(form1.txtdesc.value==""){
			alert("Please Enter Car Description");
			form1.txtdesc.focus();
			return false;
		}	
		
		
		if(form1.txtcity.value=="")
		{
			alert("Please Enter Car City");
			form1.txtcity.focus();
			return false;
		}
		else{
			if(!v.test(form1.txtcity.value))
			{
				alert("Please Enter Only Characters in Car City");
				form1.txtcity.focus();
				return false;
			}
		}
		
		var c=form1.txtprice.value;
		if(form1.txtprice.value=="")
		{
			alert('Please Enter Car Price');
			form1.txtprice.focus();
			return false;
		}else{
			for(i=0;i<c.length;i++)
			{
				if(isNaN(c.charAt(i)))
				{
					alert('Dont Used Character or Special Symbols in Car Price');
					return false;
					break;
				}
			}
		}
		
		
		
		if(form1.txtarea.value=="")
		{
			alert("Please Enter Car Area");
			form1.txtarea.focus();
			return false;
		}
		
		/*if(form1.seltype.value=="0")
		{
			alert("Please Select Type");
			form1.seltype.focus();
			return false;
		}*/
		
		var filename=document.getElementById('txtimg').value;
		var extension=filename.substr(filename.lastIndexOf('.')+1).toLowerCase().trim();
		if(document.getElementById('txtimg').value!="")
		{
			
			if(!((extension=="jpg") || (extension=="jpeg") || (extension=="png")))
			{
			
				//alert(extension);
				alert("Please Select Property Car in Format like png,jpeg,or jpg ");
				return false;
			}
		}
	}
</script>
<?php

if(isset($_POST['btninsert']))
{
	$pid=$_POST['txtpid'];
	$catid=$_POST['selcat'];
	$ptype=$_POST['txtptype'];
	$add=$_POST['txtadd'];
	$desc=$_POST['txtdesc'];
	$city=$_POST['txtcity'];
	$price=$_POST['txtprice'];
	$area=$_POST['txtarea'];
	$stype=$_POST['seltype'];

	$tpath=$_FILES['txtimg']['tmp_name'];
	$mypath="img/P".$pid."_".rand(100,999).".PNG";
	move_uploaded_file($tpath,$mypath);
	
	
	$query="insert into property_master values('$pid','$catid','$ptype','$add','$city','$desc','$price','$mypath','$area','$stype','1','0')";
	if(mysqli_query($con,$query))
	{
		
		echo "<script type='text/javascript'>";
		echo "alert('Property Inserted');";
		echo "window.location.href='admin_manage_property_img.php?pid=$pid';";
		echo "</script>";
	}
}

if(isset($_REQUEST['eid']))
{
	$pid=$_REQUEST['eid'];
	$res2=mysqli_query($con,"select * from property_master where property_id='$pid'");
	$r2=mysqli_fetch_array($res2);
	$catid=$r2[1];
	$ptype=$r2[2];
	$add=$r2[3];
	$city=$r2[4];
	$desc=$r2[5];
	$price=$r2[6];
	$img1=$r2[7];
	$area=$r2[8];
	$type=$r2[9];
	
}

if(isset($_POST['btnedit']))
{
	$pid=$_POST['txtpid'];
	$catid=$_POST['selcat'];
	$ptype=$_POST['txtptype'];
	$add=$_POST['txtadd'];
	$desc=$_POST['txtdesc'];
	$city=$_POST['txtcity'];
	$price=$_POST['txtprice'];
	$area=$_POST['txtarea'];
	$stype=$_POST['seltype'];
	
	$tpath=$_FILES['txtimg']['tmp_name'];
	$mypath="img/P".$pid."_".rand(100,999).".PNG";
	move_uploaded_file($tpath,$mypath);
	
	$query="update property_master set category_id='$catid',property_type='$ptype',address='$add',city='$city',description='$desc',property_price='$price',property_img='$mypath',property_area='$area',type='$stype' where property_id='$pid'";
	echo "<script type='text/javascript'>";
	echo "alert('Property Updated');";
	echo "window.location.href='admin_manage_property_img.php?pid=$pid';";
	echo "</script>";
	
}


if(isset($_REQUEST['did']))
{
	$pid=$_REQUEST['did'];
	$query="delete from property_master where property_id='$pid'";
	if(mysqli_query($con,$query))
	{
		$qur2=mysqli_query($con,"select * from property_img where property_id='$pid'");
		if(mysqli_num_rows($qur2)>0)
		{
			$query1="delete from property_img where property_id='$pid'";
			mysqli_query($con,$query1);
		}
		echo "<script type='text/javascript'>";
		echo "alert('Property Deleted');";
		echo "window.location.href='admin_manage_property.php';";
		echo "</script>";
	}
}
?>
<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">MANAGE PROPERTY</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	
	<div class="container">
	<div class="row">
								<div class="col-md-6">
									<h3>PROPERTY DETAIL</h3>
									<div class="done">
			
		</div>
									<div class="contact-form">
											
		<form method="post" name="form1" class="contact" enctype="multipart/form-data">
							<div class="form-group has-feedback">
								<label for="email">Car Id</label>
								<input type="text" class="form-control" name="txtpid"  value="<?php echo $pid; ?>" placeholder="" readonly="readonly">
							</div>
											
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
					<label for="email">Car Type</label>
					<input type="text" class="form-control" name="txtptype" value="<?php if(isset($ptype)) echo $ptype; ?>" placeholder="">
				</div>	
				<div class="form-group has-feedback">
					<label for="message">Address</label>
					<textarea class="form-control" rows="3" name="txtadd" placeholder=""><?php if(isset($add)) echo $add; ?></textarea>
					
				</div>
			
					<div class="form-group has-feedback">
					<label for="message">Description</label>
					<textarea class="form-control" rows="3" name="txtdesc" placeholder=""><?php if(isset($desc)) echo $desc; ?></textarea>
					
				</div>
			
										
									</div>
								</div>
								<div class="col-md-6">
									<h3><br/></h3>
									<div class="done">
			
		</div>
			<div class="form-group has-feedback">
					<label for="email">City</label>
					<input type="text" class="form-control" name="txtcity" placeholder="" value="<?php if(isset($city)) echo $city; ?>">
				</div>	
										<div class="form-group has-feedback">
					<label for="email">Price</label>
					<input type="text" class="form-control" name="txtprice" placeholder="" value="<?php if(isset($price)) echo $price; ?>">
				</div>	
				<div class="form-group has-feedback">
					<label for="email">Area</label>
					<input type="text" class="form-control" name="txtarea" placeholder="" value="<?php if(isset($area)) echo $area; ?>">
				</div>	
				
				<div class="form-group has-feedback">
												<label for="name">Select Type</label>
												<select class="form-control" name="seltype">
													<option value="0">--Select Type--</option>
													<option value=" <?php if($type=="1"){ echo "selected='selected'"; } ?>">Rent</option>
													<option value=" <?php if($type=="2"){ echo "selected='selected'"; } ?>">Sell</option>
												</select>
												
											</div>
				<div class="form-group has-feedback">
					<label for="email">Car Image</label>
					<input type="file" name="txtimg" id="txtimg" placeholder="">
				</div>	
											<?php
												if(isset($_REQUEST['eid']))
												{
													if(isset($img1))
													{
														echo "<img src='$img1' style='width:150px; height:150px;'><br/>";
													}
											?>
													<input type="submit" value="UPDATE" class="submit btn btn-default" name="btnedit" onclick="return validate1();">
											<?php
												}else{
											?>
													<input type="submit" value="INSERT" class="submit btn btn-default" name="btninsert" onclick="return validate();">
											<?php
												}
											?>
										</form>
										 
								
								</div>
									<?php
										$qur1=mysqli_query($con,"select * from property_master where customer_id='0'");
										if(mysqli_num_rows($qur1)>0)
										{
											echo "<table width='100%' border='1'>
												<tr>
													<th>CAR ID</th>
													<th>CATEGORY</th>
													<th>CAR TYPE</th>
													<th>ADDRESS</th>
													<th>CITY</th>
													<th width='150px'>DESCRIPTION</th>
													
													<th>PRICE</th>
													<th>AREA</th>
													<th>TYPE</th>
													<th>IMAGE</th>
													<th>EDIT</th>
													<th>DELETE</th>
													<th>EDIT IMAGES</th>
												</tr>";
											while($q1=mysqli_fetch_array($qur1))
											{
												echo "<tr>";
												echo "<td>$q1[0]</td>";
												//echo "<td>$q1[1]</td>";
												$qur2=mysqli_query($con,"select * from category_master where category_id='$q1[0]'");
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
												echo "<td><a href='admin_manage_property.php?eid=$q1[0]'>EDIT</a></td>";
												
												
												echo "<td>"; ?><a href="admin_manage_property.php?did=<?php echo $q1[0]; ?>" onClick="return confirm('Are You Sure You Want To Delete?');">DELETE</a><?php echo "</td>";
												echo "<td><a href='admin_manage_property_img.php?pid=$q1[0]'>VIEW MORE IMAGES</a></td>";
												echo "</tr>";
											}
											echo "</table>";
										}else{
											echo "No Property Found";
											
					
										}
									
									?>
							</div>
	</div>
 
	</section>
<?php
include("footer.php");
?>