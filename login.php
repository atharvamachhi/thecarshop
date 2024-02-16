<?php
session_Start();
include("header.php");
include("connect.php");

if(isset($_POST['btnlogin']))
{
	$email=$_POST['txtemail'];
	$pwd=$_POST['txtpwd'];
	$res=mysqli_query($con,"select * from admin where email='$email' and pwd='$pwd'");
	if(mysqli_num_rows($res)>0)
	{
		echo "<script type='text/javascript'>";
		echo "alert('Admin Login Successfull');";
		echo "window.location.href='admin_cat.php';";
		echo "</script>";
	}else{
		$res=mysqli_query($con,"select * from registration where email_id='$email' and pwd='$pwd'");
		if(mysqli_num_rows($res)>0)
		{
			$r=mysqli_fetch_array($res);
			$_SESSION['cid']=$r[0];
			$_SESSION['cemail']=$email;
			echo "<script type='text/javascript'>";
			echo "alert('Customer Login Successfull');";
			echo "window.location.href='cust_buy.php';";
			echo "</script>";
		}else{
			echo "<script type='text/javascript'>";
			echo "alert('Check Email Id or Password');";
			echo "</script>";
		}
	
	}
}
?>
<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">Login</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	
	<div class="container">
	<div class="row">
								<div class="col-md-6">
									<h3>Login</h3>
									<div class="done">
			
		</div>
									<div class="contact-form">
											
		<form method="post"  class="contact">
											<div class="form-group has-feedback">
												<label for="email">Email Id</label>
												<input type="text" class="form-control" name="txtemail" placeholder="">
												
											</div>
											<div class="form-group has-feedback">
												<label for="name">Password</label>
												<input type="password" class="form-control" name="txtpwd" placeholder="">
												
											</div>
											
 
											
											<input type="submit" value="LOGIN" class="submit btn btn-default" name="btnlogin">
										</form>
										 
										
									</div>
								</div>
								<div class="col-md-6">
									<img src="img/tcslogin.jpg" style="width:700px; height:300px;">
								</div>
							</div>
	</div>
 
	</section>
<?php
include("footer.php");
?>