<?php
session_start();
include("cust_header.php");
include("connect.php");
?>

<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">PROPERTY DETAIL</h2>
			</div>
		</div>
	</div>
</section>
	<section id="content">
		<div class="container content">		
        <!-- Service Blcoks -->
			<div class="col-md-9">
        		<div class="row service-v1 margin-bottom-40">
					<?php
					if(isset($_REQUEST['cid']))
					{
						$cid=$_REQUEST['cid'];
						$query1="select * from property_master where status='1' and category_id='$cid' and type='2'";
					}else{
						$query1="select * from property_master where status='1' and type='2'";
					}
					$res1=mysqli_query($con,$query1);
					if(mysqli_num_rows($res1)>0)
					{
						while($r1=mysqli_fetch_array($res1))
						{
						
					?>
				
					<div class="col-md-6 md-margin-bottom-40">
						<a href="cust_view_property_detail.php?pid=<?php echo $r1[0]; ?>"><img class="img-responsive" src="<?php echo $r1[7]; ?>" style="width:394px; height:261px;"alt=""></a>   
						<h3><?php echo $r1[2]; ?></h3>
						<p>Price : Rs.<?php echo $r1[6]; ?> /- </p>        
						<p>Area : <?php echo $r1[8]; ?>  </p>        
					</div>		
				<?php
						}
					}else{
						echo "No Property Found";
				}
				?>
        		</div>
			</div>
			
        <!-- End Service Blcoks -->
			<div class="col-md-3">
				<h2>CATEGORY</h2>
				
				<ul>
				<?php
					$res=mysqli_query($con,"select * from category_master");
					while($r=mysqli_fetch_array($res))
					{
						echo "<li><h4><a href='cust_buy.php?cid=$r[0]'>$r[1]</a></h4></li><br/>";
					}
				?>
				</ul>
			</div>
        
		</div>
    </section>