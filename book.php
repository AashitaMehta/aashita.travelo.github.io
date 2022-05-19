<?php
   $c_check = $_POST['c_check'];
   $dept = date('Y-m-d', strtotime($_POST['dept']));
   $total = $_POST['total'];
   $cname = $_POST['cname'];
   $cnum = $_POST['cnum'];
   $month = $_POST['month'];
   $year = $_POST['year'];
   $mail = $_POST['mail'];
   $cvv = $_POST['cvv'];

   $conn = new mysqli('localhost','root','','book');
   if($conn->connect_error){
       die("Connection failed = ".$conn->connect_error);
   }else{
       $stat= $conn->prepare("insert into book(c_check, dept, total, cname, cnum, month, year, mail, cvv) values(?,?,?,?,?,?,?,?,?)");
   }
   $stat->bind_param("ssisiiisi",$c_check,$dept,$total,$cname,$cnum,$month,$year,$mail,$cvv);
   $stat->execute();
   $stat->close();
   $conn->close();

   header('Location: https://localhost/Project/packages.html');

?>