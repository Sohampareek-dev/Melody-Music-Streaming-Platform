<?php
if(isset($_COOKIE["admin"])){
	$email=$_COOKIE["admin"];
	$conn=mysqli_connect("localhost","root","","mp3");

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Light Bootstrap Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<style>
	.fa-edit{
		position:absolute;
		width:200px;
		left:50%;
	}
		.fa-plus{
		position:absolute;
		width:200px;
		left:20%;
	}
		.fa-trash{
		position:absolute;
		width:200px;
		left:75%;
	}
</style>
<body style="overflow-x:hidden;">

<div class="wrapper">
    <div class="sidebar" data-color="grey" data-image="assets/img/sidebar-6.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Creative Tim
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="dashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                
            </ul>
    	</div>
    </div>

    <div class="main-panel">
		<nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">User</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="logout.php">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav><br><br>
		
		
<!-- write our content from here -->
<?php
			if(isset($_GET["again"])){
				echo"<h3 style='color:red;'>Category Not created... Try again</h3>";
			}
			if(isset($_GET["empty"])){
				echo"<h3 style='color:red;'> Feilds Required</h3>";
			}
			if(isset($_GET["success"])){
				echo"<h3 style='color:green;'>Category Created</h3>";
			}
			if(isset($_GET["success_del"])){
				echo"<h3 style='color:red;'>Category Deleted</h3>";
			}
			if(isset($_GET["again_del"])){
				echo"<h3 style='color:red;'>Category Not Deleted... Try again</h3>";
			}
			
			
?>
<div class="container">
	<div class="row mt-4">
		<div class="col-lg-4"></div>
		<div class="col-lg-4 m-auto p-4">
			
				<div class="card" style="padding:15px;margin-top:15px">
					<div class="card-header" style="font-family:Jokerman Regular;font-size:35px;margin:10px">Category</div>
					<div class="card-body">
					<form method="post" action="category.php">
						<input type="text"  style="font-family:Tempus Sans ITC Regular;font-size:25px;font-weight:700" name="category" class="form-control"><br>
						<input type="submit" class="btn btn-dark" value="Create"><br>
					</form>
					</div>
				</div>

		</div>
	</div>


	<h4 style="text:algin-center;font-family:Jokerman Regular;font-size:35px;">Catogries</h4>
	<?php
		$rs=mysqli_query($conn,"select * from category order by sn");
		while($r=mysqli_fetch_array($rs)){
	?>
	<div class="row">
		<div class="col-lg-12">
			<table class="table table-striped">
				<tr>
					<td style="font-family:Tempus Sans ITC Regular;font-size:25px;"><?=$r["category"]?></td>
					<td><a href="add.php?id=<?=$r["code"]?>"><i class="fa fa-plus" style="color:green"></i></a></td>
					<td><a href="edit.php?id=<?=$r["code"]?>"><i class="fa fa-edit" style="color:red"></i></a></td>
					<td><a href="delete.php?id=<?=$r["code"]?>"><i class="fa fa-trash" style="color:red"></i></a></td>
				</tr>
			</table>
		</div>
	</div>
	<?php
		}
		?>
</div>



        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

</html>
<?php
}
else{
	header("location:index.php");
}
?>