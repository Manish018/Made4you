<?php
 include "dbConnection.php";

 $Email=$_POST["email"];
 $Password=$_POST["password"];

 $sql="SELECT COUNT(1) FROM `made4you`.`m4y_users` 
        WHERE upper(User_Email)= upper('$Email');";

$result=mysqli_query($conn,$sql);
$count= mysqli_fetch_row($result);
 if($count[0]>0)
 {
        mysqli_close($conn);
        echo "<script type='text/javascript'>
        alert('This Email ID already exists. Please Sign Up with different Email ID');
        window.location.href='Sign_Up.html';
        </script>";
        
        //header("Location:Sign_Up.html");
        
        exit();
 }
 else{
 
       $sql="INSERT INTO `made4you`.`m4y_users` ( `User_Email`,`User_Password`) 
              VALUES ('$Email','$Password');";

       if($conn->query($sql)==true)
       {
              mysqli_close($conn);
              header("Location:Sign_in.html");
              exit();
       }
       else{
       echo "ERROR: $sql <br> $conn->error";
       }
}
 mysqli_close($conn); 
?>