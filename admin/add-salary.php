<?php
session_start();
error_reporting(0);
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
 
$sql="insert into tblsalary(EmpCategory,BasicSalary,PftSharing,Commission,TravelExpenses,Allowance,OverTime)values(:empcategory,:bsalary,:pftsharing,:commission,:texpenses,:allowance,:ot)";
$query=$dbh->prepare($sql);
$query->bindParam(':empcategory',$empcategory,PDO::PARAM_STR);
$query->bindParam(':bsalary',$bsalary,PDO::PARAM_STR);
$query->bindParam(':pftsharing',$pftsharing,PDO::PARAM_STR);
$query->bindParam(':commission',$commission,PDO::PARAM_STR);
$query->bindParam(':texpenses',$texpenses,PDO::PARAM_STR);
$query->bindParam(':allowance',$allowance,PDO::PARAM_STR);
$query->bindParam(':ot',$ot,PDO::PARAM_STR);

 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Service has been added.")</script>';
echo "<script>window.location.href ='add-salary.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Bingi Insurance Management Sysytem|| Add New Salary Slip</title>

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
<li class="active">Add New Salary Slip</li>
</ol>
</div>	
					<!--/sub-heard-part-->	
					<!--/forms-->
<div class="forms-main">
<h2 class="inner-tittle">Add New Salary Slip </h2>
<div class="graph-form">
<div class="form-body">
<form method="post"> 

<div class="form-group"> <label for="exampleInputEmail1">Employee Type</label> 
		<select  name="empcategory" required='true'>
		<option value="">Choose Employee Type</option>
		<option value="Administrator">Administrator</option>
		<option value="Accountant">Accountant</option>
		<option value="Exclusive Agency Insurers">Exclusive Agency Insurers</option>
		<option value="Independent Agency Insurers">Independent Agency Insurers</option>
		<option value="Staff">Staff</option>

	</select> </div>

	<div class="form-group"> <label for="exampleInputEmail1">Basic Salary</label> <input type="text" name="bsalary" placeholder="Basic Salary" value="" class="form-control" required='true'> </div>
	<div class="form-group"> <label for="exampleInputEmail1">Profit Sharing</label> <input type="text" name="pftsharing" placeholder="Profit Sharing" value="" class="form-control" required='true'> </div>
	<div class="form-group"> <label for="exampleInputEmail1">Commission </label> <input type="text" name="commission" placeholder="Commission" value="" class="form-control" required='true'> </div>	
	<div class="form-group"> <label for="exampleInputEmail1">Travel Expenses</label> <input type="text" name="texpenses" placeholder="Tavel Expenses" value="" class="form-control" required='true'> </div>	
	<div class="form-group"> <label for="exampleInputEmail1">Allowance</label> <input type="text" name="allowance" placeholder="Monthly Allowance" value="" class="form-control" required='true'> </div>	
	<div class="form-group"> <label for="exampleInputEmail1">Over Time</label> <input type="text" name="ot" placeholder="Over Time" value="" class="form-control" required='true'> </div>	

	
	 <button type="submit" class="btn btn-default" name="submit" id="submit">Save</button> </form> 
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