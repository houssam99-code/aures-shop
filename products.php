<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AURES | Online Shopping Site for Men</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <link href='https://fonts.googleapis.com/css?family=Delius Swash Caps' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Andika' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<!--header -->
 <?php
include 'includes/header_menu.php';
include 'includes/check-if-added.php';

?>
<!--header ends -->
<div class="container" style="margin-top:65px">
         <!--jumbutron start-->
        <div class="jumbotron text-center">
            <h1>Welcome to AURES SHOP!</h1>
            <p>Stay home :)</p>
        </div>
        <!--jumbutron ends-->
        <!--breadcrumb start-->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Products</li>
				<?php 
				if (isset($_GET['cat'])){$cat = $_GET['cat'];}else{$cat = "";}
				echo "<li class='breadcrumb-item active' aria-current='page'>$cat</li>";
				?>
				
            </ol>
        </nav>
        <!--breadcrumb end-->
    <hr/>
    <!--menu list-->
	<div class="row text-center" >
	<?php 
	include("includes/common.php");
	if (isset ($_GET['cat'])){
	$cat = $_GET['cat'];}else{$cat = "";}
		
	
	$command = "SELECT * FROM products WHERE category = '$cat' AND quantity!='0'";
	$query = mysqli_query($con,$command);
	while($row=mysqli_fetch_array($query)) {
		
    $pid=$row["id"];
    $pprice=$row["price"];
	$pname = $row["name"];
	$image = $row["dir"];
	echo "
	<div class='col-md-3 col-6 py-3'>
                    <div class='card'>
                        <img src='$image' alt='' class='img-fluid pb-1'>
                        <div class='figure-caption'>
                            <h6>$pname</h6>
                            <h6>Price : $pprice Da</h6>
                            ";
							if (!isset($_SESSION['email'])) {?>
                    <p><a href='index.php#login' role="button" class="btn btn-warning  text-white ">Add To Cart</a></p>
                    <?php
                    } else {
                    if (check_if_added_to_cart($pid)) {
                    echo '<p><a href="#" class="btn btn-warning  text-white" disabled>Added to cart</a></p>';
                    } else {
                    echo "
                    <p><a href='cart-add.php?id=$pid' name='add' value='add' class='btn btn-warning  text-white'>Add to cart</a></p>
                    ";
                    }
                    }
                    ?>
                        </div>
                    </div>
                </div>
	<?php
	}
	?>
	
        
                
				
				
				
            </div>
      </div>
      <!--menu list ends-->
      <!-- footer-->
        <?php include 'includes/footer.php'?>
      <!--footer ends-->
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover();
});
</script>
<?php if (isset($_GET['error'])) {$z = $_GET['error'];
    echo "<script type='text/javascript'>
$(document).ready(function(){
$('#signup').modal('show');
});
</script>";
    echo "<script type='text/javascript'>alert('" . $z . "')</script>";}?>
<?php if (isset($_GET['errorl'])) {$z = $_GET['errorl'];
    echo "<script type='text/javascript'>
$(document).ready(function(){
$('#login').modal('show');
});
</script>";
    echo "<script type='text/javascript'>alert('" . $z . "')</script>";}?>
</html>