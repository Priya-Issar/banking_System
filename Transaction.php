<head>

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
        
       
</head>

<body>

<!--this page contain transctions details-->

        <?php
		include 'header.php';
		?>
        
        <div class="container ">
            
        <h2>Transaction Summary</h2>

       <br>
       <div class="table-responsive-sm">
    <table class="table roundedCorners  tabletext table-hover table-striped table-condensed" >
        <thead>
            <tr>
                
                <th>Sender</th>
                <th>Receiver</th>
                <th>Credits</th>
            </tr>
        </thead>
        <tbody>
        
<?php
$con=mysqli_connect("localhost","root","") or die(mysqli_error($con));
	mysqli_query($con,"create database if not exists TSFBankDb") or die(mysqli_error($con));
	
	mysqli_query($con,"use TSFBankDb") or die(mysqli_error($con));

		//retrieving data from transaction table
		$rs=mysqli_query($con,"select * from RecordsTb") or die(mysqli_error($con));
		
	            while($rows = mysqli_fetch_array($rs))
            {
        ?>
            <tr>
            
            <td><?php echo $rows[0]; ?></td>
            <td><?php echo $rows[1]; ?></td>
            <td><?php echo $rows[2]; ?> </td>

        <?php
            }

        ?>
        </tbody>
    </table>

    </div>
    
</div>





</body>
</html>