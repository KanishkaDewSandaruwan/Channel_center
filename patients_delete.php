<?php
  require_once 'dashboard/connection.php'; //insert connection to page
  require_once 'user.php'; //Check login 

  $id = $_SESSION['email'];

  $querygetcode="SELECT  * FROM patients where email='".$id."'";
  $catresult=mysqli_query($con,$querygetcode);
  $result_row=mysqli_fetch_assoc($catresult);
  $a=$result_row['email'];

  $q1="DELETE FROM test_appinment WHERE email='".$a."'";
  mysqli_query($con,$q1);

  $query4="DELETE FROM appinment WHERE patient_email='".$a."'";
  mysqli_query($con,$query4);


  $query1="DELETE FROM patients WHERE email='$a '";
  mysqli_query($con,$query1);

  header('location:login.php');

?>