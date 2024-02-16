<?php
session_Start();
include("admin_header.php");
include("connect.php");
$pid=$_REQUEST['pid'];
$res=mysqli_query($con,"select max(img_id) from property_img");
$iid=0;
while($r=mysqli_fetch_array($res))
{
	$iid=$r[0];
}
$iid++;
?>
<script type='text/javascript'>
	function validate()
	{
		var filename=document.getElementById('txtimg').value;
		var extension=filename.substr(filename.lastIndexOf('.')+1).toLowerCase().trim();
		if(document.getElementById('txtimg').value=="")
		{
			alert("Please Select Property Image");
			return false;
		}else{
			if(!((extension=="jpg") || (extension=="jpeg") || (extension=="png")))
			{
			
				//alert(extension);
				alert("Please Select Property Image in Format like png,jpeg,or jpg ");
				return false;
			}
		}
	}
</script>
<?php

if(isset($_POST['btninsert']))
{
	$iid=$_POST['txtiid'];
	$tpath=$_FILES['txtimg']['tmp_name'];
	$mypath="img/P".$pid."_".$iid.".PNG";
	move_uploaded_file($tpath,$mypath);
	
	$query="insert into property_img values('$iid','$pid','$mypath')";
	if(mysqli_query($con,$query))
	{
		
		echo "<script type='text/javascript'>";
		echo "alert('Property Image Inserted');";
		echo "window.location.href='admin_manage_property_img.php?pid=$pid';";
		echo "</script>";
	}
}



if(isset($_REQUEST['did']))
{
	$iid=$_REQUEST['did'];
	$query="delete from property_img where img_id='$iid'";
	if(mysqli_query($con,$query))
	{
		
		echo "<script type='text/javascript'>";
		echo "alert('Property Image Deleted');";
		echo "window.location.href='admin_manage_property_img.php?pid=$pid';";
		echo "</script>";
	}
}
?>
<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">PROPERTY IMAGE</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	
	<div class="container">
	<div class="row">
								<div class="col-md-6">
									<h3>PROPERTY IMAGE</h3>
									<div class="done">
			
		</div>
									<div class="contact-form">
											
		<form method="post" name="form1" class="contact" enctype="multipart/form-data">
						<img src="<?php echo $_REQUEST['img1']; ?>">
										</form>
										 
										
									</div>
								</div>
								<div class="col-md-6">
									<br/><br/><br/>
									<?php
										
										$qur1=mysqli_query($con,"select * from property_img where property_id='$pid'");
										if(mysqli_num_rows($qur1)>0)
										{
											echo "<table width='100%' border='1'>
												<tr>
													<th>IMAGE ID</th>
													<th>IMAGE</th>
													
													<th>VIEW</th>
												</tr>";
											while($q1=mysqli_fetch_array($qur1))
											{
												echo "<tr>";
												echo "<td>$q1[0]</td>";
												echo "<td><a href='$q1[2]' target='_blank'><img src='$q1[2]' style='width:100px; height:100px;'></a></td>";
												
												echo "<td><a href='admin_view_property_img.php?img1=$q1[2]&pid=$pid' >VIEW</a></td>";
												echo "</tr>";
											}
											echo "</table>";
										}else{
											echo "No Image Found";
											
					
										}
									
									?>
								</div>
							</div>
	</div>
 
	</section>
<?php
include("footer.php");
?>