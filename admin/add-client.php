<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$clientmsaid=$_SESSION['clientmsaid'];
 $acctid=mt_rand(100000000, 999999999);
 $empcategory=$_POST['empcategory'];
 $password=md5($_POST['password']);
 $fname=$_POST['fname'];
 $lname=$_POST['lname'];
 $fullname=$_POST['fullname'];
 $department=$_POST['department'];
 $dobdate=$_POST['dobdate'];
 $address=$_POST['address'];
 $city=$_POST['city'];
 $nic=$_POST['nic'];
 $contactnumber=$_POST['contactnumber'];
 $email=$_POST['email'];
 
$sql="insert into tblclient(AccountID,EmpCategory,FirstName,LastName,FullName,Department,DateofBirth,Address,City,NationalIdentityNumber,ContactNumber,Email,Password)values(:acctid,:empcategory,:fname,:lname,:fullname,:department,:dobdate,:address,:city,:nic,:contactnumber,:email,:password)";
$query=$dbh->prepare($sql);
$query->bindParam(':acctid',$acctid,PDO::PARAM_STR);
$query->bindParam(':empcategory',$empcategory,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':lname',$lname,PDO::PARAM_STR);
$query->bindParam(':fullname',$fullname,PDO::PARAM_STR);
$query->bindParam(':department',$department,PDO::PARAM_STR);
$query->bindParam(':dobdate',$dobdate,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->bindParam(':nic',$nic,PDO::PARAM_STR);
$query->bindParam(':contactnumber',$contactnumber,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Client has been added.")</script>';
echo "<script>window.location.href ='add-client.php'</script>";
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
	<title>Bingo Insurance Management Sysytem|| Add Clients</title>

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
<li class="active">Add Clients</li>
</ol>
</div>	
					<!--/sub-heard-part-->	
					<!--/forms-->
<div class="forms-main">
<h2 class="inner-tittle">Add Clients </h2>
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
	<div class="form-group"> <label for="exampleInputEmail1">First Name</label> <input type="text" name="fname" placeholder="First Name" value="" class="form-control" required='true'> </div>
	<div class="form-group"> <label for="exampleInputEmail1">Last Name</label> <input type="text" name="lname" placeholder="Last Name" value="" class="form-control" required='true'> </div>
	<div class="form-group"> <label for="exampleInputEmail1">Full Name</label> <input type="text" name="fullname" placeholder="Full Name" value="" class="form-control" required='true'> </div>
	<div class="form-group"> <label for="exampleInputEmail1">Department</label> <input type="text" name="department" placeholder="Department Name" value="" class="form-control" required='true'> </div>
	<div class="form-group"> <label for="exampleInputEmail1">Date of Birth</label> <input type="date" name="dobdate" id="dobdate" value="" class="form-control" required='true'> </div>
	<div class="form-group"> <label for="exampleInputEmail1">Address</label> <textarea type="text" name="address" placeholder="Address" value="" class="form-control" required='true' rows="4" cols="3"></textarea> </div>
	<div class="form-group"> <label for="exampleInputEmail1">City</label> <input type="text" name="city" placeholder="City" value="" class="form-control" required='true'> </div>
	<div class="form-group"> <label for="exampleInputEmail1">NIC</label><input type="text" name="nic" value="" placeholder="National Identity Number"  class="form-control" maxlength='10' pattern="[0-9]+" required='true' ></div>
	<div class="form-group"> <label for="exampleInputEmail1">Contact Number</label><input type="text" name="contactnumber" value="" placeholder="Contact Number"  class="form-control" id ="mobilenumber" maxlength='10' pattern="[0-9]+" required='true' > </div>
	<div class="form-group"> <label for="exampleInputEmail1">Email Address</label> <input type="email" name="email" value="" placeholder="Email address" class="form-control" required='true'> </div> 
<div class="form-group"> <label for="exampleInputEmail1">Password</label>
	<input placeholder="password" type="password" name="password" required="true" id="password" class="form-control">
</div>

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