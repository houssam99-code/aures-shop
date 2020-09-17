<?php
session_start();
if (isset($_GET["confirm"])){
	$conf = $_GET["confirm"];
	include("includes/common.php");
	$command= "UPDATE users_products SET status='done' WHERE id =$conf";
	$b = mysqli_query($con ,$command);
	echo 'Succefully Confirmed';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <link href='https://fonts.googleapis.com/css?family=Delius Swash Caps' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Andika' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel="stylesheet" href="css/style.css">
  
</head>
<body style="margin-bottom:200px">
    <!--Header-->
   


  <h1>
 <?php
 
  echo "Client Number : " .$userid= $_GET["userid"]; ?>
</h1>
<main>
  <table>
    <thead>
      <tr>
	 
        <th>
          Purchase ID
        </th>
        <th>
          Product Name
        </th>
        <th></th>
      </tr>
    </thead>
  
    <tbody>
      <tr>
	   <?php 
	   
	   
	  include("includes/common.php");
	  
	  

	  $qq = mysqli_query($con,"select products.name ,products.id,users_products.id from products INNER JOIN users_products on products.id = users_products.item_id WHERE users_products.status='Confirmed' AND users_products.user_id = '$userid'");
	 while($row2=mysqli_fetch_array($qq)) {
	  $puid = $row2["id"];
	  $pname = $row2["name"];
	 
	  ?>
	  
	  
	  
        <td data-title='Purchase id'>
	  <?php echo $puid ;?>
        </td>
        
		  <td data-title='Product name'>
            <?php echo $pname ;?>
        </td> 
	 
		
        <td class='select'>
          <button class='button' onClick=window.open("confirm.php?userid=<?php echo $userid;?>&confirm=<?php echo $puid;?>","Ratting","width=800,height=400,0,left=300,top=200,status=0,");>
            Confirm Order
          </button>
        </td>
		
      </tr>
	  <?php } ?>
	   
    </tbody>
  </table>

</main>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>


</body>
</html>
