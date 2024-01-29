<?php
  require_once 'dashboard/connection.php'; //insert connection to page
  require_once 'user.php'; //Check login 


  $id  = $_REQUEST['sch_id'];
  $email = $_SESSION['email'];

  $viewquery = " SELECT * FROM appinment where sch_id='$id' AND patient_email='$email'";
    $viewresult = mysqli_query($con,$viewquery);

  if(mysqli_num_rows($viewresult)>0)
    {
      echo '<script>alert("This Appinment Alrady in System"); window.location.href="channel.php";</script>';
    }else{
  

        if (isset($_REQUEST['sch_id'])) {
          $id  = $_REQUEST['sch_id'];
          $email = $_SESSION['email'];
          $cdate = date("Y/m/d m:H:s");
          $date = date("Ymd");
          $pending = "Pending";

          $viewquery = " SELECT * FROM schedule where sch_id='$id'";
          $viewresult = mysqli_query($con,$viewquery);

          $q4 = "SELECT * FROM appinment WHERE apponment_code=(SELECT max(apponment_code) FROM appinment where sch_id='$id') ";
          $res4 = mysqli_query($con,$q4);

          $row2 = mysqli_fetch_assoc($res4);


                if (isset($row2['apponment_code'])) {
                  $cat_id = $row2['apponment_code'];

                  $last = substr(trim($cat_id), -1);
                  $newCode = $last + 1;
                  $new_last_code = "A".$id.$date.$newCode;
                }else{
                  $new_last_code = "A".$id.$date."1";
                }


                if ($row = mysqli_fetch_assoc($viewresult)) {
                  $amount = $row['price'];

                      $q1="INSERT INTO appinment(sch_id,patient_email,apponment_code,trn_date,amount,accept,paid) values('$id','$email','$new_last_code','$cdate','$amount','$pending','$pending')";
                      $res1=mysqli_query($con,$q1);

                      if ( $res1) {

                           echo '<script>alert("Channel Appinment addin Scussessfully.");
                           window.location.href="my_appinments.php";
                                        </script>';
                          
                      }
                }
          

        }
  }

?>