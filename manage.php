<?php
session_start();
if(isset($_SESSION["email"])){$query = "SELECT * FROM admin";
include("includes/common.php");
$com = mysqli_query($con ,$query);
$a = mysqli_fetch_array($com);
$mail = $a['adminemail'];
$currentmail = $_SESSION["email"];
if ($mail !== $currentmail){die("404 NOT FOUND");}}else{die("404 NOT FOUND");}
	
	

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AURES shop | Online Shopping Site for Men</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <link href='https://fonts.googleapis.com/css?family=Delius Swash Caps' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Andika' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<body>
	<!--header-->
<?php include 'includes/header_menu.php';?>

             <br><br><br>
	<!--//breadcrumbs-->
	<!--login-->
	<div class="login-page">
	 <div class="login-page-bottom">
          	</div>
		<div class="widget-shadow">
			<div class="alert alert-danger" role="alert" id="state" style="display:none">
					<strong id="error"></strong> 
				</div>
                    	<div class="alert alert-success" role="alert" id="state1" style="display:none">
					<strong id="success"></strong> 
				</div>
			<div class="login-body wow fadeInUp animated" data-wow-delay=".7s">
                     
                            <form method="post" action="" enctype="multipart/form-data">
                               Name: <input type="text" name="name" value="" placeholder="name">
                               Price: <input type="text" name="price"  placeholder="Price" >
                               Quantity: <input type="number" min="1" name="quantity" value="1"><br><br>
                               Category: &nbsp; &nbsp; &nbsp;<select  name="category" multiple>
                                 <?php
								 include("includes/common.php");
		
					  $query =mysqli_query($con,"SELECT * FROM categories"); ;
					  
					  while($row=mysqli_fetch_array($query)) {
						$cname = $row["name"];
						echo "<option value='$cname'>$cname</option>";
					  }
						?>
        
                               </select><br><br>

                                 <table><tr><td>Image:&nbsp;&nbsp; &nbsp;</td><td><input type="file" name="fileToUpload" id="fileToUpload"></td></tr></table><br>
                                    
                                
                                    <input type="submit" name="new" value="Add" class="btn btn-warning  text-white " >
					
				</form>
			</div>
		</div>
      
	</div>
	<!--//login-->
		<?php include 'includes/footer.php'?>
		
		
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover();
});
$(document).ready(function() {

if(window.location.href.indexOf('#login') != -1) {
  $('#login').modal('show');
}

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
		

</body>
</html>



<?php
echo "<script>document.getElementById(\"state\").style.display=\"none\";</script>";
echo "<script>document.getElementById(\"error\").innerHTML=\" \";</script>";
?>
<?php
if(isset($_POST['new'])){
extract($_POST);
$target_dir = "images/";
$filename=$_FILES["fileToUpload"]["name"];
$tel=explode(".",$filename);
$extension=end($tel);
$last="image".rand(0, 32767);
$newfilename=$last.".".$extension;

$target_file = $target_dir .$newfilename;

$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "<script>document.getElementById(\"state\").style.display=\"block\";</script>";
echo "<script>document.getElementById(\"error\").innerHTML=\" File is not an image.\";</script>";
        
        $uploadOk = 0;
    }
if ($_FILES["fileToUpload"]["size"] > 2000000) {
        echo "<script>document.getElementById(\"state\").style.display=\"block\";</script>";
echo "<script>document.getElementById(\"error\").innerHTML+=\"Sorry, your file is too large.\";</script>";
    
    $uploadOk = 0;
}
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
            echo "<script>document.getElementById(\"state\").style.display=\"block\";</script>";
echo "<script>document.getElementById(\"error\").innerHTML+=\"Sorry, only JPG, JPEG, PNG & GIF files are allowed.\";</script>";
    
    $uploadOk = 0;
}
if ($uploadOk == 0) {
            echo "<script>document.getElementById(\"state\").style.display=\"block\";</script>";
echo "<script>document.getElementById(\"error\").innerHTML+=\" Sorry, your file was not uploaded.\";</script>";
    
} else {
    
     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
     $str="insert into products (name,price,dir,category,quantity) values ('$name','$price','$target_file','$category','$quantity')";
     $qer=mysqli_query($con,$str);
     echo "<script>document.getElementById(\"state1\").style.display=\"block\";</script>";
echo "<script>document.getElementById(\"success\").innerHTML+=\" product added successfuly.\";</script>";
      
  }else{
echo "<script>document.getElementById(\"state\").style.display=\"block\";</script>";
echo "<script>document.getElementById(\"error\").innerHTML+=\" Sorry, there was an error uploading your file.\";</script>";
      
  
  
    }
}
}
?>
