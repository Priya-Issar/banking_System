<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Customer Data Insert</title>
</head>

<body>
<?php

$con=mysqli_connect("localhost","root","") or die(mysqli_error($con));
mysqli_query($con,"create database if not exists TSFBankDb") or die(mysqli_error($con));
	
mysqli_query($con,"use TSFBankDb") or die(mysqli_error($con));

//customerTb creation
mysqli_query($con,"create table if not exists CustomerTb (id int(11) primary key auto_increment NOT NULL,Email varchar(100) NOT NULL,Name varchar(100) NOT NULL,Credits varchar(100) NOT NULL)") or die(mysqli_error($con));

/*mysqli_query($con,"INSERT INTO CustomerTb (Email,Name,Credits) VALUES ('aarav@gmail.com','Aarav','30,000')") or die(mysqli_error($con));
mysqli_query($con,"INSERT INTO CustomerTb (Email,Name,Credits) VALUES ('ayushi@gmail.com','Ayushi','20,000')") or die(mysqli_error($con));
mysqli_query($con,"INSERT INTO CustomerTb (Email,Name,Credits) VALUES ('arun@gmail.com','Arun','10,000')") or die(mysqli_error($con));
mysqli_query($con,"INSERT INTO CustomerTb (Email,Name,Credits) VALUES ('riya@gmail.com','Riya','40,000')") or die(mysqli_error($con));
mysqli_query($con,"INSERT INTO CustomerTb (Email,Name,Credits) VALUES ('Komal@gmail.com','Komal','25,000')") or die(mysqli_error($con));

mysqli_query($con,"INSERT INTO CustomerTb (Email,Name,Credits) VALUES ('shrey@gmail.com','Shrey','40,550')") or die(mysqli_error($con));
mysqli_query($con,"INSERT INTO CustomerTb (Email,Name,Credits) VALUES ('virat@gmail.com','Virat','35,500')") or die(mysqli_error($con));
mysqli_query($con,"INSERT INTO CustomerTb (Email,Name,Credits) VALUES ('yash@gmail.com','Yash','30,000')") or die(mysqli_error($con));
mysqli_query($con,"INSERT INTO CustomerTb (Email,Name,Credits) VALUES ('sara@gmail.com','Sara','30,000')") or die(mysqli_error($con));
mysqli_query($con,"INSERT INTO CustomerTb (Email,Name,Credits) VALUES ('isha@gmail.com','Ishani','30,000')") or die(mysqli_error($con));*/


//recordsTb creation
mysqli_query($con,"create table if not exists RecordsTb (Sender varchar(100) ,Reciever varchar(100),Credits int(100))") or die(mysqli_error($con));

mysqli_close($con);
?>
</body>
</html>