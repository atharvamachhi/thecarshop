<?php
session_start();
include("admin_header.php");
include("connect.php");

?>
<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">REPORTS</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	
	<div class="container">
	<div class="row">
								<div class="col-md-6">
									<h3>Reports</h3>
									<div class="done">
			
		</div>
									<div class="contact-form">
											
		<form method="post"  class="contact">
											<div class="form-group has-feedback">
												<label for="email"><h3 ><a href='admin_view_customer_report.php'>Customer Wise Car Selling and Rent Report</a></h3></label>
												
												
											</div>
											<div class="form-group has-feedback">
												<label for="name"><h3 ><a href='admin_view_customer_for_appointment_report.php'>Customer Wise Appointment Booking Report</a></h3></label>
												
												
											</div>
											<div class="form-group has-feedback">
												<label for="name"><h3 ><a href='admin_view_property_for_appointment_report.php'>Car Wise Appointment Booking Report</a></h3></label>
												
												
											</div>
											<div class="form-group has-feedback">
												<label for="name"><h3 ><a href='admin_view_category_report.php'>Category Wise Car Detail Report</a></h3></label>
												
												
											</div>
											
											
										</form>
										 
										
									</div>
								</div>
								<div class="col-md-6">
									<img src="img/rpt.jpg" style="width:300px; height:300px;">
								</div>
							</div>
	</div>
 
	</section>
<?php
include("footer.php");
?>