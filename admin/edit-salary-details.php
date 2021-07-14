<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$empcategory=$_POST['empcategory'];
$bsalary=$_POST['bsalary'];
$pftsharing=$_POST['pftsharing'];
$commission=$_POST['commission'];
$texpenses=$_POST['texpenses'];
$allowance=$_POST['allowance'];
$ot=$_POST['ot'];
$eid=$_GET['editid'];
 
$sql="update tblsalary set EmpCategory=:empcategory,BasicSalary=:bsalary,PftSharing=:pftsharing,Commission=:commission,TravelExpenses=:texpenses,Allowance=:allowance,OverTime=:ot where ID=:eid";
$query=$dbh->prepare($sql);
$query->bindParam(':empcategory',$empcategory,PDO::PARAM_STR);
$query->bindParam(':bsalary',$bsalary,PDO::PARAM_STR);
$query->bindParam(':pftsharing',$pftsharing,PDO::PARAM_STR);
$query->bindParam(':commission',$commission,PDO::PARAM_STR);
$query->bindParam(':texpenses',$texpenses,PDO::PARAM_STR);
$query->bindParam(':allowance',$allowance,PDO::PARAM_STR);
$query->bindParam(':ot',$ot,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();

    $query->execute();
echo '<script>alert("Service has been updated")</script>';

  }
  ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Client Management Sysytem|| Update Services</title>

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
	<!-- //lined-icons -->
	<script src="js/jquery-1.10.2.min.js"></script>
	<!--clock init-->
	<script src="js/css3clock.js"></script>
	<!--Easy Pie Chart-->
	<!--skycons-icons-->
	<script src="js/skycons.js"></script>
	<!--//skycons-icons-->
</head> 
<body>
<div class="page-container">
<!--/content-inner-->
<div class="left-content">
<div class="inner-content">
	
<?php include_once('includes/header.php');?>
				<!--//outer-wp-->
<div class="outter-wp">
					<!--/sub-heard-part-->
<div class="sub-heard-part">
<ol class="breadcrumb m-b-0">
<li><a href="dashboard.php">Home</a></li>
<li class="active">Update Services</li>
</ol>
</div>	
					<!--/sub-heard-part-->	
					<!--/forms-->
<div class="forms-main">
<h2 class="inner-tittle">Update Services </h2>
<div class="graph-form">
<div class="form-body">
<form method="post"> 
	<?php
$eid=$_GET['editid'];
$sql="SELECT * from tblsalary where ID=:eid";
$query = $dbh -> prepare($sql);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
	<div class="form-group"> <label for="exampleInputEmail1">Employee  Category </label> <input type="text" name="empcategory" value="<?php echo $row->EmpCategory;?>" class="form-control" required='true' readonly='ture'> </div>
	<div class="form-group"> <label for="exampleInputEmail1">Service Name</label> <input type="text" name="bsalary" value="<?php echo $row->BasicSalary;?>" class="form-control" required='true'> </div>
    <div class="form-group"> <label for="exampleInputEmail1">Price of Service</label> <input type="text" name="pftsharing" value="<?php echo $row->PftSharing;?>" class="form-control" required='true'> </div>
    <div class="form-group"> <label for="exampleInputEmail1">Service Name</label> <input type="text" name="commission" value="<?php echo $row->Commission;?>" class="form-control" required='true'> </div>
    <div class="form-group"> <label for="exampleInputEmail1">Price of Service</label> <input type="text" name="texpenses" value="<?php echo $row->TravelExpenses;?>" class="form-control" required='true'> </div>
    <div class="form-group"> <label for="exampleInputEmail1">Service Name</label> <input type="text" name="allowance" value="<?php echo $row->Allowance;?>" class="form-control" required='true'> </div>
	<div class="form-group"> <label for="exampleInputEmail1">Price of Service</label> <input type="text" name="ot" value="<?php echo $row->OverTime;?>" class="form-control" required='true'> </div>
	<div class="form-group"> <label for="exampleInputEmail1">Creation Date</label> <input type="text" name="" value="<?php echo $row->CreationDate;?>" readonly='true' class="form-control" required='true'> </div>
		<?php $cnt=$cnt+1;}} ?>
	 <button type="submit" class="btn btn-default" name="submit" id="submit">Update</button> </form> 
</div>
</div>
</div> 
</div>
<?php include_once('includes/footer.php');?>
</div>
</div>		
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