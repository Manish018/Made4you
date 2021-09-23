<?php
 include "dbConnection.php";

 $Service=$_POST["services"];
 $Name=$_POST["name"];
 $Phone=$_POST["contact"];
 $Email=$_POST["email"];
 $UserMessage=$_POST["umessage"];

 $sql="INSERT INTO `made4you`.`ContactUs` ( `Service_ID`,`User_Name`, `Contact_Number`, `User_Email`,`User_Message`) 
        VALUES ('$Service','$Name','$Phone','$Email','$UserMessage');";

 if($conn->query($sql)==true)
 {
        mysqli_close($conn);
        header("Location:Thankyou.html");
        exit();
 }
 else{
     echo "ERROR: $sql <br> $conn->error";
 }
 mysqli_close($conn); 
?>