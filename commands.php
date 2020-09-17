<?php
session_start();
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="style.css">
</head>
<body style="margin-bottom:200px">
    <!--Header-->
    <?php
include 'includes/header_menu.php';
include 'includes/check-if-added.php';
?>


  <h1>
  Commands
</h1>
<main>
  <table>
    <thead>
      <tr>
	 
        <th>
          Buyer's name
        </th>
        <th>
          E-mail
        </th><th>
          Phone number
        </th>
        <th></th>
      </tr>
    </thead>
  
    <tbody>
      <tr>
	   <?php 
	   $conct = '';
	  include("includes/common.php");
	  
	  

	  $query =mysqli_query($con,"SELECT  DISTINCT users.id,users.first_name ,users.last_name,users.email_id,users.phone FROM users INNER JOIN users_products ON users.id =users_products.user_id AND users_products.status = 'Confirmed' ");
	  while($row=mysqli_fetch_array($query)) {
						$userid = $row["id"];
						$name= $row["first_name"]." " .$row["last_name"];
						$email = $row["email_id"];
						$phone = $row["phone"];
	
	  ?>
	  
	  
	  
        <td data-title='Buyer Name'>
	  <?php echo $name ;?>
        </td>
        <td data-title='E-mail'>
            <?php echo $email ;?>
        </td> 
	 
		<td> <?php echo $phone ;?></td> 
        <td class='select'>
          <button class='button' onClick=window.open("confirm.php?userid=<?php echo $userid ?>","Ratting","width=800,height=400,0,left=300,top=200,status=0,");>
            See Orders
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
