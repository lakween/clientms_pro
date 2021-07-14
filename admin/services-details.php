<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
  	?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Client Management Sysytem || Invoice </title>
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<!-- Graph CSS -->
	<link href="css/font-awesome.css" rel="stylesheet"> 
	<!-- jQuery -->
	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
	<!-- lined-icons -->
	<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
	<!-- /js -->
	<script src="js/jquery-1.10.2.min.js"></script>
	<!-- //js-->
</head> 
<body>
	<div class="page-container">
		<!--/content-inner-->
		<div class="left-content">
			<div class="inner-content">
				<!-- header-starts -->
				<?php include_once('includes/header.php');?>
				<!-- //header-ends -->
				<!--outter-wp-->
				<div class="outter-wp">
					<!--sub-heard-part-->
					<div class="sub-heard-part">
						<ol class="breadcrumb m-b-0">
							<li><a href="dashboard.php">Home</a></li>
							<li class="active">Sales Summary</li>
						</ol>
					</div>
					<!--//sub-heard-part-->
					<div class="graph-visual tables-main">
						
					
						<h3 class="inner-tittle two">Sales Summary </h3>
						<div class="graph">
							<div class="tables">
							<?php 
$sql2 ="SELECT ID from tblclient ";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$tclients=$query2->rowCount();
?>
							<h4>Total Active Clients  -  <?php echo htmlentities($tclients);?></h4>

							<?php 
$sql1 ="SELECT ID from tblservices ";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$tser=$query1->rowCount();
?>	
							<h4>Total Services Listed  -  <?php echo htmlentities($tser);?></h4>
							<div class="graph-visual tables-main">
						
						<div class="graph">
							<div class="tables">
								<table class="table" border="1"> <thead> <tr>
									<th>Total Registered Clients</th>
									<th>Total Active Services</th>
									<th>Today Sales</th>
									<th>Yesterday Sales</th>
									 <th>Last Sevenday Sales</th> 
									 <th>Total Sales</th>
									  </tr>
									   </thead>
									    <tbody>
										
<?php

$sql6="select  sum(tblservices.ServicePrice) as todaysale
from tblinvoice 
 join tblservices  on tblservices.ID=tblinvoice.ServiceId where date(PostingDate)=CURDATE()";

 $query6 = $dbh -> prepare($sql6);
 $query6->execute();
 $results6=$query6->fetchAll(PDO::FETCH_OBJ);
 foreach($results6 as $row6)
{

$todays_sale=$row6->todaysale;
}

?>

<?php

$sql7="select  sum(tblservices.ServicePrice) as totalcost
 from tblinvoice 
  join tblservices  on tblservices.ID=tblinvoice.ServiceId where date(PostingDate)=CURDATE()-1;";

  $query7 = $dbh -> prepare($sql7);
  $query7->execute();
  $results7=$query7->fetchAll(PDO::FETCH_OBJ);
  foreach($results7 as $row7)
{

$yest_sale=$row7->totalcost;
}

?>
								<?php
$sql8="select  sum(tblservices.ServicePrice) as totalcost
 from tblinvoice 
  join tblservices  on tblservices.ID=tblinvoice.ServiceId where date(PostingDate)>=(DATE(NOW()) - INTERVAL 3 DAY);";

  $query8 = $dbh -> prepare($sql8);
  $query8->execute();
  $results8=$query8->fetchAll(PDO::FETCH_OBJ);
  foreach($results8 as $row8)
{

$sevendays_sale=$row8->totalcost;
}


  ?>
								<?php
$sql9="select  sum(tblservices.ServicePrice) as totalcost
 from tblinvoice 
  join tblservices  on tblservices.ID=tblinvoice.ServiceId";

  $query9 = $dbh -> prepare($sql9);
  $query9->execute();
  $results9=$query9->fetchAll(PDO::FETCH_OBJ);
  foreach($results9 as $row9)
{

$total_sale=$row9->totalcost;
}


  ?>
  
  <?php
$sql="select distinct tblclient.FullName,tblclient.Department,tblinvoice.BillingId,tblinvoice.PostingDate from  tblclient   
join tblinvoice on tblclient.ID=tblinvoice.Userid  order by tblinvoice.ID desc";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

             ?>
									     <tr class="active">
										 	<td><?php echo htmlentities($tclients);?></td>
										 	<td><?php echo htmlentities($tser);?></td>
											<td><?php echo htmlentities($todays_sale);?></td>
											<td><?php echo htmlentities($row7->totalcost);?></td>
											<td><?php echo htmlentities($sevendays_sale);?></td>
											<td><?php echo htmlentities($row9->totalcost);?></td>
									         
									     </tr>
								
									     </tbody> </table> 
							</div>

						</div>
				
					</div>
					<!--//graph-visual-->
				</div>
				<!--//outer-wp-->
				<?php include_once('includes/footer.php');?>
			</div>
		</div>
		<!--//content-inner-->
		<!--/sidebar-menu-->
		<?php include_once('includes/sidebar.php');?>
		<div class="clearfix"></div>		
	</div>
	<script>
		var toggle = true;

		$(".sidebar-icon").click(function() {                
			if (toggle)
			{
				$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
				$("#menu span").css({"position":"absolute"});
			}
			else
			{
				$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
				setTimeout(function() {
					$("#menu span").css({"position":"relative"});
				}, 400);
			}

			toggle = !toggle;
		});
	</script>
	<!--js -->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php }  ?>