<?php
   $name = $_POST['name'];
   $email = $_POST['email'];
   $mob = $_POST['mob'];
   $city = $_POST['city'];
   $feed = $_POST['feed'];

   $conn = new mysqli('localhost','root','','connect');
   if($conn->connect_error){
       die("Connection failed = ".$conn->connect_error);
   }else{
       $stat= $conn->prepare("insert into feedback(name, email, mob, city, feed) values(?,?,?,?,?)");
   }
   $stat->bind_param("ssiss",$name,$email,$mob,$city,$feed);
   $stat->execute();
   $stat->close();
   $conn->close();

   header('Location: ' . $_SERVER['HTTP_REFERER']);

?>
