<html lang="en">
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
<?php 
include 'header.php';  
?>      
</head>



<?php

include 'commonSql.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amnt = $_POST['amount'];

    $sql = "SELECT * from customertb where id=$from";
    $query = mysqli_query($con,$sql);
    $sql1 = mysqli_fetch_array($query); //sender's account

    $sql = "SELECT * from customertb where id=$to";
    $query = mysqli_query($con,$sql);
    $sql2 = mysqli_fetch_array($query);//reciever's account

  
   //insufficient balance
 if($amnt > $sql1[3])
    {

        echo '<script type="text/javascript">';
        echo ' alert("Insufficient Balance")';  
        echo '</script>';
    }

     else if($amnt == 0){
         echo "<script type='text/javascript'>alert('Amount should be Greater than Zero');
    </script>";
     }
    else {

        //transaction begins
        $newCredit =$sql1[3] -$amnt;
        $sql = "UPDATE customertb set credits=$newCredit where id=$from";
        mysqli_query($con,$sql);



        $newCredit =$sql2[3] +$amnt;
        $sql = "UPDATE customerTb set credits=$newCredit where id=$to";
        mysqli_query($con,$sql);

		//inserting records in recordsTB
        $sender = $sql1['Name'];
        $receiver = $sql2['Name'];
        $det="INSERT INTO RecordsTb('sender', 'receiver', 'credits') VALUES ('$sender','$receiver','$amnt')";
        $detsubmit=mysqli_query($con,$det);
        if($det){
           echo "<script type='text/javascript'>
                    alert('Transaction Successfull!');
                    
                </script>";
        }
        
        
       $newCredit= 0;
       $amnt =0; 
    }

}
//window.location='transaction.php';
?>


<body>
       
        <div class="container ">
        
        <h2>Transaction here</h2>
        
            <?php
                include 'commonSql.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  customertb where id=$sid";
                $query=mysqli_query($con,$sql);
                if(!$query)
                {
                    echo "Error ".$sql."<br/>".mysqli_error($con);
                }
                $rows=mysqli_fetch_array($query);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br/>
        <label> From: </label><br/>
        <div>
            <table class="table roundedCorners  tabletext table-hover  table-striped table-condensed astyle"  >
                <tr>
                    <th>Id</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Amount</th>
                </tr>
                <tr>
                    <td><?php echo $rows[0] ?></td>
                    <td><?php echo $rows[1] ?></td>
                    <td><?php echo $rows[2] ?></td>
                    <td><?php echo $rows[3] ?></td>
                </tr>
            </table>
        </div>
        <br/><br/><br/>
        <label>To:</label>
        <select class=" form-control"   name="to" style="margin-bottom:5%;" required>
            <option value="" disabled selected> </option>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM customertb where id!=$sid";
                $query=mysqli_query($con,$sql);
                if(!$query)
                {
                    echo "Error ".$sql."<br/>".mysqli_error($con);
                }
                while($rows = mysqli_fetch_array($query)) {
            ?>
                <option class="table text-center table-striped " value="<?php echo $rows['id'];?>" >

                    <?php echo $rows[2] ;?>
                    <!--(Credits:
                    <?php echo $rows[3] ;?> )-->

                </option>
            <?php
                }
            ?>
        </select> <br/><br/><br/>
            <label>Amount:</label>
            <input type="number" id="amm" class="form-control" name="amount" min="0" required  />  <br/><br/>
                <div class="text-center btn3" >
            <button class="btn btn-success btn-lg active" name="submit" type="submit" id="mybtn" style="margin-left:5%">Proceed</button>
            </div>
        </form>
    </div>
 </body>      
</html>