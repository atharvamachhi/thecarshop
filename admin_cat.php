<?php
session_Start();
include("admin_header.php");
include("connect.php");

$res=mysqli_query($con,"select max(category_id) from category_master");
$cid=0;
while($r=mysqli_fetch_array($res))
{
	$cid=$r[0];
}
$cid++;
?>
<script type='text/javascript'>
	function validate()
	{
		var v=/^[a-zA-Z ]+$/;
		if(form1.txtcat.value=="")
		{
			alert("Please Enter Category");
			form1.txtcat.focus();
			return false;
		}
		else{
			if(!v.test(form1.txtcat.value))
			{
				alert("Please Enter Only Characters in Category");
				form1.txtcat.focus();
				return false;
			}
		}
	}
</script>
<?php

if(isset($_POST['btninsert']))
{
	$cid=$_POST['txtcid'];
	$cat=$_POST['txtcat'];
	
	$query="insert into category_master values('$cid','$cat')";
	if(mysqli_query($con,$query))
	{
		
		echo "<script type='text/javascript'>";
		echo "alert('Category Inserted');";
		echo "window.location.href='admin_cat.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['eid']))
{
	$cid=$_REQUEST['eid'];
	$res2=mysqli_query($con,"select * from category_master where category_id='$cid'");
	$r2=mysqli_fetch_array($res2);
	$cat=$r2[1];
}

if(isset($_POST['btnedit']))
{
	$cid=$_POST['txtcid'];
	$cat=$_POST['txtcat'];
	
	$query="update category_master set category='$cat' where category_id='$cid'";
	if(mysqli_query($con,$query))
	{
		
		echo "<script type='text/javascript'>";
		echo "alert('Category Updated');";
		echo "window.location.href='admin_cat.php';";
		echo "</script>";
	}
}


if(isset($_REQUEST['did']))
{
	$cid=$_REQUEST['did'];
	$query="delete from category_master where category_id='$cid'";
	if(mysqli_query($con,$query))
	{
		
		echo "<script type='text/javascript'>";
		echo "alert('Category Deleted');";
		echo "window.location.href='admin_cat.php';";
		echo "</script>";
	}
	
}
?>
<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">CATEGORY DETAIL</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	
	<div class="container">
	<div class="row">
								<div class="col-md-6">
									<h3>CATEGORY</h3>
									<div class="done">
			
		</div>
									<div class="contact-form">
											
		<form method="post" name="form1" class="contact">
							<div class="form-group has-feedback">
								<label for="email">Category Id</label>
								<input type="text" class="form-control" name="txtcid"  value="<?php echo $cid; ?>" placeholder="" readonly="readonly">
							</div>
											
							<div class="form-group has-feedback">
												<label for="name">Category</label>
												<input type="text" class="form-control" name="txtcat" value="<?php if(isset($cat)) echo $cat; ?>" placeholder="">
												
											</div>
											
 
											<?php
												if(isset($_REQUEST['eid']))
												{
											?>
													<input type="submit" value="EDIT" class="submit btn btn-default" name="btnedit" onclick="return validate();">
											<?php
												}else{
											?>
													<input type="submit" value="INSERT" class="submit btn btn-default" name="btninsert" onclick="return validate();">
											<?php
												}
											?>
										</form>
										 
										
									</div>
								</div>
								<div class="col-md-6">
									<br/><br/><br/>
									<?php
										$qur1=mysqli_query($con,"select * from category_master");
										if(mysqli_num_rows($qur1)>0)
										{
											echo "<table width='100%' border='1'>
												<tr>
													<th>CATEGORY ID</th>
													<th>CATEGORY</th>
													<th>EDIT</th>
													<th>DELETE</th>
												</tr>";
											while($q1=mysqli_fetch_array($qur1))
											{
												echo "<tr>";
												echo "<td>$q1[0]</td>";
												echo "<td>$q1[1]</td>";
												echo "<td><a href='admin_cat.php?eid=$q1[0]'>EDIT</a></td>";
												echo "<td>"; ?><a href="admin_cat.php?did=<?php echo $q1[0]; ?>" onClick="return confirm('Are You Sure You Want To Delete?');">DELETE</a><?php echo "</td>";
												echo "</tr>";
											}
											echo "</table>";
										}else{
											echo "No Category Found";
											
					
										}
									
									?>
								</div>
							</div>
	</div>
 
	</section>
<?php
include("footer.php");
?>