<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Page</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Banking System</title>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/style.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        
        <link href="homepgStyle.css" type="text/css" rel="stylesheet">
</head>

<?php
	include 'header.php';
?>

<body>

<!--this page contain details of user present in the database-->
<?php

$con=mysqli_connect("localhost","root","") or die(mysqli_error($con));
mysqli_query($con,"create database if not exists TSFBankDb") or die(mysqli_error($con));
	
mysqli_query($con,"use TSFBankDb") or die(mysqli_error($con));
$rs=mysqli_query($con,"select * from CustomerTb") or die(mysqli_error($con));

?>

<div class="container ">
           
        <h2>All Customers</h2>
        <br>

            <div class="row">
                <div class="col">
                    <div class="table-responsive-sm">
                    <table class="table roundedCorners tabletext table-hover table-sm table-striped table-condensed">
                        <thead>
                            <tr>
         				<td> id </td> 
         				<td> Email</td> 
         				<td> Name </td> 
         				<td> Amount </td> 
                                <th scope="col">Operations</th>
           		  </tr>
                         </thead>
                        <tbody>
                
<!--echo '<table border="2" cellspacing="2" cellpadding="2"> 
      <tr> 
          <td> id </td> 
          <td> Email</td> 
          <td> Name </td> 
          <td> Amount </td> 
           
      </tr>';-->
<?php	  
$rs=mysqli_query($con,"select * from CustomerTb") or die(mysqli_error($con));
	while($row=mysqli_fetch_array($rs))
	{
		?>
		<!--echo '<tr><td>$row[0]</td> 
                  <td>$row[1]</td> 
                  <td>$row[2]</td> 
                  <td>$row[3]</td> 
                  <td><a href="selectedUserdetail.php?id= <php echo $rows["id"] ;?>"> <button type='button' class='button'>Transfer</button></a></td>
              </tr>';-->

	                    <tr>
                        <td><?php echo $row[0] ?></td>
                        <td><?php echo $row[1]?></td>
                        <td><?php echo $row[2]?></td>
                        <td><?php echo $row[3]?></td>
                        <td><a href="TransferMoney_one.php?id= <?php echo $row['id'] ;?>"> <button class="btn btn-primary btn-lg active">Transfer</button></a></td>
                    </tr>
                <?php
                    
                
		
	}	
	mysqli_close($con); 

?>
			</tbody>
                    </table>
                    </div>
                </div>
            </div>
           </div>

    <!-- <a href="TransferMoney.php" style="margin-left:45%" class=" btn btn-success btn-lg active">Transfer Money</a>-->
	 
<footer>
        	<div class="container">
            	<center><p>Copyright &copy; TSF Bank.All Rights Reserved|Contact Us: +91 90000 00000</p></center>
            </div>
</footer> 
</body>
</html>
