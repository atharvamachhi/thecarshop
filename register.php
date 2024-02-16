<?php

include("header.php");
include("connect.php");
?>
<script type='text/javascript'>
	function validate()
	{
		
		
		var v=/^[a-zA-Z ]+$/;
		if(form1.txtname.value=="")
		{
			alert("Please Enter Your Name");
			form1.txtname.focus();
			return false;
		}
		else{
			if(!v.test(form1.txtname.value))
			{
				alert("Please Enter Only Characters in Your Name");
				form1.txtname.focus();
				return false;
			}
		}
		
		if(form1.txtadd.value==""){
			alert("Please Enter Your Address");
			form1.txtadd.focus();
			return false;
		}	
		
		
		if(form1.txtcity.value=="")
		{
			alert("Please Enter Your City");
			form1.txtcity.focus();
			return false;
		}
		else{
			if(!v.test(form1.txtcity.value))
			{
				alert("Please Enter Only Characters in Your City");
				form1.txtcity.focus();
				return false;
			}
		}
		
	
		var c=form1.txtmno.value;
		if(form1.txtmno.value=="")
		{
			alert('Please Enter Mobile No');
			form1.txtmno.focus();
			return false;
		}else if(c.length!=10){
			alert('Please Enter Mobile No 10 Digit Long');
			form1.txtmno.focus();
			return false;
		}else{
			for(i=0;i<c.length;i++)
			{
				if(isNaN(c.charAt(i)))
				{
					alert('Dont Used Character or Special Symbols in Mobile No');
					return false;
					break;
				}
			}
		}
		
		var re=/^[a-zA-Z0-9.-_]+@[a-zA-Z0-9.-_]+\.([a-zA-Z]{2,4})$/;
		if(form1.txtemail.value=="")
		{
			alert("Please Enter Email ID");
			form1.txtemail.focus();
			return false;
		}else{
			if(!re.test(form1.txtemail.value))
			{
				alert("Please Enter Valid Email id");
				form1.txtemail.focus();
				return false;
			}
		}
		
		var b=form1.txtpwd.value;
		if(form1.txtpwd.value=="")
		{
			alert("Please Enter Password");
			form1.txtpwd.focus();
			return false;
		}
		else if(b.length<6)
		{
			alert("Please Enter More than 6 Characters in Password");
			form1.txtpwd.focus();
			return false;
		}
		else if(b.length>10)
		{
			alert("Please Enter Less than 10 Characters in Password");
			form1.txtpwd.focus();
			return false;
		}
	}
	</script>
	
<?php
if(isset($_POST['btnregis']))
{
	$name=$_POST['txtname'];
	$add=$_POST['txtadd'];
	$city=$_POST['txtcity'];
	$mno=$_POST['txtmno'];
	$email=$_POST['txtemail'];
	$pwd=$_POST['txtpwd'];

	$querys = "select * from registration where email_id='$email'";
	echo $querys;
	$res=mysqli_query($con,$querys);
	if(mysqli_num_rows($res)>0)
	{
		echo "<script type='text/javascript'>";
		echo "alert('Email Id Already Exists');";
		
		echo "</script>";
	}else{
		$res1=mysqli_query($con,"select max(customer_id) from registration");
		$cid=0;
		while($r1=mysqli_fetch_array($res1))
		{
			$cid=$r1[0];
		}
		$cid++;
		
		$query="insert into registration values('$cid','$name','$add','$city','$mno','$email','$pwd')";
		if(mysqli_query($con,$query))
		{
			echo "<script type='text/javascript'>";
			echo "alert('Register Successfull');";
			echo "window.location.href='login.php';";
			echo "</script>";
		}
	}
}
?>
<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">REGISTRATION</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	
	<div class="container">
	<div class="row">
								<div class="col-md-6">
									<h3>REGISTRATION</h3>
									<div class="done">
			
		</div>
		<div class="contact-form">
											
			<form method="post"  name="form1" class="contact">
				<div class="form-group has-feedback">
					<label for="email">Name</label>
					<input type="text" class="form-control" name="txtname" placeholder="">
				</div>	
				<div class="form-group has-feedback">
					<label for="message">Address</label>
					<textarea class="form-control" rows="3" name="txtadd" placeholder=""></textarea>
					
				</div>
				<div class="form-group has-feedback">
					<label for="email">City</label>
					<input type="text" class="form-control" name="txtcity" placeholder="">
				</div>	
				<div class="form-group has-feedback">
					<label for="email">Mobile No</label>
					<input type="text" class="form-control" name="txtmno" placeholder="">
				</div>	
				<div class="form-group has-feedback">
					<label for="email">Email Id</label>
					<input type="text" class="form-control" name="txtemail" placeholder="">
				</div>
				<div class="form-group has-feedback">
					<label for="name">Password</label>
					<input type="password" class="form-control" name="txtpwd" placeholder="">
				</div>
											
 
											
				<input type="submit" value="REGISTRATION" class="submit btn btn-default" onclick="return validate();" name="btnregis">
			</form>
										 
										
									</div>
								</div>
								<div class="col-md-6">
									<br/><br/><br/>
									<img src="img/regis.jpg" style="width:500px; height:300px;">
								</div>
							</div>
	</div>
 
	</section>
<?php
include("footer.php");
?>